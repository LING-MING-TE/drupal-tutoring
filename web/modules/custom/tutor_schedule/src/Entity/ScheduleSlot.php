<?php

namespace Drupal\tutor_schedule\Entity;

use Drupal\Core\Entity\Attribute\ContentEntityType;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\user\EntityOwnerTrait;

/**
 * Defines the Schedule Slot entity.
 */
#[ContentEntityType(
  id: 'tutor_schedule_slot',
  label: new TranslatableMarkup('Schedule Slot'),
  label_collection: new TranslatableMarkup('Schedule Slots'),
  label_singular: new TranslatableMarkup('schedule slot'),
  label_plural: new TranslatableMarkup('schedule slots'),
  entity_keys: [
    'id' => 'id',
    'uuid' => 'uuid',
    'label' => 'title',
    'uid' => 'tutor_id',
    'owner' => 'tutor_id',
    'status' => 'status',
  ],
  handlers: [
    'access' => 'Drupal\tutor_schedule\Access\ScheduleSlotAccessControlHandler',
    'list_builder' => 'Drupal\tutor_schedule\ListBuilder\ScheduleSlotListBuilder',
    'form' => [
      'default' => 'Drupal\tutor_schedule\Form\ScheduleSlotForm',
      'add' => 'Drupal\tutor_schedule\Form\ScheduleSlotForm',
      'edit' => 'Drupal\tutor_schedule\Form\ScheduleSlotForm',
      'delete' => 'Drupal\tutor_schedule\Form\ScheduleSlotDeleteForm',
    ],
    'views_data' => 'Drupal\views\EntityViewsData',
  ],
  links: [
    'canonical' => '/schedule/slot/{tutor_schedule_slot}',
    'add-form' => '/admin/schedule/slot/add',
    'edit-form' => '/admin/schedule/slot/{tutor_schedule_slot}/edit',
    'delete-form' => '/admin/schedule/slot/{tutor_schedule_slot}/delete',
    'collection' => '/admin/schedule/slots',
  ],
  base_table: 'tutor_schedule_slot',
  admin_permission: 'administer tutor schedules',
)]
class ScheduleSlot extends ContentEntityBase implements ScheduleSlotInterface {

  use EntityOwnerTrait;
  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);
    $fields += static::ownerBaseFieldDefinitions($entity_type);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('The title of the schedule slot.'))
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

    $fields['tutor_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Tutor'))
      ->setDescription(t('The teacher assigned to this schedule slot.'))
      ->setSetting('target_type', 'user')
      ->setRequired(TRUE)
      ->setDefaultValueCallback('Drupal\tutor_schedule\Entity\ScheduleSlot::getCurrentUserId')
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

    $fields['schedule_date'] = BaseFieldDefinition::create('datetime')
      ->setLabel(t('Schedule Date'))
      ->setDescription(t('The date of the schedule slot.'))
      ->setRequired(TRUE)
      ->setSetting('datetime_type', 'date')
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'datetime_default',
        'weight' => 1,
        'settings' => [
          'format_type' => 'medium',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'datetime_default',
        'weight' => 1,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['start_time'] = BaseFieldDefinition::create('datetime')
      ->setLabel(t('Start Time'))
      ->setDescription(t('The start time of the schedule slot.'))
      ->setRequired(TRUE)
      ->setSetting('datetime_type', 'datetime')
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'datetime_default',
        'weight' => 2,
        'settings' => [
          'format_type' => 'medium',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'datetime_default',
        'weight' => 2,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['end_time'] = BaseFieldDefinition::create('datetime')
      ->setLabel(t('End Time'))
      ->setDescription(t('The end time of the schedule slot.'))
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

    $fields['classroom'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Classroom'))
      ->setDescription(t('The classroom location.'))
      ->setSetting('max_length', 100)
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'string',
        'weight' => 4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => 4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['subject'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Subject'))
      ->setDescription(t('The subject of tutoring.'))
      ->setSetting('max_length', 100)
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'string',
        'weight' => 5,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => 5,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['max_students'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Maximum Students'))
      ->setDescription(t('The maximum number of students for this slot.'))
      ->setDefaultValue(1)
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'number_integer',
        'weight' => 6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'number',
        'weight' => 6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['status'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Published'))
      ->setDescription(t('A boolean indicating whether the schedule slot is published.'))
      ->setDefaultValue(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => 100,
        'settings' => [
          'display_label' => TRUE,
        ],
      ])
      ->setDisplayConfigurable('form', TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

  /**
   * Default value callback for 'tutor_id' base field definition.
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
  public function isPublished() {
    return (bool) $this->get('status')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setPublished($published) {
    $this->set('status', $published ? TRUE : FALSE);
    return $this;
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
