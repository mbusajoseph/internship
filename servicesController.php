<?php
include 'DatabaseConnection.php';
class Tourism
{
  use getData;
  public static $packageName;
  public static $packageCost;
  public static $packageId;
  public static $packageDesc;
  public function __construct()
  {
  }


  public static function get_services() {
    $services = array();
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT * FROM park_orders";
    $result = mysqli_query($connection, $sql);
    while($data = mysqli_fetch_assoc($result)){
      $services[] = $data;
    }
    return $services;
  }

   public static function get_service($service_id) {
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT * FROM national_parks WHERE id = ".$service_id;
    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);
    return $data;
  }



  public static function get_orders() {
    $services = array();
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT park_orders.id as order_id, park_orders.status as `status`,phone_number,date_ordered,packages.name as package_name,price,national_parks.name as `service_name` FROM park_orders INNER JOIN packages ON park_orders.package_id = packages.id INNER JOIN national_parks ON packages.national_park_id = national_parks.id ORDER BY park_orders.id DESC";
    $result = mysqli_query($connection, $sql); 
   
    while($data = mysqli_fetch_assoc($result)){
      $services[] = $data;
    }
    return $services;
  }


  public static function order_status($value)
  {
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT COUNT(*) as count FROM park_orders WHERE status = '$value' ";
    $result = mysqli_query($connection, $sql); 

    $data = mysqli_fetch_row($result);
  
    return $data[0]; 
  }


  public static function get_national_parks() {
    $parks = array();
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT * FROM national_parks";
    $result = mysqli_query($connection, $sql);
    while($data = mysqli_fetch_assoc($result)){
      $parks[] = $data;
    }
    return $parks;

  }
  /**
   * @method get_packages
   * @return array An array of package rows fecthed from the database
   */
  public static function get_packages($park_id) {
    $packages = array();
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT * FROM packages where national_park_id = ".$park_id;
    $result = mysqli_query($connection, $sql);
    while($data = mysqli_fetch_assoc($result)){
      $packages[] = $data;
    }
    return $packages;

  }
  public static function approve_order() {
    $connection = DatabaseConnection::dbConnect();
    $order =  self::get('order');
    $sql = "UPDATE park_orders SET `status` = 'approved' WHERE id = $order";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      return self::success("Order approved successfully <a href='javascript:void(0)' class='btn btn-primary btn-sm' onclick='cancelApproval()' data-approve='$order' id='approve'>undo </a>");
    }else {
      return self::failure();
    }
  }
  public static function cancel_approval() {
    $connection = DatabaseConnection::dbConnect();
    $order =  self::get('order');
    $sql = "UPDATE park_orders SET `status` = 'pending' WHERE id = $order";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      return self::success("Order's approval cancelled successfully <a href='javascript:void(0)' class='btn btn-primary btn-sm' onclick='approve()' data-approve='$order' id='approve'>undo </a> ");
    }else {
      return self::failure();
    }
  }
  public static function decline_order() {
    $connection = DatabaseConnection::dbConnect();
    $order =  self::get('order');
    $sql = "UPDATE park_orders SET `status` = 'declined' WHERE id = $order";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      return self::success("Order Declined successfully");
    }else {
      return self::failure();
    }
  }
  public static function undo_approval() {
    $connection = DatabaseConnection::dbConnect();
    $order =  self::post('order');
    $sql = "UPDATE park_orders SET `status` = 'approved' WHERE id = $order";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      return self::success("Action undone successfully");
    }else {
      return self::failure();
    }
  }
  public static function undo_cancel_approval() {
    $connection = DatabaseConnection::dbConnect();
    $order =  self::post('order');
    $sql = "UPDATE park_orders SET `status` = 'pending' WHERE id = $order";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      return self::success("Action undone successfully");
    }else {
      return self::failure();
    }
  }
  public static function get_package_by_id(){
    $connection = DatabaseConnection::dbConnect();
    $package_id = self::get('package');
    $sql = "SELECT * FROM packages WHERE id = $package_id";
    $result = mysqli_query($connection, $sql);
    if(!empty($result)) {
      while($data = mysqli_fetch_assoc($result)) {
        self::$packageName = $data['name'];
        self::$packageCost = $data['price'];
        self::$packageId   = $data['id'];
        self::$packageDesc = $data['description'];
      }
    }
  }
  public static function add_package() {
    $connection = DatabaseConnection::dbConnect();
    $name = self::post('name');
    $price = self::post('price');
    $tourism_id = self::post('tourism_id');
    $description = self::post('description');
    $sql = "INSERT INTO packages (price, name, description, national_park_id) VALUES ('$price', '$name', '$description', '$tourism_id')";
    $checkpoint = "SELECT id FROM packages WHERE name = '$name'";
    $check = mysqli_query($connection, $checkpoint);
    if (mysqli_num_rows($check) > 0) {
      $getID = mysqli_fetch_assoc($check);
      $pkId = $getID['id'];
      echo self::failure("Package name already exists. <br/> Please choose a different name or <a href='action-center?action=edit&package=$pkId' class='b-link font-weight-bold'>Rename</a> the existing package.");
      return false;
    }else {
      mysqli_query($connection, $sql);
      if(mysqli_affected_rows($connection) > 0) {
        echo self::success("Package added successfully");
      }else {
        echo self::failure();
      }
    }
  }
  public static function num_of_packages() {
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT COUNT(id) FROM packages";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['COUNT(id)']; 
  }
  public static function edit_package() {
    $connection = DatabaseConnection::dbConnect();
    $id = self::post('id');
    $name = self::post('name');
    $price = self::post('price');
    $desc = self::post('desc');
    $sql = "UPDATE packages SET price = $price, name = '$name', description = '$desc' WHERE id = $id";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      echo self::success('Package Details Updated Succefully');
    }else {
      echo self::failure();
    }
  }
  public static function delete_package() {
    $connection = DatabaseConnection::dbConnect();
    $id = self::post('id');
    $sql = "UPDATE packages SET `status` = '1' WHERE id = $id";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      echo self::success("Package Deleted successfully! <a href='javascript:void(0)' class='btn btn-primary btn-sm' onclick='cancelDelete()' data-package='$id' id='cancel'>undo </a> ");
    }else {
      echo self::failure();
    }
  }
  public static function undo_package_delete() {
    $connection = DatabaseConnection::dbConnect();
    $id = self::post('id');
    $sql = "UPDATE packages SET status = '0' WHERE id = $id";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      echo self::success("Action undone successfully");
    }else {
      echo self::failure();
    }
  }
}
//undo order approval action
if (isset($_POST['approve'])) {
  echo Tourism::undo_approval();
}
//undo cancle approval action
if(isset($_POST['cancel'])) {
  echo Tourism::undo_cancel_approval();
}
//add package
if(isset($_POST['action']) && $_POST['action'] == 'add') {
  Tourism::add_package();
}
//update packages
if(isset($_POST['action']) && $_POST['action'] == 'save') {
  Tourism::edit_package();
}
//delete a package
if(isset($_POST['action']) && $_POST['action'] == 'delete') {
  Tourism::delete_package();
}
//undo the package delete action
if(isset($_POST['action']) && $_POST['action'] == 'cancel') {
  Tourism::undo_package_delete();
}


class User
{
  use getData;
  public function __construct()
  {
    
  }
  public static function isLoggedIn() {
    session_start();
    if (!isset($_SESSION['username'])) {
      self::redirect('index.php');
    }
  }
  public static function userName() {
    return $_SESSION['username'];
  }
}
