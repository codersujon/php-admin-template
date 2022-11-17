<?php
  $title = "Branch Edit";
  require "includes/header.php";
  require "includes/preloader.php";
  require "includes/navbar.php";
  require "includes/sidebar.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $title;?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active"><?= $title;?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <div class="col-4 offset-sm-4">
          <div class="card card-outline card-info">
            <div class="updateBranch card-body">
              <?php
              include("classes/Branch.php");
              $branch = new Branch;
              $id = $_GET['id'];
              $data_obj = $branch->editBranch($id); // Here we got data as a object;
              $row = $data_obj->fetch_assoc(); // object convert to associative array

              // Update Branch
              if (isset($_POST['update'])) {
                $branch->updateBranch($_POST, $id);
              }

              ?>

              <form action="" method="POST">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="bName" placeholder="Branch Name" value="<?= $row['bName']; ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-home"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="mName" placeholder="Manager Name" value="<?= $row['mName']; ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="phone" placeholder="Phone" value="<?= $row['phone']; ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $row['email']; ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" value="<?= $row['password']; ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" name="update" class="btn btn-info btn-block">Update</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->


<!--Footer -->
<?php
require("includes/copyright.php");
require("includes/footer.php");
?>