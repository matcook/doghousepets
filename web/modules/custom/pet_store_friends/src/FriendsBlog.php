<?php

namespace Drupal\pet_store_friends;
use GuzzleHttp\Client;

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

  /**
  * The http connector.
  * 
  */
  protected $httpclient;

  /**
   * Setup friendsblog class.
   * 
   * @param \Guzzle\Client $httpclient
   *   The http connector.
   * 
  */
  public function __construct(Client $http_client) {
    $this->httpclient = $http_client;
  }

  /**
 * Sets number of posts to be displayed
 * @return \Drupal\pet_store_friends\FriendsBlog
 */
  public function setNumberOfPosts($number) {
    $this->numberOfPosts = $number;
    return $this;
  }

  /**
   * Fetches posts from API 
   * @return array
   */
  public function getPosts() {
    $this->data = $this->httpclient->get($this->url)->getBody();
    $this->posts = json_decode($this->data);
    $this->posts = array_slice($this->posts, 0, $this->numberOfPosts);
    return $this->posts;
  }
}