<?php
include 'DatabaseConnection.php';
$connection = DatabaseConnection::dbConnect();
$service_id = $_POST['select_tourism_id'];
$price = $_POST['price'];
$name = $_POST['name'];
$description = $_POST['description'];

$read = "INSERT INTO packages(price,name,national_park_id,description)VALUES('$price','$name','$service_id','$description')";

mysqli_query($connection,$read);

header("Location:tourism_centers.php");