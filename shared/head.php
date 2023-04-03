<?php

 session_start();
include('../app/config.php');


$admin_name = $_SESSION['admin']['name'];

if(isset($_GET['light'])){
    $light = $_GET['light'] ;
  
    $updateColor = "UPDATE  adminsjointheems SET color = '$light' where name = '$admin_name' ";
    $uColor = mysqli_query($conn,$updateColor);
    
    }
    if(isset($_GET['dark'])){
      $dark = $_GET['dark'] ;
      $updateColor = "UPDATE  adminsjointheems SET color = '$dark' where name = '$admin_name' ";
      $uColor = mysqli_query($conn,$updateColor);
      
      }
      $selectColor = "SELECT * FROM adminsjointheems  where name = '$admin_name' ";
      $sColor = mysqli_query($conn,$selectColor);
      $rowColor = mysqli_fetch_assoc($sColor);
      $_SESSION['color'] = $rowColor['color'] ;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HR System</title>
  <link rel="stylesheet" href="/hr/css/all.min.css">
  <link rel="stylesheet" href="/hr/css/bootstrap.min.css">

  <?php if($_SESSION['color'] == 'light'): ?>
  <link rel="stylesheet" href="/hr/css/light.css">
  <?php else: ?>
  <link rel="stylesheet" href="/hr/css/dark.css">
  <?php endif ;?>
  </head>
<body> 