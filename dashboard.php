<?php include 'app_view.php';include 'header.php';?>

<main class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="card card-body shadow mt-3 bg-warning">
                    <div class="row justify-content-center">
                    <h5 class="font-weight-bold"> Pending orders <span class="badge badge-light ds_number"> <?php echo $pending ?> </span></h5>
                    </div>
                </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="card card-body shadow mt-3 bg-success">
                    <div class="row justify-content-center">
                    <h5 class="font-weight-bold"> Approved orders <span class="badge badge-light ds_number"> <?php echo $complete ?> </span></h5>
                    </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="card card-body shadow mt-3 bg-danger">
                    <div class="row justify-content-center">
                        <h5 class="font-weight-bold"> Declined orders <span class="badge badge-light ds_number"> <?php echo $declined ?> </span></h5>
                     
                    </div>
                </div>
        </div>
    </div>
</main>

 
<?php include 'footer.php'; ?>
