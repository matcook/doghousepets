<?php

namespace Drupal\map_location_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Provides block displaying map location.
 *
 * @Block(
 *  id = "map_location_block",
 *  admin_label = @Translation("Map Location Block"),
 *  category = @Translation("Blocks")
 * )
 */
class MapLocationBlock extends BlockBase implements ContainerFactoryPluginInterface {

  protected $config;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $config) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->config = $config->get('map_location_block.adminsettings');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      'children' => [
        '#type' => 'html_tag',
        '#tag' => 'div',
        '#attributes' => [
          'id' => 'map',
          'style' => 'height:500px;',
        ],
      ],
      '#attached' => [
        'library' => 'map_location_block/map_block_js',
        'drupalSettings' => [
          'mapLocationBlock' => [
            'latitude' => $this->config->get('latitude'),
            'longitude' => $this->config->get('longitude'),
          ],
        ],
      ],
    ];
  }

}
