<?php

include('../shared/head.php');
include('../shared/nav.php');
include('../app/config.php');
include('../app/function.php');
   
if(isset($_POST['login'])){
  $name = $_POST['name'] ;
  $password = $_POST['password'];
  $hashPassword = sha1($password);
  $rule = $_POST['rule'];

  $select = "SELECT * FROM admins WHERE name = '$name'  ";
  $s = mysqli_query($conn,$select);
  $numRows = mysqli_num_rows ($s);

  if($numRows == 0){
  $inesrt = "INSERT INTO admins values(null ,'$name' , '$hashPassword' , default , $rule) ";
   $i = mysqli_query($conn,$inesrt);
   testMessage($i ,"Insert New Admin process successed");
  }
  else{
    
    dangerMessage($numRows !=0 ,"UserName Already Exist");
  
  }
  
}

$selectRules = "SELECT * FROM rules";
$sRules = mysqli_query($conn,$selectRules);


auth()

?>

 <section class= "adminPage">

 <div class="login-wrapper">
    <form method="post" class="form">
      <img class="img_login" src="../img/avatar.png" alt="">
      <h2>Add New Admin</h2>
      <div class="input-group">
        <input type="text" name="name" required>
        <label >User Name</label>

      </div>
      <div class="input-group">
        <input type="password" name="password"  required>
        <label >password</label>

      </div>
      <div class="form-group">
        <select name="rule" id="" class="form-control">
        <?php foreach($sRules as $data): ?>
          <option value="<?= $data['id'] ?>"> <?= $data['description']?> </option>
        <?php endforeach; ?>
        </select>
      </div>
      <button name="login" class="submit-btn">Add</button>
    </form>
  </div>
 </section>

<?php include('../shared/script.php'); ?>