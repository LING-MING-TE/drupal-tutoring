<?php

namespace Drupal\tutor_schedule\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Tutoring Session edit forms.
 */
class TutoringSessionForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label tutoring session.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label tutoring session.', [
          '%label' => $entity->label(),
        ]));
    }

    $form_state->setRedirect('entity.tutor_session.canonical', ['tutor_session' => $entity->id()]);

    return $status;
  }

}
