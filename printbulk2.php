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
    <title>Contractual Printing</title>
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
        }

    ?>

    <?php } ?>


</body>

</html>