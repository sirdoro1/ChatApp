<?php
include('connection.php');
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $touser = test_input($_POST['$touser']);
    $fromuser = test_input($_SESSION['id']);
    $message = test_input($_POST['$message']);
    $date = date('Y-m-d h:i:s',time());

    if(!empty($touser) && !empty($fromuser) && !empty($message)){
        $save_chat = $conn->prepare("INSERT INTO conversation (fromuser, touser, message, created_at, updated_at) VALUES ('$fromuser','$touser','$message','$date','$date') ");
        if($save_chat->execute($data)){
            echo fetch_user_chat_history($_SESSION['id'],$touser,$conn);
        }
    }    

}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>