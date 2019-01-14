<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include("config.php");
ob_start();
session_start();


$errors = [];
$myemail = "";
$sql ="";


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form


    $fromEmail = mysqli_real_escape_string($db, $_POST['email']);
    $message = mysqli_real_escape_string($db, $_POST['Message']);
    $subject = mysqli_real_escape_string($db, $_POST['Subject']);

//    $sql = "SELECT * FROM users WHERE email = '$myemail'";
//
//    $result = $db->query($sql);
//    $userData = mysqli_fetch_array($result);
//    $userEmail = $userData["email"];

    if (empty($fromEmail)) {
        array_push($errors, "Your email is required");
        echo "your email is required"; // remove this line after debugging
    }


    $mail = new PHPMailer(TRUE);

    /* Open the try/catch block. */
    try {
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->Username = "tapirdea.alexandru@gmail.com";
        $mail->Password = "HOKAGE1997";
        $mail->IsHTML(true);
        /* Set the mail sender. */
        $mail->setFrom($fromEmail, 'Darth Vader');

        /* Add a recipient. */
        $mail->addAddress('tapirdea.alexandru@gmail.com', 'Emperor');

        /* Set the subject. */
        $mail->Subject = $subject;
        $mail->WordWrap = 50;

        /* Set the mail message body. */
        $mail->Body = $message;

        /* Finally send the mail. */
        $mail->send();
    }
    catch (Exception $e)
    {
        /* PHPMailer exception. */
        echo $e->errorMessage();
    }
    catch (\Exception $e)
    {
        /* PHP exception (note the backslash to select the global namespace Exception class). */
        echo $e->getMessage();
    }

}
?>