<?php
class User extends BaseSql{

  protected $id = null;
  protected $firstname;
  protected $lastname;
  protected $email;
  protected $pwd;
  protected $token = "11111111111111111111111111111111";
  protected $age = "20";

  protected $status = 0; //Définit l'état de l'utilisateur, 1 banni, 2 toujours ok, etc etc
  protected $date_inserted;
  protected $date_updated;

  public function __construct() {
    parent::__construct();
  }

  public function setId($id) {
    $this->id=$id;
  }

  public function setFirstname($firstname) {
    $this->firstname=ucfirst(strtolower(trim($firstname)));
  }

  public function setLastname($lastname) {
    $this->lastname=ucfirst(strtoupper(trim($lastname)));
  }

  public function setEmail($email) {
    $this->email=strtolower(trim($email));
  }

  public function setPwd($pwd) {
    $this->pwd= password_hash($pwd, PASSWORD_DEFAULT); //possibilité de sécuriser avec des algos plus facilement
    //on peut changer la constante pour mettre à jour le hash plus facilement
  }

  public function setToken($token) {
    $this->token=$token;
  }

  public function setAge($age) {
    $this->age=$age;
  }

  public function setStatus($status) {
    $this->status=$status;
  }

}

 ?>
