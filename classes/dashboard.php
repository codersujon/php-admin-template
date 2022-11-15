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

    }

?>