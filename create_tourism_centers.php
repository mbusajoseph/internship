<?php
include 'app_view.php'; include 'header.php';?>

<main class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card mt-3">
                <div class="card-header py-1">
                <h5 class="font-weight-bold">Create package</h5>
                </div>
                <div class="card-body">
                    

                        <form action="" method="post" id="addPackageForm">
                            <input type="hidden" name="action" value="add"/>
                            <label>Select tourism center</label>
                            <select name="tourism_id" class="form-control">
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
                            <div class="row justify-content-between">
                            <button class="btn btn-info" id="save-package-btn" type="submit">Save</button>
                            <div class="before-3 d-none">
                                <span class="spinner-border spinner-border-sm text-success"></span>saving...
                            </div>
                            <button type="reset" class="btn btn-danger">Clear</button>
                            </div>
                        </form>

                    	  

                    </div>
                </div>
            </div>
        </div>
    
</main>



<?php include 'footer.php';?>
