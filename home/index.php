<?php

include('../shared/head.php');
include('../shared/nav.php');
include('../app/config.php');
include('../app/function.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="home">
    <div class="container">
      <div class="row justify-content-center ">
        <?php if(isset($_SESSION['admin'])): ?>
        <h1 class="text-center titlePage">Welcome to Home Page</h1>
        <?php else :header("location:/hr/admin/login.php") ;?>
        <?php endif ?>
      </div>
    </div>
  </div>

</body>
</html>


<?php include('../shared/script.php'); ?>