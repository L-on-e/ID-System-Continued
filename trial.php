<?php
include "db_connect.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>card</title>
    <style>
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

        #content1 {
            transform: scale(1.1);
            height: 210vw;
            width: 130vw;
            border-width: 2px;
            border-style: solid;
            flex-direction: row;
            background-color: lightcoral;
            background-image: url('./images//bg4.png');
            background-size: contain;
        }

        body {
            transform-origin: 0% 0%;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: row;
            display: flex;
            flex: auto;
        }

        .imgProfile {
            height: 35vw;
            width: 35vw;
            position: absolute;
            left: 20.5vw;
            top: 37vw;
        }

        .firstname {
            position: absolute;
            font-family: 'Lora';
            font-size: 12rem;
            margin-left: 25vw;
            top: 89.5vw;
        }

        .idno {
            transform-origin: 0% 0%;
            position: absolute;
            font-family: 'Lora';
            font-size: 3vw;
            margin-left: 56vw;
            bottom: -61vw;
            width: fit-content;
        }

        .fullname {
            position: absolute;
            font-family: 'Lora';
            font-size: 3.2rem;
            left: 60vw;
            bottom: -66.5vw;
        }

        .position {
            position: absolute;
            font-family: 'Lora';
            font-size: 3.2rem;
            left: 68vw;
            bottom: -74vw;
        }

        .division {
            position: absolute;
            color: green;
            font-family: 'Barlow';
            font-size: 3.2rem;
            transform: rotate(270deg);
            bottom: -60vw;
            left: -9.5vw;
        }
    </style>
</head>
<?php
// $idx = $_GET['id'];
$sqlmember = "SELECT * FROM Employee WHERE id=8 ";
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
    $data = file_get_contents($profilePhoto);
    $base64 = base64_encode($data);
    $imageSrc = 'data:image/png;base64,' . $base64;
} else {
    if ($profilePhoto != "")
        $imageSrc = 'images/' . $profilePhoto;
    else
        $imageSrc = "admin/images/profile.jpg";
}
?>

<body>
    <div id="content1">
        <div class="imgProfile">
            <img src="<?= $imageSrc ?>" height="100%" width="100%" alt="Profile photo">
        </div>
        <div class="firstname">
            <span>
                <?php if (isset($firstName)) {
                    echo $firstName;
                } ?>
            </span>
        </div>
        <div>
            <span class="idno">
                ID NO.
                <?php if (isset($employeeID)) {
                    echo $employeeID;
                } ?>
            </span>
        </div>
        <div class="fullname">
            <span>
                <?php if (isset($lastName)) {
                    echo $firstName . ' ' . $lastName;
                } ?>
            </span>
        </div>
        <div class="position">
            <span>
                <?php if (isset($position)) {
                    echo $position;
                } ?>
            </span>
        </div>
        <div class="division">
            <p>
                <?php if (isset($division)) {
                    echo $division;
                } ?>
            </p>
            <p>
                <?php if (isset($areaOfAssignment)) {
                    echo $areaOfAssignment;
                } ?>
            </p>
        </div>
    </div>
    <script src="./html2canvas.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            const screenshotTarget = document.getElementById('content1');
            const dpi = 500;
            const widthInches = 3.25;
            const heightInches = 4.5;
            const canvasWidth = dpi * widthInches;
            const canvasHeight = dpi * heightInches;
            const canvas = document.createElement('canvas');
            canvas.width = 325; // set desired width in pixels
            canvas.height = 432; // set desired height in pixels
            const ctx = canvas.getContext('2d');
            html2canvas(screenshotTarget, {
                scale: 0.5,
                width: canvasWidth,
                height: canvasHeight
            }).then((originalCanvas) => {
                ctx.drawImage(originalCanvas, 0, 0, canvas.width, canvas.height);
                const base64image = canvas.toDataURL("image/png", 0);
                var anchor = document.createElement('a');
                anchor.setAttribute("href", base64image);
                anchor.setAttribute("download", "my-image.png");
                setTimeout(function() {
                    anchor.click();
                    anchor.remove();
                });
            });
        };
    </script>
</body>

</html>