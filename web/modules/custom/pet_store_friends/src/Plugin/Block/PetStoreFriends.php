<?php
/**
 *  @file
 *  Custom post from API block
 */

namespace Drupal\pet_store_friends\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\pet_store_friends\Controller\PostController;

/**
 * Provides block displaying 1 post from external API
 * 
 * @Block(
 *  id = "pet_store_friends_block",
 *  admin_label = @Translation("Pet Store Friends"),
 *  category = @Translation("Blocks")
 * )
 */

 class PetStoreFriends extends BlockBase {

  /**
   * {@inheritdoc}
  */
   public function build() {
    $helper = \Drupal::service('pet_store_friends.postHelper');
    return [
      '#theme' => 'post_list',
      '#posts' => $helper->setNumberOfPosts(1)->getPosts(),
      '#title' => 'Friends Pet Blog'
    ];
   }
 }