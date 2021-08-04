<?php

function check_dept($link){
  if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $query = "SELECT * FROM department WHERE id ='$id' limit 1";
    $result = mysqli_query($link,$query);
    if($result && mysqli_num_rows($result)){
      $user_data = mysqli_fetch_assoc($result);
      return $user_data;
    }
  }
  header("Location: portal.php");
  die();
}
