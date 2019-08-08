<?php
include('connection.php');

session_start();

$update_login = $conn->prepare('UPDATE login_details SET last_activity = date("Y-m-d H:i:s") WHERE login_details_id ="'.$_SESSION['login_details_id'].'" ');
$update_login->execute();

?>