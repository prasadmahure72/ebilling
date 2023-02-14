<?php include('config.php') ?>
<?php include('header.php') ?>

<?php include('sidebar.php'); ?>


<main id="main" class="main">
    <style>
        .box {
            box-shadow: 0px 0px 30px #4242423d;
            padding: 8px;
            border-radius: 5px;
        }

        .form-control,
        .form-select {
            background-color: #f5f5f5;
        }

        thead {
            background-color: #f3f3f3e8;
        }
    </style>
    <div class="pagetitle">
        <h1>Edit New Invoice</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Edit Invoice</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selection = mysqli_query($con, "SELECT * FROM `invoice_details` WHERE `id` = '$id'");
        $data = mysqli_fetch_array($selection);
        $dateTime = $data['date_time'] ;

        $number = $data['client_number'];


    ?>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit New Invoice</h5>
                            <p></p>

                            <!-- Browser Default Validation -->
                            <form method="POST" class="row g-3">
                                <!-- HEADER  -->
                                <div class="row my-2 p-3 d-flex justify-content-around">
                                    <div class="col-md-5 my-2 text-left">
                                        <h4 class="fw-bold">From,</h4>
                                        <div class="box p-4">
                                            Techpoint Technologies, <br>
                                            Amravati. <br> <br>
                                            techpointtechh@gmail.com, <br>
                                            +91 8669411430
                                        </div>
                                    </div>

                                    <div class="col-md-5 my-2 text-right">
                                        <h4 class="fw-bold">To,</h4>
                                        <div class="box">

                                            <div class="col-12 p-1 my-2">
                                                <input type="text" class="form-control form-control-sm" id="validationDefault01" value="<?= $data['client_name'] ?>" name="client_name" placeholder="Client Name" required="">
                                            </div>

                                            <div class="col-12 p-1 my-2">
                                                <input type="text" value="<?= $data['client_number'] ?>" class="form-control form-control-sm" id="validationDefault01" name="client_number" placeholder="Contact Number" required="">
                                            </div>
                                            <div class="col-12 p-1 my-2">
                                                <input type="text" value="<?= $data['client_address'] ?>" name="client_address" class="form-control" id="validationDefault01" placeholder="Address" required="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- HEADER END -->
                                <div class="d-flex justify-content-center p-2 my-3">
                                    <div class="table-responsive col-11">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <!-- <th scope="col">#</th> -->
                                                    <th scope="col">Product Code</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col"><a href="javascript:void(0)" class="btn btn-success addRow"><i class="bi bi-plus-lg"></i></a></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                               $items = mysqli_query($con, "SELECT * FROM `invoice_items` WHERE `date_time` = '$dateTime' || `client_number` = '$number' ");
                                               $c = 1;
                                               while($item_data = mysqli_fetch_array($items)){
                                                   ?>
                                                     <tr>
                                                    <!-- <th scope="row">1</th> -->
                                                    <td>
                                                        <select class="form-select" name="product_code[]" id="validationDefault04" required="">
                                                            <option selected disabled><?= $item_data['product_code'] ?></option>
                                                            <option value="TP-001 - Static Website">TP-001 - Static Website</option>
                                                            <option value="TP-002 - Dynamic Website">TP-002 - Dynamic Website</option>
                                                            <option value="TP-003 - Semi E-Commerce Website">TP-003 - Semi E-Commerce Website</option>
                                                            <option value="TP-004 - Digital Visiting Card">TP-004 - Digital Visiting Card</option>
                                                        </select>
                                                    </td>
                                                    <td> <select class="form-select" name="product_name[]" id="validationDefault04" required="">
                                                            <option selected="" disabled="" value=""><?= $item_data['product_name'] ?></option>
                                                            <option value="Static Website">Static Website</option>
                                                            <option value="Dynamic Website">Dynamic Website</option>
                                                            <option value="Semi E-Commerce Website">Semi E-Commerce Website</option>
                                                            <option value="Digital Visiting Card">Digital Visiting Card</option>
                                                        </select></td>
                                                    <td><input type="number" value="<?= $item_data['quantity'] ?>" name="quantity[]" id="quantity" class="form-control quantity" required=""></td>
                                                    <td><input type="number" value="<?= $item_data['price'] ?>" name="price[]" id="price" class="form-control price" required=""></td>
                                                    <td><input type="number" value="<?= $item_data['total'] ?>" name="total[]" id="total" class="form-control total" required=""></td>
                                                    <td> <a href="javascript:void(0)" class="btn btn-danger deleteRow"><i class="bi bi-x-lg"></i></a></td>
                                                </tr>
                                                   
                                                   <?php
                                               }

                                            ?>
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <label for="subtotal" class="form-label fw-bold">Subtotal :</label>

                                    <div class="input-group">
                                        <span class="input-group-text fs-5" id="inputGroupPrepend2">&#8377;</span>
                                        <input type="number" value="<?= $data['subtotal'] ?>" class="form-control subtotal" name="subtotal" id="subtotal" aria-describedby="inputGroupPrepend2" placeholder="subtotal" value="0" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="amount_paid" class="form-label fw-bold">Amount Paid :</label>

                                    <div class="input-group">
                                        <span class="input-group-text fs-5" id="inputGroupPrepend2">&#8377;</span>
                                        <input type="number" value="<?= $data['amount_paid'] ?>" class="form-control" name="amount_paid" id="amount_paid" aria-describedby="inputGroupPrepend2" placeholder="Amount Paid" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="amount_due" class="form-label fw-bold">Amount Due :</label>
                                    <div class="input-group">
                                        <span class="input-group-text fs-5" id="inputGroupPrepend2">&#8377;</span>
                                        <input type="number" value="<?= $data['amount_due'] ?>" class="form-control" name="amount_due" id="amount_due" aria-describedby="inputGroupPrepend2" placeholder="Amount Due" required="">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="amount_due" class="form-label fw-bold">Payment Mode :</label>
                                    <div class="input-group">
                                        <span class="input-group-text text-success fs-5" id="inputGroupPrepend2"><i class="bi bi-currency-exchange"></i></span>
                                        <select class="form-select" name="payment_mode" id="validationDefault04" required="">
                                            <option selected="" disabled="" value=""><?= $data['payment_mode'] ?></option>
                                            <option value="UPI Payment">UPI Payment</option>
                                            <option value="Cash Payment">Cash Payment</option>
                                            <option value="Cheque Payment">Cheque Payment</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="note" class="form-label fw-bold">Note :</label>
                                    <textarea class="form-control" name="note" placeholder="Write Something About Project." id="note" rows="3"><?= $data['note'] ?></textarea>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tearms_conditions" value="Agree" id="invalidCheck2" required="">
                                        <label class="form-check-label" for="invalidCheck2">
                                            Agree to terms and conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" name="save_invoice" type="submit">Update Invoice</button>
                                </div>
                            </form>
                            <!-- End Browser Default Validation -->

                        </div>
                    </div>

                </div>


            </div>
        </section>

    <?php

    }


    ?>



