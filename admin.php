<?php
session_start();
include("db_connect.php");
include "./imports.php";
if (isset($_COOKIE['adminid']) && $_COOKIE['adminemail']) {

  $userid = $_COOKIE['adminid'];
  $useremail = $_COOKIE['adminemail'];

  $sqluser = "SELECT * FROM Administrator WHERE Password='$userid' && Email='$useremail'";

  $retrieved = mysqli_query($db, $sqluser);
  while ($found = mysqli_fetch_array($retrieved)) {
    $firstname = $found['Firstname'];
    $Lastname = $found['Lastname'];
    $emails = $found['Email'];
    $id = $found['id'];
  }
} else {
  header('location:index.php');
  exit;
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="css/input1.css" />
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

  <script>
    $(document).ready(function() {
      $('#example').DataTable({


      });
    });
  </script>
  <script type="text/javascript">
    $(document).on("click", ".open-Delete", function() {
      var myValue = $(this).data('id');
      swal({
          title: "Are you sure?",
          text: "You want to remove this staff from the database!",
          type: "warning",
          showCancelButton: true,
          cancelButtonColor: "red",
          confirmButtonColor: "green",
          confirmButtonText: "Yes, remove!",
          cancelButtonText: "No, cancel!",
          closeOnConfirm: false,
          closeOnCancel: false,
          buttonsStyling: false
        },
        function(isConfirm) {
          if (isConfirm == true) {
            var vals = myValue;
            $.ajax({
              type: 'POST',
              url: "upload.php",
              data: {
                Valuedel: vals
              },
              success: function(result) {
                if (result == "ok") {
                  swal({
                      title: "Deleted!",
                      text: "Staff has been deleted from the database.",
                      type: "success"
                    },
                    function() {
                      location.reload();
                    }
                  );
                }

              }
            });
          } else {
            swal("Cancelled", "This user is safe :)", "error");
          }
        });

    });
  </script>

  <script type="text/javascript">
    $(document).on("click", ".open-Updatepicture", function() {
      var myTitle = $(this).data('id');
      $(".modal-body #bookId").val(myTitle);

    });
  </script>
</head>
<script type="text/javascript">
  $(document).on("click", ".open-updateProfile", function() {

    var id = $(this).data('id');
    var firstname = $(this).data('firstname');
    var middleName = $(this).data('middlename');
    var lastName = $(this).data('lastname');
    var suffix = $(this).data('suffix');
    var gender = $(this).data('gender');
    var position = $(this).data('position');
    var division = $(this).data('division');
    var areaOfAssignment = $(this).data('areaofassignment');
    var regular_suballotment = $(this).data('regular_suballotment');
    var contractDuration_start = $(this).data('contractduration_start');
    var contractDuration_end = $(this).data('contractduration_end');
    var inclusiveDateOfEmployment = $(this).data('inclusivedateofemployment');
    var salaryGrade = $(this).data('salarygrade');
    var salary = $(this).data('salary');
    var prc = $(this).data('prc');
    var address = $(this).data('address');
    var birthdate = $(this).data('birthdate');
    var placeOfBirth = $(this).data('placeofbirth');
    var nameOfPersonToNotify = $(this).data('nameofpersontonotify');
    var bloodtype = $(this).data('bloodtype');
    var tinNumber = $(this).data('tinnumber');
    var philhealth = $(this).data('philhealth');
    var sss = $(this).data('sss');
    var pagIbigNumber = $(this).data('pagibignumber');
    var cpNumber = $(this).data('cpnumber');
    var emailAddress = $(this).data('emailaddress');
    var typeOfEmployment = $(this).data('typeofemployment');
    var profilephoto = $(this).data('profilephoto');
    var signature = $(this).data('signature');

    $(".modal-title #firstname").val(firstname);
    $(".modal-body #firstname").val(firstname);
    $(".modal-body #middlename").val(middleName);
    $(".modal-body #lastname").val(lastName);
    $(".modal-body #suffix").val(suffix);
    $(".modal-body #gender").val(gender);
    $(".modal-body #position").val(position);
    $(".modal-body #division").val(division);
    $(".modal-body #areaofassignment").val(areaOfAssignment);
    $(".modal-body #regular_suballotment").val(regular_suballotment);
    $(".modal-body #contractduration_start").val(contractDuration_start);
    $(".modal-body #contractduration_end").val(contractDuration_end);
    $(".modal-body #inclusivedateofemployment").val(inclusiveDateOfEmployment);
    $(".modal-body #salarygrade").val(salaryGrade);
    $(".modal-body #salary").val(salary);
    $(".modal-body #prc").val(prc);
    $(".modal-body #address").val(address);
    $(".modal-body #birthdate").val(birthdate);
    $(".modal-body #placeofbirth").val(placeOfBirth);
    $(".modal-body #nameofpersontonotify").val(nameOfPersonToNotify);
    $(".modal-body #bloodtype").val(bloodtype);
    $(".modal-body #tinnumber").val(tinNumber);
    $(".modal-body #philhealth").val(philhealth);
    $(".modal-body #sss").val(sss);
    $(".modal-body #pagibignumber").val(pagIbigNumber);
    $(".modal-body #cpnumber").val(cpNumber);
    $(".modal-body #emailaddress").val(emailAddress);
    $(".modal-body #typeofemployment").val(typeOfEmployment);
    $(".modal-body #employeeid").val(id);
    updateAreaOfAssignmentDropdown(areaOfAssignment);
  });
</script>
<?php if (isset($_SESSION['memberadded'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
        title: "Successful!",
        text: "Admin added successfully!",
        type: "success"
      });
    });
  </script>

