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
</head>

<body>
    <?php
    $sqlmember = "SELECT * FROM Employee WHERE ID>=$from && ID<=$to";
    $retrieve = mysqli_query($db, $sqlmember);
    $count = 0;
    $IDs = array();
    while ($found = mysqli_fetch_array($retrieve)) {
        $typeOfEmployment = $found['TypeOfEmployment'];
        if ($typeOfEmployment == 'Regular') {
            $count++;
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

            if (filter_var($profilePhoto, FILTER_VALIDATE_URL)) {
                $data = file_get_contents($profilePhoto);
                $base64 = base64_encode($data);
                $imageSrc = 'data:image/png;base64,' . $base64;
            } else {
                if ($profilePhoto != "")
                    $imageSrc = 'images/' . $profilePhoto;
                else
                    $imageSrc = "admin/images/profile.jpg";
            }

            if ($typeOfEmployment == "Regular") {
                array_push($IDs, $employeeID);
                include "./layout/bulkpnglayout.php";
                // include "./bulkpnglayout.php";
            }
        }
    ?>

    <?php } ?>

</body>
<script src="./html2canvas.js"></script>
<script>
    window.onload = function() {
    const elements = document.querySelectorAll('.id');
    const IDs = <?php echo json_encode($IDs)?>;
    let index = 0;
    for (let i = 0; i < elements.length; i++) {
        html2canvas(elements[i], {
            scale: 1,
        }).then(canvas => {
            const link = document.createElement('a');
            link.download = `${IDs[index]}.png`;
            link.href = canvas.toDataURL();
            link.click();
            index++;
        });
    }
}

</script>

</html>