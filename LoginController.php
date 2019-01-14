<?php
include("config.php");
ob_start();
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

    $currentUserIdSQL = "SELECT user_id FROM users WHERE email='$myemail'";
    $result2 = mysqli_query($db, $currentUserIdSQL);
    $currentUserId = mysqli_fetch_assoc($result2)['user_id'];

//    var_dump($realPassword);
    if (password_verify($mypassword, $realPassword)) {
        $_SESSION['login_user'] = $myemail;
        $_SESSION['user_id'] = $currentUserId;
        $_SESSION['user_role'] = 1 ;
        header("location: index.html");
    } else {
        $_SESSION['errMsg'] = 'Wrong username or password';
        header("Location: login.php");
//        echo 'Invalid password.';
    }
}
?>
