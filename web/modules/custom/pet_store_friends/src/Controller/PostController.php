<?php

namespace Drupal\pet_store_friends\Controller;

class PostController {

  protected $url;
  protected $data;
  protected $posts;
  protected $numberOfPosts=10;

  public function __construct (){
    $this->url = 'https://jsonplaceholder.typicode.com/posts';
    $this->data = file_get_contents($this->url);
    $this->posts = json_decode($this->data);
  }

  public function numberOfPosts($number){
    $this->numberOfPosts = $number;
  }

  public function getPosts(){

    $url = 'https://jsonplaceholder.typicode.com/posts';
    $data = file_get_contents($url);
    $posts = json_decode($data);
    $posts = array_slice($posts, 0, $this->numberOfPosts);

    return [
      '#theme' => 'post_list',
      '#posts' => $posts,
      '#title' => 'Friends Pet Blog'
    ];
  }
}