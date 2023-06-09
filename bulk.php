<?php
session_start();
include("db_connect.php");

if (isset($_COOKIE['adminid']) && $_COOKIE['adminemail']) {
	$adminid = $_COOKIE['adminid'];
	$adminemail = $_COOKIE['adminemail'];

	$sqluser = "SELECT * FROM Administrator WHERE Password='$adminid' && Email='$adminemail'";

	$retrieved = mysqli_query($db, $sqluser);
	while ($found = mysqli_fetch_array($retrieved)) {
		$firstname = $found['Firstname'];
		$Lastname = $found['Lastname'];
		$id = $found['id'];
	}
} else {
	header('location:index.php');
	exit;
}


if (isset($_GET['ids'])) {
	$id = $_GET['ids'];
	$query = "SELECT Name,Type,Size,content FROM Files WHERE id='$id' ";
	$result = mysqli_query($db, $query) or die('Error, query failed');
	list($name, $type, $content) = mysqli_fetch_array($result);
	$path = 'media/' . $name;
	$size = filesize($path);
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header("Content-length:" . $size);
	header("Content-type:" . $type);
	header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	ob_clean();
	flush();
	readfile('media/' . $name);
	mysqli_close($db);
	exit;
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Bulk Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>


	<!-- //the next plugin link below are for date -->
	<link rel="stylesheet" href="css/zebra_datepicker.min.css" type="text/css">

</head>

<?php if (isset($_SESSION['Import'])) { ?>
	<script type="text/javascript">
		$(document).ready(function() {
			swal({
					title: "Successfully",
					text: "File uploaded successfully",
					type: "success",
					showCancelButton: true,
					confirmButtonColor: "green",
					confirmButtonText: "OK!",
					closeOnConfirm: true,
					closeOnCancel: true,
					buttonsStyling: false
				},
				function(isConfirm) {
					if (isConfirm) {
						window.location = "admin.php";
					} else {
						window.location = "bulk.php";
					}
				});

		});
	</script>
<?php session_destroy();
} ?>



<script type="text/javascript">
	$(document).on("click", ".Open-Enumeration", function() {

		$(".modal-body #Enumeration").html('<img src="ajax-loader.gif" /> &nbsp;REDIRECTING PLEASE WAIT ...');
		setTimeout(' window.location.href = "update_payer.php"; ', 3000);

	});


	$(document).on("click", ".Open-groups", function() {

		$(".modal-body #groupss").html('<img src="ajax-loader.gif" /> &nbsp;REDIRECTING PLEASE WAIT ...');
		setTimeout(' window.location.href = "groups_.php"; ', 3000);

	});
</script>
<body class="cbp-spmenu-push">
	<div class="main-content">
		<?php include("./navigation.php");
		include("./imports.php"); ?>
		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<div class="sticky-header header-section">
			<div class="header-left">
				<!--toggle button start-->
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">


				<!--search-box-->

				<div class="profile_details">
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">
									<span class="prfil-img">
										<img src='admin/images/profile.png' height='50px' width='50px' alt=''>
									</span>
									<div class="user-name">
										<p style="color:#1D809F;"><?php if (isset($Lastname)) {
																		echo "<strong>" . $firstname . " " . $Lastname . " </strong>";
																	} ?>
											<img src='admin/images/dot.png' height='15px' width='15px' alt=''>
										</p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>
								</div>
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li>
									<a data-toggle='modal' data-id='<?php echo $id; ?>' href='#Updatepicture' class='open-Updatepicture'><i class="fa fa-user"></i>Change profile picture</a>
								</li>
								<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page" style="margin-top:0%">


			</div>
			<div class="charts">
				<div class="mid-content-top charts-grids">

					<div class="middle-content">
						<h4 class="title">

						</h4>
						<!-- start content_slider -->




						<div class="middle-content">

							<table id="example" class="display nowrap" style="width:100%">
								<thead>
									<tr>
										<th>Bulk registration upload from Excel</th>

										<th>&nbsp;</th>

										<?php

										echo "<th><a href='bulk.php?ids=1'> <i class='fa fa-download'></i></a>
										
										</th>";
										// &nbsp;<a href='groups_.php'> <i class='fa fa-refresh'></i></a>&nbsp;<a href='administrator.php'> <i class='fa fa-close'></i></a>

										?>

									</tr>
								</thead>
								<tbody>

								</tbody>

							</table>



						</div>
					</div>
					<!--//sreen-gallery-cursual---->
				</div>
			</div>
			<div class="charts">
				<div class="mid-content-top charts-grids">

					<div class="alert alert-success">
						<i class="fa fa-info-circle"></i>&nbsp;Ensure that the file upload is in CSV Format Otherwise it will not save
					</div>
					<!--//sreen-gallery-cursual---->
				</div>
			</div>
			<div class="charts">
				<div class="mid-content-top charts-grids" style="background-color:#00ACED">
					<div class="middle-content">
						<h4 class="title">
							<i class="fa fa-info-circle"></i>&nbsp;Steps to save the file!

						</h4>
						<!-- start content_slider -->
						<div class="container">
							<ol>
								<li>Download the sample file format below on the mail icon or on top of the to the right corner of this page on a downoad icon</li>
								<li>Fill the employee details in the columns of the file</li>
								<li>Save the file as CSV not as xls </li>
								<li>Upload the file</li>
							</ol>
						</div>
						SAMPLE FORMAT&nbsp;<a href='bulk.php?ids=1'><i class="fa fa-envelope"></i></a>&nbsp;Note:The web as file type will only be noted on excel files download from this application


					</div>
					<!--//sreen-gallery-cursual---->
				</div>
			</div>
			<div class="charts">
				<div class="mid-content-top charts-grids">


					<!-- start content_slider -->


					<form method="post" action="upload.php" enctype='multipart/form-data'>
						<p style="margin-bottom:10px;">

						</p>
						<p style="margin-bottom:10px;">
							<input name='file' type='file' id='file'>
						</p>

						<button class="btn btn-success" name="bulk" id="btns3">&nbsp;
							<span class="glyphicon glyphicon-import" style="color: #F0F0F0"> </span> &nbsp;Import </button>



					</form>




					<!--//sreen-gallery-cursual---->
				</div>
			</div>









		</div>
	</div>
	<!--footer-->
	<!-- <div class="footer">
		<p> <a href="#" target="">Design and Developed by mvumapatrick@gmail.com</a></p>
	</div> -->
	<!--//footer-->
	</div>


	<!-- Classie --><!-- for toggle left push menu script -->
	<script src="admin/js/classie.js"></script>
	<script>
		var menuLeft = document.getElementById('cbp-spmenu-s1'),
			showLeftPush = document.getElementById('showLeftPush'),
			body = document.body;

		showLeftPush.onclick = function() {
			classie.toggle(this, 'active');
			classie.toggle(body, 'cbp-spmenu-push-toright');
			classie.toggle(menuLeft, 'cbp-spmenu-open');
			disableOther('showLeftPush');
		};


		function disableOther(button) {
			if (button !== 'showLeftPush') {
				classie.toggle(showLeftPush, 'disabled');
			}
		}
	</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->

	<!--scrolling js-->
	<script src="admin/js/jquery.nicescroll.js"></script>
	<script src="admin/js/scripts.js"></script>
	<!--//scrolling js-->

	<!-- //for index page weekly sales java script -->

	<!-- // the two links below are for date picker calendar -->
	<script type="text/javascript" src="js/zebra_datepicker.min.js"></script>
	<script type="text/javascript" src="js/examples.js"></script>
	<!-- //the link below used for form slidng on click -->
	<script src="js/index.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="admin/js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->


</body>

</html>