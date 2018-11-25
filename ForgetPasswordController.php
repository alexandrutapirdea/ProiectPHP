<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include("config.php");
session_start();

$errors = [];
$myemail = "";
$sql ="";


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myemail = mysqli_real_escape_string($db, $_POST['email']);
    $sql = "SELECT * FROM users WHERE email = '$myemail'";
    $result = $db->query($sql);
    $userData = mysqli_fetch_array($result);
    $userEmail = $userData["email"];

    if (empty($myemail)) {
        array_push($errors, "Your email is required");
        echo "your email is required"; // remove this line after debugging
    }else if(mysqli_num_rows($result) <= 0) {
        array_push($errors, "Sorry, no user exists on our system with that email");
        echo "Sorry, no user exists on our system with that email"; //remove this line after debugging
    }

    $token = bin2hex(random_bytes(50));

    if (count($errors) == 0) {
        // store token in the password-reset database table against the user's email
        echo 'fara erori</br>';
        $insertTokenSQL = "UPDATE users SET token ='$token' WHERE email ='$myemail'";
        $results = mysqli_query($db, $insertTokenSQL);
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
        $mail->setFrom('tapirdea.alexandru@gmail.com', 'Darth Vader');

        /* Add a recipient. */
        $mail->addAddress('tapirdea.alexandru@gmail.com', 'Emperor');

        /* Set the subject. */
        $mail->Subject = 'Reset your password on ProiectPHP';
        $mail->WordWrap = 50;

        /* Set the mail message body. */
        $mail->Body = 'Hi there, click on this <a href="https://localhost/new_password.php?token=\">link</a> to reset your password on our site';

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