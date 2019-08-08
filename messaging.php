<?php
include('connection.php');

$user = $text = '';
$userError = $textError = '';

if($_SERVER['REQUEST_METHOD']=='POST'){
    
        $touser = test_input($_POST['to_user']);
        $fromuser = test_input($_POST['from_user']);
        $message = test_input($_POST['text']);
        $date = date('Y-m-d h:i:s',time());


    if(empty($userError) && empty($textError)){
        try {
            $sql = "INSERT INTO conversation (fromuser,touser,message, created_at, updated_at) VALUES ('$fromuser', '$touser','$message', '$date', '$date')";
            $conn->exec($sql);
            
        }catch(PDOException $e)
            {
                echo "Check Network Connection";
            // echo $sql . "<br>" . $e->getMessage();
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



?>