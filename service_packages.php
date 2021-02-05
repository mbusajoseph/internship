<?php 
include 'app_view.php';
include 'header.php';

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
                    			<th>Name</th>  <th>Price</th> <th>Description</th> <th>Action</th>
                    		</thead>

                    		<tbody>
                    			<?php foreach($services_by_id as $service):?>

									<tr>
									 	<td><?php echo $service['name'] ?></td>
                                        <td><?php echo number_format( $service['price'] ) ?></td>
                                        <td><?php echo $service['description'] ?></td>
                                        <td> <a href="action-center.php?action=edit&package=<?= $service['id']?>" class="btn btn-success btn-sm">Edit <i class="fas fa-edit"></i></a></td>
									</tr>

									 <?php endforeach?>
                    		</tbody>
                    	</table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?phpinclude 'footer.php';?>
