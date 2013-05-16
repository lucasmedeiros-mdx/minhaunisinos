<?php

App::uses('Component', 'Controller');
class HttpRequestComponent extends Component {

  public $controller;

  private $ch;

  private $uri;

  private $data = array();

  private $errors;

  private $info;

  private $cookies;

  private $post = true;

  public function initialize(Controller $controller) {
    parent::initialize($controller);
  }

  public function setUri($uri) {
    $this->uri = $uri;
  }

  public function getUri() {
    return $this->uri;
  }

  public function get() {
    $this->post = false;
    return $this->send(); 
  }

  public function post() {
    $this->post = true;
    return $this->send();
  }

  public function send() {
    $this->close();

    $user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.8.0.9) Gecko/20061206 Firefox/1.5.0.9';
    $header = array(
      "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5",
      "Accept-Language: ru-ru,ru;q=0.7,en-us;q=0.5,en;q=0.3",
      "Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7",
      "Keep-Alive: 300"
    );
    
    $this->ch = curl_init($this->uri);
    curl_setopt($this->ch, CURLOPT_POST, $this->post);

    if ($this->post) {
      curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->data);
    }

    curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false); 

    curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($this->ch , CURLOPT_HEADER , 1);
    curl_setopt($this->ch , CURLOPT_HTTPHEADER, $header);
    curl_setopt($this->ch , CURLOPT_USERAGENT, $user_agent);
    curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, false);

    if ($this->cookies) {
      curl_setopt($this->ch , CURLOPT_COOKIE, $this->cookies);
    }

    $r = curl_exec($this->ch);

    $this->errors = curl_error($this->ch);
    $this->info = curl_getinfo($this->ch);

    return $r;
  }

  public function close() {
    if ($this->ch) {
      curl_close($this->ch);
    }
  }

  public function getErrors() {
    return $this->errors;
  }

  public function getInfo() {
    return $this->info;
  }

  public function setData($data) {
    $this->data = $data;
  }

  public function getData() {
    return $this->data;
  }

  public function setCookies($cookies) {
    if (is_array($cookies)) {
      $cookies = implode("; ", $cookies);
    }
    $this->cookies = $cookies;
  }

  public function getCookies() {
    return $this->cookies;
  }

  public function shutdown(Controller $controller) {
    $this->close();
    parent::shutdown($controller);
  }

}

?>