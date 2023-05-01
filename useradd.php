<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>

<body>
    <?php
    include "./imports.php";
    include "./navigation.php";
    ?>
    <div class="modal-dialog" style="background-color:green; width:100%">
            <center>
                        ADD EMPLOYEE DETAILS
            </center>

            <div class="modal-body">
                <center>
                <form method="post" action="upload.php" enctype='multipart/form-data'>

                    <div class="personal_info">
                        <p>
                            <span>First Name:<label>*</label></span>
                            <input type="text" name="firstName" required>
                        </p>
                        <p>
                            <span>Middle Name:<label>*</label></span>
                            <input type="text" name="middleName" required>
                        </p>
                        <p>
                            <span>Last Name:<label>*</label></span>
                            <input type="text" name="lastName" required>
                        </p>
                        <p>
                            <span>Suffix:</span>
                            <input type="text" name="suffix">
                        </p>
                        <p>
                            <span>Gender:<label>*</label></span>
                            <input type="text" name="gender" required>
                        </p>
                        <p>
                            <span>Birthdate:<label>*</label></span>
                            <input type="text" name="birthdate" required>
                        </p>
                        <p>
                            <span>Place of Birth:<label>*</label></span>
                            <input type="text" name="placeOfBirth" required>
                        </p>
                        <p>
                            <span>Address:<label>*</label></span>
                            <input type="text" name="address" required>
                        </p>
                        <p>
                            <span>Blood Type:<label>*</label></span>
                            <input type="text" name="bloodType" required>
                        </p>
                    </div>
                    
                    <div class="contact_info">
                        <p>
                            <span>CP Number:<label>*</label></span>
                            <input type="text" name="cpNumber">
                        </p>
                        <p>
                            <span>Email Address:<label>*</label></span>
                            <input type="text" name="emailAddress" id='oldpass'>
                        </p>
                    </div>

                    <div class="emergency_contact">
                        <p>
                            <span>Name of Person to Notify in Case of Emergency:<label>*</label></span>
                            <input type="text" name="nameOfPersonToNotify" required>
                        </p>
                    </div>

                    <div class="govId_Num">
                        <p>
                            <span>PRC ID Number (if applicable):</span>
                            <input type="text" name="prc">
                        </p>
                        <p>
                            <span>TIN Number:<label>*</label></span>
                            <input type="text" name="tinNumber" required>
                        </p>
                        <p>
                            <span >PHILHEALTH:<label>*</label></span>
                            <input type="text" name="philhealth">
                        </p>
                        <p>
                            <span>SSS:<label>*</label></span>
                            <input type="text" name="sss">
                        </p>
                        <p>
                            <span>PAGIBIG Number:<label>*</label></span>
                            <input type="text" name="pagibigNumber">
                        </p>        
                    </div>
                    
                    <div class="employment_info">
                        <p>
                            <span>Position:<label>*</label></span>
                            <input type="text" name="position" required>
                        </p>
                        <p>
                            <span>Area of Assignment:<label>*</label></span>
                            <input type="text" name="areaOfAssignment" required>
                        </p>
                        <p>
                            <span>Regular/SubAllotment:<label>*</label></span>
                            <input type="text" name="regular_suballotment" required>
                        </p>
                        <p>
                            <span>Contract Duration (start):<label>*</label></span>
                            <input type="text" name="contractDuration_start" required>
                        </p>
                        <p>
                            <span>Contract Duration (end):<label>*</label></span>
                            <input type="text" name="contractDuration_end" required>
                        </p>
                        <p>
                            <span>Inclusive Date of Employment:<label>*</label></span>
                            <input type="text" name="inclusiveDateOfEmployment" required>
                        </p>
                        <p>
                            <span>Salary Grade:<label>*</label></span>
                            <input type="text" name="salaryGrade" required>
                        </p>
                        <p>
                            <span>Salary:<label>*</label></span>
                            <input type="text" name="salary" required>
                        </p>
                    </div>     

                    <p>
                        <span>Add Signature photo:</span>
                        <input name='sigFiled' type='file' id='sigFiled'>
                    </p>
                    <p>
                        <span> Add ID photo:</span>
                        <input name='IDFiled' type='file' id='IDFiled'>
                        <input type="hidden" name="page" value="admin.php" />
                    </p>
                    </center>
                    <div class="">
                        <input type="submit" class="btn btn-success" value="Submit" id="addEmployee" name="addEmployee"> 
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
    </div>
</body>

</html>