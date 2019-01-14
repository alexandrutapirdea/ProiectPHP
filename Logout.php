<?php
ob_start();
session_start();

session_destroy();

echo 'Bye bye';

header('location: login.php');
?>