<?php
include("./config.php");
ob_start();
session_start();

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
echo "req_user este" . var_dump(isset($_POST['reg_user']));

if (isset($_POST['clicked'])) {
    // receive all input values from the form

    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['inputPassword']);
    $password_2 = mysqli_real_escape_string($db, $_POST['confirmPassword']);
    $specialy = mysqli_real_escape_string($db, $_POST['specialty']);

    echo "username : " . $username . PHP_EOL;
    echo "email : " . $email . PHP_EOL;

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if(!(filter_var($email, FILTER_VALIDATE_EMAIL))) {array_push($errors, "Email is not valid"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    $registration_date = date("Y/m/d");

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    echo "Erori : " .  var_dump($errors);
    if (count($errors) == 0) {
        $password = password_hash($password_1, PASSWORD_DEFAULT);//encrypt the password before saving in the database

        $query = "INSERT INTO users (username,first_name,last_name, email, password,registration_date,user_role) 
  			  VALUES('$username','$firstName','$lastName', '$email', '$password','$registration_date','$user_role')";
        mysqli_query($db, $query);
        echo 'baza de date a fost updatata cu succes :) ';
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: login.php');
    }
}

