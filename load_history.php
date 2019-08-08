<?php
include('connection.php');

// if($_SERVER['REQUEST_METHOD']=='POST'){

    
    $fromuser = $_POST['from_user'];
     $touser =  $_POST['to_user'];

    $test = $conn->prepare("SELECT * FROM conversation WHERE fromuser='$fromuser' AND touser='$touser' ");
    $test->execute();

    while($row = $test->fetch(PDO::FETCH_ASSOC)){
        $messages[]=$row;
    }
    echo json_encode($messages);
    
// }


