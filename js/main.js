    $(document).ready(function(){
        var date = new Date(),
        formatted_date = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
        var conn = new WebSocket('ws://localhost:8080');

        var form = $('.chatForm');
        var messageField = form.find('#message');
        var chatList = $('.ChatList');
        var testing = $('testing');
        
        
        form.on('submit',function(e){
            e.preventDefault();
            var message = messageField.val();
            chatList.append('<div class="container"><p>'+ message+ '</p><span class="time-right">'+ formatted_date +'</span></div>');
            conn.send(message);
        });


        // conn.onopen = function(e) {
        //     console.log("Connection established!");
        //   $.ajax({
        //     url: '/load_history.php',
        //       dataType: 'json',
        //     success: function (data) {
        //     $.each(data, function(){
        //           messageList.prepend('<li>'+this.text +'</li>');
        //       });
        // };
        

        conn.onopen = function(e) {
            console.log("Connection established!");
            $.ajax({
                url: 'load_history.php',
                dataType: 'json',
                success: function(data) {
                    $.each(data,function(){
                       var dt =  this.updated_at.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
                        chatList.append('<div class="container db-dark"><p>'+ this.text + '</p><span class="time-right">'+ dt +'</span></div>');
                    })
                }
              });
        };

        conn.onmessage = function(e) {
            chatList.append('<div class="container darker"><p>'+ e.data + '</p><span class="time-right">'+ formatted_date +'</span></div>');
        console.log(e.data);
    };
    });

    



   