<?php include "config/config.php";?>

<?php 
    // Class Extends with DB Connection
    class Branch extends DB{
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
            $email=$loginData["email"];
            $password=$loginData["password"];

            if ( $email == "" ) {
                return '<div class="alert alert-danger text-center">
                            <strong>Error:</strong> Email is Empty!
                        </div>';
            } elseif ( $password == "") {
                return '<div class="alert alert-danger text-center">
                            <strong>Error:</strong> Password is Empty!
                        </div>';
            } else {
               
                
              
               
            }
        }

    }
?>
