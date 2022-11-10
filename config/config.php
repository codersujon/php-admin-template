<?php 
    class DB{
        public $con ="";

        public function __construct(){
           $connection = $this->con = new mysqli("localhost","root", "root", "pos_template");
        }
    }
?>