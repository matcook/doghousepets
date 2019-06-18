<?php

namespace Drupal\map_location_block\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Undocumented class.
 */
class MapLocationBlockSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'map_location_block.adminsettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'map_location_block';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('map_location_block.adminsettings');

    $form['latitude'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Latitude'),
      '#description' => $this->t('The latitude of the location to be marked on the map'),
      '#default_value' => $config->get('latitude'),
    ];
    $form['longitude'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Longitude'),
      '#description' => $this->t('The longitude of the location to be marked on the map'),
      '#default_value' => $config->get('longitude'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('map_location_block.adminsettings')
      ->set('latitude', $form_state->getValue('latitude'))
      ->set('longitude', $form_state->getValue('longitude'))
      ->save();
  }

}