<?php

if(isset($_POST['save_invoice'])){
    $client_name = $_POST['client_name'];
    $client_number = $_POST['client_number'];
    $client_address = $_POST['client_address'];

    $subtotal = $_POST['subtotal'];
    $amount_paid = $_POST['amount_paid'];
    $amount_due = $_POST['amount_due'];
    $payment_mode = $_POST['payment_mode'];
    $note = $_POST['note'];
    $tearms_conditions = $_POST['tearms_conditions'];
    // SELECT DATE_FORMAT("2017-06-15", "%W %M %e %Y");

    $details = "UPDATE `invoice_details` SET `client_name`='$client_name',`client_number`='$client_number',`client_address`='$client_address',`subtotal`='$subtotal',`amount_paid`='$amount_paid',`amount_due`='$amount_due',`payment_mode`='$payment_mode',`note`='$note',`tearms_conditions`='$tearms_conditions' WHERE `id` = '$id'";
    
    $insert_details = mysqli_query($con, $details);
    // for a table 
    
    $count = count($_POST['product_code']);
    for($i=0; $i <$count; $i++){
        // $sql = "INSERT INTO `invoice_items`(`client_number`, `client_name`, `product_code`, `product_name`, `quantity`, `price`, `total`, `date_time`) VALUES ('$client_number','$client_name','{$_POST['product_code'][$i]}','{$_POST['product_name'][$i]}','{$_POST['quantity'][$i]}','{$_POST['price'][$i]}','{$_POST['total'][$i]}',current_timestamp() )";

        $sql = "UPDATE `invoice_items` SET `client_number`='$client_number',`client_name`='$client_name',`product_code`='{$_POST['product_code'][$i]}',`product_name`='{$_POST['product_name'][$i]}',`quantity`='{$_POST['quantity'][$i]}',`price`='{$_POST['price'][$i]}',`total`='{$_POST['total'][$i]}' WHERE `date_time` = '$dateTime' || `client_number` = '$number' ";

        $insert_item = mysqli_query($con, $sql);
    }

    if($insert_details && $insert_item){
        echo "<script>alert('Invoice Updated Successfully...!')</script>";
        echo "<script>window.location.href = 'Total_Invoice' </script>";
    } else{
        echo "<script>alert('Something Went Wrong...!')</script>";
        echo "<script>window.location.href = window.location.href </script>";
    }

}

