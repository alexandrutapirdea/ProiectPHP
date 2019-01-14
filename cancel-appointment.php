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

            $currentUserId = $_SESSION["user_id"];
            $appointmentId = mysqli_real_escape_string($db, $_POST['post_appointment_id']);

            $sql = "DELETE FROM appointments WHERE appointment_id='$appointmentId' ";

        if(mysqli_query($db, $sql)){
            echo "Records were deleted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }

// Close connection
        mysqli_close($db);






//        header('location: index.html');

    }

} else {

    header('location: login.php');
}





?>