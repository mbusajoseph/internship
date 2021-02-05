<?php
include 'vendor/autoload.php';
/**
 * 
 */
use AfricasTalking\SDK\AfricasTalking;

class menuCOntroller
{
	
	public static function mainMenu()
	{
		$response = "Welcome to Uganda Tourism services";
        $response .= "\n1. National Park Visit";
        // $response .= "\n2. Get package info";
        HelperClass::render($response);
	}


	public static function nationalParks()
	{

		$connection = DatabaseConnection::dbConnect();

		mysqli_query($connection, "CREATE TABLE IF NOT EXISTS national_parks(id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50) NOT NULL, location VARCHAR(50) NOT NULL, description TEXT NULL)");

		$readsql = "SELECT * FROM `national_parks`";

		$results = mysqli_query($connection,$readsql);

		$response = "Select A national Park";

		while ($data = mysqli_fetch_assoc($results)) {

			$response .= "\n".$data['id'].". ".$data['name'];

		}

		mysqli_close($connection);
		HelperClass::render($response);
	}

		


	public static function package($national_park_id)
	{

		$connection = DatabaseConnection::dbConnect();	

		mysqli_query($connection, "CREATE TABLE IF NOT EXISTS packages(id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT, price VARCHAR(10) NOT NULL, description TEXT NULL, name VARCHAR(50) NOT NULL UNIQUE, national_park_id INT(10) NOT NULL, FOREIGN KEY (national_park_id)  REFERENCES national_parks(id) )");
	 	 

		$read = "SELECT * FROM `packages` WHERE national_park_id = '$national_park_id' ";

		$answer = mysqli_query($connection,$read);
		$check = mysqli_query($connection,$read);

		$results = mysqli_fetch_assoc($check);

		if (empty($results))
			HelperClass::endSession("There are no packages on the selected option");
		 

		$response = "Select package";

		while ($work = mysqli_fetch_assoc($answer)) {

			$response .= "\n".$work['id'].". ".$work['name']." (UGX: ".number_format($work['price']).")";

		}
		
		mysqli_close($connection);

		HelperClass::render($response);
	}

	public static function saveParkOrder($data,$phoneNumber)
	{		 

		$conn = DatabaseConnection::dbConnect();

		mysqli_query($conn,"CREATE TABLE IF NOT EXISTS park_orders(id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT, package_id INT(10) NOT NULL, status VARCHAR(10) NOT NULL DEFAULT 'pending', phone_number VARCHAR(15) NOT NULL, date_ordered DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (package_id) REFERENCES packages(id) )");

		 $result = mysqli_query($conn, "INSERT INTO park_orders(package_id,phone_number)VALUES('$data[3]','$phoneNumber')");

		 $last_id = mysqli_insert_id($conn);

		 $sms = "Your tourism order No. ".$last_id." has been recieved, our customer service person will call you on +256755205108 to confirm it Thank you";

		 menuCOntroller::sendSms($sms,$phoneNumber);

		 HelperClass::endSession("Thank you for placing your order, Our customer service person will call you to confirm.");		 
		 
	}


	public static function varification($data)
	{

		$connection = DatabaseConnection::dbConnect();

		$answer = mysqli_query($connection,"SELECT * FROM `packages` WHERE id = '$data[3]' LIMIT 1");

		$results = mysqli_fetch_assoc($answer);

		$response = "You have selected ".$results['name']." (UGX: ".number_format($results['price']).") Choose \n1. To Confirm \n2. Get package info";

		HelperClass::render($response);

	}

	public static function sendSMSofInfoToCustomer($data,$phoneNumber)
	{

		$connection = DatabaseConnection::dbConnect();

		$answer = mysqli_query($connection,"SELECT * FROM `packages` WHERE id = '$data[3]' LIMIT 1");

		$results = mysqli_fetch_assoc($answer);

		$response = "You have selected ".$results['name']." (UGX: ".number_format($results['price']).") check package info in SMS\n Thank you";

		$sms = $results['name']." (UGX: ".number_format($results['price']).") \n ".$results['description'];

		menuCOntroller::sendSms($sms,$phoneNumber);

		HelperClass::render($response);

	}


	public static function sendSms($message,$phone_number)
	{
		$username = 'tourism';

		$apiKey   = '702a6cd4e27a0ec248f9a713f623ede64f39ab17db0302beea0df28c234159dc';
		
		$AT       = new AfricasTalking($username, $apiKey);

		// Get one of the services
		$sms      = $AT->sms();

		// Use the service
		$result   = $sms->send([
		    'to'      => $phone_number,
		    'message' => $message
		]);
	}
}
	