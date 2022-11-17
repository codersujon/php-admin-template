<?php
session_start();
$admin = $_SESSION['mName'];
if ($admin != "admin") {
    header("Location: index.php");
}
?>

<?php
    $title = "Branch List";
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
                <div class="col-12">
                    <!-- Branch List Table Start-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Branch List with Full Controls</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#SL</th>
                                                    <th>Branch Name</th>
                                                    <th>Manager Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Show All Branch Info -->
                                                <?php
                                                include("classes/Branch.php");
                                                $branch = new Branch;
                                                $obj = $branch->branchUserList();

                                                // Active
                                                if (isset($_GET['active'])) {
                                                    $id = $_GET['active'];
                                                    $branch->activeBranch($id);
                                                }
                                                // Inactive
                                                if (isset($_GET['inactive'])) {
                                                    $id = $_GET['inactive'];
                                                    $branch->inActiveBranch($id);
                                                }

                                                //Branch Delete
                                                if (isset($_GET['id'])) {
                                                    $id = $_GET['id'];
                                                    $branch->deleteBranch($id);
                                                }

                                                if ($obj->num_rows > 0) {
                                                    $sl = 1;
                                                    while ($row = $obj->fetch_assoc()) {
                                                        if ($row['status'] == 1) {
                                                            $status = '<a href="usercontrols.php?active=' . $row['id'] . '" name="active" class="btn btn-sm btn-success">
                                                                    <i class="fas fa-user-check"></i> Active
                                                               </a>';
                                                        } else {
                                                            $status = '<a href="usercontrols.php?inactive=' . $row['id'] . '" name="inactive" class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-user-times"></i> Inactive
                                                               </a>';
                                                        }

                                                ?>
                                                        <!-- User List Looping -->
                                            <tbody>
                                                <tr>
                                                    <td><?= $sl; ?></td>
                                                    <td><?= $row['bName']; ?></td>
                                                    <td><?= $row['mName']; ?></td>
                                                    <td><?= $row['email']; ?></td>
                                                    <td><?= $row['phone']; ?></td>
                                                    <td><?= $status; ?></td>
                                                    <td>
                                                        <a href="branchedit.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-danger btn-sm" data-target="#deleteModal" data-toggle="modal">
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
                                                            Are you sure? want to delete this Branch?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="usercontrols.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Confirm</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php }
                                                } else { ?>

                                        <tbody>
                                            <tr>
                                                <td class="text-center" colspan="7"><strong>Branch</strong> List is Empty!</td>
                                            </tr>
                                        </tbody>

                                    <?php }

                                    ?>

                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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