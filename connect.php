<?php
  $host = "localhost";
  $user = "id17326898_admin";
  $password = "y(93W?sJdS^Gt4gG";
  $db = "id17326898_plumenote";
  $port = 3306;


  if(!$link = mysqli_connect($host,$user,$password,$db,$port)){
    die("failed to connect");
  }

