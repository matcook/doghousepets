<?php
/**
 *  @file
 *  Map Location using Google API
 */

namespace Drupal\map_location_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;


/**
 * Provides block displaying 1 post from external API
 * 
 * @Block(
 *  id = "map_location_block",
 *  admin_label = @Translation("Map Location Block"),
 *  category = @Translation("Blocks")
 * )
 */

 class MapLocationBlock extends BlockBase{

  /**
   * {@inheritdoc}
  */
  public function build() {
    $config = \Drupal::config('map_location_block.adminsettings');
    $build = [];
    $build['#attached']['library'] = 'map_location_block/map_block_js';
    $build['#attached']['drupalSettings']['map_location_block']['latitude'] = $config->get('latitude');
    $build['#attached']['drupalSettings']['map_location_block']['longitude'] = $config->get('longitude');
    $build["#theme"] = 'map_location_block';

    return $build;
   }
 }