<?php

require_once __DIR__ . '/vendor/autoload.php';

include("./config.php");
ob_start();
session_start();

$appointmentId = mysqli_real_escape_string($db, $_POST['post_appointment_id']);
$diagnosis = mysqli_real_escape_string($db, $_POST['Diagnosis']);
$prescription = mysqli_real_escape_string($db, $_POST['Prescription']);

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();
