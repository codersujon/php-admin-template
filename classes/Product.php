<?php include "config/config.php";?>
<?php 
    class Product{

        private $con ="";
        // Constructor  for Connection
        function __construct(){
            $obj= new Connection;
            $this->con=$obj->connect();
        }

        // Add Product
        function addNewProduct($allData){
            $pname = $allData['pname'];
            $psize = $allData['psize'];
            $pdes = $allData['pdes'];
            $pcolor = $allData['pcolor'];
            $barcode = $allData['barcode'];
            $coseprice = $allData['coseprice'];
            $saleprice = $allData['saleprice'];

            $sql = $this->con->query("INSERT INTO `tbl_product`(`pname`, `psize`, `pdes`, `pcolor`, `barcode`, `coseprice`, `saleprice`) VALUES ('$pname','$psize','$pdes','$pcolor','$barcode','$coseprice','$saleprice')");

            if ($sql) {
                return '<div class="alert alert-success text-center">
                            <strong>Success:</strong> Product Successfully Added!
                        </div>';
            }else{
                return '<div class="alert alert-danger text-center">
                            <strong>Error:</strong> Product Not Added!
                        </div>';
            } 

        }
    }
?>