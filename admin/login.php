<?php
error_reporting(0);
ini_set('display_errors',0);

include('../shared/head.php');
include('../shared/nav.php');
include('../app/config.php');
include('../app/function.php');
   
if(isset($_POST['login'])){
  $name = $_POST['name'] ;
  $password = $_POST['password'];
  $hashPassword = sha1($password);

  $select = "SELECT * FROM admins WHERE name = '$name' and password ='$hashPassword' ";
  $s = mysqli_query($conn,$select);
  $numRows = mysqli_num_rows ($s);

  $row = mysqli_fetch_assoc($s);
  if($numRows == 1){
    $_SESSION['admin'] = [
      "name" =>$name,
      "rule" =>$row['rule'],
      "id" =>$row['id'],
    ] ;
    $admin_id = $_SESSION['admin']['id'];

    path('home/index.php') ;
    $selectTheem = "SELECT * FROM theem WHERE adminID = $admin_id ";
    $sTheem = mysqli_query($conn,$selectTheem);
    $numRowsTheem = mysqli_num_rows ($sTheem);

    if($numRowsTheem == 0){
      $inesrt = "INSERT INTO theem values(null ,default , $admin_id) ";
      $i = mysqli_query($conn,$inesrt);
    
    }
  }else{
    
    dangerMessage($numRows !=1 ,"incorrect password or email");
    // header("location:/hr/admin/login.php") ;
  }
}

 if(isset($_SESSION['admin'])){
  path('home/index.php') ;
 }

?>

 <section class= "adminPage">

 <div class="login-wrapper">
    <form method="post" class="form">
      <img class="img_login" src="../img/avatar.png" alt="">
      <h2>Login</h2>
      <div class="input-group">
        <input type="text" name="name" required>
        <label >User Name</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" required>
        <label >Password</label>
      </div>
      <button name="login" class="submit-btn">login</button>
      <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a>
    </form>
  </div>
 </section>

<?php include('../shared/script.php'); ?>