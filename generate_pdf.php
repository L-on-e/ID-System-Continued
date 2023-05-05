<?php

require_once __DIR__ . '/vendor/autoload.php';
include("db_connect.php");
$mpdf = new \Mpdf\Mpdf();
                    
$content = file_get_contents("downloadable_content.php");
$mpdf->WriteHTML($content);
$mpdf->Output();