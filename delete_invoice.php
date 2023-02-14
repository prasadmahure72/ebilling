<?php include('config.php') ?>
<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selection = mysqli_query($con, "SELECT * FROM `invoice_details` WHERE `id` = '$id'");
    $data = mysqli_fetch_array($selection);

    $date_time = $data['date_time'] ;

    $client_number = $data['client_number'];
    $client_name = $data['client_name'];
    $client_address = $data['client_address'];
    $subtotal = $data['subtotal'];
    $amount_paid = $data['amount_paid'];
    $amount_due = $data['amount_due'];
    $payment_mode = $data['payment_mode'];
    $note = $data['note'];
    $tearms_conditions = $data['tearms_conditions'];


    $items = mysqli_query($con, "SELECT * FROM `invoice_items` WHERE `date_time` = '$date_time' || `client_number` = '$client_number' ");
    

    $item_data = mysqli_fetch_array($items);



    // $count = count($item_data['client_number']);

    // for($i=0; $i <$count; $i++){


    //     $insert_trash = mysqli_query($con, "INSERT INTO `trash`(`client_name`, `client_number`, `client_address`, `subtotal`, `amount_paid`, `amount_due`, `payment_mode`, `note`, `tearms_conditions`, `product_code`, `product_name`, `quantity`, `price`, `total`, `date_time`) VALUES ('$client_name','$client_number','$client_address','$subtotal','$amount_paid','$amount_due','$payment_mode','$note','$date_time','{$item_data['product_code'][$i]}','{$item_data['product_name'][$i]}','{$item_data['quantity'][$i]}','{$item_data['price'][$i]}','{$item_data['total'][$i]}','$date_time')"); 

       
    // }
        $delete = mysqli_query($con, "DELETE FROM `invoice_details` WHERE `id` = '$id'");


    if($delete){
        echo '<script>swal("Deleted!", "", "error")</script>';
        echo "<script>window.location.href = 'Total_Invoice' </script>";
    } else{
        echo "<script>alert('Something Went Wrong...!')</script>";
        echo "<script>window.location.href = window.location.href </script>";
    }





 

}
?>