<?php

namespace Drupal\pet_store_friends\Controller;

class PostController {
  public function getPosts(){
    $helper = \Drupal::service('pet_store_friends.postHelper');
    $posts = array_slice($helper->getPosts(), 0, $helper->numberOfPosts);
    return [
      '#theme' => 'post_list',
      '#posts' => $posts,
      '#title' => 'Friends Pet Blog'
    ];
  }
}