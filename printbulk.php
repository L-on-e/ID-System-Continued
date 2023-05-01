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
<link rel="stylesheet" href="css/font.css">
	<title>card</title>
	<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

		body {
			background: #fff;
			font-family: 'Poppins', sans-serif;
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

<body>
	<script type="text/javascript">
		window.print();
		setTimeout(function() {
			window.close()
		}, 750)
	</script>

	<?php
	$sqluse = "SELECT * FROM Inorg WHERE id=1 ";
	$retrieve = mysqli_query($db, $sqluse);
	$numb = mysqli_num_rows($retrieve);
	while ($foundk = mysqli_fetch_array($retrieve)) {
		$profileK = $foundk['pname'];
		$name = $foundk['name'];
	}


	$sqlmember = "SELECT * FROM Users WHERE id>=$from && id<=$to";
	$retrieve = mysqli_query($db, $sqlmember);
	$count = 0;
	while ($found = mysqli_fetch_array($retrieve)) {
		$title = $found['Mtitle'];
		$firstname = $found['Firstname'];
		$sirname = $found['Sirname'];
		$rank = $found['Ranks'];
		$id = $found['id'];
		$dept = $found['Department'];
		$contact = $found['Email'];
		$count = $count + 1;
		$get_time = $found['Time'];
		$time = time();
		$pass = $found['Staffid'];
		$names = $firstname . " " . $sirname;
		$profile = $found['Picname'];

		$serial = $id;
		//$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
		// $code = $Bar->getBarcode($serial, $Bar::TYPE_CODE_128);

	?>

		<div id="bg">
			<div id="id">
				<br><br><br><br><br><br><br>
				<center>
					<?php



					if ($profile != "") {
						echo "<img src='images/$profile' height='175px' width='200px' alt='' style='border: 2px solid black;'>";
					} else {
						echo "<img src='admin/images/profile.jpg' height='175px' width='200px' alt='' style='border: 2px solid black;'>";
					}
					?> </center>
				<div class="container" align="center">

					<p style="margin-top:-4%">&nbsp;</p>
					<p style="font-weight: bold;margin-top:-3%;font-size:27px;"><?php if (isset($names)) {
																					$namez = $title . ' ' . $names;
																					echo $namez;
																				} ?></p>
					<p style="margin-top:-4%">&nbsp;</p>
					<p style="margin-top:-4%">&nbsp;</p>
					<p style="margin-top:-4%">&nbsp;</p>
					<p style="font-weight: bold;margin-top:-11%;font-size:14px;">ID NO:<?php if (isset($pass)) {
																							echo $pass;
																						} ?></p>
					<p style="font-weight: bold;margin-top:-3%"><?php if (isset($rank)) {
																	echo $rank;
																} ?></p>
					<p style="font-weight: bold;margin-top:-3%"><?php if (isset($rank)) {
																	echo $rank;
																} ?></p>
					</center>
				</div>
			</div>
			<div class="id-1">

				<p style="margin-top:2%; text-align:left;margin-left:10px;font-size:20px;">Address:</p>
				<div style="margin-top:-5%;border:1px solid #000;margin-left:10px; width: 90%;">
					<p style="margin-left:10px;">Zone 3 Parian, San Fernando City, La Union</p>
				</div>
				<div style="margin-top:1%;border:1px solid #000;margin-left:10px; width: 90%;height:30%;">
					<p style="text-indent: 30px;text-decoration: underline;">BIRTHDATE</p>
					<p style="margin-top:-12%;text-decoration: underline; text-indent: 160px;">BLOOD TYPE</p>
					<p style="margin:10px;border:1px solid #000;width: 45%;margin-top:-5%;padding:2px;text-align:center;">October 9, 1989</p>
					<p style="margin:180px;border:1px solid #000;width: 20%;margin-top:-12%;padding:2px;text-align:center;">B</p>
					<p style="text-indent: 35px;text-decoration: underline; margin-top:-60%;">TIN NO.</p>
					<p style="margin-top:-12%;text-decoration: underline; text-indent: 140px;">PHILHEALTH NO.</p>
					<p style="margin:10px;border:1px solid #000;width: 40%;margin-top:-5%;padding:2px;text-align:center;">357-123-123</p>
					<p style="margin:140px;border:1px solid #000;width: 47%;margin-top:-12%;padding:2px;text-align:center;">05-000099244-2</p>
				</div>
				<div style="margin-top:2%;border:1px solid #000;margin-left:10px; width: 90%;height:15%;">
					<p style="margin-left:10px;margin-top:1%;">Person to notify incase of emergency:</br>
						Name: Nida Estepa</br>
						Tel No: 09614342355</p>
				</div>

				<p style="padding:2px;text-align:center;font-size:11px;margin-top:1%">This is to certify the person whose picture and signature appear hereon is an employee of DOH-RO1, SFLU</p>

				<hr align="center" style="border: 1px solid black;width:90%;margin-top:12%">
				</hr>
				<p align="center" style="margin-top:-2%;font-size:12px;">PAULA PAZ M. SYDIONGCO, MD, MPH, MBA, CESO IV <br>Director IV</p>

			</div>
		</div>
	<?php } ?>

</body>

</html>