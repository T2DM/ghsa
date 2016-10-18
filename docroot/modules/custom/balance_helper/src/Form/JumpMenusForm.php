<?php

namespace Drupal\balance_helper\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class JumpMenusForm extends FormBase {

  public function getFormId() {
    return 'balance_helper_jump_menus_form';
  }

  private function getTermList($vocabularyName) {
    try{
      $output = null;
      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid',$vocabularyName);
      $query->sort('name','ASC');
      $tIds = $query->execute();

      $term_storage = \Drupal::entityTypeManager()->getStorage('taxonomy_term');
      $allTerms =   $term_storage->loadMultiple($tIds);
      $arrTerm = array();
      foreach($allTerms as $idx=>$val){
        // $arrTerm[$val->id()] = $this->t($val->name->value);
        $arrTerm[$val->name->value] = $this->t($val->name->value);
      }

      $output = $arrTerm;
    }catch(Exception $ex){
      $output = null;
      watchdog_exception(__FUNCTION__, $ex);
    }
    return $output;
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $state_options = $this->getTermList('state');
    $issue_options = $this->getTermList('issue');

    $form['state'] = [
      '#type' => 'select',
      // '#title' => t('States'),
      '#empty_option' => $this->t('- Go to a State -'),
      '#options' => $state_options,
      // '#multiple' => true,
      // '#description' => t('Filter by State.'),
    ];

    $form['issues'] = [
      '#type' => 'select',
      // '#title' => $this->t('Issues'),
      '#empty_option' => $this->t('- Go to an Issue -'),
      '#options' => $issue_options,
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['submit'] = [
      // '#type' => 'submit',
      // '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
