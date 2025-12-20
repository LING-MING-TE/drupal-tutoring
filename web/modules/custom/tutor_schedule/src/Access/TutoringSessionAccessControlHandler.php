<?php

namespace Drupal\tutor_schedule\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Access controller for the Tutoring Session entity.
 */
class TutoringSessionAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\tutor_schedule\Entity\TutoringSessionInterface $entity */

    switch ($operation) {
      case 'view':
      case 'update':
        // Check if user is the student or tutor.
        $is_student = $account->id() == $entity->getStudentId();
        $is_tutor = $account->id() == $entity->getTutorId();

        if ($is_student || $is_tutor) {
          $permission = $operation === 'view' ? 'view own tutor_session' : 'edit own tutor_session';
          return AccessResult::allowedIfHasPermission($account, $permission)
            ->cachePerUser()
            ->addCacheableDependency($entity);
        }

        // Anyone with 'view all' permission can view/edit.
        return AccessResult::allowedIfHasPermission($account, 'view all tutor_session');

      case 'delete':
        // Only admins can delete sessions.
        return AccessResult::allowedIfHasPermission($account, 'administer tutor schedules');
    }

    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'create tutor_session');
  }

}
