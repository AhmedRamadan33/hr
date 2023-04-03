<?php

include('../shared/head.php');
include('../shared/nav.php');
include('../app/config.php');
include('../app/function.php');

if(isset($_GET['editId'])){
   $editId = $_GET['editId'] ;
   $select = "SELECT * FROM admins WHERE id = $editId";
   $s = mysqli_query($conn,$select);
   $row = mysqli_fetch_assoc($s);

   if(isset($_POST['update'])){
   $name = $_POST['name'] ;
   $password = $_POST['password'] ;
   $hashPassword = sha1($password) ;

   $update = "UPDATE `admins` SET name ='$name' , password = '$hashPassword' WHERE id = $editId";
   $i= mysqli_query($conn,$update);
   path('admin/listAdmin.php') ;

   }
}else{
    path('admin/listAdmin.php') ;

}
auth(2,3);
?>

<h1 class="text-center titlePage"> Edit Admin : <?= $_GET['editId']?> </h1>
<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="div-form-groub">
                    <input type="text" value="<?= $row['name']?>" class="form-control" placeholder="Admin Name" name="name">
                </div>
                <div class="div-form-groub">
                    <input type="password" value="<?= $row['password']?>" class="form-control" placeholder="Admin password" name="password">
                </div>
                <button name="update" class="btn btn-warning">Update Data</button>
            </form>
        </div>
    </div>
</div>

<?php include('../shared/script.php'); ?>