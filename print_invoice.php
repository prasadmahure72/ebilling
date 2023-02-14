<?php include('header.php') ?>

<?php include('sidebar.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selection = mysqli_query($con, "SELECT * FROM `order_form_client_details` WHERE `id` = '$id'");
    $data = mysqli_fetch_array($selection);

    $invoiceDate = date("d M Y", strtotime($data["time"]));
    // $invoiceDate = date("d M Y, H:i:s");
    // $invoiceTime = date("H:i:s", strtotime($data['data_time']));
    // $time = date('g:i a', $data['data_time']);
    $time = strftime('%I:%M %p', strtotime($data['time']));

    $customer_date = date("d M Y", strtotime($data["customer_date"]));

    $number = $data['contact_number'];
    $unsorted_date = $data['customer_date'];

    $proof_date = date("d M Y", strtotime($data["proof_date"]));
    $delivery_date = date("d M Y", strtotime($data["delivery_date"]));

?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Print This Invoice</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <!-- <button class="m-3 btn btn-md btn-primary"> Print </button> -->

                            <a href="javascript:void(0);" class="btn btn-primary text-center m-3 btn btn-md btn-primary" onclick="printPageArea('print')"><i class="bi bi-printer-fill"></i> Print</a>

                            <div class="mx-5 border p-3 print col-md-8" id="print">
                                <div class="text-center">

                                    <h5 class="my-1">Order Form</h5>
                                </div>
                                <div class="mar p-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-3 text-left">
                                            <img src="assets/img/logo.png" class="logo2" alt="">

                                        </div>
                                        <div class="col-md-7 d-flex justify-content-end">
                                            <div class="logoo text-end">
                                                <ul class="text-end list">
                                                    <li>Mahatma Phule Sankul, In Front of Abhiyanta Bhavan, Shegaon Naka, V.M.V. Road, Amravati. <i class="bi bi-geo-alt-fill"></i> </li>
                                                    <li>Ph. 0721-2666255 | Mob. 9766656620 <i class="bi bi-telephone-fill"></i></li>
                                                    <li>Email : gurudeoprinters@gmail.com <i class="bi bi-envelope-fill"></i></li>
                                                    <li>Website : www.gurudeoprinters.com <i class="bi bi-globe2"></i></li>
                                                    <li></li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-6 text-left">
                                            <!-- <h4>Techpoint Technologies</h4> -->
                                            <p class="my-1 p-0"><strong>Name : </strong><?= $data['customer_name'] ?></p>
                                            <p class="my-1 p-0"><strong>Address : </strong><?= $data['customer_address'] ?></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="my-1 py-2 text-start"><strong></strong></p>
                                            <p class="my-1 p-0 text-start"><strong>Mob. : </strong><?= $data['contact_number'] ?></p>
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <p class="my-1 p-0 text-start"><strong>Date : </strong><?= $customer_date ?></p>
                                            <p class="my-1 p-0 text-start"><strong>No. : </strong><?= $data['form_no'] ?></p>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2 justify-content-center">
                                        <table class="table table-bordered border-dark">
                                            <thead style="background-color: #370075; color: #ffffff;">
                                                <tr>
                                                    <th scope="col" style="width: 10px;">#</th>
                                                    <th scope="col" style="width: 300px;">Particulars</th>
                                                    <th scope="col" style="width: 7px;">Qty.</th>
                                                    <th scope="col" style="width: 15px;">Paper</th>
                                                    <th scope="col" style="width: 7px;">Size</th>
                                                    <th scope="col" style="width: 7px;">Colour</th>
                                                    <th scope="col" style="width: 7px;">Lamination</th>
                                                    <th scope="col" style="width: 7px;">Numbering</th>
                                                    <th scope="col" style="width: 7px;">Binding</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $select_items = mysqli_query($con, "SELECT * FROM `order_form_items` WHERE `contact_number` = '$number' AND `customer_date` = '$unsorted_date' ");
                                                $c = 1;
                                                while ($items = mysqli_fetch_array($select_items)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $c ?></th>
                                                        <td><?= $items['particulars'] ?></td>
                                                        <td><?= $items['quantity'] ?></td>
                                                        <td><?= $items['paper'] ?></td>
                                                        <td><?= $items['size'] ?></td>
                                                        <td><?= $items['colour'] ?></td>
                                                        <td><?= $items['lamination'] ?></td>
                                                        <td><?= $items['numbering'] ?></td>
                                                        <td><?= $items['binding'] ?></td>
                                                    </tr>
                                                <?php
                                                    $c++;
                                                }


                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="m-0"><strong>Remark : </strong> <?= $data['remarks'] ?></p>
                                        </div>

                                        <div class="col-4">
                                            <p class="m-0"><strong>Proof Date : </strong> <?= $proof_date ?></p>
                                        </div>

                                        <div class="col-4">
                                            <p class="m-0"><strong>Total Items : </strong> <?= $data['total_items'] ?></p>
                                        </div>

                                        <div class="col-4">
                                            <p class="m-0"><strong>Delivery Date : </strong><?= $delivery_date ?></p>
                                        </div>

                                    </div>

                                    <hr>


                                    <p class="text-center m-1 p-0">Order Form</p>

                                    <div class="d-flex my-0 justify-content-between">

                                        <div class="col-md-2">
                                            <img src="assets/img/logo.png" class="logofoot" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <p class="m-0 p-0" style="font-size: 10px;">Mahatma Fule Sankul, In front of Abhiyanta Bhavan, Shegaon Naka, V.M.V. Road, Amravati. <br> Ph. 0721-2666255 | Mob. 9766656620 <br>Email : gurudeoprinters@gmail.com | Website : www.gurudeoprinters.com</p>
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <p class="my-1 p-0 text-start"><strong>Date : </strong><?= $customer_date ?></p>
                                            <p class="my- p-0 text-start"><strong>No. : </strong><?= $data['form_no'] ?></p>
                                        </div>
                                    </div>
<hr>
                                    <p class="text-center p-1 m-0"><strong>Name : </strong> <span style="border-bottom: 1px solid black;"><?= $data['customer_name'] ?></span></p>

                                    <div class="mt-1 d-flex justify-content-between">
                                        <div class="footer1">
                                            <table class="table table-bordered border-dark">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 1px">Sr.No.</th>
                                                        <th scope="col" style="width: 200px">Particulars</th>
                                                        <th scope="col" style="width: 5px">Qty.</th>
                                                        <th scope="col" style="width: 5px">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $select_items = mysqli_query($con, "SELECT * FROM `order_form_items` WHERE `contact_number` = '$number' AND `customer_date` = '$unsorted_date' ");
                                                    $c = 1;
                                                    while ($items = mysqli_fetch_array($select_items)) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $c; ?></th>
                                                            <td><?= $items['particulars'] ?></td>
                                                            <td><?= $items['quantity'] ?></td>
                                                            <td><?= $data['amount'] ?></td>
                                                        </tr>

                                                    <?php
                                                        $c++;
                                                    }

                                                    ?>
                                              
                                                    <tr>
                                                        <td colspan="2">Other : </td>
                                                        <td colspan="2">Total: <?= $data['amount'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="footer2">

                                            <p class="ms-2 my-1"><strong>Amount : </strong><?= $data['amount'] ?></p class="ms-2 my-1">
                                            <p class="ms-2 my-1"><strong>Advance : </strong><?= $data['advance'] ?></p class="ms-2 my-1">
                                            <p class="ms-2 my-1"><strong>Balance : </strong><?= $data['balance'] ?></p class="ms-2 my-1">

                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">

                                        </div>
                                        <div class="col-md-3 text-center">
                                            <p><strong>Sign :</strong></p>

                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </section>


    <?php
}

    ?>


    <script type="text/javascript">
        function printPageArea(pagevalue) {

            var backup = document.body.innerHTML;
            var divcontent = document.getElementById(pagevalue).innerHTML;

            document.title='Order Form <?= $data['customer_name']." ".$data['customer_date'] ?>';
            importCSS: true;
            importStyle: true;
            printContainer: true;
            document.body.innerHTML = divcontent;
            window.print();


            document.body.innerHTML = backup;

        }
    </script>

    <?php include('footer.php') ?>