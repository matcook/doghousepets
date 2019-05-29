<?php

namespace Drupal\pet_store_friends\Controller;

class PostController {

  public function index(){

    $url = 'https://jsonplaceholder.typicode.com/posts';
    $data = file_get_contents($url);
    $posts = json_decode($data);
    $posts = array_slice($posts, 0, 10);

    return array(
      '#theme' => 'post_list',
      'content' => [
        'posts'=> $posts,
        'title' => 'Friends Pet Blog'
      ]
    );
  }
}