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
        <div class="row">
            <div class="col-md-10" style="margin-top:10px" >
                <h4>Chat App</h4>
                <div class="col-md-11">
                    <div class="ChatList">
                    </div>
                </div>
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
<script src="js/main.js"></script>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/jquery.cookie.js"></script>
    
</body>

</html>