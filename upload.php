<?php
session_start();
include("db_connect.php");

if (isset($_COOKIE['adminid'])) {
    $adminid = $_COOKIE['adminid'];
}

if (isset($_POST['updateEmployeeDetails'])) {

    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $middleName = mysqli_real_escape_string($db, $_POST['middleName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $suffix = mysqli_real_escape_string($db, $_POST['suffix']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $position = mysqli_real_escape_string($db, $_POST['position']);
    $areaOfAssignment = mysqli_real_escape_string($db, $_POST['areaOfAssignment']);
    $division = mysqli_real_escape_string($db, $_POST['division']);
    $regular_suballotment = mysqli_real_escape_string($db, $_POST['regular_suballotment']);
    $contractDuration_start = mysqli_real_escape_string($db, $_POST['contractDuration_start']);
    $contractDuration_end = mysqli_real_escape_string($db, $_POST['contractDuration_end']);
    $inclusiveDateOfEmployment = mysqli_real_escape_string($db, $_POST['inclusiveDateOfEmployment']);
    $salaryGrade = mysqli_real_escape_string($db, $_POST['salaryGrade']);
    $salary = mysqli_real_escape_string($db, $_POST['salary']);
    $prc = mysqli_real_escape_string($db, $_POST['prc']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
    $placeOfBirth = mysqli_real_escape_string($db, $_POST['placeOfBirth']);
    $nameOfPersonToNotify = mysqli_real_escape_string($db, $_POST['nameOfPersonToNotify']);
    $bloodType = mysqli_real_escape_string($db, $_POST['bloodtype']);
    $tinNumber = mysqli_real_escape_string($db, $_POST['tinNumber']);
    $philhealth = mysqli_real_escape_string($db, $_POST['philhealth']);
    $sss = mysqli_real_escape_string($db, $_POST['sss']);
    $pagibigNumber = mysqli_real_escape_string($db, $_POST['pagibigNumber']);
    $cpNumber = mysqli_real_escape_string($db, $_POST['cpNumber']);
    $emailAddress = mysqli_real_escape_string($db, $_POST['emailAddress']);
    $typeOfEmployment = mysqli_real_escape_string($db, $_POST['typeOfEmployment']);
    $id = mysqli_real_escape_string($db, $_POST['page']);
    
    $date_contractDuration_start = strtotime($contractDuration_start);
        $new_contractDuration_start = date('Y-m-d', $date_contractDuration_start);

        $date_contractDuration_end = strtotime($contractDuration_end);
        $new_contractDuration_end = date('Y-m-d', $date_contractDuration_end);
        
        $date_inclusiveDateOfEmployment = strtotime($inclusiveDateOfEmployment);
        $new_inclusiveDateOfEmployment = date('Y-m-d', $date_inclusiveDateOfEmployment);

        $date_birthdate = strtotime($birthdate);
        $new_birthdate = date('Y-m-d', $date_birthdate);

    $check = "SELECT * FROM Employee WHERE ID='$id' ";
    $checks = mysqli_query($db, $check);
    $found = mysqli_num_rows($checks);
    if ($found != 0) {
        $signaturePhotoName = $_FILES['sigFiled']['name'];
        $profilePhotoName = $_FILES['IDFiled']['name'];
        if (!empty($signaturePhotoName)) {
            $signaturePhototmpName = $_FILES['sigFiled']['tmp_name'];
            $signaturePhotoSize = $_FILES['sigFiled']['size'];
            $signaturePhotoType = $_FILES['sigFiled']['type'];
            $f = move_uploaded_file($signaturePhototmpName, 'images/' . $signaturePhotoName);
            if (isset($f)) { //image is a folder in which you will save documents
                $queryz = "UPDATE Employee SET Signature='$signaturePhotoName' WHERE id='$id' ";
                $db->query($queryz) or die('Errorr, query failed to upload picture');
            }
        } else if ((!empty($profilePhotoName))) {
            $profilePhotoNametmpName = $_FILES['IDFiled']['tmp_name'];
            $profilePhotoNameSize = $_FILES['IDFiled']['size'];
            $profilePhotoNameType = $_FILES['IDFiled']['type'];
            $f = move_uploaded_file($profilePhotoNametmpName, 'images/' . $profilePhotoName);
            if (isset($f)) { //image is a folder in which you will save documents
                $queryz = "UPDATE Employee SET Signature='$profilePhotoName' WHERE id='$id' ";
                $db->query($queryz) or die('Errorr, query failed to upload picture');
            }
        }

        $quer = "
            UPDATE Employee SET FirstName = '$firstName', MiddleName = '$middleName', LastName = '$lastName', Suffix = '$suffix',    Gender = '$gender',
            Position = '$position',    AreaOfAssignment = '$areaOfAssignment', Division = '$division', Regular_SubAllotment = '$regular_suballotment', ContractDuration_start = '$new_contractDuration_start',
            ContractDuration_end = '$new_contractDuration_end',    InclusiveDateOfEmployment = '$new_inclusiveDateOfEmployment', SalaryGrade = '$salaryGrade',    Salary = '$salary', PRC = '$prc',    Address = '$address',

            Birthdate = '$new_birthdate',    PlaceOfBirth = '$placeOfBirth', NameOfPersonToNotify = '$nameOfPersonToNotify', Bloodtype = '$bloodType',    TINNumber = '$tinNumber', Philhealth = '$philhealth',    SSS = '$sss', PagIbigNumber = '$pagibigNumber', CPNumber = '$cpNumber', EmailAddress = '$emailAddress', Signature = '$signaturePhotoName',    ProfilePhoto = '$profilePhotoName'
            , TypeOfEmployment = '$typeOfEmployment' WHERE id='$id' ";
        $db->query($quer) or die('Errorr, query failed to update');

        $_SESSION['pass'] = "okjs";
        header("Location:admin.php");
    }
}

if (isset($_POST['addAdmin'])) {
    if (
        $_POST['firstName'] != '' && $_POST['lastName'] != '' && $_POST['email'] != '' && $_POST['password'] != ''
    ) {
        $pagex = mysqli_real_escape_string($db, $_POST['page']);
        $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        echo($password);

        $check = "SELECT * FROM administrator WHERE Firstname='$firstName' && Lastname='$lastName'";
        $checks = mysqli_query($db, $check);
        $found = mysqli_num_rows($checks);
        if ($found == 0) {
            $query = "INSERT INTO administrator (Firstname,Lastname,Password,Email) " . "VALUES ('$firstName','$lastName','$password','$email')";
            $db->query($query) or die('Error1, query failed');


            $memberadd = "tyy";
            $_SESSION['memberadded'] = $memberadd;
            header("Location:$pagex"); //member added successfully
        } else {
            $_SESSION['memberexist'] = "member already exist";
            header("Location:$pagex");
        }
    } else {
    }
}

if (isset($_POST['addEmployee'])) {
    if (
        $_POST['firstName'] != '' && $_POST['middleName'] != '' && $_POST['lastName'] != '' && $_POST['gender'] != '' && $_POST['position'] != '' &&
        $_POST['areaOfAssignment'] != '' && $_POST['regular_suballotment'] != '' && $_POST['contractDuration_start'] != '' && $_POST['contractDuration_end'] != ''
    ) {
        $pagex = mysqli_real_escape_string($db, $_POST['page']);
        $employeeID = generate_id($db);
        $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
        $middleName = mysqli_real_escape_string($db, $_POST['middleName']);
        $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
        $suffix = mysqli_real_escape_string($db, $_POST['suffix']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $position = mysqli_real_escape_string($db, $_POST['position']);
        $areaOfAssignment = mysqli_real_escape_string($db, $_POST['areaOfAssignment']);
        $division = mysqli_real_escape_string($db, $_POST['division']);
        $regular_suballotment = mysqli_real_escape_string($db, $_POST['regular_suballotment']);
        $contractDuration_start = mysqli_real_escape_string($db, $_POST['contractDuration_start']);
        $contractDuration_end = mysqli_real_escape_string($db, $_POST['contractDuration_end']);
        $inclusiveDateOfEmployment = mysqli_real_escape_string($db, $_POST['inclusiveDateOfEmployment']);
        $salaryGrade = mysqli_real_escape_string($db, $_POST['salaryGrade']);
        $salary = mysqli_real_escape_string($db, $_POST['salary']);
        $prc = mysqli_real_escape_string($db, $_POST['prc']);
        $address = mysqli_real_escape_string($db, $_POST['address']);
        $birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
        $placeOfBirth = mysqli_real_escape_string($db, $_POST['placeOfBirth']);
        $nameOfPersonToNotify = mysqli_real_escape_string($db, $_POST['nameOfPersonToNotify']);
        $bloodType = mysqli_real_escape_string($db, $_POST['bloodType']);
        $tinNumber = mysqli_real_escape_string($db, $_POST['tinNumber']);
        $philhealth = mysqli_real_escape_string($db, $_POST['philhealth']);
        $sss = mysqli_real_escape_string($db, $_POST['sss']);
        $pagibigNumber = mysqli_real_escape_string($db, $_POST['pagibigNumber']);
        $cpNumber = mysqli_real_escape_string($db, $_POST['cpNumber']);
        $emailAddress = mysqli_real_escape_string($db, $_POST['emailAddress']);
        $typeOfEmployment = mysqli_real_escape_string($db, $_POST['typeOfEmployment']);

        $signaturePhotoName = $_FILES['sigFiled']['name'];
        $signaturePhototmpName = $_FILES['sigFiled']['tmp_name'];
        $signaturePhotoSize = $_FILES['sigFiled']['size'];
        $signaturePhotoType = $_FILES['sigFiled']['type'];
        $profilePhotoName = $_FILES['IDFiled']['name'];
        $profilePhotoNametmpName = $_FILES['IDFiled']['tmp_name'];
        $profilePhotoNameSize = $_FILES['IDFiled']['size'];
        $profilePhotoNameType = $_FILES['IDFiled']['type'];

        $date_contractDuration_start = strtotime($contractDuration_start);
        $new_contractDuration_start = date('Y-m-d', $date_contractDuration_start);

        $date_contractDuration_end = strtotime($contractDuration_end);
        $new_contractDuration_end = date('Y-m-d', $date_contractDuration_end);
        
        $date_inclusiveDateOfEmployment = strtotime($inclusiveDateOfEmployment);
        $new_inclusiveDateOfEmployment = date('Y-m-d', $date_inclusiveDateOfEmployment);

        $date_birthdate = strtotime($birthdate);
        $new_birthdate = date('Y-m-d', $date_birthdate);

        $check = "SELECT * FROM Employee WHERE FirstName='$firstName' && LastName='$lastName'";
        $checks = mysqli_query($db, $check);
        $found = mysqli_num_rows($checks);
        if ($found == 0) {
            move_uploaded_file($signaturePhototmpName, 'images/' . $signaturePhotoName);
            move_uploaded_file($profilePhotoNametmpName, 'images/' . $profilePhotoName);

            $query = "INSERT INTO Employee (Employee_ID,FirstName,MiddleName,LastName,Suffix,Gender,Position,AreaOfAssignment, Regular_SubAllotment, ContractDuration_start,
            ContractDuration_end, InclusiveDateOfEmployment, SalaryGrade, Salary, PRC, Address, Birthdate, PlaceOfBirth, NameOfPersonToNotify, Bloodtype,TINNumber,
            Philhealth, SSS, PagIbigNumber, CPNumber, EmailAddress, Signature, ProfilePhoto, Division, TypeOfEmployment) " . "VALUES 
            ('$employeeID','$firstName','$middleName', '$lastName','$suffix','$gender','$position','$areaOfAssignment','$regular_suballotment','$new_contractDuration_start',
            '$new_contractDuration_end', '$new_inclusiveDateOfEmployment','$salaryGrade', '$salary', '$prc', '$address',
            '$new_birthdate', '$placeOfBirth', '$nameOfPersonToNotify', '$bloodType', '$tinNumber', '$philhealth', '$sss','$pagibigNumber',
            '$cpNumber','$emailAddress','$signaturePhotoName','$profilePhotoName','$division','$typeOfEmployment')";
            $db->query($query) or die('Error1, query failed');
            
            $memberadd = "tyy";
            $_SESSION['memberadded'] = $memberadd;
            header("Location:$pagex"); //member added successfully
        } else {
            $_SESSION['memberexist'] = "member already exist";
            header("Location:$pagex");
        }
    } else {
    }
}

if (isset($_POST['Valuedel'])) {

    $tutor = $_POST['Valuedel'];
    $querry = "SELECT * FROM Employee WHERE id='$tutor'";
    $results = mysqli_query($db, $querry);
    $checks = mysqli_num_rows($results);
    if ($checks != 0) {
        $querry = "DELETE FROM Employee WHERE id='$tutor'";
        $results = mysqli_query($db, $querry);
        echo "ok";
    }
}

if (isset($_FILES['file2']['name']) && $_POST['Change']) {

    $id = $_POST['id'];
    $protocol = $_POST['category'];
    $receiptName = $_FILES['file2']['name'];
    $receipttmpName = $_FILES['file2']['tmp_name'];
    $receiptSize = $_FILES['file2']['size'];
    $receiptType = $_FILES['file2']['type'];
    $pages = $_POST['page'];

    if ($id == '') {
        $userid = $_COOKIE['userid'];
        $useremail = $_COOKIE['useremail'];

        $sqluser = "SELECT * FROM Users WHERE Password='$userid' && Email='$useremail'";

        $retrieved = mysqli_query($db, $sqluser);
        while ($found = mysqli_fetch_array($retrieved)) {
            $id = $found['id'];
        }
    }

    $qued = "SELECT * FROM Profilepictures WHERE ids='$id' ";
    $resul = mysqli_query($db, $qued);
    $checks = mysqli_num_rows($resul);
    if ($checks != 0) {
        if (move_uploaded_file($receipttmpName, 'admin/images/' . $receiptName)) { //image is a folder in which you will save documents
            $queryz = "UPDATE Profilepictures SET name='$receiptName',size='$receiptSize',type='$receiptType',content='$receiptName',Category='$protocol' WHERE ids='$id' ";
            $db->query($queryz) or die('Errorr, query failed to upload');
            //$_SESSION['update']="yes";
            if ($protocol == "Administrator") {
                header("Location:$pages");
            } else {
                header("Location:user.php");
            }
        }
    } else {

        if (move_uploaded_file($receipttmpName, 'admin/images/' . $receiptName)) { //image is a folder in which you will save documents
            $queryz = "INSERT INTO Profilepictures (name,size,type,content,Category,ids) " . "VALUES ('$receiptName','$receiptSize',' $receiptType', '$receiptName','$protocol','$id')";
            $db->query($queryz) or die('Errorr, query failed to upload');
            //$_SESSION['update']="yes";
            if ($protocol == "Administrator") {
                header("Location:$pages");
            } else {
                header("Location:user.php");
            }
        }
    }
}

if (isset($_POST["bulk"])) {
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    $count = 0;

    while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
        $employeeID = generate_id($db);
        $lastName = $filesop[1];
        $firstName = $filesop[2];
        $middleName = $filesop[3];
        $suffix =  $filesop[4];
        $gender =  $filesop[5];
        $position =  $filesop[6];
        $areaOfAssignment =  $filesop[7];
        $regular_suballotment =  $filesop[8];
        $contractDuration_start =  $filesop[9];
        $contractDuration_end =  $filesop[10];
        $inclusiveDateOfEmployment =  $filesop[11];
        $salaryGrade =  $filesop[12];
        $salary =  $filesop[13];
        $prc =  $filesop[14];
        $address =  $filesop[15];
        $birthdate =  $filesop[16];
        $placeOfBirth =  $filesop[17];
        $nameOfPersonToNotify =  $filesop[18];
        $bloodType =  $filesop[19];
        $tinNumber =  $filesop[20];
        $philhealth =  $filesop[21];
        $sss =  $filesop[22];
        $pagibigNumber =  $filesop[23];
        $cpNumber =  $filesop[24];
        $emailAddress =  $filesop[25];
        $signaturePhotoName =  $filesop[26];
        $profilePhotoName =  $filesop[27];
        $division = $filesop[28];
        $typeOfEmployment = $filesop[29];
        
        $date_contractDuration_start = strtotime($contractDuration_start);
        $new_contractDuration_start = date('Y-m-d', $date_contractDuration_start);

        $date_contractDuration_end = strtotime($contractDuration_end);
        $new_contractDuration_end = date('Y-m-d', $date_contractDuration_end);
        
        $date_inclusiveDateOfEmployment = strtotime($inclusiveDateOfEmployment);
        $new_inclusiveDateOfEmployment = date('Y-m-d', $date_inclusiveDateOfEmployment);

        $date_birthdate = strtotime($birthdate);
        $new_birthdate = date('Y-m-d', $date_birthdate);

        $storedSignatureLink = str_replace("open", "uc", $signaturePhotoName);
        $storedSignatureLink = preg_replace("/\/d\/(.*)\/(.*)/", "/uc?id=$1", $storedSignatureLink);

        $storedImageLink = str_replace("open", "uc", $profilePhotoName);
        $storedImageLink = preg_replace("/\/d\/(.*)\/(.*)/", "/uc?id=$1", $storedImageLink);
        
        $count++;
        if ($count > 1) {
            $query = "INSERT INTO Employee (Employee_ID,FirstName,MiddleName,LastName,Suffix,Gender,Position,AreaOfAssignment, Regular_SubAllotment, ContractDuration_start,
            ContractDuration_end, InclusiveDateOfEmployment, SalaryGrade, Salary, PRC, Address, Birthdate, PlaceOfBirth, NameOfPersonToNotify, Bloodtype,TINNumber,
            Philhealth, SSS, PagIbigNumber, CPNumber, EmailAddress, Signature, ProfilePhoto, Division, TypeOfEmployment) " . "VALUES 
            ('$employeeID','$firstName','$middleName', '$lastName','$suffix','$gender','$position','$areaOfAssignment','$regular_suballotment','$new_contractDuration_start',
            '$new_contractDuration_end', '$new_inclusiveDateOfEmployment','$salaryGrade', '$salary', '$prc', '$address',
            '$new_birthdate', '$placeOfBirth', '$nameOfPersonToNotify', '$bloodType', '$tinNumber', '$philhealth', '$sss','$pagibigNumber',
            '$cpNumber','$emailAddress','$storedSignatureLink','$storedImageLink','$division','$typeOfEmployment')";
            $db->query($query) or die('Error1, query failed');
            
            $c = $c + 1;
        }
    }

    if (isset($c)) {
        $_SESSION['Import'] = $c;
        header("Location:admin.php");
    } else {
        echo "Sorry! There is some problem.";
    }
}

function generate_id($conn) {
    $last_id = '0';
    $result = mysqli_query($conn, "SELECT Employee_ID FROM Employee ORDER BY Employee_ID DESC LIMIT 1");
    if ($row = mysqli_fetch_assoc($result)) {
      $last_id = $row['Employee_ID'];
    }
    
    $year = substr($last_id, 0, 4);
    $month = substr($last_id, 4, 2);
    
    $current_year = date('Y');
    $current_month = date('m');
    if ($year != $current_year || $month != $current_month) {
      $last_id = $current_year . $current_month . '0000';
    }
    
    $incremental = intval(substr($last_id, 6));
    
    $incremental++;
    
    $incremental_str = str_pad($incremental, 4, '0', STR_PAD_LEFT);
    
    $new_id = $current_year . $current_month . $incremental_str;
    return $new_id;
  }
?>