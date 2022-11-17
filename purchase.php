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
                    <h1 class="m-0">Softness IT</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="date" id="pdate" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="cname" class="form-control" placeholder="Company Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="invoice" class="form-control" placeholder="Invoice Number">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input readonly type="text" id="stock" class="form-control" placeholder="Available Stock">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="barcode" class="form-control" placeholder="Enter Product Barcode">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input readonly type="text" id="costprice" class="form-control" placeholder="Product Cost Price">
                    </div>
                </div>
                <div class="form-group">
                        <input  type="hidden" id="product_id" class="form-control" placeholder="Product Cost Price">
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="quantity" class="form-control" placeholder="Enter Quantity">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input readonly type="text" id="total" class="form-control" placeholder="Total">
                    </div>
                    <button class="addItem btn btn-primary w-100" name="addItem">Add Item</button>
                </div>
            </div>
            <div class="row mt-3 m-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Barcode</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="tdata">
                        
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="totalQnt" class="form-control" placeholder="Total Quantity">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="totalAmount" class="form-control" placeholder="Total Amount">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select id="dis" class="form-control">
                            <option >----------Select Discount----------</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="15">15%</option>
                            <option value="20">20%</option>
                            <option value="25">25%</option>
                            <option value="30">30%</option>
                            <option value="35">35%</option>
                            <option value="40">40%</option>
                            <option value="45">45%</option>
                            <option value="50">50%</option>
                            <option value="55">55%</option>
                            <option value="60">60%</option>
                            <option value="65">65%</option>
                            <option value="70">70%</option>
                            <option value="75">75%</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input readonly type="text" id="disAmount" class="form-control" placeholder="Dis. Amount">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="grandTotal" class="form-control" placeholder="Grand otal">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="payment" class="form-control" placeholder="Payment">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="duePayment" class="form-control" placeholder="Due Payment">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button id="save" class="btn btn-success w-100" >Save & Print</button>
                    </div>
                </div>
            </div>
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