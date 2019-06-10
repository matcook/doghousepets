<?php
/**
 *  @file
 *  Custom post from API block
 */

namespace Drupal\pet_store_friends\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\pet_store_friends\FriendsBlog;

/**
 * Provides block displaying 1 post from external API
 * 
 * @Block(
 *  id = "pet_store_friends_block",
 *  admin_label = @Translation("Pet Store Friends"),
 *  category = @Translation("Blocks")
 * )
 */

 class PetStoreFriends extends BlockBase implements ContainerFactoryPluginInterface{

  /**
   *  @var \Drupal\pet_store_friends\FriendsBlog
  */
   private $helper;

  /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   *
   * @return static
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('pet_store_friends.postHelper')
    );
  }

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param \Drupal\pet_store_friends\FriendsBlog $helper
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, FriendsBlog $helper) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->helper = $helper;
  }

  /**
   * {@inheritdoc}
  */
   public function build() {
    return [
      '#theme' => 'post_list',
      '#posts' => $this->helper->setNumberOfPosts(1)->getPosts(),
      '#title' => 'Friends Pet Blog'
    ];
   }
 }