<?php

namespace Drupal\pet_store_friends;

use Drupal\pet_store_friends\FriendsBlog;

class PostBuilder {

  /**
   * instance of FriendsBlog class
   * 
   *  @var Drupal\pet_store_friends\FriendsBlog 
   */

  protected $helper;

  /**
   * Setup PostBuilder class.
   * 
   * @param Drupal\pet_store_friends\FriendsBlog $helper
   */
  public function __construct(FriendsBlog $helper) {
    $this->helper = $helper;
  }

  /**
   * returns a render array containing a single post
   * 
   * @return array
   */
  public function buildSinglePost(){
    return [
      '#theme' => 'post_list',
      '#posts' => $this->helper
        ->randomPost()
        ->setNumberOfPosts(1)
        ->getPosts(),
      '#title' => 'Friends Pet Blog'
    ];
  }
}
