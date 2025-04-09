<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "db_application");

$connexion = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);


if(!$connexion){
    die("Connection Failed");
}

?>