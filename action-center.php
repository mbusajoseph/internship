<?php include 'app_view.php'; include 'header.php'; ?>
<main class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card mt-3">
                <div class="card-header py-1">
                    <div class="row justify-content-between">
                        <h5 class="font-weight-bold">EDIT PACKAGE</h5>
                        <div class="before-2 d-none">
                            <span class="spinner-border spinner-border-sm text-danger"></span> deleting...
                                    </div>
                        <form action="" method="post" id="deletePackageForm">
                            <input type="hidden" name="action" value="delete"/>
                            <input type="hidden" name="id" value="<?= $pk_id ?>"/>
                            <button type="submit" class="btn btn-danger btn-sm delete-btn" onclick="return confirm('Delete this package?')">Trash <i class="fas fa-trash"></i> </button>
                        </form>
                    </div>
                </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>PACKAGE ID</th>
                                    <th>PACKAGE NAME</th>
                                    <th>PACKAGE COST</th>
                                    <th>DESCRIPTION</th>
                                    <th><div class="before-1 d-none">
                                    <span class="spinner-border spinner-border-sm text-success"></span> saving...
                                    </div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $pk_id ?></td>
                                    <form action="" method="post" id="editPackageForm">
                                        <input type="hidden" name="action" value="save"/>
                                        <input type="hidden" name="id" value="<?= $pk_id ?>"/>
                                         <td><input type="text" name="name" class="edit-input" value="<?= $pk_name ?>"/></td>
                                        <td><input type="text" name="price" class="edit-input" value="<?= $pk_cost ?>"/></td>
                                        <th><textarea name="desc" rows="5" class="form-control"><?= $pk_desc?></textarea></th>
                                        <td><button type="submit" class="btn btn-success btn-sm edit-btn">Save Changes</button> </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
       
    </div>
    <div class="fixed-bottom w-50" id="response-2">
        
    </div>
</main>
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/tourism.js"></script>
</body> 
    </body> 
</html>
