<?php
/**
* @file
* Contains \Drupal\balance_helper\Plugin\Block\JumpMenusBlock.
*/
namespace Drupal\balance_helper\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block with two jump menus.
 *
 * @Block(
 *  id = "jump_menus",
 *  admin_label = @Translation("Jump Menus"),
 * category = @Translation("Balance")
 * )
 */
class JumpMenusBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = array();
    // $build['#markup'] = '' . t('Some text here') . '';
    $build['form'] = \Drupal::formBuilder()->getForm('Drupal\balance_helper\Form\JumpMenusForm');

    return $build;
  }

}
