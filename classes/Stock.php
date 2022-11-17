<?php 
    class Stock{
        private $con ="";
        // Constructor  for Connection
        function __construct(){
            $obj= new Connection;
            $this->con=$obj->connect();
        }

    }
?>