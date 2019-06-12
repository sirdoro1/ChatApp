<?php
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];

if(!isset($_SESSION['username'])){
    header('location:login-register.php');
    die();
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container-fliud">
        <input class="name" value="<?php echo $name;?>" hidden>
        <div class="row">
            <div class="col-md-12" style="margin-top:10px" ><a href="logout.php" class="btn btn-secondary" style="float:right; margin-right:3px;">Logout</a></div>
        </div>
        <div class="row">
            <div class="col-md-3" style="margin-top:10px" >
                <table class="table table-stripe">
                    <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo $username;?></td>
                    </tr>
                    <thead>
                        <tr><th>Users</th></tr>    
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="col-md-9" style="margin-top:10px" >
                <h4>Chat App</h4>
                <div class="col-md-11">
                    <div class="ChatList">
                    </div>
                </div>
                <div class="testing"></div>
                <div class="col-md-11">
                    <form class="chatForm">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <input type="text" id="message" placeholder="Enter Message here" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" id="submit" value="Send" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>      
            
        </div>
    </div>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.cookie.js"></script>
    
</body>

</html>

