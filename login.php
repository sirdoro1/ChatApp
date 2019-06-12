<?php
require('vendor/autoload.php');

session_start();

use ChatApp\Model\Users;

// if(!empty($_SESSION['user'])){
//     header('location:index.php');
//     exit;
//   }

$username = $_POST['username'];
$password = $_POST['password'];

$check = Users::where(['username'=>$username])->first();

// if($check){
    if(password_verify( $password , $check['password'] )){
        $_SESSION['name'] = $check['name'];
        $_SESSION['email'] = $check['email'];
        $_SESSION['username'] = $check['username'];
        $_SESSION['msg'] = 'Logged In Successfully';
        header('Location:index.php');
    }else{
        $_SESSION['msg'] = 'Invalid Login Details';
        header('location:login-register.php');
    }    
// }


