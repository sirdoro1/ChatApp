<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=chatapp", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

function fetch_user_last_activity($user_id, $conn){
    $fetch_last_activity = $conn->prepare('SELECT * FROM login_details WHERE user_id = "$user_id" ORDER BY last_activity DESC LIMIT 1 ');
    $fetch_last_activity->execute();
    $result = $fetch_last_activity->fetchAll();
    foreach($result as $row){
        return $row['last_activity'];
    }
}

function fetch_user_chat_history($from_user_id,$to_user_id,$conn){
    $chats = $conn->prepare('SELECT * FROM conversation 
    WHERE (fromuser = "'.$from_user_id.'" AND touser ="'.$to_user_id.'") 
    OR (fromuser = "'.$to_user_id.'" AND touser ="'.$from_user_id.'")');

    $chats->execute();
    $results  = $chats->fetchAll();
    $fromuser = '';
    $touser = '';
    $output = '';
        foreach($results as $row){
            if($row["fromuser"] == $from_user_id)
            {
                $output .= '<div class="outgoing_msg" data-touserid="'.$to_user_id.'" data-fromuserid="'.$from_user_id.'">
                                <div class="sent_msg">
                                    <p>'.$row["message"].'</p>
                                    <span class="time_date">'.$row["created_at"].'</span>
                                </div>
                            </div>';
            }
            else{
                   $output .= '<div class="incoming_msg">
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>'.$row["message"].'</p>
                                            <span class="time_date">'.$row["created_at"].'</span>
                                        </div>
                                    </div>
                                </div>';
            }
        }
        $output .='</div>';
        return $output;
}

function get_user_name($user_id, $conn){
    $get_user = $conn->prepare('SELECT * FROM users WHERE id="$user_id" ');
    $get_user->execute();
    $results = $get_user->fetchAll();

    foreach($results as $row){
        global $values ;
        $values = $row['name'];
    }
    return $values;
}


?> 