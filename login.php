<?php
include('connection.php');

session_start();

if(isset($_SESSION['user'])){
    header('location:index.php');
  }
  

if($_SERVER['REQUEST_METHOD']=="POST"){

    $usersname = $_POST["username"];
    $password = $_POST["password"];

    $test = $conn->prepare("SELECT * FROM users WHERE username='$usersname' LIMIT 1");
    $test->execute();
    $row = $test->fetch(PDO::FETCH_ASSOC);

    if($row){
    if(password_verify( $password , $row['password'] )){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['msg'] = 'Logged In Successfully';
        $activity_update = $conn->prepare("INSERT INTO login_details (user_id) VALUES ('".$row['id']."')");
        $activity_update->execute();
        $_SESSION['login_details_id'] = $conn->lastInsertId();
        header('Location:chatroom.php');
    }else{
        $_SESSION['msg'] = 'Invalid Login Details';
        header('location:login-register.php');
    }    
}

    
}









