<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/input.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Add Employee</title>


</head>

<body>

    <div class="imports">

        <?php
        include "./imports.php";
        include "./navigation.php";
        ?>

    </div>
    <div class="container">
        <header style="margin-left:100px">Add Employee</header>

        <form method="post" action="upload.php" enctype='multipart/form-data'>
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>First Name<label style="color:red">*</label></label>
                            <input type="text" name="firstName" required>
                        </div>

                        <div class="input-field">
                            <label>Middle Name<label style="color:red">*</label></label>
                            <input type="text" name="middleName" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name<label style="color:red">*</label></label>
                            <input type="text" name="lastName" required>
                        </div>

                        <div class="input-field">
                            <label>Suffix (Leave blank if none)</label>
                            <input type="text" name="suffix">
                        </div>

                        <div class="input-field">
                            <label>Gender<label style="color:red">*</label></label>
                            <select id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Birthdate<label style="color:red">*</label></label>
                            <input type="date" name="birthdate" required>
                        </div>

                        <div class="input-field">
                            <label>Place of Birth<label style="color:red">*</label></label>
                            <input type="text" name="placeOfBirth" required>
                        </div>

                        <div class="input-field">
                            <label>Address<label style="color:red">*</label></label>
                            <input type="text" name="address" required>
                        </div>

                        <div class="input-field">
                            <label>Blood Type<label style="color:red">*</label></label>
                            <select id="bloodType" name="bloodType" required>
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

                    <div class="fields">
                        <div class="input-field">
                            <label>CP Number<label style="color:red">*</label></label>
                            <input type="text" name="cpNumber" required>
                        </div>

                        <div class="input-field">
                            <label>Email Address<label style="color:red">*</label></label>
                            <input type="text" name="emailAddress" required>
                        </div>

                        <div class="input-field">
                            <label>Emergency Contact<label style="color:red">*</label></label>
                            <input type="text" name="nameOfPersonToNotify" required>
                        </div>
                    </div>

                    <div class="govId_Num">
                        <span class="title">Government IDs and Numbers</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>PRC ID Number (if applicable):</label>
                                <input type="text" name="prc">
                            </div>
                            <div class="input-field">
                                <label>TIN Number:<label style="color:red">*</label></label>
                                <input type="text" name="tinNumber" required>
                            </div>
                            <div class="input-field">
                                <label>PHILHEALTH:<label style="color:red">*</label></label>
                                <input type="text" name="philhealth" required>
                            </div>
                            <div class="input-field">
                                <label>SSS:<label style="color:red">*</label></label>
                                <input type="text" name="sss" required>
                            </div>
                            <div class="input-field">
                                <label>PAGIBIG Number:<label style="color:red">*</label></label>
                                <input type="text" name="pagibigNumber" required>
                            </div>
                        </div>
                    </div>

                    <div class="employment_info">
                        <span class="title">Employment Information</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Position<label style="color:red">*</label></label>
                                <input type="text" name="position" required>
                            </div>

                            <div class="input-field">
  <label>Division<label style="color:red">*</label></label>
  <select id="division" name="division" required onchange="updateAreaOfAssignmentDropdown()">
    <option value="">Choose Division</option>
    <option value="MANAGEMENT SUPPORT DIVISION">Management Support Division</option>
    <option value="LOCAL HEALTH SUPPORT DIVISION">Local Health Support Division</option>
    <option value="REGULATIONS, LICENSING AND ENFORCEMENT DIVISION">Regulations, Licensing and Enforcement Division</option>
    <option value="REGIONAL DIRECTOR AND ASSISTANT REGIONAL DIRECTOR DIVISION">Regional Director and Assistant Regional Director Division</option>
  </select>
</div>

<div class="input-field" id="areaOfAssignmentDropdownDiv" style="display: none;">
  <label>Area of Assignment<label style="color:red">*</label></label>
  <select id="areaOfAssignment" name="areaOfAssignment" >
    <option value="">Choose Area of Assignment</option>
  </select>
</div>

