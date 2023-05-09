<?php
include "db_connect.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>card</title>
    <style>
        body {
            background: #fff;
        }

        #bg {
            width: 312vw;
            height: 432vw;
            margin: 60px;
            float: left;
            transform: scale(5.185);
        }

        #id {
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

        #id::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url('./images//bg4.png');
            /* background-repeat: repeat-x; */
            background-size: contain;
            opacity: 1;
            z-index: -1;
            text-align: center;
            border: 1px solid #000;
        }


        /* .container {
            font-size: 4rem;
            font-family: sans-serif;
        } */

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

        }

        .vertical-text {
            transform: rotate(180deg);
            /* left: 0.7%;
            bottom: 0%; */
            /* Adjust to desired value */
            /* Adjust to desired value */
            font-size: 5rem;
            font-family: 'Barlow';
            font-weight: bold;
            letter-spacing: 1px;
            color: green;
            display: block;
            border-width: 1vw;
            border-style: solid;
            /* create a block-level element */
            width: 10rem;
            /* set the width to your desired size */
            overflow: hidden;
            /* hide the overflow */
            text-overflow: ellipsis;
            /* add an ellipsis (...) to indicate truncated text */
            /* white-space: nowrap; */
        }
    </style>
</head>

<body>
    <div id="bg">
        <div id="id">
            <br><br><br><br><br><br><br>
            <center>
                <?php
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
                        $imageSrc = "admin/images/profile.jpg";
                }

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
                    <span style="font-size:12rem;"><?php if (isset($firstName)) {
                                                        echo $firstName;
                                                    } ?></span>
                </div>
                <div style="position: absolute; left: 27%; top: 67%; margin-left:0%; margin-top:-3%; font-size:18px; font-family: 'Lora';">
                    <span><br>

                        <br>

                </div>
                <span style="position: absolute; left: 55%;right: 10%;top: 93.5%; font-size:4rem; font-family: 'Lora';"><?php if (isset($position)) {
                                                                                                                            echo $position;
                                                                                                                        } ?></span>
                <p style="margin-top:20%">&nbsp;</p>
                <div style="margin-left: 40%; margin-top:10%; font-size:18px; font-family: 'Lora'; text-align:center;">
                    <span style="font-size:9rem;"><?php if (isset($firstName)) {
                                                        echo $firstName;
                                                    } ?> <?php if (isset($lastName)) {
                                                                echo $lastName;
                                                            } ?></span>
                </div>

                <p style="position: absolute; top: 0; left: 20%; margin-top:120%; font-size:3rem; font-family: 'Lora';">ID NO. <?php if (isset($employeeID)) {
                                                                                                                                    echo $employeeID;
                                                                                                                                } ?></p>

                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <div style="position:absolute; bottom: -40%; left: -8%; transform: rotate(90deg); height:max-content;">
                    <span class="vertical-text" style="white-space:pre-wrap;"><?php if (isset($division)) {
                                                                                    echo $division;
                                                                                } ?></span>
                </div>
            </div>
        </div>
    </div>
    <script src="./html2canvas.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            const screenshotTarget = document.getElementById('id');
            const dpi = 500;
            const widthInches = 3.25;
            const heightInches = 4.5;
            const canvasWidth = dpi * widthInches;
            const canvasHeight = dpi * heightInches;
            html2canvas(screenshotTarget, {
                scale: 1,
                width: canvasWidth,
                height: canvasHeight
            }).then((canvas) => {
                const base64image = canvas.toDataURL("image/png");
                var anchor = document.createElement('a');
                anchor.setAttribute("href", base64image);
                anchor.setAttribute("download", "my-image.png");
                setTimeout(function() {
                    anchor.click();
                    anchor.remove();
                }, 2000);
            });
        };
    </script>
</body>

</html>