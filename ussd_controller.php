<?php
include 'DatabaseHelper.php';
include 'HelperClass.php';
include 'menuCOntroller.php';

$phoneNumber = $_POST["phoneNumber"];

$text = $_POST["text"];//1*5*5*...

if (empty($text)) 
	$text = "0";

else

	$text = "0*".$text; 

$data = explode("*", $text);


$level = count($data);

switch ($level) {

	case 1:
		menuCOntroller::mainMenu();
		break;

	case 2:
	
		menuCOntroller::nationalParks();		 
		break;
		
	case 3:
		menuCOntroller::package($data[2]);
		break;

	case 4:

		menuCOntroller::varification($data);
		break;		

	case 5:

		if ($data[4] == 1) 
			menuCOntroller::saveParkOrder($data,$phoneNumber);

		if ($data[4] == 2) 
			menuCOntroller::sendSMSofInfoToCustomer($data,$phoneNumber);


		 
		
		break;
			
	default:
		# code...
		break;
}



