    $(document).ready(function(){

        $('#signupform').hide();
        $('#signinform').show();
        $('#signinbtn').hide();

        $(document).on('click','#signupbtn',function(e){
            $('#signinform').hide();
            $('#signupform').fadeIn();
            $('#signinbtn').show();
            $('#signupbtn').hide();
        })
        $(document).on('click','#signinbtn',function(e){
            $('#signupform').hide();
            $('#signinform').fadeIn();
            $('#signinbtn').hide();
            $('#signupbtn').show();
        });
        $(document).on('click','.chat_list',function(e){
            e.preventDefault();
            to_user_id = $(this).data('touserid');
            fetch_user_chat_history(to_user_id);

            setInterval(function(){
                update_chat_history_data()
            },5000)
            function update_chat_history_data(){
                $('.msg_history').each(function(){
                    var to_user_id = $('.msg_history').data('touserid')
                    fetch_user_chat_history(to_user_id)
                })
            }

        })

        
        $(document).on('click','.msg_send_btn',function(){
            var users = {
                $touser: $('.msg_sit').data('touserid'),
                $message: $('.write_msg').val(),
            }
            $.ajax({
                url: "insert.php",
                method:"POST",
                data: users,
                success:function(data){
                    $('.write_msg').val('');
                }
            })
        })

        setInterval(function(){
            update_last_activity();
            fetch_users();
        },5000)
        
        fetch_users();

        function fetch_users(){
            $.ajax({
                url: 'fetch_users.php',
                method: 'POST',
                success:function(data){
                    $('#inbox_chat').html(data);
                }
            })
        }

        function update_last_activity(){
            $.ajax({
                url: 'update_last_activity.php',
                success:function(data){
                }
            })
        }

        function fetch_user_chat_history(to_user_id){
            $.ajax({
                url: "fetch_user_chat_history.php",
                method: "POST",
                data:{
                    to_user_id:to_user_id,
                },
                success:function(data){
                    $('.msg_history').html(data);
                }
            })
        }
        
    });

    



   