<?php
/**
 * @file
 * Contains \Drupal\ghsa_dev\Controller\HelloController.
 */

namespace Drupal\ghsa_dev\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\Query\Sql\Query;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DeleteDemoStateLaws extends ControllerBase {
  private $query;

  /**
   * DeleteDemoStateLaws constructor. We need this because we are defining our
   * query object during the instantiation of the controller (see create
   * function).
   */
  public function __construct(Query $query) {
    $this->query = $query;
  }

  /**
   * Override the create function so that we can get access to the container
   * object and call services the recommended Drupal 8 way which is through
   * Dependency Injection.
   */
  public static function create(ContainerInterface $container) {
    // Define the Entity query service
    $service = $container->get('entity.query');
    $query = $service->get('node');
    return new static($query);
  }

  public function content() {
    // Save typing
    $query = $this->query;

    $query->condition('type', 'state_laws');
    $nids = $query->execute();

    $node_storage = $this->entityTypeManager()->getStorage('node');
    $nodes = $node_storage->loadMultiple($nids);
    $node_storage->delete($nodes);

    return array(
      '#type' => 'markup',
      '#markup' => $this->t('Deleted nodes: '),
    );
  }
}