?>
<!-- <script>
    
    $('thead').on('click', '.addRow', function(){
                                var tr =    "<tr>"+
                                    // "<th scope='row' class='itemRow>1'</th>"+
                                        "<td><select class='form-select' name='product_code[]'' id='validationDefault04' required>"+
                                    "<option selected disabled>Select Product Code</option>"+
                                    "<option value='TP-001 - Static Website'>TP-001 - Static Website</option>"+
                                    "<option value='TP-002 - Dynamic Website'>TP-002 - Dynamic Website</option>"+
                                    "<option value='TP-003 - Semi E-Commerce Website'>TP-003 - Semi E-Commerce Website</option>"+
                                    "<option value='TP-004 - Digital Visiting Card'>TP-004 - Digital Visiting Card</option>"+
                               " </select> </td>"+

                                    "<td>  <select class='form-select' name='product_name[]'' id='validationDefault04' required>"+
                                   " <option selected disabled>Select Product</option>"+
                                    "<option value='Static Website'>Static Website</option>"+
                                    "<option value='Dynamic Website'>Dynamic Website</option>"+
                                 "<option value='Semi E-Commerce Website'>Semi E-Commerce Website</option>"+
                                    "<option value='Digital Visiting Card'>Digital Visiting Card</option>"+
                                "</select></td>"+
                                       " <td><input type='number' name='quantity[]' id='quantity' class='form-control quantity' required></td>"+
                                        "<td><input type='number' name='price[]' id='price' class='form-control price' required></td>"+
                                     "   <td><input type='number' name='total[]' id='total' class='form-control total' required></td>"+
                                       " <td> <a href='javascript:void(0)' class='btn btn-danger deleteRow'><i class='bi bi-x-lg'></i></a></td>"+
                                   "</tr>"
                                $('tbody').append(tr);

                              });

                              $('tbody').on('click', '.deleteRow', function(){
                                $(this).parent().parent().remove();
                                }); 

                        // on key up 
                    $('.quantity, .price').on('input',function() {
                        var quantity = parseInt($('.quantity').val());
                        var price = parseFloat($('.price').val());
                        $('.total').val((quantity * price ? quantity * price : 0).toFixed(2));
                        $('.subtotal').val((quantity * price ? quantity * price : 0).toFixed(2));
                    });
</script> -->
    <?php include('footer.php') ?>