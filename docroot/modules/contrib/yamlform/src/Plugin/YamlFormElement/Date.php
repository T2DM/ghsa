<?php

namespace Drupal\yamlform\Plugin\YamlFormElement;

use Drupal\Core\Datetime\Entity\DateFormat;
use Drupal\Core\Form\FormStateInterface;
use Drupal\yamlform\YamlFormSubmissionInterface;

/**
 * Provides a 'date' element.
 *
 * @YamlFormElement(
 *   id = "date",
 *   api = "https://api.drupal.org/api/drupal/core!lib!Drupal!Core!Render!Element!Date.php/class/Date",
 *   label = @Translation("Date"),
 *   category = @Translation("Date/time elements"),
 * )
 */
class Date extends DateBase {

  /**
   * {@inheritdoc}
   */
  public function getDefaultProperties() {
    $date_format = '';
    // Date formats cannot be loaded during install or update.
    if (!defined('MAINTENANCE_MODE')) {
      /** @var \Drupal\Core\Datetime\DateFormatInterface $date_format_entity */
      if ($date_format_entity = DateFormat::load('html_date')) {
        $date_format = $date_format_entity->getPattern();
      }
    }

    return parent::getDefaultProperties() + [
      'date_date_format' => $date_format,
      'min' => '',
      'max' => '',
      'step' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepare(array &$element, YamlFormSubmissionInterface $yamlform_submission) {
    parent::prepare($element, $yamlform_submission);
    $element['#element_validate'][] = [get_class($this), 'validateDate'];
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);
    $form['date'] = [
      '#type' => 'details',
      '#title' => $this->t('Date settings'),
      '#open' => FALSE,
    ];
    $form['date']['date_date_format'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Date format'),
      '#description' => $this->t('The date format used in PHP formats.'),
    ];
    $form['date']['min'] = [
      '#type' => 'date',
      '#title' => $this->t('Min'),
      '#description' => $this->t('Specifies the minimum date.'),
      '#size' => 4,
    ];
    $form['date']['max'] = [
      '#type' => 'date',
      '#title' => $this->t('Max'),
      '#description' => $this->t('Specifies the maximum date.'),
      '#size' => 4,
    ];
    $form['date']['step'] = [
      '#type' => 'number',
      '#title' => $this->t('Steps'),
      '#description' => $this->t('Specifies the legal number intervals.'),
      '#size' => 4,
    ];
    return $form;
  }

  /**
   * Form element validation handler for #type 'date'.
   *
   * Note that #required is validated by _form_validate() already.
   *
   * @see \Drupal\Core\Render\Element\Number::validateNumber
   */
  public static function validateDate(&$element, FormStateInterface $form_state, &$complete_form) {
    $value = $element['#value'];
    if ($value === '') {
      return;
    }

    $name = empty($element['#title']) ? $element['#parents'][0] : $element['#title'];

    // Ensure the input is valid date.
    // @see http://stackoverflow.com/questions/10691949/check-if-variable-is-a-valid-date-with-php
    $date = date_parse($value);
    if ($date["error_count"] || !checkdate($date["month"], $date["day"], $date["year"])) {
      $form_state->setError($element, t('%name must be a valid date.', ['%name' => $name]));
    }

    $time = strtotime($value);
    $date_date_format = (!empty($element['#date_date_format'])) ? $element['#date_date_format'] : DateFormat::load('html_date')->getPattern();

    // Ensure that the input is greater than the #min property, if set.
    if (isset($element['#min'])) {
      $min = strtotime($element['#min']);
      if ($time < $min) {
        $form_state->setError($element, t('%name must be on or after %min.', [
          '%name' => $name,
          '%min' => date($date_date_format, $min),
        ]));
      }
    }

    // Ensure that the input is less than the #max property, if set.
    if (isset($element['#max'])) {
      $max = strtotime($element['#max']);
      if ($time > $max) {
        $form_state->setError($element, t('%name must be on or before %max.', [
          '%name' => $name,
          '%max' => date($date_date_format, $max),
        ]));
      }
    }
  }

}
