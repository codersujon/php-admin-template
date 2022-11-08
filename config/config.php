<?php 
     class db{
        public $hostname;
        public $username;
        public $password;
        public $dbname;

        public function __construct($hostname, $username, $password, $dbname){
            $this->hostname = $hostname;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;

            $con = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

            if (!$con) {
                echo "Database Not Connected".mysqli_error($con);
            }
        }
    }
?>