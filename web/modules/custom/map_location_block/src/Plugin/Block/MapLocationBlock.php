<?php

namespace Drupal\map_location_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides block displaying map location.
 *
 * @Block(
 *  id = "map_location_block",
 *  admin_label = @Translation("Map Location Block"),
 *  category = @Translation("Blocks")
 * )
 */
class MapLocationBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = \Drupal::config('map_location_block.adminsettings');
    return [
      '#theme' => 'map_location_block',
      '#attached' => [
        'library' => 'map_location_block/map_block_js',
        'drupalSettings' => [
          'mapLocationBlock' => [
            'latitude' => $config->get('latitude'),
            'longitude' => $config->get('longitude'),
          ],
        ],
      ],
    ];
  }

}
