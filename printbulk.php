<?php
session_start();
include("db_connect.php");
require "vendor/autoload.php";
if (!isset($_COOKIE['adminid']) && $_COOKIE['adminemail']) {
	header('location:index.php');
	exit;
}

$fromm = $_POST['startpoint'];
$too = $_POST['endpoint'];
$startsat = $_POST['receiptrange'];


$_SESSION['from'] = $fromm;
$_SESSION['to'] = $too;
$_SESSION['receiptrange'] = $startsat;

$from = $_SESSION['from'];
$to = $_SESSION['to'];
$startsat = $_SESSION['receiptrange'];

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
	<title>card</title>
	<style>
		body {
			background: #fff;
		}

		#bg {
			width: 1000px;
			height: 432px;

			margin: 30px;
			float: left;

		}

		#id {
			width: 312px;
			height: 432px;
			position: absolute;
			opacity: 0.88;
			font-family: sans-serif;

			transition: 0.4s;
			background-color: #FFFFFF;
			border-radius: 2%;

		}

		@font-face {
			font-family: 'Barlow';
			src: url('bootstrap/fonts/barlow-regular.ttf');
			font-weight: normal;
		}

		@font-face {
			font-family: 'Lora';
			src: url('bootstrap/fonts/lora-regular.ttf');
			font-weight: normal;
		}

		#id::before {
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
			background: url('./images/bg1.png');
			background-repeat: repeat-x;
			background-size: 312px 432px;
			opacity: 1;
			z-index: -1;
			text-align: center;
			border: 1px solid #000;

		}

		.container {
			font-size: 12px;
			font-family: sans-serif;

		}

		.id-1 {
			transition: 0.4s;
			width: 312px;
			height: 432px;
			background: #FFFFFF;
			font-size: 16px;
			font-family: sans-serif;
			float: left;
			margin: auto;
			margin-left: 370px;
			border-radius: 2%;
			border: 1px solid #000;


		}

		.vertical-text {
  writing-mode: vertical-rl;
  transform: rotate(180deg);
  position: absolute;
  left: 0.7%;
  bottom: 0%; /* Adjust to desired value */
   /* Adjust to desired value */
  font-size: 10px;
  font-family: 'Barlow';
  font-weight: bold;
  letter-spacing: 1px;
  color: green;
  display: block; /* create a block-level element */
    width: 60px; /* set the width to your desired size */
    overflow: hidden; /* hide the overflow */
    text-overflow: ellipsis; /* add an ellipsis (...) to indicate truncated text */
    white-space: nowrap;
}
	</style>
</head>

<body>
	<script type="text/javascript">
		window.print();
	</script>

	<?php


	$sqlmember = "SELECT * FROM Employee WHERE ID>=$from && ID<=$to";
	$retrieve = mysqli_query($db, $sqlmember);
	$count = 0;
	while ($found = mysqli_fetch_array($retrieve)) {
		$id = $found['ID'];
		$employeeID = $found['Employee_ID'];
		$firstName = $found['FirstName'];
		$middleName = $found['MiddleName'];
		$lastName = $found['LastName'];
		$suffix = $found['Suffix'];
		$gender = $found['Gender'];
		$position = $found['Position'];
		$areaOfAssignment = $found['AreaOfAssignment'];
		$division = $found['Division'];
		$regular_suballotment = $found['Regular_SubAllotment'];
		$contractDuration_start = $found['ContractDuration_start'];
		$contractDuration_end = $found['ContractDuration_end'];
		$inclusiveDateOfEmployment = $found['InclusiveDateOfEmployment'];
		$salaryGrade = $found['SalaryGrade'];
		$salary = $found['Salary'];
		$prc = $found['PRC'];
		$address = $found['Address'];
		$birthdate = $found['Birthdate'];
		$placeOfBirth = $found['PlaceOfBirth'];
		$nameOfPersonToNotify = $found['NameOfPersonToNotify'];
		$bloodtype = $found['Bloodtype'];
		$tinNumber = $found['TINNumber'];
		$philhealth = $found['Philhealth'];
		$sss = $found['SSS'];
		$pagIbigNumber = $found['PagIbigNumber'];
		$cpNumber = $found['CPNumber'];
		$emailAddress = $found['EmailAddress'];
		$signature = $found['Signature'];
		$profilePhoto = $found['ProfilePhoto'];
		$typeOfEmployment = $found['TypeOfEmployment'];

		if (filter_var($profilePhoto, FILTER_VALIDATE_URL)) {
			$imageSrc = $profilePhoto;
		} else {
			if ($profilePhoto != "")
				$imageSrc = 'images/' . $profilePhoto;
			else
				$imageSrc = "admin/images/profile.jpg";
		}
		if (filter_var($signature, FILTER_VALIDATE_URL)) {
			$signaturePhoto = $signature;
		} else {
			if ($signature != "")
				$signaturePhoto = 'images/' . $signature;
			else
				$signaturePhoto = "admin/images/signature.png";
		}



		if ($typeOfEmployment == "Contractual"){
			include "./printing/contractual.php";
		}else{
			include "./printing/regular.php";
		}

	?>

	<?php } ?>

</body>

</html>