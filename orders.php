<?php include 'app_view.php';include 'header.php';?>

<main class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card mt-3">
                <div class="card-header py-1">
                <h5 class="font-weight-bold">TOURISM SERVICES ORDERS</h5>
                </div>
                <div class="card-body">
                    <div class="row">

                    	<table class="table table-striped">
                    		<thead>
                    			<th>Date</th>  <th>Order Number</th> <th>Service</th> <th>Amount</th> <th>Status</th> <th>Action</th>
                    		</thead>

                    		<tbody>
                    			<?php 


                    			foreach($orders as $order){
									 ?>
									 <tr>
									 	<td><?php echo $order['date_ordered'] ?></td>
                                        <td>
                                            <strong> TS: <?php echo $order['order_id'] ?></strong> <br>
                                            <?php echo $order['phone_number'] ?>
                                        </td>
                                        <td>
                                            <?php echo $order['package_name'] ?><br>
                                            <?php echo $order['service_name'] ?>
                                        </td>
                                        <td><?php echo number_format( $order['price'] )?></td>
                                        <td><?php echo $order['status'] ?></td>
                                        <td>
                
                                            <div class="row justify-content-between">
                                            <?php if ($order['status'] == 'pending' || $order['status'] == 'declined'): ?>
                                            <form action="" method="get">
                                                <input type="hidden" name="approve" value="true"/>
                                                <input type="hidden" name="order" value="<?=$order['order_id']?>"/>
                                                <button type="submit" class="btn btn-success btn-sm" onclick="return confAction('approve')">Approve</button>
                                            </form>
                                            <?php endif ?>

                                            <?php if($order['status'] == 'pending' && $order['status'] !== 'declined'): ?>
                                            <form action="" method="get">
                                                <input type="hidden" name="decline" value="true"/>
                                                <input type="hidden" name="order" value="<?=$order['order_id']?>"/>
                                                <button type="submit" class="btn btn-warning btn-sm" onclick="return confAction('decline')">Decline</button>
                                            </form>
                                            <?php endif ?>
                                            </div>
                                            
                                            <?php if ($order['status'] == 'approved'): ?>
                                            <!-- Disapprove -->
                                            <form action="" method="get">
                                                <input type="hidden" name="cancel" value="true"/>
                                                <input type="hidden" name="order" value="<?=$order['order_id']?>"/>
                                                <button type="submit" class="btn btn-success btn-sm" onclick="return confAction('cancel')">Cancel Approval</button>
                                            </form>
                                            <?php endif ?>
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
    <div class="fixed-bottom w-5" id="response">
        <?= $response ?>
    </div>
</main>



<?php
include 'footer.php';
?>
