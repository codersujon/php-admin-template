<?php include("config.php");?>
<?php 
    class Dashboard{
        private $con ="";
        // Constructor  for Connection
        function __construct(){
            $obj= new Connection;
            $this->con=$obj->connect();
        }


        // Total Branch
        function totalBranch(){
            $sql = $this->con->query("SELECT count(id) as totalBranch FROM tbl_branch");
            return $sql;
        }

        // Total Stock
        function totalStock(){
            $br_id = $_SESSION['branch_id']; 
            $sql = $this->con->query("SELECT sum(qnt) as totalStock FROM tbl_stock WHERE br_id ='$br_id' ");
            return $sql;
        }

    }

?>