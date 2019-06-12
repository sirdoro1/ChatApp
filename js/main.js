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


        // Chat
            var date = new Date(),
            formatted_date = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
            var conn = new WebSocket('ws://localhost:8080');

            var chatMsgHst = $('.msg_history');
            var chatMsg = $('.write_msg');

            $('.msg_send_btn').click(function(){
                var message = {
                    text : chatMsg.val(),
                    sender : username,
                    type : 'message',
                } 
                chatMsgHst.append('<div class="outgoing_msg"><div class="sent_msg"><p>'+ message.text +'</p><span class="time_date">'+formatted_date+'</span> </div></div>');

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
                            chatMsgHst.append('<div class="outgoing_msg"><div class="sent_msg"><p>'+this.text+'</p><span class="time_date">'+dt+'</span> </div><div class="incoming_msg_img"></div>');
                        }else{
                            chatMsgHst.append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="received_msg"><div class="received_withd_msg"><p>'+ this.text +'</p><span class="time_date">'+ dt +'</span></div></div></div>');
                        }
                            
                        })
                    }
                });
            };
            conn.onmessage = function(e) {
                chatMsgHst.append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="received_msg"><div class="received_withd_msg"><p>'+ e.data +'</p><span class="time_date">'+ formatted_date +'</span></div></div></div>');
            console.log(e.data)
            };
        // Chat Functions
    });

    



   