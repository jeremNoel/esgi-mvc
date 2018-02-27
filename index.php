<?php
session_start();
require "conf.inc.php";

function myAutoloader($class) {
  $class = $class.".class.php";

  if(file_exists("core/".$class)) {
    include "core/".$class;
  } else if("models/".$class) {
    include "models/".$class;
  }
}

spl_autoload_register("myAutoloader");

$uri = $_SERVER["SCRIPT_NAME"];
$uri = explode("?", $uri);
$uri = str_ireplace(DIRNAME, "", $uri[0]);
$uriExploded = explode(DS, $uri);

$c = empty($uriExploded[0]) ? "index" : $uriExploded[0];

$a = empty($uriExploded[1]) ? "index" : $uriExploded[1];

unset($uriExploded[0]);
unset($uriExploded[1]);

$c = ucfirst(strtolower($c))."Controller";
$a = strtolower($a)."Action";

$params = ["POST" => $_POST, "GET" => $_GET, "URL" => array_values($uriExploded)];

if(file_exists("controllers/".$c.".class.php")) {
  include "controllers/".$c.".class.php";

  if(class_exists($c)) {
    $objC = new $c();

    if(method_exists($objC, $a)) {
      $objC->$a($params);
    }
  }
}


 ?>
