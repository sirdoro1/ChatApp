<?php
session_start();
include('connection.php');

$test = $conn->prepare("SELECT * FROM users");
$test->execute();

while($row = $test->fetch(PDO::FETCH_ASSOC)){
    $users[]=$row;
}
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];

if(!isset($_SESSION['username'])){
    header('location:login-register.php');
    die();
  }

?>


<html>
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/chatroom.css">
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">



</head>
<body>
<div class="container-chatroom">
<div style="float:right; margin:5px"><a href="logout.php" class="btn btn-secondary">Logout</a></div>
<h3 class=" text-center">Chat Room</h3>
<input class="name" value="" hidden>
<div class="messaging">
      <div class="inbox_msg">
        <!-- Contact Area -->
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> 
              </div>
            </div>            
          </div>
          <div class="heading_srch " style="border:1px solid gray;text-align:center">
              <h5 class="fromuser" data-fromuser="<?php echo $id;?>"><?php echo $name?></h5>
            </div>
          <div id="inbox_chat" class="inbox_chat"></div>
        </div>
        <!-- Contact Area -->

        <!-- Messaging Area -->
        <div class="mesgs">


            <!-- Message History -->
          <div  id="msg_history" class="msg_history">
          </div>
          <!-- Message History -->

          <!-- Message Input -->
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>



          <!-- Message Input -->
        </div>
        <!-- Messaging Area -->
      </div>
      
      
      <!-- <p class="text-center top_spac"><></a></p> -->
      
    </div></div>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
    </html>