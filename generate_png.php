<?php
include "db_connect.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>card</title>
    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;800&display=swap');

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
            bottom: -69vw;
            width: fit-content;
        }

        .fullname {
            position: absolute;
            font-family: 'Lora';
            font-size: 3.2rem;
            left: 54.5vw;
            bottom: -74.5vw;
        }

        .position {
            position: absolute;
            font-family: 'Lora';
            font-size: 3.2rem;
            left: 68vw;
            bottom: -84vw;
        }

        .division { 
            position: absolute;
            font-family: 'Barlow', 'sans-serif';
            font-size: 3.0rem;
            transform: rotate(270deg);
            bottom: -69vw;
            left: -16vw;
            text-transform: uppercase;
           
        }

        .divText{
            font-family: 'Barlow', 'sans-serif';
            font-weight: 800;
            width: 700px;
            color: green;
            white-space: break-word;    
			text-align: justify;
			text-align: left;
        }
        .section{
            color: white;
            font-weight: 400    ;
            margin-top:-30px;
            font-size: 2.5rem   ;
        }
    </style>
</head>
<?php
$idx = $_GET['id'];
$sqlmember = "SELECT * FROM Employee WHERE id=$idx";
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
        <?php
        if (isset($firstName)) {
            $firstNameWords = explode(' ', $firstName);
            echo $firstNameWords[0];
        }
        ?>
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
            <p class="divText">
                <?php if (isset($division)) {
                    echo $division;
                } ?>
            </p>
            <p class="section" >
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
    const desiredDpi = 500; // set desired DPI
    const widthInches = 3.25;
    const heightInches = 4.5;
    const canvasWidth = desiredDpi * widthInches;
    const canvasHeight = desiredDpi * heightInches;
    const canvas = document.createElement('canvas');
    canvas.width = 332; // set desired width in pixels
    canvas.height = 432; // set desired height in pixels
    const ctx = canvas.getContext('2d');
    const scale = desiredDpi / 96; // set scale based on desired DPI
    html2canvas(screenshotTarget, {
        scale: scale,
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