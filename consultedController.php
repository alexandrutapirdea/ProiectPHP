<?php
include("./config.php");
ob_start();
session_start();
if ( isset( $_SESSION['user_id'])  ) {

    $errors = array();

// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'hospital');

    if (!$db) {
        exit;
    }

// REGISTER USER

    if (isset($_POST['consulted'])) {
        // receive all input values from the form

        $currentUserId = $_SESSION["user_id"];

        $appointmentId = mysqli_real_escape_string($db, $_POST['post_appointment_id']);
        $diagnosis = mysqli_real_escape_string($db, $_POST['Diagnosis']);
        $prescription = mysqli_real_escape_string($db, $_POST['Prescription']);

        $sql = " UPDATE appointments SET diagnosis ='$diagnosis' , prescription ='$prescription' WHERE appointment_id='$appointmentId' ";
//
        if(mysqli_query($db, $sql)){
            echo "Records were successfully updated.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }

// Close connection
        mysqli_close($db);






        header('location: my-diagnostics.php');

    }

} else {

    header('location: login.php');
}
?>