<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;800&display=swap');


        body {
            background: #fff;
        }

        #bg1 {
            width: 1000px;
            height: 432px;
            float: left;

        }

        @media print {

            #id1,
            .id-2 {
                transform: scale(1.40);
                transform-origin: top left;
            }
        }

        #id1 {
            width: 312px;
            height: 432px;
            position: absolute;
            opacity: 0.88;
            font-family: sans-serif;

            transition: 0.4s;
            background-color: #FFFFFF;

        }

        #id1::before {
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

        .id-2 {
            transition: 0.4s;
            width: 312px;
            height: 432px;
            background: #FFFFFF;
            font-size: 16px;
            font-family: sans-serif;
            float: left;
            border: 1px solid #000;
        }

        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            position: absolute;
            margin-left: -6px;
            bottom: 2%;
            /* Adjust to desired value */
            /* Adjust to desired value */
            font-size: 7px;
            font-family: 'Barlow';
            font-weight: 800;
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
            text-align: justify;
            text-align: left;
            text-transform: capitalize;
        }

        .vertical-text2 {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            position: absolute;
            margin-left: 16px;
            bottom: 2%;
            /* Adjust to desired value */
            /* Adjust to desired value */
            font-size: 8px;
            font-family: 'Barlow', sans-serif;
            font-weight: 800;
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
            text-align: justify;
            text-align: left;
            text-transform: capitalize;
        }

        /*ID BACK */

        .info-container {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            padding: 5px;
            width: 268px;
            height: 142px;
            justify-content: space-evenly;
        }

        .info-adj {
            align-items: center;
            margin-left: 10px;
            height: 50px;
            display: flex;
            flex-direction: column;
        }

        .info-title {
            font-size: 13px;
            font-weight: 600;
        }

        .info-data {
            padding: 3px;
            border: solid 1px;
            margin-top: -10px;
            font-size: 14px;
            font-weight: 400;
        }

        /* TextLayoutFront */

        .name-pos {
            margin-top: -11px;
            margin-left: 55px;
            width: 200px;
        }

        .fName{
            font-family:'Lora' ;
            text-align: start;
            font-size:35px;
            margin-top: -20px;
        }
        .lname{
            margin-left: 1px;
            font-family:'Lora' ;
            text-align: start;
            font-size:22px;
            margin-top: -45px;  
        }

        .pos1{
            font-family:'Lora' ;
            text-align: start;
            font-size: 8px;
            margin-top: -25px; 
            margin-left: 3px; 
        }

    </style>

</head>

<body>
    <script type="text/javascript">
        window.print();
        // setTimeout(function() {
        // 	window.close()
        // }, 5000)
    </script>

    <div id="bg1" style="margin-bottom:310px ">
        <div id="id1">
            <br><br><br><br><br><br><br>
            <center>
            </center>
            <img src="<?= $imageSrc ?>" height="110px" width="110px" alt="image" style="margin-left:20%; margin-top:-3%;">
            </center>
            <div class="container" align="center">

                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>



                <div class="name-pos">
                    <p class="fName">
                        <?php if (isset($firstName)) {
                            $nameParts = explode(' ', $firstName);
                            echo $nameParts[0];
                            if (isset($nameParts[2])) {
                                echo ' ' . $nameParts[2];
                            }
                        } ?>
                    </p>

                    <p class="lName">
                        <?php if (isset($lastName)) {
                            echo $lastName;
                        } ?>
                    </p>


                    <p class="pos1">
                        <?php if (isset($position)) {
                            echo $position;
                        } ?>

                    </p>
                </div>

                <p style="margin-top:20%">&nbsp;</p>

                <p style="position: absolute; top: 0; left: 46%; margin-top:114%; font-size:9px; font-family: 'Lora';">ID NO. <?php if (isset($employeeID)) {
                                                                                                                                    echo $employeeID;
                    
                <!-- <img src="<?= $signaturePhoto ?>" height="110px" width="110px" alt="image" style='margin-left:20%; margin-top:0%;'>> -->
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>
                <p style="margin-top:-4%">&nbsp;</p>

                <p class="vertical-text" style="font-weight: 800;  color: white; position: absolute; top: 74%; white-space: pre-line;">
                    <span style=" color: Green; position: absolute; left 4%;"><?php if (isset($division)) {
                                                                                                    echo $division;
                                                                                                } ?></span>
                    <?php if (isset($division) && isset($areaOfAssignment) && $division !== "REGULATIONS, LICENSING AND ENFORCEMENT DIVISION") echo '<br><br>'; ?>
                    <?php if (isset($areaOfAssignment) && $division !== "REGULATIONS, LICENSING AND ENFORCEMENT DIVISION") {
                        echo $areaOfAssignment;
                    } ?>
                </p>
            </div>
        </div>
        <div class="id-2" style="margin-left:500px">

            <div class="address">
                <p style="margin-left: 12px;">Address</p>

                <p style="text-align: center; border:solid 1px black; width:500px; width: 270px; margin-left:10px;padding: 5px; font-size:13px"><?php if (isset($address)) {
                                                                                                                                                    echo $address;
                                                                                                                                                } ?></p>
            </div>

            <div style="margin-top:5%;border:1px solid #000;margin-left:10px; width: 90%;height:34%;">
                <div class="info-container">
                    <div class="info-adj">
                        <p class="info-title">BIRTHDATE</p>
                        <p class="info-data"><?php if (isset($birthdate)) {
                                                    echo $birthdate;
                                                } ?></p>
                    </div>

                    <div class="info-adj">
                        <p class="info-title">BLOOD TYPE</p>
                        <p class="info-data"><?php if (isset($bloodtype)) {
                                                    echo $bloodtype;
                                                } ?></p>
                    </div>

                    <div class="info-adj">
                        <p class="info-title">TIN NO.</p>
                        <p class="info-data"><?php if (isset($tinNumber)) {
                                                    echo $tinNumber;
                                                } ?></p>
                    </div>


                    <div class="info-adj">

                        <p class="info-title">PHILHEALTH NO.</p>
                        <p class="info-data"><?php if (isset($philhealth)) {
                                                    echo $philhealth;
                                                } ?></p>
                    </div>

                    <div class="info-adj">
                        <p class="info-title">SSS</p>
                        <p class="info-data"><?php if (isset($sss)) {
                                                    echo $sss;
                                                } ?></p>

                    </div>
                </div>
            </div>
            <div style="margin-top:2%;border:1px solid #000;margin-left:10px; width: 90%;height:18%; ">
                <p style="margin-left:10px;margin-top:5%; font-size:14px; align-items:center">Person to notify incase of emergency:</br>
                    Name: <?php if (isset($nameOfPersonToNotify)) {
                                echo $nameOfPersonToNotify;
                            } ?></br>
                    Tel No: <?php if (isset($cpNumber)) {
                                echo $cpNumber;
                            } ?></p>
            </div>

            <p style="padding:2px;text-align:center;font-size:10px;margin-top:1%">This is to certify the person whose picture and signature appear hereon is an employee of DOH-RO1, SFLU</p>

            <hr align="center" style="border: 1px solid black;width:90%;margin-top:12%">
            </hr>
            <p align="center" style="margin-top:-2%;font-size:10px;">PAULA PAZ M. SYDIONGCO, MD, MPH, MBA, CESO IV <br>Director IV</p>

        </div>
    </div>

    </div>
</body>

</html>