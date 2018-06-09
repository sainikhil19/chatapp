<?php
if($_POST['action']=="delete"){
  echo "entered php code";
  $con = new mysqli('localhost', 'root', '', 'chatdatabase');
  if($con){
      $result = $con->query("DELETE FROM `logs` WHERE 0=0");
  }
} ?>
