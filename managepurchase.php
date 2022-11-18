<?php
$title = "Manage Purchase";
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
          <h1 class="m-0"><?= $title; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
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
              <h3 class="card-title">All Purchase Summery</h3>
              <a href="purchase.php" class="btn btn-primary btn-sm ml-3"><i class="fas fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="dt-buttons btn-group flex-wrap"><button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr>
                          <th>#Sl No</th>
                          <th>Date</th>
                          <th>Company</th>
                          <th>Invoice</th>
                          <th>Total Quantity</th>
                          <th>Total Price</th>
                          <th>Payment</th>
                          <th>Due Payment</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Show All Product -->
                        <?php
                        include("classes/Purchase.php");
                        $purchase = new Purchase;
                        $obj = $purchase->purchaseSummeryShow($_POST);


                        if ($obj->num_rows > 0) {
                          $sl = 1;
                          while ($row = $obj->fetch_assoc()) {

                        ?>
                      <tbody>
                        <tr>
                          <td><?= $sl; ?></td>
                          <td><?= $row['pdate']; ?></td>
                          <td><?= $row['company']; ?></td>
                          <td><?= $row['invoice']; ?></td>
                          <td><?= $row['total_quantity']; ?></td>
                          <td><?= $row['total_price']; ?></td>
                          <td><?= $row['payment']; ?></td>
                          <td><?= $row['duePayment']; ?></td>
                          <td>
                            <a href="purchasehistory.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">
                              <i class="fas fa-edit"></i>
                            </a>
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
                              <a href="managepurchase.php?id=<?= $row['id'] ?>" class="btn btn-danger">Confirm</a>
                            </div>
                          </div>
                        </div>
                      </div>


                  <?php }
                        } else {
                          echo '<tr>
                                  <td class="text-center" colspan="9"><strong>Purchase</strong> List is Empty!</td>
                              </tr>';
                        }

                  ?>
                  </tbody>


                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                      <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                        <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
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