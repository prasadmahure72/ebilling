<?php include('header.php') ?>
<?php include('sidebar.php') ?>
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
        <h1>Create New Order Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Generate Order Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create New Order Form</h5>
                        <p></p>

                        <!-- Browser Default Validation -->
                        <form method="POST" class="row g-3">
                            <!-- HEADER  -->
                            <div class="row my-2 p-3 d-flex justify-content-around">
                                <div class="col-md-5 text-left my-2">
                                    <h4 class="fw-bold">To,</h4>
                                    <div class="box">

                                        <div class="col-12 p-1 my-2">
                                            <input type="text" class="form-control form-control-sm" id="validationDefault01" name="customer_name" placeholder="Customer Name" required="">
                                        </div>

                                        <div class="col-12 p-1 my-2">
                                            <input type="text" class="form-control form-control-sm" id="validationDefault01" name="contact_number" placeholder="Contact Number" required="">
                                        </div>
                                        <div class="col-12 p-1 my-2">
                                            <input type="text" name="customer_address" class="form-control" id="validationDefault01" placeholder="Address" required="">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2 text-left my-2">
                                    <div class="box mt-4">

                                        <div class="col-12 p-1 my-2">
                                            <input type="date" class="form-control form-control-sm" id="validationDefault01" name="customer_date" placeholder="Date" required="">
                                        </div>

                                        <div class="col-12 p-1 my-2">
                                            <input type="number" class="form-control form-control-sm" id="validationDefault01" name="form_no" placeholder="No." required="">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- HEADER END -->
                            <div class="d-flex justify-content-center p-2 my-3">
                                <div class="table-responsive bill_table col-11">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <!-- <th scope="col">#</th> -->
                                                <th scope="col" style="width: 400px;">Particulars</th>
                                                <th scope="col" style="width: 100px;">Quantity</th>
                                                <th scope="col" style="width: 200px;">Paper</th>
                                                <th scope="col" style="width: 100px;">Size</th>
                                                <th scope="col" style="width: 200px;">Colour</th>
                                                <th scope="col" style="width: 200px;">Lamination</th>
                                                <th scope="col" style="width: 100px;">Numbering</th>
                                                <th scope="col" style="width: 200px;">Binding</th>
                                                <th scope="col"><a href="javascript:void(0)" class="btn btn-success addRow"><i class="bi bi-plus-lg"></i></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- <th scope="row">1</th> -->
                                                <td><input type="text" name="particulars[]" id="particulars" class="form-control product_name" required=""></td>
                                                <td><input type="text" name="quantity[]" id="quantity" class="form-control product_name" required=""></td>
                                                <td><input type="text" name="paper[]" id="paper" class="form-control quantity" required=""></td>
                                                <td><input type="text" name="size[]" id="size" class="form-control price" required=""></td>
                                                <td><input type="text" name="colour[]" id="colour" class="form-control total" required=""></td>
                                                <td><input type="text" name="lamination[]" id="lamination" class="form-control total" required=""></td>
                                                <td><input type="text" name="numbering[]" id="numbering" class="form-control total" required=""></td>
                                                <td><input type="text" name="binding[]" id="binding" class="form-control total" required=""></td>
                                                <td><a href="javascript:void(0)" class="btn btn-danger deleteRow"><i class="bi bi-x-lg"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <label for="remarks" class="form-label fw-bold">Remarks :</label>

                                <div class="input-group">
                                    <span class="input-group-text fs-5" id="inputGroupPrepend2">&#8377;</span>
                                    <input type="text" class="form-control subtotal" name="remarks" id="remarks" aria-describedby="inputGroupPrepend2" placeholder="Remarks" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="proof_date" class="form-label fw-bold">Proof Date :</label>

                                <div class="input-group">
                                    <span class="input-group-text fs-5" id="inputGroupPrepend2">&#8377;</span>
                                    <input type="date" class="form-control" name="proof_date" id="proof_date" aria-describedby="inputGroupPrepend2" placeholder="Proof Date" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="total_items" class="form-label fw-bold">Total Items :</label>
                                <div class="input-group">
                                    <span class="input-group-text fs-5" id="inputGroupPrepend2">&#8377;</span>
                                    <input type="text" class="form-control" name="total_items" id="total_items" aria-describedby="inputGroupPrepend2" placeholder="Total Items" required="">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="delivery_date" class="form-label fw-bold">Delivery Date :</label>
                                <div class="input-group">
                                    <span class="input-group-text text-success fs-5" id="inputGroupPrepend2"><i class="bi bi-currency-exchange"></i></span>
                                    <input type="date" class="form-control" name="delivery_date" id="delivery_date" aria-describedby="inputGroupPrepend2" placeholder="Delivery Date" required="">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="ammount" class="form-label fw-bold">Amount :</label>

                                <div class="input-group">
                                    <span class="input-group-text fs-5" id="inputGroupPrepend2">&#8377;</span>
                                    <input type="text" class="form-control subtotal" name="ammount" id="ammount" aria-describedby="inputGroupPrepend2" placeholder="Amount" required="">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="advance" class="form-label fw-bold">Advance :</label>

                                <div class="input-group">
                                    <span class="input-group-text fs-5" id="inputGroupPrepend2">&#8377;</span>
                                    <input type="text" class="form-control subtotal" name="advance" id="advance" aria-describedby="inputGroupPrepend2" placeholder="Advance" required="">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="balance" class="form-label fw-bold">Balance :</label>

                                <div class="input-group">
                                    <span class="input-group-text fs-5" id="inputGroupPrepend2">&#8377;</span>
                                    <input type="text" class="form-control subtotal" name="balance" id="balance" aria-describedby="inputGroupPrepend2" placeholder="Balance" required="">
                                </div>
                            </div>




                            <div class="col-12">
                                <button class="btn btn-primary" name="save_order_form" type="submit">Save Order Form</button>
                            </div>
                        </form>
                        <!-- End Browser Default Validation -->

                    </div>
                </div>

            </div>


        </div>
    </section>

    <?php
    if (isset($_POST['save_order_form'])) {
        $customer_name = $_POST['customer_name'];
        $contact_number = $_POST['contact_number'];
        $customer_address = $_POST['customer_address'];

        $customer_date = $_POST['customer_date'];
        $form_no = $_POST['form_no'];

        $remarks = $_POST['remarks'];
        $proof_date = $_POST['proof_date'];
        $total_items = $_POST['total_items'];
        $delivery_date = $_POST['delivery_date'];
        $ammount = $_POST['ammount'];
        $advance = $_POST['advance'];
        $balance = $_POST['balance'];

        // SELECT DATE_FORMAT("2017-06-15", "%W %M %e %Y");

        $details = "INSERT INTO `order_form_client_details`(`customer_name`, `contact_number`, `customer_address`, `remarks`, `proof_date`, `total_items`, `delivery_date`, `amount`, `advance`, `balance`, `customer_date`, `form_no`, `time`) VALUES ('$customer_name','$contact_number','$customer_address','$remarks','$proof_date','$total_items','$delivery_date','$ammount','$advance','$balance','$customer_date','$form_no',current_timestamp() )";

        $insert_details = mysqli_query($con, $details);
        // for a table 
        // {$_POST['product_code'][$i]}
        $count = count($_POST['quantity']);
        for ($i = 0; $i < $count; $i++) {
            $sql = "INSERT INTO `order_form_items`(`customer_name`, `contact_number`, `customer_date`, `form_no`, `particulars`, `quantity`, `paper`, `size`, `colour`, `lamination`, `numbering`, `binding`) VALUES ('$customer_name','$contact_number','$customer_date','$form_no','{$_POST['particulars'][$i]}','{$_POST['quantity'][$i]}','{$_POST['paper'][$i]}','{$_POST['size'][$i]}','{$_POST['colour'][$i]}','{$_POST['lamination'][$i]}','{$_POST['numbering'][$i]}','{$_POST['binding'][$i]}' )";

            $insert_item = mysqli_query($con, $sql);
        }

        if ($insert_details && $insert_item) {
          ?>
          <script>
                swal("Good Job..!", "Order Form Created Successfully", "success").then(function() {
                    window.location.href = window.location.href;
                });
            </script>
          <?php

            // echo "<script>window.location.href = 'Total_Invoice' </script>";
        } else {
           ?>
                 <script>
                swal("Something Went Wrong", "Try Again Later", "error").then(function() {
                    window.location.href = window.location.href;
                });
            </script>
           <?php
        }
    }

    ?>

    <script>
        $('thead').on('click', '.addRow', function() {
            var tr = '<tr>' +
                '<td><input type="text" name="particulars[]" id="particulars" class="form-control product_name" required=""></td>' +
                ' <td><input type="text" name="quantity[]" id="quantity" class="form-control product_name" required=""></td>' +
                ' <td><input type="text" name="paper[]" id="paper" class="form-control quantity" required=""></td>' +
                ' <td><input type="text" name="size[]" id="size" class="form-control price" required=""></td>' +
                ' <td><input type="text" name="colour[]" id="colour" class="form-control total" required=""></td>' +
                ' <td><input type="text" name="lamination[]" id="lamination" class="form-control total" required=""></td>' +
                ' <td><input type="text" name="numbering[]" id="numbering" class="form-control total" required=""></td>' +
                ' <td><input type="text" name="binding[]" id="binding" class="form-control total" required=""></td>' +
                ' <td><a href="javascript:void(0)" class="btn btn-danger deleteRow"><i class="bi bi-x-lg"></i></a></td>' +
                '</tr>'
            $('tbody').append(tr);

        });

        $('tbody').on('click', '.deleteRow', function() {
            $(this).parent().parent().remove();
        });

        // on key up 
        // $('.quantity, .price').on('input', function() {
        //     var quantity = parseInt($('.quantity').val());
        //     var price = parseFloat($('.price').val());
        //     $('.total').val((quantity * price ? quantity * price : 0).toFixed(2));
        //     $('.subtotal').val((quantity * price ? quantity * price : 0).toFixed(2));
        // });

    </script>
    <?php include('footer.php') ?>