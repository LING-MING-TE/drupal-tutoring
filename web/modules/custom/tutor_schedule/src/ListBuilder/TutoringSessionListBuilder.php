<?php

namespace Drupal\tutor_schedule\ListBuilder;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Tutoring Session entities.
 */
class TutoringSessionListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('ID');
    $header['title'] = $this->t('Title');
    $header['student'] = $this->t('Student');
    $header['tutor'] = $this->t('Tutor');
    $header['date'] = $this->t('Session Date');
    $header['status'] = $this->t('Status');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /** @var \Drupal\tutor_schedule\Entity\TutoringSessionInterface $entity */
    $row['id'] = $entity->id();

    $row['title'] = Link::createFromRoute(
      $entity->getTitle(),
      'entity.tutor_session.canonical',
      ['tutor_session' => $entity->id()]
    );

    // Get student.
    $student_id = $entity->get('student_id')->target_id;
    if ($student_id) {
      $student = \Drupal::entityTypeManager()->getStorage('user')->load($student_id);
      $row['student'] = $student ? $student->getDisplayName() : $this->t('N/A');
    }
    else {
      $row['student'] = $this->t('N/A');
    }

    // Get tutor.
    $tutor_id = $entity->get('tutor_id')->target_id;
    if ($tutor_id) {
      $tutor = \Drupal::entityTypeManager()->getStorage('user')->load($tutor_id);
      $row['tutor'] = $tutor ? $tutor->getDisplayName() : $this->t('N/A');
    }
    else {
      $row['tutor'] = $this->t('N/A');
    }

    $session_date = $entity->get('session_date')->value;
    $row['date'] = $session_date ? $session_date : $this->t('N/A');

    $status_value = $entity->get('status')->value;
    $row['status'] = $status_value ? ucfirst($status_value) : $this->t('N/A');

    return $row + parent::buildRow($entity);
  }

}
