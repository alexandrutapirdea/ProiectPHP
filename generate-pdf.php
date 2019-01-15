<?php

require_once __DIR__ . '/vendor/autoload.php';

include("./config.php");
ob_start();
session_start();
 $currentUserId = $_SESSION["user_id"];
$sql = "select * from users_appointments a
                                    JOIN appointments
                                    using(appointment_id)
                                    JOIN users u
                                    on u.user_id = a.user_id
                                    WHERE a.doctor_id = $currentUserId";

$result = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($result);

$doctorId = $data["doctor_id"];
$sql2 = "select * from users where user_id = $doctorId ";
$result = mysqli_query($db, $sql2);
$doctorData = mysqli_fetch_assoc($result);
$appointmentId = mysqli_real_escape_string($db, $_POST['post_appointment_id']);
$diagnosis = mysqli_real_escape_string($db, $_POST['Diagnosis']);
$prescription = mysqli_real_escape_string($db, $_POST['Prescription']);

$firstName = $data["first_name"];
$lastName = $data["last_name"];
$date = $data["date"];

$doctorFirstName = $doctorData["first_name"];
$doctorLastName = $doctorData["last_name"];

$template = "<img src =\"./vendor/logo.jpg\" alt=\"logo\">
<h1 style=\"font-weight: bold; text-align:center;\">Fisa de externare</h1>
          <br/>
          <h2>Date despre pacient :</h2>
          <h3>Pacient: $firstName $lastName</h3>
           <hr/>
          <h3>Doctor : $doctorFirstName $doctorLastName </h3>
          <h3>Data consultatiei : $date</h3>
           <hr/>
          <h3>Diagnostic : $diagnosis </h3>
           <hr/>
          <h2>Tratament :</h2>
           <h3>$prescription </h3>";
try {
    $mpdf = new \Mpdf\Mpdf();

    $mpdf->WriteHTML($template);

    $milliseconds = round(microtime(true) * 1000);
    $amazingName = 'externare' . $milliseconds . '.pdf';
    $mpdf->Output($amazingName,'D');

} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception name used for catch
    // Process the exception, log, print etc.
    echo $e->getMessage();
}


