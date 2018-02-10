<?php

 session_start();

 if (!isset($_SESSION['users'])) {

  header("Location: dragana_barbu_index.php");

 } else if(isset($_SESSION['users'])!="") {

  header("Location: dragana_barbu_home.php");

 }

 

 if (isset($_GET['logout'])) {

  unset($_SESSION['users']);

  session_unset();

  session_destroy();

  header("Location: dragana_barbu_index.php");

  exit;

 }


 ?>