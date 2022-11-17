<?php include("config.php"); ?>
<?php
// Class Extends with DB Connection
class Branch
{
    private $con = "";
    // Constructor  for Connection
    function __construct()
    {
        $obj = new Connection;
        $this->con = $obj->connect();
    }

    //Registration Function
    function addBranch($regData){
        $bName =  $regData['bName'];
        $mName =  $regData['mName'];
        $phone =  $regData['phone'];
        $email =  $regData['email'];
        $password =  $regData['password']; 
        $rpassword =  $regData['rpassword'];

        // Empty Error Message
        if (empty($bName)) {
            return $input_error['bName'] =
            '<div class="alert alert-danger">
                <strong>Error:</strong> The Branch Name is required!
            </div>';
        } elseif (empty($mName)) {
            return $input_error['mName'] =
            '<div class="alert alert-danger">
                <strong>Error:</strong> The Manager Name is required!
            </div>';
        } elseif (empty($phone)) {
            return $input_error['phone'] =
            '<div class="alert alert-danger">
                <strong>Error:</strong> The Phone Number is required!
            </div>';
        } elseif (empty($email)) {
            return $input_error['email'] =
            '<div class="alert alert-danger">
                <strong>Error:</strong> The Email is required!
            </div>';
        } elseif (empty($password)) {
            return $input_error['password'] =
            '<div class="alert alert-danger">
                <strong>Error:</strong> The Password is required!
            </div>';
            return $input_error['password'] = "";
        } elseif(empty($rpassword)){
            return $input_error['password'] =
            '<div class="alert alert-danger">
                <strong>Error:</strong> The Confirm Password is required!
            </div>';
        }

        // Password Match Check
        if ($password != $rpassword) {
            return '<div class="alert alert-danger">
                            <strong>Error:</strong> Password Not Match!
                        </div>';
        } else {
            $password = md5($password);
            $sql = $this->con->query("INSERT INTO `tbl_branch`(`bName`, `mName`, `phone`, `email`, `password`, `status`) VALUES ('$bName','$mName','$phone','$email','$password','0')");

            if ($sql) {
                return '<div class="alert alert-warning text-center">
                                <strong>Warning:</strong> <br/> Registration Pending for Approval!
                            </div>';
            } else {
                return '<div class="alert alert-danger">
                                <strong>Error:</strong> Registration Not Complete!
                            </div>';
            }
        }

    }

    //Login Function
    function login($loginData){
        $mep        = $loginData["mep"];
        $password   = $loginData["password"];

        if ($mep == "") {
            return '<div class="alert alert-danger text-center">
                        <strong>Error:</strong> Manager Name or Phone or Email is Empty!
                    </div>';
        } 
        
        if($password == "") {
            return '<div class="alert alert-danger text-center">
                        <strong>Error:</strong> Password is Empty!
                    </div>';
        } else {
            $password   = md5($loginData["password"]);
            $sql = $this->con->query("SELECT * FROM `tbl_branch` WHERE (`mName`='$mep' OR `email`='$mep' OR `phone`='$mep') AND `password`='$password'");

            if ($sql->num_rows > 0) {
                $sql = $sql->fetch_assoc();
                if($sql['status'] == 1){
                    // Session Using to Store the session values
                    $_SESSION['branch_id'] = $sql['id'];
                    $_SESSION['bName'] = $sql['bName'];
                    $_SESSION['mName'] = $sql['mName'];
                    header("Location:dashboard.php");
                }else{
                    return '<div class="alert alert-warning text-center">
                                    <strong>Warning:</strong> Admin Approval Needed!
                            </div>';
                }
            } else{
                return '<div class="alert alert-danger text-center">
                            <strong>Warning:</strong> Email or Password Not Mach!
                        </div>';
            }
        }

    }

    // Branch User List Show
    function branchUserList()
    {
        $sql = $this->con->query("SELECT * FROM `tbl_branch`;");
        return $sql;
    }

    // Active Branch
    function activeBranch($id)
    {
        $sql = $this->con->query("UPDATE `tbl_branch` SET `status`='0' WHERE `id`='$id';");
        echo '<script>window.location.replace("usercontrols.php")</script>';
    }

    // Inactive Branch
    function inActiveBranch($id)
    {
        $sql = $this->con->query("UPDATE `tbl_branch` SET `status`='1' WHERE `id`='$id';");
        echo '<script>window.location.replace("usercontrols.php")</script>';
    }

    // Edit Branch
    function editBranch($id)
    {
        $sql = $this->con->query("SELECT * FROM `tbl_branch` WHERE id='$id'");
        return $sql;
    }

    // Update Branch
    function updateBranch($upData, $id)
    {
        $bName = $upData['bName'];
        $mName = $upData['mName'];
        $phone = $upData['phone'];
        $email = $upData['email'];
        $password = md5($_POST['password']);
        $sql = $this->con->query("UPDATE `tbl_branch` SET `bName`='$bName', `mName`='$mName', `phone`='$phone', `email`='$email', `password`='$password' WHERE `id`='$id'");
        if ($sql) {
            echo '<div class="alert alert-success text-center">
                            <strong>Success:</strong> Information Update Successfully!
                        </div>';
        }
        echo '<script>window.location.replace("usercontrols.php")</script>';
    }

    //Delete Branch
    function deleteBranch($id)
    {
        $sql = $this->con->query("DELETE FROM `tbl_branch` WHERE id='$id'");
        echo "<script>window.location.replace('usercontrols.php')</script>";
    }
}
?>