<?php
  session_destroy();
} ?>
<?php if (isset($_SESSION['memberexist'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      sweetAlert("Oops...", "There is arleady a staff with those details in the database", "error");
    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['emptytextboxes'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      sweetAlert("Oops...", "You did not fill all the textboxes on the form", "error");
    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['tutor'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
          title: "User removed successfully",
          text: "Do you want to remove another one?",
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
            window.location = "administrator.php?id=2";
          } else {
            window.location = "administrator.php";
          }
        });

    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['cat'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      sweetAlert("Oops...", "This category arleady in the system", "error");
    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['category'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
          title: "Category added successfully",
          text: "Do you want to add another one?",
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
            window.location = "administrator.php?id=3";
          } else {
            window.location = "administrator.php";
          }
        });

    });
  </script>
<?php
  session_destroy();
}
?>
<?php if (isset($_SESSION['del'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
          title: "Category Deleted",
          text: "Do you want to delete another one?",
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
            window.location = "administrator.php?id=4";
          } else {
            window.location = "administrator.php";
          }
        });

    });
  </script>
<?php
  session_destroy();
}
?>




<?php if (isset($_SESSION['pass'])) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      swal({
        title: "Successful!",
        text: "Employee details edited!",
        type: "success"
      });

    });
  </script>
<?php session_destroy();
} ?>

