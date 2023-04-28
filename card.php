<?php
session_start();
include("db_connect.php");
//require "vendor/autoload.php";
if (!isset($_COOKIE['adminid']) && $_COOKIE['adminemail']) {
	header('location:index.php');
	exit;
}


//$serial="0001";
//$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
//$code = $Bar->getBarcode($serial, $Bar::TYPE_CODE_128);
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

			margin: 60px;
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

		#id::before {
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
			background: url('images/bg1.png');
			/*if you want to change the background image replace logo.png*/
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
	</style>
</head>
<?php
include_once("db_connect.php");

$sqluse = "SELECT * FROM Inorg WHERE id=1 ";
$retrieve = mysqli_query($db, $sqluse);
$numb = mysqli_num_rows($retrieve);
while ($foundk = mysqli_fetch_array($retrieve)) {
	$profile = $foundk['pname'];
	$name = $foundk['name'];
}
?>

<body>
	<script type="text/javascript">
		window.print();
		// setTimeout(function() {
		// 	window.close()
		// }, 5000)
	</script>

	<div id="bg">
		<div id="id">
			<br><br><br><br><br><br><br>
			<center>
				<?php
				$idx = $_GET['id'];
				$sqlmember = "SELECT * FROM Employee WHERE id='$idx' ";
				$retrieve = mysqli_query($db, $sqlmember);
				$count = 0;
				while ($found = mysqli_fetch_array($retrieve)) {
					$id = $found['ID'];
					$firstName = $found['FirstName'];
					$middleName = $found['MiddleName'];
					$lastName = $found['LastName'];
					$suffix = $found['Suffix'];
					$gender = $found['Gender'];
					$position = $found['Position'];
					$areaOfAssignment = $found['AreaOfAssignment'];
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
				}

					if (filter_var($profilePhoto, FILTER_VALIDATE_URL)) {
						$imageSrc = $profilePhoto;
					} else {
						if ($profilePhoto != "")
							$imageSrc = 'images/'. $profilePhoto;
						else 
							$imageSrc = "admin/images/profile.jpg";
					}

				?> 
				<img src="<?= $imageSrc ?>" height="150px" width="160px" alt="Profile photo" style="border: 2px solid black;">
				</center>
			<div class="container" align="center">
				<center>
					<p style="margin-top:-4%">&nbsp;</p>
					<p style="font-weight: bold;margin-top:-3%;font-size:27px;"><?php if (isset($firstName)) {
																					$fullName = $firstName . " " . $lastName;
																					echo $fullName;
																				} ?></p>
					<p style="margin-top:-4%">&nbsp;</p>
					<p style="margin-top:-4%">&nbsp;</p>
					<p style="margin-top:-4%">&nbsp;</p>
					<p style="font-weight: bold;margin-top:-4%;font-size:14px;">ID NO:<?php if (isset($id)) {
																							echo $id;
																						} ?></p>
					<p style="font-weight: bold;margin-top:-3%"><?php if (isset($position)) {
																	echo $position;
																} ?></p>
					<p style="font-weight: bold;margin-top:-3%"><?php if (isset($areaOfAssignment)) {
																	echo $areaOfAssignment;
																} ?></p>
				</center>

			</div>
		</div>
		<div class="id-1">

			<p style="margin-top:2%; text-align:left;margin-left:10px;font-size:20px;">Address:</p>
			<div style="margin-top:-5%;border:1px solid #000;margin-left:10px; width: 90%;">
				<p style="margin-left:10px;"><?php if (isset($address)) {echo $address;} ?></p>
			</div>
			<div style="margin-top:1%;border:1px solid #000;margin-left:10px; width: 90%;height:30%;">
				<p style="text-indent: 30px;text-decoration: underline;">BIRTHDATE</p>
				<p style="margin-top:-12%;text-decoration: underline; text-indent: 160px;">BLOOD TYPE</p>
				<p style="margin:10px;border:1px solid #000;width: 45%;margin-top:-5%;padding:2px;text-align:center;"><?php if (isset($birthdate)) {echo $birthdate;} ?></p>
				<p style="margin:180px;border:1px solid #000;width: 20%;margin-top:-12%;padding:2px;text-align:center;"><?php if (isset($bloodtype)) {echo $bloodtype;} ?></p>
				<p style="text-indent: 35px;text-decoration: underline; margin-top:-60%;">TIN NO.</p>
				<p style="margin-top:-12%;text-decoration: underline; text-indent: 140px;">PHILHEALTH NO.</p>
				<p style="margin:10px;border:1px solid #000;width: 40%;margin-top:-5%;padding:2px;text-align:center;"><?php if (isset($tinNumber)) {echo $tinNumber;} ?></p>
				<p style="margin:140px;border:1px solid #000;width: 47%;margin-top:-12%;padding:2px;text-align:center;"><?php if (isset($philhealth)) {echo $philhealth;} ?></p>
			</div>
			<div style="margin-top:2%;border:1px solid #000;margin-left:10px; width: 90%;height:15%;">
				<p style="margin-left:10px;margin-top:1%;">Person to notify incase of emergency:</br>
					Name: <?php if (isset($nameOfPersonToNotify)) {echo $nameOfPersonToNotify;} ?></br>
					Tel No: <?php if (isset($cpNumber)) {echo $cpNumber;} ?></p>
			</div>

			<p style="padding:2px;text-align:center;font-size:11px;margin-top:1%">This is to certify the person whose picture and signature appear hereon is an employee of DOH-RO1, SFLU</p>

			<hr align="center" style="border: 1px solid black;width:90%;margin-top:12%">
			</hr>
			<p align="center" style="margin-top:-2%;font-size:12px;">PAULA PAZ M. SYDIONGCO, MD, MPH, MBA, CESO IV <br>Director IV</p>

		</div>
	</div>

	</div>
</body>

</html>