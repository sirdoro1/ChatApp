<?php 
include('connection.php');

session_start();

if(!empty($_POST['to_user_id'])){
    $_SESSION['to_user_id'] = $_POST['to_user_id'];
}

echo fetch_user_chat_history($_SESSION['id'],$_SESSION['to_user_id'],$conn);

?>