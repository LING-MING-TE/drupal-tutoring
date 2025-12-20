<?php

namespace Drupal\tutor_schedule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for student schedule routes.
 */
class ScheduleController extends ControllerBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a ScheduleController object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * Displays available tutoring slots for students.
   *
   * @return array
   *   A render array.
   */
  public function availableSlots() {
    $current_time = \Drupal::time()->getRequestTime();

    // Query published schedule slots in the future.
    $query = $this->entityTypeManager
      ->getStorage('tutor_schedule_slot')
      ->getQuery()
      ->condition('status', 1)
      ->condition('schedule_date', date('Y-m-d', $current_time), '>=')
      ->sort('schedule_date', 'ASC')
      ->sort('start_time', 'ASC')
      ->pager(20)
      ->accessCheck(TRUE);

    $slot_ids = $query->execute();

    if (empty($slot_ids)) {
      return [
        '#markup' => $this->t('No available tutoring slots at this time.'),
      ];
    }

    $slots = $this->entityTypeManager
      ->getStorage('tutor_schedule_slot')
      ->loadMultiple($slot_ids);

    $view_builder = $this->entityTypeManager->getViewBuilder('tutor_schedule_slot');
    $build = [];

    foreach ($slots as $slot) {
      $build[] = $view_builder->view($slot, 'teaser');
    }

    // Add pager.
    $build['pager'] = [
      '#type' => 'pager',
    ];

    $build['#cache'] = [
      'contexts' => ['url.query_args.pagers'],
      'tags' => ['tutor_schedule_slot_list'],
    ];

    return $build;
  }

}
