<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link type="text/css" href="home.css" rel="stylesheet">
</head>
<body>
    <h1>Home Page</h1>
    <h2>WELCOME <?php echo $_SESSION['UserName'];?></h2> 

    <div class="chatbox">
        <div id="chatMessage" class="scrollbar"></div>
        <textarea id="chatText" name="chatText" placeholder="Text Message ..."
        rows="5" cols="20"></textarea>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
 </script>
  <script>
      $(document).ready(function()
      {
        $('#chatText').keyup(function(e){
            if(e.keyCode == 13)
           {
            var chatText = $('#chatText').val();
            $.ajax({
                url : 'insertMessage.php',
                type : "POST",
                data : {chatText : chatText},
                success : function()
                {
                    $('#chatMessage').load("displayMessage.php");
                    $('#chatText').val('');
                },
                error : function()
                {
                    alert("Error !!!" );
                }
            })
           }
        });

        // load after each 1.5s
        setInterval(function(){
            $('#chatMessage').load("displayMessage.php");
        },1500);
        $('#chatMessage').load("displayMessage.php");
      });
  </script>
</body>
</html>