<script>
  const areaOfAssignmentByDivision = {
    'MANAGEMENT SUPPORT DIVISION':
                ['Accounting Section', 'Budget Section', 'Cashier Section', 'Procurement Section', 'OCAO','Records Section','ICTU',
                'Warehouse/Supply Unit', 'Personnel', 'Library', 'General Services Section', 'SAO', 'Cold Chain Management Unit'],
    'LOCAL HEALTH SUPPORT DIVISION':
                ['Family Health Cluster', 'Non-Communicable Disease Unit', 'Communicable Disease Unit', 'HFDU/CMU/HEPU', 'Local Health Support System',
                'Environmental and Occupational Health', 'Statistics', 'Office of the Chief', 'NVBSP', 'RESU/HEMS/STAT', 'Health Facilities Enhancement Program',
                'DDAPTP', 'Pharma', 'EOH/NVBSP/HFEP', 'Health Facilities Development Unit', 'Health Emergency Management Service',
                'Regional Epidemiology and Surveillance Unit'],
    'REGULATIONS, LICENSING AND ENFORCEMENT DIVISION':
                ['RLED'],
    'REGIONAL DIRECTOR AND ASSISTANT REGIONAL DIRECTOR DIVISION':
                ['Human Resource Development Unit', 'Planning', 'Legal'],
  };

  function updateAreaOfAssignmentDropdown() {
    const divisionDropdown = document.getElementById('division');
    const areaOfAssignmentDropdown = document.getElementById('areaOfAssignment');
    const selectedDivision = divisionDropdown.value;

    // Clear existing options
    areaOfAssignmentDropdown.innerHTML = '';
    areaOfAssignmentDropdown.options.add(new Option('Choose Area of Assignment', ''));

    // Populate with new options
    if (selectedDivision in areaOfAssignmentByDivision) {
      const areasOfAssignment = areaOfAssignmentByDivision[selectedDivision];
      for (const area of areasOfAssignment) {
        areaOfAssignmentDropdown.options.add(new Option(area, area));
      }

      // Show the area of assignment dropdown
      document.getElementById('areaOfAssignmentDropdownDiv').style.display = '';
    } else {
      // Hide the area of assignment dropdown if there are no options for the selected division
      document.getElementById('areaOfAssignmentDropdownDiv').style.display = 'none';
    }
  }
</script>



                            <div class="input-field">
                                <label>Regular/SubAllotment<label style="color:red">*</label></label>
                                <select id="regular_suballotment" name="regular_suballotment" required>
                                    <option value="Regular">Regular</option>
                                    <option value="SubAllotment">SubAllotment</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label>Contract Duration (start)<label style="color:red">*</label></label>
                                <input type="date" name="contractDuration_start" required>
                            </div>
                            <div class="input-field">
                                <label>Contract Duration (end)<label style="color:red">*</label></label>
                                <input type="date" name="contractDuration_end" required>
                            </div>
                            <div class="input-field">
                                <label>Inclusive Date of Employment<label style="color:red">*</label></label>
                                <input type="date" name="inclusiveDateOfEmployment" required>
                            </div>
                            <div class="input-field">
                                <label>Salary Grade<label style="color:red">*</label></label>
                                <input type="text" name="salaryGrade" required>
                            </div>
                            <div class="input-field">
                                <label>Salary<label style="color:red">*</label></label>
                                <input type="text" name="salary" required>
                            </div>
                            <div class="input-field">
                                <label>Type of Employment<label style="color:red">*</label></label>
                                <select id="typeOfEmployment" name="typeOfEmployment" required>
                                    <option value="Regular">Regular</option>
                                    <option value="Contractual">Contractual</option>
                                </select>

                            </div>


                            <hr style="width:100%;text-align:left;margin-left:0">
                            <label>Add Signature photo</label>
                            <input name='sigFiled' type='file' id='sigFiled'>

                            <label> Add ID photo</label>
                            <input name='IDFiled' type='file' id='IDFiled'>
                            <input type="hidden" name="page" value="admin.php" />


                        </div>

                        <div class="buttons">
                            <button class="sumbit" value="Submit" id="addEmployee" name="addEmployee">
                                <span>Submit</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>

    <script src="js/form_input.js"></script>
</body>

</html>