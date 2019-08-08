<?php
include('connection.php');


session_start();

$name = $email = $username = $password = '';
$nameError = $emailError = $usernameError = $passwordError = '';

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(!isset($_POST['name'])){
        $nameError = "Name Required";
    }else{
        $name = test_input($_POST['name']);
    }
    if(!isset($_POST['email'])){
        $emailError = "Email Required";
    }else{
        $email = test_input($_POST['email']);
    }
    if(!isset($_POST['username'])){
        $usernameError = "Username Required";
    }else{
        $username = test_input($_POST['username']);
    }
    if(!isset($_POST['password'])){ 
        $passwordError = "Password Required";
    }else{
        $password = password_hash(test_input($_POST['password']),PASSWORD_DEFAULT);
    }
    if(empty($nameError) && empty($emailError) && empty($usernameError) && empty($passwordError)){
        try {
            $sql = "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
            $conn->exec($sql);
            header("Location:login-register.php");
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        $conn = null;
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
