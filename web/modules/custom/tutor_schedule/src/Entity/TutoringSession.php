<?php

namespace Drupal\tutor_schedule\Entity;

use Drupal\Core\Entity\Attribute\ContentEntityType;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines the Tutoring Session entity.
 */
#[ContentEntityType(
  id: 'tutor_session',
  label: new TranslatableMarkup('Tutoring Session'),
  label_collection: new TranslatableMarkup('Tutoring Sessions'),
  label_singular: new TranslatableMarkup('tutoring session'),
  label_plural: new TranslatableMarkup('tutoring sessions'),
  entity_keys: [
    'id' => 'id',
    'uuid' => 'uuid',
    'label' => 'title',
  ],
  handlers: [
    'access' => 'Drupal\tutor_schedule\Access\TutoringSessionAccessControlHandler',
    'list_builder' => 'Drupal\tutor_schedule\ListBuilder\TutoringSessionListBuilder',
    'form' => [
      'default' => 'Drupal\tutor_schedule\Form\TutoringSessionForm',
      'add' => 'Drupal\tutor_schedule\Form\TutoringSessionForm',
      'edit' => 'Drupal\tutor_schedule\Form\TutoringSessionForm',
      'delete' => 'Drupal\tutor_schedule\Form\TutoringSessionDeleteForm',
    ],
    'views_data' => 'Drupal\views\EntityViewsData',
  ],
  links: [
    'canonical' => '/schedule/session/{tutor_session}',
    'add-form' => '/schedule/session/add',
    'edit-form' => '/schedule/session/{tutor_session}/edit',
    'delete-form' => '/schedule/session/{tutor_session}/delete',
    'collection' => '/admin/schedule/sessions',
  ],
  base_table: 'tutor_session',
  admin_permission: 'administer tutor schedules',
)]
class TutoringSession extends ContentEntityBase implements TutoringSessionInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('The title of the tutoring session.'))
      ->setRequired(TRUE)
      ->setSetting('max_length', 255)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -5,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['slot_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Schedule Slot'))
      ->setDescription(t('The associated schedule slot.'))
      ->setSetting('target_type', 'tutor_schedule_slot')
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'entity_reference_label',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 0,
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => '60',
          'placeholder' => '',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['student_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Student'))
      ->setDescription(t('The student for this tutoring session.'))
      ->setSetting('target_type', 'user')
      ->setRequired(TRUE)
      ->setDefaultValueCallback('Drupal\tutor_schedule\Entity\TutoringSession::getCurrentUserId')
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'entity_reference_label',
        'weight' => 1,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 1,
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => '60',
          'placeholder' => '',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['tutor_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Tutor'))
      ->setDescription(t('The teacher for this tutoring session.'))
      ->setSetting('target_type', 'user')
      ->setRequired(TRUE)
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'entity_reference_label',
        'weight' => 2,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 2,
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => '60',
          'placeholder' => '',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['session_date'] = BaseFieldDefinition::create('datetime')
      ->setLabel(t('Session Date'))
      ->setDescription(t('The date and time of the tutoring session.'))
      ->setRequired(TRUE)
      ->setSetting('datetime_type', 'datetime')
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'datetime_default',
        'weight' => 3,
        'settings' => [
          'format_type' => 'medium',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'datetime_default',
        'weight' => 3,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['duration'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Duration (minutes)'))
      ->setDescription(t('The duration of the session in minutes.'))
      ->setDefaultValue(60)
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'number_integer',
        'weight' => 4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'number',
        'weight' => 4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['topic'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Topic'))
      ->setDescription(t('The topic or problem description.'))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'text_default',
        'weight' => 5,
      ])
      ->setDisplayOptions('form', [
        'type' => 'text_textarea',
        'weight' => 5,
        'settings' => [
          'rows' => 4,
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['notes'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Notes'))
      ->setDescription(t('Tutoring notes or solutions.'))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'text_default',
        'weight' => 6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'text_textarea',
        'weight' => 6,
        'settings' => [
          'rows' => 6,
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['status'] = BaseFieldDefinition::create('list_string')
      ->setLabel(t('Status'))
      ->setDescription(t('The status of the tutoring session.'))
      ->setRequired(TRUE)
      ->setDefaultValue('scheduled')
      ->setSetting('allowed_values', [
        'scheduled' => 'Scheduled',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
      ])
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'list_default',
        'weight' => 7,
      ])
      ->setDisplayOptions('form', [
        'type' => 'options_select',
        'weight' => 7,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

  /**
   * Default value callback for 'student_id' base field definition.
   *
   * @return array
   *   An array of default values.
   */
  public static function getCurrentUserId() {
    return [\Drupal::currentUser()->id()];
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return $this->get('title')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setTitle($title) {
    $this->set('title', $title);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getStudentId() {
    return $this->get('student_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function getTutorId() {
    return $this->get('tutor_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

}
