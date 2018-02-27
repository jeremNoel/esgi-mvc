<?php

define("DBUSER", "root");
define("DBPSW", "root");
define("DBHOST", "localhost");
define("DBNAME", "projetannuel3iw2");
define("DBPORT", "3306");

define("DS", "/");
$scriptName = (dirname($_SERVER["SCRIPT_NAME"]) == "/")?"":dirname($_SERVER["SCRIPT_NAME"]);
define("DIRNAME", $scriptName.DS);
