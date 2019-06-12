    $(document).ready(function(){

       
            var username = $('.name').val();
        
        

        $('#signupform').hide();
        $('#signinform').show();
        $('#signinbtn').hide();


        $('#signupbtn').click(function(){
            $('#signinform').hide();
            $('#signupform').fadeIn();
            $('#signinbtn').show();
            $('#signupbtn').hide();
        })

        $('#signinbtn').click(function(){
            $('#signupform').hide();
            $('#signinform').fadeIn();
            $('#signinbtn').hide();
            $('#signupbtn').show();
        });


        var date = new Date(),
        formatted_date = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
        var conn = new WebSocket('ws://localhost:8080');

        var form = $('.chatForm');
        var messageField = form.find('#message');
        var chatList = $('.ChatList');
        
        
        
        form.on('submit',function(e){
            e.preventDefault();
            var message = {
                text : messageField.val(),
                sender : username,
                type : 'message',
            } 
            chatList.append('<div class="container"><p>'+ message.text+ '</p><span class="time-right">'+ formatted_date +'</span></div>');
            conn.send(JSON.stringify(message));
        });
        

        conn.onopen = function(e) {
            console.log("Connection established!");
            $.ajax({
                url: 'load_history.php',
                dataType: 'json',
                success: function(data) {
                    $.each(data,function(){
                       var dt =  this.updated_at.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
                       if(this.user == username){
                        chatList.append('<div class="container "><p>'+ this.text + '</p><span class="time-right">'+ dt +'</span></div>');
                       }else{
                        chatList.append('<div class="container darker"><p>'+ this.text + '</p><span class="time-right">'+ dt +'</span><span class="time-left">'+ this.user +'</span></div>');
                       }
                        
                    })
                }
              });
        };

        conn.onmessage = function(e) {
            chatList.append('<div class="container darker"><p>'+ e.data + '</p><span class="time-right">'+ formatted_date +'</span></div>');
        // console.log(e.data)
    };
    });

    



   