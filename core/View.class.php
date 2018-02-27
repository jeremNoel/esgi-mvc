<?php

class View {

  private $v;
  private $t;
  private $data = [];

  public function __construct() {
    $this->v = $v.".view.php";
    $this->t = $t.".tpl.php";

    if(!file_exists("views/".$this->v)) {
      die("Cette vue n'existe pas");
    }
    if(!file_exists("views/models/".$this->t)) {
      die("Ce template n'existe pas");
    }
  }

  public function assign($key, $value) {
    $this->data[$key] = $value;
  }

  public function __destruct() {
    global $a, $c;
    extract($this->data);
    include "views/template/".$this->t;
  }


}


 ?>
