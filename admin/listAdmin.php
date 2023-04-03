<?php

include('../shared/head.php');
include('../shared/nav.php');
include('../app/config.php');
include('../app/function.php');

$select = "SELECT * FROM admins";
$s = mysqli_query($conn,$select);

//Delete
if(isset($_GET['deleteId'])){
  $deleteId = $_GET['deleteId'] ;
  $delete = "DELETE FROM admins WHERE $deleteId= id";
  mysqli_query($conn,$delete);
  path('admin/listAdmin.php') ;
}


auth()

?>

<h1 class="text-center titlePage"> List Admins</h1>
<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
          <table class="table  ">
            <tr>
            <th>ID</th>
            <th>Name</th>

            <th >Delete</th> 
            <th >Edit</th> 
            </tr>
            <?php foreach($s as $data): ;?>
            <tr>
                <td><?= $data['id']?></td>
                <td><?= $data['name']?></td>    

                <td> <a class="btn btn-danger" href="/hr/admin/listAdmin.php?deleteId=<?= $data['id']?>">Delete</a></td>
                <td> <a class="btn btn-warning"  href="/hr/admin/edit.php?editId=<?= $data['id']?>">Edit</a></td>    
            </tr>
            <?php endforeach ;?>
          </table>
        </div>
    </div>
</div>


<?php include('../shared/script.php'); ?>