<?php

$servername = "localhost";
$username = "serihiuv_chatapp";
$password = "engineer1828";

try {
    $conn = new PDO("mysql:host=$servername;dbname=serihiuv_chatapp", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    function fetch_user_chat_history($from_user_id,$to_user_id,$conn){
        $chats = $conn->prepare('SELECT * FROM conversation 
        WHERE (fromuser = "'.$from_user_id.'" AND touser ="'.$to_user_id.'") 
        OR (fromuser = "'.$to_user_id.'" AND touser ="'.$from_user_id.'")');
    
        $chats->execute();
        $results  = $chats->fetchAll();
        $fromuser = '';
        $touser = '';
        $output = '<div  id="msg_sit" class="msg_sit" data-touserid="'.$to_user_id.'" data-fromuserid="'.$from_user_id.'">';
            foreach($results as $row){
                if($row["fromuser"] == $from_user_id)
                {
                    $output .= '<div class="outgoing_msg">
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