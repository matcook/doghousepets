<?php
/**
 *  @file
 *  Custom post from API block
 */

namespace Drupal\pet_store_friends\Plugin\Block;

use Drupal\Core\Block\BlockBase;


/**
 * Provides block displaying 1 post from external API
 * 
 * @Block(
 *  id = "pet_store_friends_block",
 *  admin_label = @Translation("Pet Store Friends"),
 *  category = @Translation("Blocks")
 * )
 */

 class PetStoreFriends extends BlockBase{

  /**
   * {@inheritdoc}
  */
  public function build() {
    return [
      '#lazy_builder' => [
        'pet_store_friends.builder:buildSinglePost',
        []
      ],
      '#create_placeholder' => TRUE
    ];
   }
 }