<div id="updateProfile" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;">
          <center>
            Edit details of <input style="border: none;background:#222d32" type="text" id="firstname" value="" readonly="readonly" />
          </center>
        </h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <form method="post" action="upload.php" enctype='multipart/form-data'>

            <div class="form first">
              <div class="details personal">
                <span class="title">Personal Details</span>
                <div class="fields">


                  <div class="input-field">
                    <label>First Name</label>
                    <input type="text" name="firstName" id="firstname">
                  </div>
                  <div class="input-field">
                    <label>Middle Name</label>
                    <input type="text" name="middleName" id="middlename">
                  </div>

                  <div class="input-field">
                    <label>Last Name</label>
                    <input type="text" name="lastName" id="lastname">
                  </div>

                  <div class="input-field">
                    <label>Suffix</label>
                    <input type="text" name="suffix" id="suffix">
                  </div>

                  <div class="input-field">
                    <label>Gender</label>
                    <select id="gender" name="gender" required>
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>

                  <div class="input-field">
                    <label>Birthdate</label>
                    <input type="date" name="birthdate" id="birthdate">
                  </div>

                  <div class="input-field">
                    <label>Place of Birth</label>
                    <input type="text" name="placeOfBirth" id="placeofbirth">
                  </div>

                  <div class="input-field">
                    <label>Address</label>
                    <input type="text" name="address" id="address">
                  </div>

                  <div class="input-field">
                    <label>Blood Type</label>
                    <select id="bloodtype" name="bloodtype">
                      <option value="">Select Blood Type</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                    </select>
                  </div>

                </div>
              </div>
              <div class="contact_info">
                <span class="title">Contact and Email</span>
              </div>
              <div class="fields">
                <div class="input-field">
                  <label>CP Number</label>
                  <input type="text" name="cpNumber" id="cpnumber">
                </div>

                <div class="input-field">
                  <label>Email Address</label>
                  <input type="text" name="emailAddress" id='emailaddress'>
                </div>

                <div class="input-field">
                  <label>Emergency Contact</label>
                  <input type="text" name="nameOfPersonToNotify" id="nameofpersontonotify">
                </div>
              </div>

              <div class="govId_Num">
                <span class="title">Government IDs and Numbers</span>

                <div class="fields">
                  <div class="input-field">
                    <label>PRC ID Number (if applicable):</label>
                    <input type="text" name="prc" id="prc">
                  </div>
                  <div class="input-field">
                    <label>TIN Number:</label>
                    <input type="text" name="tinNumber" id="tinnumber">
                  </div>
                  <div class="input-field">
                    <label>PHILHEALTH:</label>
                    <input type="text" name="philhealth" id="philhealth">
                  </div>
                  <div class="input-field">
                    <label>SSS:</label>
                    <input type="text" name="sss" id="sss">
                  </div>
                  <div class="input-field">
                    <label>PAGIBIG Number:</label>
                    <input type="text" name="pagibigNumber" id="pagibignumber">
                  </div>
                </div>
              </div>

              <div class="employment_info">
                <span class="title">Employment Information</span>

                <div class="fields">
                  <div class="input-field">
                    <label>Position</label>
                    <input type="text" name="position" id="position">
                  </div>


                  <div class="input-field">
                    <label>Division<label style="color:red">*</label></label>
                    <select id="division" name="division" onchange="updateAreaOfAssignmentDropdown()">
                      <option value="">Choose Division</option>
                      <option value="MANAGEMENT SUPPORT DIVISION">MANAGEMENT SUPPORT DIVISION</option>
                      <option value="LOCAL HEALTH SUPPORT DIVISION">LOCAL HEALTH SUPPORT DIVISION</option>
                      <option value="REGULATIONS, LICENSING AND ENFORCEMENT DIVISION">REGULATIONS, LICENSING AND ENFORCEMENT DIVISION</option>
                      <option value="REGIONAL DIRECTOR AND ASSISTANT REGIONAL DIRECTOR DIVISION">REGIONAL DIRECTOR AND ASSISTANT REGIONAL DIRECTOR DIVISION</option>
                    </select>
                  </div>

                  <div class="input-field">
                    <label>Area of Assignment<label style="color:red">*</label></label>
                    <select id="areaofassignment" name="areaOfAssignment">
                      <option value="">Choose Area of Assignment</option>
                    </select>
                  </div>



                  <div class="input-field">
                    <label>Regular/SubAllotment</label>
                    <select id="regular_suballotment" name="regular_suballotment" required>
                      <option value="Regular">Regular</option>
                      <option value="SubAllotment">SubAllotment</option>
                    </select>
                  </div>
                  <div class="input-field">
                    <label>Contract Duration (start)</label>
                    <input type="date" name="contractDuration_start" id="contractduration_start">
                  </div>
                  <div class="input-field">
                    <label>Contract Duration (end)</label>
                    <input type="date" name="contractDuration_end" id="contractduration_end">
                  </div>
                  <div class="input-field">
                    <label>Inclusive Date of Employment</label>
                    <input type="date" name="inclusiveDateOfEmployment" id="inclusivedateofemployment">
                  </div>
                  <div class="input-field">
                    <label>Salary Grade</label>
                    <input type="text" name="salaryGrade" id="salarygrade">
                  </div>
                  <div class="input-field">
                    <label>Salary</label>
                    <input type="text" name="salary" id="salary">
                  </div>
                  <div class="input-field">
                    <label>Type of Employment</label>
                    <select id="typeofemployment" name="typeOfEmployment" required>
                      <option value="Regular">Regular</option>
                      <option value="Contractual">Contractual</option>
                    </select>
                  </div>


                  <hr style="width:100%;text-align:left;margin-left:0">
                  <label>Add Signature photo</label>
                  <input name='signature' type='file' id='signature'>

                  <label> Add ID photo</label>
                  <input name='profilephoto' type='file' id='profilephoto'>
                  <input type="hidden" name="page" id="employeeid">

                </div>
              </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="Update" id="updateEmployeeDetails" name="updateEmployeeDetails"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div id="userAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
          <center>
            ADD ADMIN DETAILS
          </center>
        </h4>
      </div>

      <div class="modal-body">
        <center>
          <form method="post" action="upload.php" enctype='multipart/form-data' style="width: 98%;">
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;Firstname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="firstName"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Lastname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="lastName"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;Email:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="email" name="email"></span></p>
            <p><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp;Password:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="password" name="password"></span></p>
            <input type="hidden" name="page" value="admin.php" />
        </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Submit" id="addAdmin" name="addAdmin"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>

