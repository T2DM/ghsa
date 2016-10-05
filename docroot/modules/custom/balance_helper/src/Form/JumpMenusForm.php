<?php

namespace Drupal\balance_helper\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class JumpMenusForm extends FormBase {

  public function getFormId() {
    return 'balance_helper_jump_menus_form';
  }

  // function taxonomy_vocabulary_load($vid) {
  //   return Vocabulary::load($vid);
  // }

  /**
   * Load term data.
   */
  public function getTermData($bundle, $entity_id = 0) {

    $result = [];

    $entity_manager = \Drupal::getContainer()->get('entity.manager');
    $storage = $entity_manager->getStorage('taxonomy_term');
    $terms = $storage->loadTree($bundle, $entity_id, 1, TRUE);

    foreach ($terms as $term) {
      $result[] = (object) [
        'tid' => $term->id(),
        'name' => $term->getName(),
        // 'description__value' => $term->getDescription(),
        // 'langcode' => $term->default_langcode,
      ];
    }

    return $result;
  }


  public function buildForm(array $form, FormStateInterface $form_state) {

    // $results = db_query("SELECT tid, name FROM {taxonomy_term_data} WHERE vid = 1")->fetchAll();
    //
    // $options = array();
    //
    // foreach($results  as $key=>$value){
    //   $options[$key] = $vlaue;
    // }

    $state_options = array(
      '01' => 'Alaska',
      '02' => 'Texas',
    );


    $form['state'] = [
      '#type' => 'select',
      '#title' => t('State'),
      '#empty_option' => $this->t('- Select -'),
      '#options' => $state_options,
      // '#multiple' => true,
      // '#description' => t('Filter by State.'),
    ];

    $form['issues'] = [
      '#type' => 'select',
      '#title' => $this->t('Issues'),
      '#options' => [
        '1' => $this->t('One'),
        $this->t('Two')->render() => [
          '2.1' => $this->t('Two point one'),
          '2.2' => $this->t('Two point two'),
        ],
        '3' => $this->t('Three'),
      ],
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
