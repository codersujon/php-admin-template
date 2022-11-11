<?php include "config/config.php";?>

<?php 
    // Class Extends with DB Connection
    class Branch{
        private $con ="";
        // Constructor  
        function __construct(){
            $obj= new Connection;
            $this->con=$obj->connect();
        }

        //Registration Function
        function addBranch($regData){
            $bName =  $regData['bName']; 
            $mName =  $regData['mName'];
            $phone =  $regData['phone'];
            $email =  $regData['email'];
            $password =  $regData['password'];
            $rpassword =  $regData['rpassword'];

            if($password != $rpassword){
                return '<div class="alert alert-danger">
                            <strong>Error:</strong> Password Not Match!
                        </div>';
            }else{
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
            $mep        =$loginData["mep"];
            $password   =md5($loginData["password"]);

            if ( $mep == "" ) {
                return '<div class="alert alert-danger text-center">
                            <strong>Error:</strong> Email is Empty!
                        </div>';
            } elseif ( $password == "") {
                return '<div class="alert alert-danger text-center">
                            <strong>Error:</strong> Password is Empty!
                        </div>';
            } else {

               $sql = $this->con->query("SELECT * FROM `tbl_branch` WHERE (`mName`='$mep' OR `email`='$mep' OR `phone`='$mep') AND `password`='$password' AND `status`='1'");

                if ($sql->num_rows>0) {
                    $sql=$sql->fetch_assoc();
                    // Session Using to Store the session values
                    $_SESSION['id'] = $sql['id'];
                    $_SESSION['bName'] = $sql['bName'];
                    $_SESSION['mName'] = $sql['mName'];
                    header("Location:dashboard.php");

                } else {
                    return '<div class="alert alert-danger text-center">
                            <strong>Error:</strong> Manager Name or Email or Phone and Password not found!
                        </div>';
                }
              
               
            }
        }

    }
?>
