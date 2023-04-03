<?php

include('../shared/head.php');
include('../shared/nav.php');
include('../app/config.php');
include('../app/function.php');

$select = "SELECT * FROM admins where name = '$admin_name' ";
   $s = mysqli_query($conn,$select);    
   $row = mysqli_fetch_assoc($s);
   
if(isset($_POST['update'])){

    if(empty($_FILES['image']['name'])){
        $image_name = $row['image'];
       }else{
        $oldImage = $row['image'];
        unlink("./upload/$oldImage");

       // image code
       $image_name = rand(0,5000) . time() . $_FILES['image']['name'];
       $tmp_name = $_FILES['image']['tmp_name'];
    
       $location = "upload/" . $image_name ;
       move_uploaded_file($tmp_name , $location);
       }
       $oldImage = $row['image'];
       if ($oldImage != "user_318-159711.jpg") {
        unlink("./upload/$oldImage");
    }
    
       $update = "UPDATE `admins` SET  image ='$image_name' where name = '$admin_name'";
       $i= mysqli_query($conn,$update);
       path('admin/profile.php') ;
}else{

}

auth(2,3)

?>

<h1 class="text-center titlePage"> My Profile</h1>
<div class="profile_admin mt-4">
    <div class="container">
        <div class="row ">
        <div class=" col-md-6">
           <img src="./upload/<?= $row['image']?>" alt="">
           <h2>Admin Name : <span class="admin_name"><?= $admin_name ?></span> </h2>
        
      <a href="#forgot-pw" class="btn btn-warning">Edit Image</a>

        </div>
            <div id="forgot-pw">
      <form method="post" enctype="multipart/form-data" class="form">
        <a href="#" class="close">&times;</a>
        <img src="./upload/<?= $row['image']?>" alt="">
        <div class="form-groub">
                    <input type="file" class="form-control p-img"  name="image">
                </div>
        <button name="update" class="btn btn-warning">update</button>
      </form>
    </div>
        </div>
    </div>
</div>


<?php include('../shared/script.php'); ?>
