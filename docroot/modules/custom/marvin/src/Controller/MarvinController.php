<?php
namespace Drupal\marvin\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * MarvinController.
 */
class MarvinController extends ControllerBase {
  /**
   * Generates an example page.
   */
  public function description() {
    return array(
      '#markup' => t('Hello World!'),
    );
  }
}