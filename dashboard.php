<?php include 'app_view.php';include 'header.php';?>

<main class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4">
            <div class="card mt-3 bg-warning py-1">
                <div class="card-header py-1">
                <h5 class="font-weight-bold"> Pending orders </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                       <span class="ds_number"> <?php echo $pending ?> </span>
                     
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4">
            <div class="card mt-3 bg-success py-1">
                <div class="card-header py-1">
                <h5 class="font-weight-bold"> Approved orders </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                       <span class="ds_number"> <?php echo $complete ?> </span>
                     
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4">
            <div class="card mt-3 bg-danger py-1">
                <div class="card-header py-1">
                <h5 class="font-weight-bold"> Declined orders </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                       <span class="ds_number"> <?php echo $declined ?> </span>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

 
<?php
include 'footer.php';
 ?>
