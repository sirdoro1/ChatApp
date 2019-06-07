    var date = new Date(),
        formatted_date = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
    var conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function(e) {
        console.log("Connection established!");
        var form = $('.chatForm');
        var messageField = form.find('#message');
        
        
        form.on('submit',function(e){
            e.preventDefault();
            var message = messageField.val();
            $('.ChatList').append('<div class="container"><p>'+ message+ '</p><span class="time-right">'+ formatted_date +'</span></div>');
            conn.send(message);
        });
    };

    conn.onmessage = function(e) {
        $('.ChatList').append('<div class="container darker"><p>'+ e.data + '</p><span class="time-right">'+ formatted_date +'</span></div>');
        console.log(e.data);
    };

   