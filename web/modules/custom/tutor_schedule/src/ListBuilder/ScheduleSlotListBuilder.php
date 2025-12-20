<?php

namespace Drupal\tutor_schedule\ListBuilder;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Schedule Slot entities.
 */
class ScheduleSlotListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('ID');
    $header['title'] = $this->t('Title');
    $header['tutor'] = $this->t('Tutor');
    $header['date'] = $this->t('Date');
    $header['time'] = $this->t('Time');
    $header['classroom'] = $this->t('Classroom');
    $header['subject'] = $this->t('Subject');
    $header['status'] = $this->t('Status');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /** @var \Drupal\tutor_schedule\Entity\ScheduleSlotInterface $entity */
    $row['id'] = $entity->id();

    $row['title'] = Link::createFromRoute(
      $entity->getTitle(),
      'entity.tutor_schedule_slot.canonical',
      ['tutor_schedule_slot' => $entity->id()]
    );

    $tutor = $entity->getOwner();
    $row['tutor'] = $tutor ? $tutor->getDisplayName() : $this->t('N/A');

    $schedule_date = $entity->get('schedule_date')->value;
    $row['date'] = $schedule_date ? $schedule_date : $this->t('N/A');

    $start_time = $entity->get('start_time')->value;
    $end_time = $entity->get('end_time')->value;
    if ($start_time && $end_time) {
      $row['time'] = $start_time . ' - ' . $end_time;
    }
    else {
      $row['time'] = $this->t('N/A');
    }

    $row['classroom'] = $entity->get('classroom')->value ?: $this->t('N/A');
    $row['subject'] = $entity->get('subject')->value ?: $this->t('N/A');
    $row['status'] = $entity->isPublished() ? $this->t('Published') : $this->t('Unpublished');

    return $row + parent::buildRow($entity);
  }

}