<body class="cbp-spmenu-push">
  <div class="main-content">
    <!--left-fixed -navigation-->
    <?php include "./navigation.php" ?>
    <!--left-fixed -navigation-->

    <!-- header-starts -->
    <div class="sticky-header header-section">
      <div class="header-left">
        <!--toggle button start-->
        <!-- <button id="showLeftPush"><i class="fa fa-bars"></i></button> -->
        <!--toggle button end-->

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
                    <p style="color:#1D809F;"><?php if (isset($firstname)) {
                                                echo "<strong>" . $firstname . "</strong>";
                                              } ?>
                    </p>
                    <span>Administrator&nbsp;<img src='admin/images/dot.png' height='15px' width='15px' alt=''>
                    </span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>
                </div>
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li>
                  <a href="#userAdd" data-toggle='modal' class="open-userAdd"><i class="fa fa-user-plus"></i> Add Admin</a>
                </li>
                <li>
                  <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
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
      <div class="main-page">
        <div class="charts">
          <div class="mid-content-top charts-grids">
            <div class="middle-content">
              <h4 class="title">Employees</h4>
              <!-- start content_slider -->
              <div class="alert alert-info">
                <i class="fa fa-envelope"></i>&nbsp;This screen displays 50 records use the search box to spool more records
              </div>

              <table id="example" class="display nowrap" style="width:100%">
                <thead>
                  <tr>

                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Position</th>
                    <th style="text-align: center;">Division</th>
                    <th style="text-align: center;">Address</th>
                    <th style="text-align: center;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sqlmember = "SELECT * FROM Employee ";
                  $retrieve = mysqli_query($db, $sqlmember);
                  $count = 0;
                  while ($found = mysqli_fetch_array($retrieve)) {
                    $count = $count + 1;
                    $id = $found['ID'];
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
                    $typeOfEmployment = $found['TypeOfEmployment'];

                    if ($suffix != null) {
                      $fullName = $firstName . " " . $lastName . " " . $suffix;
                    } else {
                      $fullName = $firstName . " " . $lastName;
                    }
                    $contact = $cpNumber . "/" . $emailAddress;
                    echo "<tr>
                            <td>$id</td>                                       
                            <td>$fullName</td>        	
                            <td>$position</td>
                            <td>$division</td>
                            <td>$address</td>
                            <td>
                              <center>
                                <a  href='card.php?id=$id' class='btn btn-success' title='click to print ID Card'  target='_blank'><span class='glyphicon glyphicon-print' style='color:white;'></span></a>
                                <a data-toggle='modal' data-id='$id' 
                                  data-firstname='$firstName'  data-middlename='$middleName' data-lastname='$lastName' data-suffix='$suffix' data-gender='$gender' data-position='$position' data-areaofassignment='$areaOfAssignment' 
                                  data-division='$division' data-regular_suballotment='$regular_suballotment' data-contractduration_start='$contractDuration_start' data-contractduration_end='$contractDuration_end'
                                  data-inclusivedateofemployment='$inclusiveDateOfEmployment' data-salarygrade='$salaryGrade' data-salary='$salary' 
                                  data-prc='$prc'  data-address='$address' data-birthdate='$birthdate' data-placeofbirth='$placeOfBirth' data-nameofpersontonotify='$nameOfPersonToNotify' data-bloodtype='$bloodtype' 
                                  data-tinnumber='$tinNumber'  data-philhealth='$philhealth' data-sss='$sss' data-pagibignumber='$pagIbigNumber' data-cpnumber='$cpNumber' data-emailaddress='$emailAddress' data-typeofemployment='$typeOfEmployment'
                                  class='open-updateProfile btn  btn-info' title='edit user details' href='#updateProfile'><span class='glyphicon glyphicon-edit' style='color:white;'></span></a>
                                <a data-id='$id'  class='open-Delete btn  btn-danger' title='delete user' ><span class='glyphicon glyphicon-trash' style='color:white;'></span></a>
                                <a  href='" . ($typeOfEmployment == "Regular" ? "./layout/singlePNG.php?id=$id" : "./layout/singlePDF.php?id=$id") . "' class='btn btn-primary' title='click to download ID Card'  target='_blank'><span class='glyphicon glyphicon-download-alt' style='color:white;'></span></a>
                              </center>
                            </td>
                          </tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!--//sreen-gallery-cursual---->
        </div>
      </div>
    </div>
  </div>
  <script>
    const areaOfAssignmentByDivision = {
      'MANAGEMENT SUPPORT DIVISION': ['ACCOUNTING SECTION', 'BUDGET SECTION', 'CASHIER SECTION', 'PROCUREMENT SECTION', 'OCAO', 'RECORDS SECTION', 'ICTU',
        'WAREHOUSE/SUPPLY UNIT', 'PERSONNEL', 'LIBRARY', 'GENERAL SERVICES SECTION', 'SAO', 'COLD CHAIN MANAGEMENT UNIT'
      ],
      'LOCAL HEALTH SUPPORT DIVISION': ['FAMILY HEALTH CLUSTER', 'NON-COMMUNICABLE DISEASE UNIT', 'COMMUNICABLE DISEASE UNIT', 'HFDU/CMU/HEPU', 'LOCAL HEALTH SUPPORT SYSTEM',
        'ENVIRONMENTAL AND OCCUPATIONAL HEALTH', 'STATISTICS', 'OFFICE OF THE CHIEF', 'NVBSP', 'RESU/HEMS/STAT', 'HEALTH FACILITIES ENHANCEMENT PROGRAM',
        'DDAPTP', 'PHARMA', 'EOH/NVBSP/HFEP', 'HEALTH FACILITIES DEVELOPMENT UNIT', 'HEALTH EMERGENCY MANAGEMENT SERVICE',
        'REGIONAL EPIDEMIOLOGY AND SURVEILLANCE UNIT'
      ],
      'REGULATIONS, LICENSING AND ENFORCEMENT DIVISION': ['RLED'],
      'REGIONAL DIRECTOR AND ASSISTANT REGIONAL DIRECTOR DIVISION': ['HUMAN RESOURCE DEVELOPMENT UNIT', 'PLANNING', 'LEGAL'],
    };

    function updateAreaOfAssignmentDropdown(originalvalue) {
      const divisionDropdown = document.getElementById('division');
      const areaOfAssignmentDropdown = document.getElementById('areaofassignment');
      const selectedDivision = divisionDropdown.value;
      
      areaOfAssignmentDropdown.options.length = 0;
      // Populate with new options
      if (selectedDivision in areaOfAssignmentByDivision) {
        const areasOfAssignment = areaOfAssignmentByDivision[selectedDivision];
        for (const area of areasOfAssignment) {
          areaOfAssignmentDropdown.options.add(new Option(area, area));
        }
        if (originalvalue) {
        areaOfAssignmentDropdown.value = originalvalue;
        console.log(originalvalue);
        }
       }
    }
  </script>

</body>

</html>