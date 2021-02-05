<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <span class="text-muted">Copyright &copy; Toursim Center <?= date('Y')?></span>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/tourism.js"></script>
    <script>
        function confAction(action) {
            var conf = false;
            if (action === "approve") {
                conf = confirm("Approve this order?");
            }else if(action === "cancel") {
                conf = confirm("Cancel Approval for this order?");
            }else if(action === "decline") {
                conf = confirm("Decline this order? \n Action can not be undone!");
            }else {
                conf = false;
            }
            return conf;
        }
    </script>
</body> 
    </body> 
</html>
