<?php

namespace Drupal\tutor_schedule\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Access controller for the Schedule Slot entity.
 */
class ScheduleSlotAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\tutor_schedule\Entity\ScheduleSlotInterface $entity */

    switch ($operation) {
      case 'view':
        // Published slots can be viewed by anyone with the permission.
        if ($entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view published tutor_schedule_slot');
        }
        // Unpublished slots: owner can view with permission.
        if ($account->id() == $entity->getOwnerId()) {
          return AccessResult::allowedIfHasPermission($account, 'view own tutor_schedule_slot')
            ->cachePerUser()
            ->addCacheableDependency($entity);
        }
        // Anyone with 'view all' permission can view unpublished.
        return AccessResult::allowedIfHasPermission($account, 'view all tutor_schedule_slot');

      case 'update':
        // Owner can edit their own slots.
        if ($account->id() == $entity->getOwnerId()) {
          return AccessResult::allowedIfHasPermission($account, 'edit own tutor_schedule_slot')
            ->cachePerUser()
            ->addCacheableDependency($entity);
        }
        // Anyone with 'edit any' permission can edit.
        return AccessResult::allowedIfHasPermission($account, 'edit any tutor_schedule_slot');

      case 'delete':
        // Owner can delete their own slots.
        if ($account->id() == $entity->getOwnerId()) {
          return AccessResult::allowedIfHasPermission($account, 'delete own tutor_schedule_slot')
            ->cachePerUser()
            ->addCacheableDependency($entity);
        }
        // Anyone with 'delete any' permission can delete.
        return AccessResult::allowedIfHasPermission($account, 'delete any tutor_schedule_slot');
    }

    // No opinion for other operations.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'create tutor_schedule_slot');
  }

}
