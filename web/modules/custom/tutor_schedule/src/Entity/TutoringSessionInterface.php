<?php

namespace Drupal\tutor_schedule\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface for tutoring session entities.
 */
interface TutoringSessionInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Gets the tutoring session title.
   *
   * @return string
   *   Title of the tutoring session.
   */
  public function getTitle();

  /**
   * Sets the tutoring session title.
   *
   * @param string $title
   *   The tutoring session title.
   *
   * @return \Drupal\tutor_schedule\Entity\TutoringSessionInterface
   *   The called tutoring session entity.
   */
  public function setTitle($title);

  /**
   * Gets the student ID.
   *
   * @return int
   *   The student user ID.
   */
  public function getStudentId();

  /**
   * Gets the tutor ID.
   *
   * @return int
   *   The tutor user ID.
   */
  public function getTutorId();

  /**
   * Gets the tutoring session creation timestamp.
   *
   * @return int
   *   Creation timestamp of the tutoring session.
   */
  public function getCreatedTime();

  /**
   * Sets the tutoring session creation timestamp.
   *
   * @param int $timestamp
   *   The tutoring session creation timestamp.
   *
   * @return \Drupal\tutor_schedule\Entity\TutoringSessionInterface
   *   The called tutoring session entity.
   */
  public function setCreatedTime($timestamp);

}
