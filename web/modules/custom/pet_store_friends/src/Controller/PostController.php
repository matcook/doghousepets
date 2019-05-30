<?php

namespace Drupal\pet_store_friends\Controller;

class PostController {
  public function getPosts(){
    $helper = \Drupal::service('pet_store_friends.postHelper');
    return [
      '#theme' => 'post_list',
      '#posts' => $helper->getPosts(),
      '#title' => 'Friends Pet Blog'
    ];
  }
}