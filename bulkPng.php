<?php
include "db_connect.php";
// $fromm = $_POST['startpoint'];
// $too = $_POST['endpoint'];
// $startsat = $_POST['receiptrange'];

// $_SESSION['from'] = $fromm;
// $_SESSION['to'] = $too;
// $_SESSION['receiptrange'] = $startsat;

$from = 1;
$to = 3;
?>
<html>

<head>
    <title>card</title>
    <style>
        body {
            background: #fff;
        }

        #bg {
            width: 1000px;
            height: 432px;

            margin: 60px;
            float: left;

        }

        .id {
            width: 312px;
            height: 432px;
            position: absolute;
            opacity: 0.88;
            font-family: sans-serif;

            transition: 0.4s;
            background-color: #FFFFFF;
            border-radius: 2%;

        }

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

        .id::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('./images/bg1.png');
            background-repeat: repeat-x;
            background-size: 312px 432px;
            opacity: 1;
            z-index: -1;
            text-align: center;
            border: 1px solid #000;

        }

        .container {
            font-size: 12px;
            font-family: sans-serif;

        }

        .id-1 {
            transition: 0.4s;
            width: 312px;
            height: 432px;
            background: #FFFFFF;
            font-size: 16px;
            font-family: sans-serif;
            float: left;
            margin: auto;
            margin-left: 370px;
            border-radius: 2%;
            border: 1px solid #000;


        }

        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            position: absolute;
            left: 0.7%;
            bottom: 0%;
            /* Adjust to desired value */
            /* Adjust to desired value */
            font-size: 10px;
            font-family: 'Barlow';
            font-weight: bold;
            letter-spacing: 1px;
            color: green;
            display: block;
            /* create a block-level element */
            width: 60px;
            /* set the width to your desired size */
            overflow: hidden;
            /* hide the overflow */
            text-overflow: ellipsis;
            /* add an ellipsis (...) to indicate truncated text */
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div id="bg">
        <div id="id" class="id">
            <br><br><br><br><br><br><br>
            <center>
                <?php
                $sqlmember = "SELECT * FROM Employee WHERE ID>=$from && ID<=$to and TypeOfEmployment";
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
                    $typeOfEmployment = $found['TypeOfEmployment'];

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
                    if ($typeOfEmployment == 'Regular'){
                ?>
                    <img src="<?= $imageSrc ?>" height="110px" width="110px" alt="Profile photo" style="margin-left:-24%; margin-top:-4%;">
            </center>
            <div class="container" align="center">

                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>

                <div style="position: absolute; left: 26%; top: 69%; margin-left:0%; margin-top:-3%; font-size:22px; font-family: 'Lora';">
                    <span style="font-size:36px;"><?php if (isset($firstName)) {
                                                        echo explode(' ', $firstName)[0];
                                                    } ?></span>
                </div>
                <div style="position: absolute; left: 27%; top: 67%; margin-left:0%; margin-top:-3%; font-size:18px; font-family: 'Lora';">
                    <span><br>

                        <br>

                </div>
                <span style="position: absolute; left: 45%;right: 2%;margin-top: 110px; font-size:11px; font-family: 'Lora';"><?php if (isset($position)) {
                                                                                                                                    echo $position;
                                                                                                                                } ?></span>
                <p style="margin-top:20%">&nbsp;</p>
                <div style="margin-left: 40%; margin-top:16px; font-size:18px; font-family: 'Lora'; text-align:center;">
                    <span style="font-size:12px;"><?php if (isset($firstName)) {
                                                        echo $firstName;
                                                    } ?> <?php if (isset($lastName)) {
                                                                echo $lastName;
                                                            } ?></span>
                </div>

                <p style="position: absolute; top: 0; margin-left:172px; margin-top:112%; font-size:14px; font-family: 'Lora';">ID NO. <?php if (isset($id)) {
                                                                                                                                            echo $id;
                                                                                                                                        } ?></p>

                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <span class="vertical-text" style="position: absolute; top: 65%;white-space: pre-line; font-weight:bold"><?php if (isset($division)) {
                                                                                                                                echo $division;
                                                                                                                            } ?></span>
            </div>
        </div>
    <?php }else return; } ?>
    </div>
</body>

</html>
<script src="./html2canvas.js"></script>
<script>
    window.onload = function() {
        const container = document.getElementById("id");
        for (let i = 1; i <= 3; i++) {
            const div = document.createElement("div");
            div.id = `id${i}`;
            div.classList.add("id"); // add your class name here
            container.appendChild(div);
        }
        var count = <?php echo $to ?>;
        const elements = document.querySelectorAll('.id');
        for (let i = 0; i < count; i++) {
            html2canvas(elements[i]).then(canvas => {
                const link = document.createElement('a');
                link.download = `capture-${i}.png`;
                link.href = canvas.toDataURL();
                link.click();
            });
        }
    }
</script>

</html>