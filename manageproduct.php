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
          <h1 class="m-0">Manage Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Manage Product</li>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Product Information</h3>
              <a href="addproduct.php" class="btn btn-primary btn-sm ml-3"><i class="fas fa-plus"></i> Add Product</a>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>#Sl No</th>
                    <th>Product Name</th>
                    <th>Product Size</th>
                    <th>Product Description</th>
                    <th>Barcode</th>
                    <th>Purchase Price</th>
                    <th>Sale Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Show All Product -->
                  <?php 
                    include("classes/Product.php");
                    $newProduct = new Product;
                    $products = $newProduct->allProduct($_POST);

                    // Delete Product
                    if(isset($_GET['id'])){
                      $id = $_GET['id'];
                      $newProduct->deleteProduct($id);
                    }

                    if($products->num_rows>0){
                        $sl=1;
                        while($row= $products->fetch_assoc()){ 
                          
                          ?>
                         <tbody>
                            <tr>
                              <td><?= $sl;?></td>
                              <td><?= $row['pname'];?></td>
                              <td><?= $row['psize'];?></td>
                              <td><?= $row['pdes'];?></td>
                              <td><?= $row['barcode'];?></td>
                              <td><?= $row['costprice'];?></td>
                              <td><?= $row['saleprice'];?></td>
                              <td>
                                <a href="productedit.php?id=<?= $row['id']?>" class="btn btn-info btn-sm">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm">
                                  <i class="fas fa-trash"></i>
                                </button>
                              </td>
                            </tr>
                         </tbody>
                          
                        <?php $sl++; ?>
                        
                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body lead">
                                          Are you sure? want to delete this Product?
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <a href="manageproduct.php?id=<?= $row['id']?>" class="btn btn-danger">Confirm</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        
                        
                        <?php }
                    } else{
                        echo '<tr>
                                  <td class="text-center" colspan="7"><strong>Product</strong> List is Empty!</td>
                              </tr>';
                    }
                  
                  ?>
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
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