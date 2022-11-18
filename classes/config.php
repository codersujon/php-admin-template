<?php 

    class Connection{
        private $con="";
        function connect(){
           $con = $this->con = new mysqli("localhost","root", "root","pos_template");
           return $con; 
        }
    }
    
?>