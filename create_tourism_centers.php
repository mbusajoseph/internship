<?php
include 'servicesController.php';
include 'header.php';

$services = Tourism::get_national_parks();
?>

<main class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card mt-3">
                <div class="card-header py-1">
                <h5 class="font-weight-bold">Create package</h5>
                </div>
                <div class="card-body">
                    

                        <form action="save_package.php" method="POST">
                            <label>Select tourism center</label>
                            <select name="select_tourism_id" class="form-control">
                                <?php
                                   foreach($services as $service){
                                     ?>

                                     <option value="<?php echo $service['id'] ?>"><?php echo $service['name'] ?></option>
                                     <?php
                                    }

                                ?>
                            </select>

                            <label>Package Name</label>
                            <input type="text" name="name" required class="form-control">

                            <label>Package Price</label>
                            <input type="text" name="price" required class="form-control">

                            <label>Package Description</label>
                            <textarea name="description" required class="form-control"></textarea>
                            <hr>
                            <button class="btn btn-info" type="submit">Save</button>
                        </form>

                    	 

                    </div>
                </div>
            </div>
        </div>
    
</main>



<?php
include 'footer.php';
?>