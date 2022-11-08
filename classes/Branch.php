
<?php 
    class Branch{

        function addBranch($allData){
            $bName =  $allData['bName']; 
            $mName =  $allData['mName'];
            $phone =  $allData['phone'];
            $email =  $allData['email'];
            $password =  $allData['password'];
            $rpassword =  $allData['rpassword'];

            if($password != $rpassword){
                return '<div class="alert alert-danger">
                            <strong>Error:</strong> Password Not Match!
                        </div>';
            }else{
                $password = md5($password);
                $result = $this->database->query("INSERT INTO `tbl_branch`(`bName`, `mName`, `phone`, `email`, `password`) VALUES ('$bName','$mName','$phone','$email','$password')");

                if ($result) {
                    return '<div class="alert alert-warning">
                                <strong>Warning:</strong> Registration Pending!
                            </div>';
                } else {
                    return '<div class="alert alert-danger">
                                <strong>Error:</strong> Registration Not Complete!
                            </div>';
                }
            }
        }

    }
?>