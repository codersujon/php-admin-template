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
          <h1 class="m-0">Product Edit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product Edit</li>
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
          
          <div class="updateProduct">
            <form method="POST">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Product Edit</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">

                <?php 
                    include("classes/Product.php");
                    $product = new Product;

                    // fetch product details using id
                    if(isset($_GET['id'])){
                      $id = $_GET['id'];
                      $products =  $product->editProduct($id);
                      $row = $products->fetch_assoc();
                    }

                    if(isset($_POST['update'])){
                        $product->updateProduct($_POST, $id);
                    }

                ?>
                
                  <div class="form-row">
                    <div class="col">
                      <label for="pname">Product Name</label>
                      <input type="text" id="pname" class="form-control" name="pname" placeholder="Enter Product Name" value="<?= $row['pname'];?>">
                    </div>
                    <div class="col">
                      <label for="psize">Product Size</label>
                      <input type="text" id="psize" class="form-control" placeholder="Enter Product Size" name="psize" value="<?= $row['psize'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pdes">Product Description</label>
                    <textarea id="pdes" class="form-control" rows="3" name="pdes" placeholder="Enter Product Description" value="<?= $row['pdes'];?>"></textarea>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <label for="pcolor">Project Color</label>
                      <input type="color" id="pcolor" class="form-control" placeholder="Enter Product Color" name="pcolor" value="<?= $row['pcolor'];?>">
                    </div>
                    <div class="col">
                      <label for="barcode">Barcode</label>
                      <input type="text" id="barcode" class="form-control" placeholder="Enter Product Barcode" name="barcode" value="<?= $row['barcode'];?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <label for="costprice">Cost Price</label>
                      <input type="number" id="costprice" class="form-control" placeholder="Enter Cost Price" name="costprice" value="<?= $row['costprice'];?>">
                    </div>
                    <div class="col">
                      <label for="saleprice">Sale Price</label>
                      <input type="number" id="saleprice" class="form-control" placeholder="Enter Sale Price" name="saleprice" value="<?= $row['saleprice'];?>">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="update">Update Product</button>
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


