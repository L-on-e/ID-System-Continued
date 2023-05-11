<?php
require_once 'vendor/autoload.php';
include "db_connect.php";
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

$dompdf = new Dompdf\Dompdf(["chroot" => __DIR__]);
$bg = './images/bg1.png';
$style = "<style>" . file_get_contents("./pdfstyle.css") . "</style>";
$html = "<html>
            $style
            <body>
            <div id='bg'>
                <div id='id'>
                    <br><br><br><br><br><br><br>
                    <center>
                    </center>
                    <img src='$imageSrc' height='110px' width='110px' alt='image' style='margin-left:20%; margin-top:-3%;'>
                    </center>
                    <div class='container' align='center'>

                        <p style='margin-top:-4%'>&nbsp;</p>
                        <p style='margin-top:-4%'>&nbsp;</p>
                        <p style='margin-top:-4%'>&nbsp;</p>
                        <p style='margin-top:-4%'>&nbsp;</p>
                        <p style='margin-top:-4%'>&nbsp;</p>

                        <div style='position: absolute; left: 27%; top: 67%; margin-left:0%; margin-top:-3%; font-size:18px; font-family: 'Lora';'>
                            <span style='font-size:24px;'>$firstName</span>
                        </div>
                        <div style='position: absolute; left: 27%; top: 67%; margin-left:0%; margin-top:-3%; font-size:18px; font-family: 'Lora';'>
                            <span><br>$lastName;</span>
                            <br>

                        </div>
                        <span style='position: absolute; left: 27%;top: 75%; font-size:9px; font-family: 'Lora';'>$position</span>
                        <p style='margin-top:20%'>&nbsp;</p>

                        <p style='position: absolute; top: 0; left: 58%; margin-top:114%; font-size:9px; font-family: 'Lora';'>$employeeID</p>
                        <p style='margin-top:-4%'>&nbsp;</p>
                        <p style='margin-top:-4%'>&nbsp;</p>
                        <p style='margin-top:-4%'>&nbsp;</p>
                        <p class='vertical-text'>$areaOfAssignment</p>





                    </div>
                </div>
                <div class='id-1'>

                    <p style='margin-top:2%; text-align:left;margin-left:10px;font-size:20px;'>Address:</p>
                    <div style='margin-top:-5%;border:1px solid #000;margin-left:10px; width: 90%;'>
                        <p style='margin-left:10px;'>$address</p>
                    </div>
                    <div style='margin-top:1%;border:1px solid #000;margin-left:10px; width: 90%;height:34%;'>
                        <p style='margin-top:0%;text-indent: 30px;text-decoration: underline;'>BIRTHDATE</p>
                        <p style='margin-top:-12%;text-decoration: underline; text-indent: 160px;'>BLOOD TYPE</p>
                        <p style='margin:10px;border:1px solid #000;width: 45%;margin-top:-5%;padding:2px;text-align:center;'>$birthdate</p>
                        <p style='margin:180px;border:1px solid #000;width: 20%;margin-top:-12%;padding:2px;text-align:center;'>$bloodtype</p>
                        <p style='text-indent: 35px;text-decoration: underline; margin-top:-60%;'>TIN NO.</p>
                        <p style='margin-top:-12%;text-decoration: underline; text-indent: 140px;'>PHILHEALTH NO.</p>

                        <p style='margin:10px;border:1px solid #000;width: 40%;margin-top:-5%;padding:2px;text-align:center;'>$tinNumber</p>
                        <p style='margin:140px;border:1px solid #000;width: 47%;margin-top:-12%;padding:2px;text-align:center;'>$philhealth;</p>
                        <p style='margin-top:-50%;text-decoration: underline; text-indent: 123px;'>SSS</p>
                        <p style='margin:80px;border:1px solid #000;width: 40%;margin-top:-5%;padding:2px;text-align:center;'>$sss</p>



                    </div>
                    <div style='margin-top:2%;border:1px solid #000;margin-left:10px; width: 90%;height:18%;'>
                        <p style='margin-left:10px;margin-top:1%;'>Person to notify incase of emergency:</br>
                            Name: $nameOfPersonToNotify</br>
                            Tel No: $cpNumber</p>
                    </div>

                    <p style='padding:2px;text-align:center;font-size:11px;margin-top:1%'>This is to certify the person whose picture and signature appear hereon is an employee of DOH-RO1, SFLU</p>

                    <hr align='center' style='border: 1px solid black;width:90%;margin-top:12%'>
                    </hr>
                    <p align='center' style='margin-top:-2%;font-size:12px;'>PAULA PAZ M. SYDIONGCO, MD, MPH, MBA, CESO IV <br>Director IV</p>

                </div>
            </div>

            </div>
            </body>
        </html>";
$dompdf->setPaper('A4', 'portrait');

$dompdf->loadHtml($html);
$dompdf->render();

$dompdf->addInfo("Title", "ID");
$dompdf->stream("ID.pdf", ["Attachment" => 0]);

$output = $dompdf->output();
// file_put_contents("file.pdf", $output);