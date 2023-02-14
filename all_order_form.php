
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>All Order Forms</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Order Forms</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->




    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Order Forms</h5>


                        <div class="row d-flex justify-content-center">
                            
                            <div class="col-md-11 table-responsive">
                                <a href="export.php" class="btn btn-voilet btn-sm">Export into Exel</a>
                        
                            <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Form Number</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Contact Number</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Date</th>
                                         
                                            <th scope="col">Print</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $select = mysqli_query($con, "SELECT * FROM `order_form_client_details` ORDER BY `id` DESC");
                                        $i = 1;
                                        while($data = mysqli_fetch_array($select)){
                                            $invoiceDate = date("d M Y, g:i a", strtotime($data["time"]));
                                        ?>      
                                            <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $data['form_no']; ?></td>
                                            <td><?= $data['customer_name']; ?></td>
                                            <td><?= $data['contact_number']; ?></td>
                                            <td><?= $data['customer_address']; ?></td>
                                            <td><?= $invoiceDate ?></td>
                                            <td><a href="Print_Invoice?id=<?= $data['id'] ?>" class="btn btn-sm btn-primary fs-5 text-center" title="Print the Invoice"><i class="bi bi-printer-fill"></i></a></td>
                                            <td><a href="Edit_Invoice?id=<?= $data['id'] ?>" class="btn btn-sm btn-success fs-5 text-center" title="Edit the Invoice"><i class="bi bi-pencil-square"></i></a></td>
                                            <td><a href="delete_invoice.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-danger fs-5 text-center" title="Delete the Invoice"><i class="bi bi-trash-fill"></i></a></td>
                                        </tr>
                                        <?php
                                        $i++;
                                        }
                                    ?>

                                   

                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>





    <?php
    // $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoice_details["order_date"]));




    ?>

    <?php include('footer.php') ?>