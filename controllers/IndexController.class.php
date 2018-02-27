<?php

class IndexController {

  public function indexAction() {
    $name = "Jeremie";
    $v = new View("default", "front");
    $v->assign("name", $name);
  }

}

 ?>
