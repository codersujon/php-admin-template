<?php include("config.php");?>
<?php

class Purchase
{
    public $con = "";
    // Constructor  for Connection
    function __construct()
    {
        $obj = new Connection;
        $this->con = $obj->connect();
    }
 
    // Find Product
    function findItem($barcode){
        $sql = $this->con->query("SELECT * FROM `tbl_product` WHERE `barcode`='$barcode'");
        $sql = $sql->fetch_assoc();
        return $sql;
    }

    // Find Stock
    function findStock($product_id){
        $sql = $this->con->query("SELECT * FROM `tbl_stock` WHERE `product_id`='$product_id'");
        return $sql->fetch_assoc();
    }

    // Purchase Item Add
    function addItem($pdate, $cname, $invoice, $br_id, $product_id,$barcode, $price, $qnt, $total){
        $sql = $this->con->query("INSERT INTO tbl_purchase_details(pdate, cname, invoice, br_id, product_id, barcode, price,qnt, total) VALUES('$pdate','$cname','$invoice','$br_id','$product_id','$barcode','$price','$qnt','$total')");
        $this->stockUpdateInsert($product_id, $br_id, $qnt);
    }

    function stockUpdateInsert($product_id, $br_id, $qnt){
        $find=$this->con->query("SELECT * FROM tbl_stock WHERE product_id = '$product_id'");
        if($find->num_rows > 0){
            $data = $find->fetch_assoc();
            $pastQnt = $data["qnt"];
            $total = $qnt + $pastQnt;
            $sql =$this->con->query("UPDATE tbl_stock SET qnt= '$total'");
            return $sql;
        }
        else{
            $sql = $this->con->query("INSERT INTO `tbl_stock`(`product_id`, `br_id`, `qnt`) VALUES ('$product_id','$br_id','$qnt')");
            return $sql;
        }
    }
    
    // Show Item
    function showItem($invoice){
        $sql = $this->con->query("SELECT * FROM `tbl_purchase_details` WHERE `invoice` = '$invoice'");
        return $sql; 
    }

    // Remove Item 
    function removeItem($id){
        $sql = $this->con->query("DELETE FROM `tbl_purchase_details` WHERE `id` = '$id'");
        return $sql;
    }

    // Calculate Total Quantity
    function calQnt($invoice){
        $sql = $this->con->query("SELECT * FROM `tbl_purchase_details` WHERE `invoice` = '$invoice'");
        return $sql; 
    }

    // Calculate Total Price
    function calPrice($invoice){
        $sql = $this->con->query("SELECT * FROM `tbl_purchase_details` WHERE `invoice` = '$invoice'");
        return $sql; 
    }

    // Add Purchase Summery
    function purchaseSummery($pdate, $company, $invoice, $total_quantity,  $total_price, $dis, $dis_amount, $grand_total, $payment, $duePayment, $br_id){
        $sql = $this->con->query("INSERT INTO `tbl_purchase_summery`(`pdate`, `company`, `invoice`, `total_quantity`, `total_price`, `dis`, `dis_amount`, `grand_total`, `payment`, `duePayment`, `br_id`) VALUES ('$pdate','$company','$invoice','$total_quantity','$total_price','$dis','$dis_amount','$grand_total','$payment','$duePayment','$br_id')");
        return $sql;
    }

    // Show Purchase Details
    public function purchaseSummeryShow(){
        $sql = $this->con->query("SELECT * FROM `tbl_purchase_summery`");
        return $sql;
    }
}

?>