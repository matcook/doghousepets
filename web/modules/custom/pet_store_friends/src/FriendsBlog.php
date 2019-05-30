<?php

namespace Drupal\pet_store_friends;

class FriendsBlog {

  
  /**
  * The url to fetch data from.
  * {string}
  */
  protected $url = 'https://jsonplaceholder.typicode.com/posts';

  /**
  * The data from the API.
  * {JSON}
  */
  protected $data;

  /**
  * The data from the API.
  * {array|object}
  */
  protected $posts;

  /**
  * The number of posts to get.
  * {number}
  */
  public $numberOfPosts = 10;

  public function setNumberOfPosts($number){
    $this->numberOfPosts = $number;
    return $this;
  }

  public function getPosts() {
    $this->data = file_get_contents($this->url);
    $this->posts = json_decode($this->data);
    $this->posts = array_slice($this->posts, 0, $this->numberOfPosts);
    return $this->posts;
  }
}