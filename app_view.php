<?php
include 'servicesController.php';
//deny access for users who are not logged in
User::isLoggedIn();
//get username
$username = User::userName();
//get the services orderd for
$data = Tourism::get_services();

//get the national parks
$parks = Tourism::get_national_parks();
//get packages
//$packages = Tourism::get_packages();
//capture the approval action
$response = "";
if (isset($_REQUEST['approve'])) {
    $response = Tourism::approve_order();
}
//cancle approval
if (isset($_REQUEST['cancel'])) {
    $response = Tourism::cancel_approval();
}
//decline order
if (isset($_REQUEST['decline'])) {
    $response = Tourism::decline_order();
}
//get the requset to edit a package
$pk_id = $pk_name = $pk_cost = $pk_desc = "";
if (isset($_REQUEST['action'])) {
    Tourism::get_package_by_id();
    $pk_id = Tourism::$packageId;
    $pk_name = Tourism::$packageName;
    $pk_cost = Tourism::$packageCost;
    $pk_desc = Tourism::$packageDesc;
}
//get number of packages
$num_packs = Tourism::num_of_packages();
//get orders
$orders = Tourism::get_orders();
//get services
$services = Tourism::get_national_parks();
//get service by id
if (isset($_REQUEST['data'])) {
    $service_id = strip_tags($_GET['data']);
    $services_by_id = Tourism::get_packages($service_id);
    $result = Tourism::get_service($service_id);
}
//count the orders by status
$pending = Tourism::order_status("pending");
$complete = Tourism::order_status("approved");
$declined = Tourism::order_status("declined");
