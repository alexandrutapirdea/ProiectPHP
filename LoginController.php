<?php
include("config.php");
session_start();

$myemail = "";
$mypassword = "";
$sql ="";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myemail = mysqli_real_escape_string($db, $_POST['email']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    $sql = "SELECT password FROM users WHERE email = '$myemail'";
    $result = $db->query($sql);
    $realPassword = mysqli_fetch_array($result)['password'];

//    var_dump($realPassword);
    if (password_verify($mypassword, $realPassword)) {
        $_SESSION['login_user'] = $myusername;
        header("location: index.html");
    } else {
        $_SESSION['errMsg'] = 'Wrong username or password';
        header("Location: login.php");
//        echo 'Invalid password.';
    }
}
?>
