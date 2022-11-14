<?php include("config.php");?>
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
            $costprice = $allData['costprice'];
            $saleprice = $allData['saleprice'];

            $sql = $this->con->query("INSERT INTO `tbl_product`(`pname`, `psize`, `pdes`, `pcolor`, `barcode`, `costprice`, `saleprice`) VALUES ('$pname','$psize','$pdes','$pcolor','$barcode','$costprice','$saleprice')");

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

        // Show All Product
        function allProduct($allData){
            $sql = $this->con->query("SELECT * FROM `tbl_product`");
            return $sql;
        }

        // Edit Product
        function editProduct($id){
            $sql = $this->con->query("SELECT * FROM `tbl_product` WHERE `id`='$id'");
            return $sql;
        }

        // Update Product
        function updateProduct($allData, $id){
            $pname = $allData['pname'];
            $psize = $allData['psize'];
            $pdes = $allData['pdes'];
            $pcolor = $allData['pcolor'];
            $barcode = $allData['barcode'];
            $costprice = $allData['costprice'];
            $saleprice = $allData['saleprice'];

            $sql = $this->con->query("UPDATE `tbl_product` SET `pname`='$pname', `psize`='$psize', `pdes`='$pdes', `pcolor`='$pcolor', `barcode`='$barcode', `costprice`='$costprice', `saleprice`='$saleprice' WHERE `id`='$id'");
            if($sql){
                echo "<script>window.location.replace('manageproduct.php')</script>";
            }
        }

        //Delete Product
        function deleteProduct($id){
            $sql = $this->con->query("DELETE FROM `tbl_product` WHERE `id`='$id'");
            echo "<script>window.location.replace('manageproduct.php')</script>";
        }

    }
?>