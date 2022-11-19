<?php 
    class Sales{
        private $con ="";
        // Constructor  for Connection
        function __construct(){
            $obj= new Connection;
            $this->con=$obj->connect();
        }

        //Auto Invoice Generate
        function invoiceGen(){
            $sql = $this->con->query("SELECT MAX(invoice) as invoice FROM `tbl_sales_details`");
            if($sql->num_rows> 0){
                $sql = $sql->fetch_assoc();
                return $sql;
            } else{
                return "Empty";
            }
        }

        // Add Sales Item
        function sAddItem($sdate, $invoice, $product_id, $saleprice, $quantity, $total_amount, $br_id){
            $sql =$this->con->query("INSERT INTO `tbl_sales_details`(`sdate`, `invoice`, `product_id`, `saleprice`, `quantity`, `total_amount`, `br_id`) VALUES ('$sdate','$invoice','$product_id','$saleprice','$quantity','$total_amount','$br_id')"); 
            return $sql;
        }

        // Update Sales Stock After Sale
        function updateStock($id, $qnt){
          $find = $this->con->query("SELECT * FROM `tbl_stock` WHERE product_id='$id'");  
          if ($find->num_rows > 0) {
            $data = $find->fetch_assoc();
            $pastQnt = $data['qnt'];
            $totalQnt = $pastQnt - $qnt;
            $sql = $this->con->query("UPDATE `tbl_stock`SET qnt='$totalQnt' WHERE product_id='$id'");
            return $sql;
          }
        }

        // Sales Item Show
        function salesItemShow($invoice){
            $sql = $this->con->query("SELECT * FROM `tbl_sales_details` WHERE invoice = '$invoice'");
            return $sql;
        }

         // Calculate Total Sales Quantity
        function salesTotalQnt($invoice){
            $sql = $this->con->query("SELECT * FROM `tbl_sales_details` WHERE `invoice` = '$invoice'");
            return $sql; 
        }

        //Save Sales Summery
        function insertSalesSummery($sdate, $invoice, $total_quantity, $total_price, $dis, $dis_amount, $grand_total, $payment, $duePayment, $br_id){
            $sql = $this->con->query("INSERT INTO `tbl_sales_summery`(`sdate`, `invoice`, `total_quantity`, `total_price`, `dis`, `dis_amount`, `grand_total`, `payment`, `duePayment`, `br_id`) VALUES ('$sdate','$invoice','$total_quantity','$total_price','$dis','$dis_amount','$grand_total','$payment','$duePayment','$br_id')");
            return $sql;
        }

        // Remove Sales Item
        function salesRemoveItem($id){

            $qntFind = $this->con->query("SELECT * FROM `tbl_sales_details` WHERE product_id='$id'");

            if($qntFind->num_rows>0){
                $qntData =  $qntFind->fetch_assoc();
                $presQnt = $qntData['quantity'];
                $pid = $qntData['product_id'];

                $find=$this->con->query("SELECT * FROM `tbl_stock` WHERE product_id='$pid'");

                if($find->num_rows>0){
                    $data = $find->fetch_assoc();
                    $pastQnt = $data['qnt'];
                    $updateQnt = $pastQnt - $presQnt;

                    $sql = $this->con->query("UPDATE `tbl_stock` SET qnt='$updateQnt' WHERE product_id='$pid'");
                    $delete = $this->con->query("DELETE FROM `tbl_sales_details` WHERE id='$id'");

                    return $delete;
                }
            }
        }

}
?>