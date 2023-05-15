<?php
include "../db_connect.php";

$idx = $_GET['id'];
$sqlmember = "SELECT * FROM Employee WHERE id='$idx' ";
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
        $imageSrc = "../admin/images/profile.jpg";
}

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title><?php echo $firstName.' '.'ID'?></title>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;800&display=swap');

        @font-face {
            font-family: 'Lora';
            src: url('../bootstrap/fonts/lora-regular.ttf');
            font-weight: normal;
        }

        #content1 {
            position: absolute;
            height: 1121px;
            width: 808px;
            border-width: 2px;
            border-style: solid;
            background-image: url('../images//bg4.png');
            background-size: 812px 1125px;
            background-repeat: no-repeat;
        }

        body {
            background: #fff;
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
        }

        .imgProfile {
            height: 280px;
            width: 280px;
            position: absolute;
            left: 170px;
            top: 300px;
        }

        .firstnamediv {
            position: absolute;
            left: 205px;
            top: 730px;
            width: 350px;
            height: 50px;
        }

        .firstnamespan {
            font-family: 'Lora';
            font-size: 90px;
            display: block;
        }

        .idno {
            transform-origin: 0% 0%;
            font-family: 'Lora';
            font-size: 25px;
            width: fit-content;
        }

        .fullname {
            font-family: 'Lora';
            font-size: 28px;
            margin-bottom: 42px;
            margin-top: 20px;
        }

        .position {
            font-family: 'Lora';
            font-size: 25px;
        }

        .division {
            position: absolute;
            font-family: 'Barlow', 'sans-serif';
            width: 280px;
            height: 200px;
            display: flex;
            flex-direction: column;
            transform: rotate(270deg);
            bottom: 65px;
            left: -50px;
            text-transform: uppercase;
        }

        .divText {
            letter-spacing: 1px;
            font-family: 'Barlow', 'sans-serif';
            font-weight: 600;
            font-size: 20px;
            width: 280px;
            color: green;
            white-space: break-word;
            text-align: justify;
            margin-bottom: -10px;
            text-align: left;
        }

        .section {
            letter-spacing: 1px;
            color: white;
            width: 250px;
            font-weight: 600;
            font-size: 18px;
            white-space: break-word;
            text-align: justify;
            text-align: left;
        }

        .lowercontext {
            position: absolute;
            bottom: 10px;
            left: 380px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            width: 370px;
            height: 200px;
        }
    </style>
</head>
<body>
    <div id="content1" class="id">
        <div class="imgProfile">
            <img src="<?= $imageSrc ?>" height="100%" width="100%" alt="Profile photo">
        </div>
        <div class="firstnamediv">
            <span id="firstnamespan" class="firstnamespan">
                <?php
                if (isset($firstName)) {
                    $firstNameWords = explode(' ', $firstName);
                    echo $firstNameWords[0];
                }
                ?>
            </span>
        </div>
        <div class="lowercontext">
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
                        echo $firstName . ' ' . $lastName . ' ' . $suffix;
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
        </div>
        <div class="division">
            <p class="divText">
                <?php if (isset($division)) {
                    echo $division;
                } ?>
            </p>
            <p class="section">
                <?php if (isset($areaOfAssignment)) {
                    echo $areaOfAssignment;
                } ?>
            </p>
        </div>
    </div>
</body>
<script>
    var text = document.getElementById("firstnamespan");
    var textLength = <?php echo strlen($firstName) ?>;
    if (textLength >= 15) {
        text.style.fontSize = "50px";
        text.style.marginTop = "20px";
    } else if (textLength >= 10) {
        text.style.fontSize = "65px";
        text.style.marginTop = "15px";
    } else if (textLength >= 5) {
        text.style.fontSize = "75px";
        text.style.marginTop = "10px";
    } else {
        text.style.marginTop = "5px";
        text.style.fontSize = "90px";
    }
</script>
<script src="../html2canvas.js"></script>
<script type="text/javascript">
    window.onload = function() {
        const screenshotTarget = document.getElementById('content1');
        html2canvas(screenshotTarget, {
            scale: 1,
        }).then((canvas) => {
            const base64image = canvas.toDataURL("image/png");
            var anchor = document.createElement('a');
            anchor.setAttribute("href", base64image);
            anchor.setAttribute("download", "<?php echo $employeeID ?>.png");
            setTimeout(function() {
                anchor.click();
                anchor.remove();
            });
        });
    };
</script>
</body>

</html>