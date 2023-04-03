<?php

if(isset($_GET['logout'])){
session_unset();
session_destroy();
header("location:/hr/admin/login.php") ;
}

?>

<header class="header container">
  <nav class="navbar navbar-expand-lg navbar-light">
  <h1>
      <a class="navbar-brand" href="#">HR<span class="text-primary">SYSTEM</span>
      </a>
    </h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto">
        <li class="nav-item active">
        <?php if(isset($_SESSION['admin'])): ?>

          <a class="nav-link" href="/hr/home/index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="/hr/admin/profile.php">Profile <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        departments
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/hr/departments/add.php">Add</a>
          <a class="dropdown-item" href="/hr/departments/list.php">List</a>
          <a class="dropdown-item" href="/hr/departments/departmentsnotjoin.php">Empty departments</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        employees
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/hr/employees/add.php">Add</a>
          <a class="dropdown-item" href="/hr/employees/list.php">List</a>
        </div>
      </li>  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        Admins
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/hr/admin/addAdmin.php">Add</a>
          <a class="dropdown-item" href="/hr/admin/listAdmin.php">List</a>

        </div>
      </li> 

      <?php if($_SESSION['color'] == 'light'): ?>
        <a href="?dark=dark" class="btn btn-dark " id="btn_reload">Dark</a>
      <?php else: ?>
        <a href="?light=light" class="btn btn-light ">Light</a>
      <?php endif ;?>

      <?php endif ;?> 

    </ul>

      <div class="form-inline my-2 ">
      <?php if(isset($_SESSION['admin'])): ?> 
        <form action="">
          <button class="btn btn-warning " name="logout" type="submit">Log out</button>
          </form>
        <?php else :  ;?>
          <a href="/hr/admin/login.php" class="btn btn-success " type="submit">Log in</a> 
        <?php endif; ?>
    </div>
      <img class="hr ml-3" src="/hr/img/Screenshot_29.png" alt="">

    </div>
  </nav>
 </header>

