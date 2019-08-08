<?php
include('connection.php');

session_start();

$user_id = $_SESSION['id'];

$test = $conn->prepare("SELECT * FROM users WHERE id !='$user_id' ");
$test->execute();
while($row = $test->fetch(PDO::FETCH_ASSOC)){
    $users[]=$row;
}
$output = '';
    foreach($users as $user){
        $status = '';
        $current_timestamp = strtotime(date('Y-m-d H:i:s').'-10 second');
        $current_timestamp = date('Y-m-d H:i:s',$current_timestamp);
        $user_last_activity = fetch_user_last_activity($user['id'], $conn);
        if($user_last_activity > $current_timestamp ){
            $status = '<span class="chat_date"><i class="fa fa-globe bg-success" aria-hidden="true"></i></span>';
        }else{
            $status = '<span class="chat_date"><i class="fa fa-globe bg-danger" aria-hidden="true"></i></span>';
        }
        $output .= '<div class="chat_list active_chat" data-touserid="'.$user['id'].'">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                            <h5>'.$user['name'].$status.'</h5>
                            </div>
                        </div>
                    </div>';
    }


echo $output;
    
    

?>