<?php

namespace Drupal\tutor_schedule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for Tutor Schedule routes.
 */
class TeacherScheduleController extends ControllerBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a TeacherScheduleController object.
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
   * Displays the teacher's personal schedule.
   *
   * @return array
   *   A render array.
   */
  public function mySchedule() {
    $current_user = $this->currentUser();

    // Query schedule slots for the current teacher.
    $query = $this->entityTypeManager
      ->getStorage('tutor_schedule_slot')
      ->getQuery()
      ->condition('tutor_id', $current_user->id())
      ->condition('status', 1)
      ->sort('schedule_date', 'ASC')
      ->sort('start_time', 'ASC')
      ->accessCheck(TRUE);

    $slot_ids = $query->execute();

    if (empty($slot_ids)) {
      return [
        '#markup' => $this->t('You have no scheduled slots yet.'),
      ];
    }

    $slots = $this->entityTypeManager
      ->getStorage('tutor_schedule_slot')
      ->loadMultiple($slot_ids);

    $view_builder = $this->entityTypeManager->getViewBuilder('tutor_schedule_slot');
    $build = [];

    foreach ($slots as $slot) {
      $build[] = $view_builder->view($slot, 'full');
    }

    $build['#cache'] = [
      'contexts' => ['user'],
      'tags' => ['tutor_schedule_slot_list'],
    ];

    return $build;
  }

}
