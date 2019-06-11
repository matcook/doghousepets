<?php

namespace Drupal\pet_store_friends;
use GuzzleHttp\Client;

class FriendsBlog {

  
  /**
   * The url to fetch post data from. 
   * 
   *  @var string 
  */
  protected $postUrl = 'https://jsonplaceholder.typicode.com/posts';

    /**
   * The url to fetch image data from. 
   * 
   *  @var string 
  */
  protected $imgUrl = 'https://jsonplaceholder.typicode.com/photos';

  /**
   * The post data from the API. 
   * 
   *  @var array|object 
   */
  protected $posts;

  /**
   * The image data from the API. 
   * 
   *  @var array|object 
   */
  protected $photos;


    /** 
   * @var number
   * 
   *  The ID of the first post to display 
   */
  protected $postID = 0;

  /** 
   * @var number
   * 
   *  The number of posts to get. 
   */
  public $numberOfPosts = 10;

  /**
  * The http connector.
  *
  * @var \GuzzleHttp\ClientInterface
  */
  protected $httpclient;

  /**
   * Setup friendsblog class.
   * 
   * @param \Guzzle\Client $httpclient
   * The http connector.
  */
  public function __construct(Client $http_client) {
    $this->httpclient = $http_client;
  }

  /**
   * Sets the first postID to be a random number between the first and last post
   * 
   * @return \Drupal\pet_store_friends\FriendsBlog
   */
  public function randomPost() {
    $this->postID = rand($this->postID, $this->numberOfPosts);
    return $this;
  }

  /**
   * Sets number of posts to be displayed
   * 
   * @return \Drupal\pet_store_friends\FriendsBlog
   */
  public function setNumberOfPosts($number) {
    $this->numberOfPosts = $number;
    return $this;
  }

  /**
   * Fetches posts from API 
   * 
   * @return array
   */
  public function getPosts() {
    $this->posts = json_decode($this->httpclient->get($this->postUrl)->getBody());
    $this->photos =json_decode($this->httpclient->get($this->imgUrl)->getBody());
    
    foreach($this->posts as $post){
      $post->image_url = $this->photos[$post->id]->url;
    }

    $this->posts = array_slice($this->posts, $this->postID, $this->numberOfPosts);
    return $this->posts;
  }
}