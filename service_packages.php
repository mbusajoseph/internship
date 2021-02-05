<?php 
include 'servicesController.php';
include 'header.php';
$service_id = $_GET['data'];

$services = Tourism::get_packages($service_id);
$result = Tourism::get_service($service_id);
?>

<main class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card mt-3">
                <div class="card-header py-1">
                <h5 class="font-weight-bold">Packages under <?php echo $result['name'] ?> </h5>
                </div>
                <div class="card-body">
                    <div class="row">

                    	<table class="table table-striped">
                    		<thead>
                    			<th>Name</th>  <th>Price</th> <th>Description</th>
                    		</thead>

                    		<tbody>
                    			<?php 


                    			foreach($services as $service){
									 ?>

									<tr>
									 	<td><?php echo $service['name'] ?></td>
                                        <td><?php echo number_format( $service['price'] ) ?></td>
                                        <td><?php echo $service['description'] ?></td>
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