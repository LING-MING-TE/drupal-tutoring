<?php

namespace Drupal\tutor_schedule\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for schedule slot entities.
 */
interface ScheduleSlotInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  /**
   * Gets the schedule slot title.
   *
   * @return string
   *   Title of the schedule slot.
   */
  public function getTitle();

  /**
   * Sets the schedule slot title.
   *
   * @param string $title
   *   The schedule slot title.
   *
   * @return \Drupal\tutor_schedule\Entity\ScheduleSlotInterface
   *   The called schedule slot entity.
   */
  public function setTitle($title);

  /**
   * Returns the schedule slot published status indicator.
   *
   * @return bool
   *   TRUE if the schedule slot is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a schedule slot.
   *
   * @param bool $published
   *   TRUE to set this schedule slot to published, FALSE to unpublished.
   *
   * @return \Drupal\tutor_schedule\Entity\ScheduleSlotInterface
   *   The called schedule slot entity.
   */
  public function setPublished($published);

  /**
   * Gets the schedule slot creation timestamp.
   *
   * @return int
   *   Creation timestamp of the schedule slot.
   */
  public function getCreatedTime();

  /**
   * Sets the schedule slot creation timestamp.
   *
   * @param int $timestamp
   *   The schedule slot creation timestamp.
   *
   * @return \Drupal\tutor_schedule\Entity\ScheduleSlotInterface
   *   The called schedule slot entity.
   */
  public function setCreatedTime($timestamp);

}
