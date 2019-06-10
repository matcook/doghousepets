<?php

namespace Drupal\pet_store_friends\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\pet_store_friends\FriendsBlog;

class PostController extends ControllerBase{


  /**
   *  @var \Drupal\pet_store_friends\FriendsBlog
  */
  private $helper;
  
    /**
   * @param \Drupal\pet_store_friends\FriendsBlog $helper
   */
  public function __construct(FriendsBlog $helper){
    $this->helper = $helper;
  } 

  public function getPosts(){
    return [
      '#theme' => 'post_list',
      '#posts' => $this->helper->getPosts(),
      '#title' => 'Friends Pet Blog'
    ];
  }

    /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *
   * @return static
   */
  public static function create(ContainerInterface $container){
    return new static(
      $container->get('pet_store_friends.postHelper')
    );
  }
}