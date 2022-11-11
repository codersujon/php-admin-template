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
                    <h1 class="m-0">Branch List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Branch List</li>
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
                    <!-- User List Table Start-->
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table">
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

                                        while ($row = $obj->fetch_assoc()) {
                                            $sl = 1;
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
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" data-target="#deleteModal" data-toggle="modal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>

                            <?php $sl++;?>
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
                        <!-- /.card-body -->
                    </div>
                    <!-- User List Table End-->
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