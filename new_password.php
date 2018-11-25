<?php
$mypassword = "";
$sql ="";
// De facut dupa ce hotez site-ul
if($_SERVER["REQUEST_METHOD"] == "POST") {
// username and password sent from form

    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    $token = null ; // dupa ce hostez site-ul trebuie sa iau token-ul din url --> in forgetPasswordController trimit mail care e de forma adresaSite/new_passwor?token
    $insertTokenSQL = "UPDATE users SET password ='$mypassword' WHERE token ='$token'";
    $result = $db->query($sql);
    $realPassword = mysqli_fetch_array($result)['password'];

//    la final fac redirect catre login

}
?>