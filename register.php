<?php
require('vendor/autoload.php');

use ChatApp\Model\Users;

session_start();

$create = Users::create([
    'name' => $_POST['name'],
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'],PASSWORD_DEFAULT),
]);
if($create){
     $SESSION['msg'] = "User Created Successfully";
     header('Location:login-register.php');
 }else{
     echo "Try Again Please";
 }