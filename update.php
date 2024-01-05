<?php
session_start();
require_once('connectiondb.php');
if(isset($_GET['change'])){
  $id = $_GET['change'];
  $sql = mysqli_query($conn,"SELECT * FROM users WHERE id ='$id'");
  if(mysqli_num_rows($sql)>0){
    $row = mysqli_fetch_assoc($sql);
    if($row['role'] == 1){
      $update = mysqli_query($conn,"UPDATE users SET role = '0' WHERE id ='$id'");
        $msg = 'admin into user';
    }else{
        $update = mysqli_query($conn,"UPDATE users SET role = '1' WHERE id ='$id' ");
        $msg = 'user into admin';
    }
    if($update){
      $_SESSION['success']= $msg;
      header('location:tables.php');
      exit;
    }

  }else{
    echo "sorry";
  }
}
?>