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
		  body{
		  	background:#fff;
		  }
#bg {
  width: 1000px;
  height: 432px;
 
  margin:60px;
 	float: left; 
 		
}

#id {
  width:312px;
  height:432px;
  position:absolute;
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
  background: url('./images/bg4.png');
  background-repeat:repeat-x;
  background-size: 312px 432px;
  opacity: 1;
  z-index: -1;
  text-align:center;
  border:1px solid #000;
 
}
 .container{
		  	font-size: 12px;
		  	font-family: sans-serif;
		    
		  }
		 .id-1{
		  	transition: 0.4s;
		  	width:312px;
		  	height:432px;
		  	background: #FFFFFF;
		  	font-size: 16px;
		  	font-family: sans-serif;
		  	float: left;
		  	margin:auto;		  	
		  	margin-left:370px;
		  	
			

		  	
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
					$division = $found['Division'];
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
					if (filter_var($signature, FILTER_VALIDATE_URL)) {
						$imageSrc1 = $signature;
					} else {
						if ($signature != "")
							$imageSrc1 = 'images/'. $signature;
						else 
							$imageSrc1 = "admin/images/signature.png";
					}

				?>
				</center>
				<?php
             	 	if($imageSrc!=""){          
						echo "<img src='images/$profilePhoto' height='110px' width='110px' alt='' style='margin-left:20%; margin-top:-3%;'>";
   
									    }
								else{
									echo"<img src='admin/images/profile.jpg' height='150px' width='160px' alt='' style='border: 2px solid black;'>";	   
														     	
									} 
             	 	 ?>              <div class="container" align="center">
      
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
							
	  <div style="position: absolute; left: 26%; top: 69%; margin-left:0%; margin-top:-3%; font-size:22px; font-family: 'Lora';">
	  <span style="font-size:24px;"><?php if(isset($firstName)){echo $firstName;} ?></span></div>
	  <div style="position: absolute; left: 27%; top: 67%; margin-left:0%; margin-top:-3%; font-size:18px; font-family: 'Lora';">
  <span><br>
  
  <br>

</div>
<span style="position: absolute; left: 55%;right: 10%;top: 93.5%; font-size:8px; font-family: 'Lora';"><?php if(isset($position)){echo $position;} ?></span>
<p style="margin-top:20%">&nbsp;</p>
<div style="margin-left: 40%; margin-top:10%; font-size:18px; font-family: 'Lora'; text-align:center;">
  <span style="font-size:9px;"><?php if(isset($firstName)){echo $firstName;} ?> <?php if(isset($lastName)){echo $lastName;} ?></span>
</div>

	  <p style="position: absolute; top: 0; left: 58%; margin-top:120%; font-size:9px; font-family: 'Lora';">ID NO. <?php if(isset($id)){ echo$id;} ?></p>
	 
		  <p style="margin-top:-4%">&nbsp;</p>
      	<p style="margin-top:-4%">&nbsp;</p>
       <p style="margin-top:-4%">&nbsp;</p>
	   <span class="vertical-text" style="position: absolute; top: 65%;white-space: pre-line"><?php if(isset($division)){ echo $division;} ?></span>
        

		  
      
              
			</div>
		</div>
		<div class="id-1">
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
					$division = $found['Division'];
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
					if (filter_var($signature, FILTER_VALIDATE_URL)) {
						$imageSrc1 = $signature;
					} else {
						if ($signature != "")
							$imageSrc1 = 'images/'. $signature;
						else 
							$imageSrc1 = "admin/images/signature.png";
					}

				?>
				</center>
				<?php
             	 	if($imageSrc!=""){          
						echo "<img src='images/$profilePhoto' height='110px' width='110px' alt='' style='margin-left:20%; margin-top:-3%;'>";
   
									    }
								else{
									echo"<img src='admin/images/profile.jpg' height='150px' width='160px' alt='' style='border: 2px solid black;'>";	   
														     	
									} 
             	 	 ?>              <div class="container" align="center">
      
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
	  <p style="margin-top:-4%">&nbsp;</p>
							
	  <div style="position: absolute; left: 26%; top: 69%; margin-left:0%; margin-top:-3%; font-size:22px; font-family: 'Lora';">
	  <span style="font-size:24px;"><?php if(isset($firstName)){echo $firstName;} ?></span></div>
	  <div style="position: absolute; left: 27%; top: 67%; margin-left:0%; margin-top:-3%; font-size:18px; font-family: 'Lora';">
  <span><br>
  
  <br>

  </div>
<span style="position: absolute; left: 55%;right: 10%;top: 93.5%; font-size:8px; font-family: 'Lora';"><?php if(isset($position)){echo $position;} ?></span>
<p style="margin-top:20%">&nbsp;</p>
<div style="margin-left: 40%; margin-top:10%; font-size:18px; font-family: 'Lora'; text-align:center;">
  <span style="font-size:9px;"><?php if(isset($firstName)){echo $firstName;} ?> <?php if(isset($lastName)){echo $lastName;} ?></span>
</div>
	  <p style="position: absolute; top: 0; left: 58%; margin-top:120%; font-size:9px; font-family: 'Lora';">ID NO. <?php if(isset($id)){ echo$id;} ?></p>
	 
		  <p style="margin-top:-4%">&nbsp;</p>
      	<p style="margin-top:-4%">&nbsp;</p>
       <p style="margin-top:-4%">&nbsp;</p>
	   <span class="vertical-text" style="position: absolute; top: 65%;white-space: pre-line"><?php if(isset($division)){ echo $division;} ?></span>
        

		  
      
              
			</div>
		</div>
	</div>

	</div>
</body>

</html>