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
                <h5 class="font-weight-bold">TOURISM SERVICES </h5>
                </div>
                <div class="card-body">
                    <div class="row">

                    	<table class="table table-striped">
                    		<thead>
                    			<th>Name</th>  <th>Action</th>
                    		</thead>

                    		<tbody>
                    			<?php 


                    			foreach($services as $service){
									 ?>

									 <tr>
									 	<td><?php echo $service['name'] ?></td>
									 	<td>
									 		<a href="service_packages.php?data=<?php echo $service['id'] ?>">packages</a>
									 	</td>

									 </tr>

									 <?php

                    			}

                    			?>
                    		</tbody>
                    	</table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
include 'footer.php';
?>