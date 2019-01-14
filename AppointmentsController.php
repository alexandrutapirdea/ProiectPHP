<?php
include("./config.php");
ob_start();
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
// initializing variables
    $username = "";
    $email    = "";
    $user_role = "1";
    $errors = array();

// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'hospital');

    if (!$db) {
        echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL;
        echo "Valoarea errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    echo "Succes: Conexiunea la MySQL a fost stabilită! Baza de date my_db este minunată." . PHP_EOL;
    echo "Informație despre host: " . mysqli_get_host_info($db) . PHP_EOL;
// REGISTER USER

    if (isset($_POST['clicked'])) {
        // receive all input values from the form

        $doctor = mysqli_real_escape_string($db, $_POST['Doctor']);
        $specialty = mysqli_real_escape_string($db, $_POST['Specialty']);
        $date = mysqli_real_escape_string($db, $_POST['Date']);
        $hour = mysqli_real_escape_string($db, $_POST['Hour']);


        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($doctor)) {
            array_push($errors, "Doctor is required");
        }
        if (empty($specialty)) {
            array_push($errors, "Specialty is required");
        }

        if (empty($date)) {
            array_push($errors, "Date is required");
        }
        if (empty($hour)) {
            array_push($errors, "Hour is required");
        }

        if (count($errors) == 0) {

            $currentUserId = $_SESSION["user_id"];

            $doctorIdSQL = "SELECT user_id FROM users WHERE username='$doctor' ";

            $result1 = mysqli_query($db, $doctorIdSQL);
            $doctorId = mysqli_fetch_assoc($result1)['user_id'];



            $query = "INSERT INTO appointments (specialty,date)
  			  VALUES('$specialty','$date')";
            mysqli_query($db, $query);

            $appointmentId = mysqli_insert_id($db);

            $query = "INSERT INTO users_appointments (user_id,doctor_id,appointment_id)
  			  VALUES('$currentUserId','$doctorId','$appointmentId')";
            mysqli_query($db, $query);



//        header('location: index.html');
        }
    }

} else {

    header('location: login.php');
}





?>