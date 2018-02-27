<?php

  class UserController {
    public function indexAction() {
      $v = new View("users", "front";)
    }

    public function addAction() {
      $user = new User();
      $user->setFirstname("toto");
      $user->setLastname("nom");
      $user->setPsw("password");
      $user->save();
    }

    public function listAction() {

    }

    public function modifyAction() {

    }
  }


 ?>
