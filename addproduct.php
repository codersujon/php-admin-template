<?php
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
          <h1 class="m-0">Add Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Product</li>
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
        <div class="col-6 offset-sm-3">
          <!-- Add Product -->
          <div class="addProduct">
            <form action="" method="POST">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add New Product</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-row">
                    <div class="col">
                      <label for="pname">Product Name</label>
                      <input type="text" id="pname" class="form-control" name="pname" placeholder="Enter Product Name">
                    </div>
                    <div class="col">
                      <label for="psize">Product Size</label>
                      <input type="number" id="psize" class="form-control" placeholder="Enter Product Size" name="psize">

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pdes">Product Description</label>
                    <textarea id="pdes" class="form-control" rows="3" name="pdes" placeholder="Enter Product Description"></textarea>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <label for="pcolor">Project Color</label>
                      <input type="color" id="pcolor" class="form-control" placeholder="Enter Product Color" name="pcolor">
                    </div>
                    <div class="col">
                      <label for="barcode">Barcode</label>
                      <input type="text" id="barcode" class="form-control" placeholder="Enter Product Barcode" name="barcode">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <label for="coseprice">Cost Price</label>
                      <input type="number" id="coseprice" class="form-control" placeholder="Enter Cost Price" name="coseprice">
                    </div>
                    <div class="col">
                      <label for="saleprice">Sale Price</label>
                      <input type="number" id="saleprice" class="form-control" placeholder="Enter Sale Price" name="saleprice">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
                </div>
              </div>
            </form>
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