<?php

$conn = mysqli_connect("localhost","root","","mydb");

if(!$conn){
    echo "Connection Failed";
}else{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $message = filter_input(INPUT_POST, 'messages');
        $user_messages = mysqli_real_escape_string($conn, $_POST["messages"]);
        $query = "SELECT * FROM chatbot WHERE my_message LIKE '%$user_messages%'";
        $makeQuery = mysqli_query($conn, $query);

        if(mysqli_num_rows($makeQuery) > 0) 
        {
            $result = mysqli_fetch_assoc($makeQuery);
            echo $result['message'];
            exit();
        }else{
            echo "Sorry, I can't understand you.";
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
<div id="bot">
  <div id="container">
    <div id="header">
        Online Chatbot App
    </div>

    <div id="body">
    </div>

    <div id="inputArea">
      <form id='chatbox' method='POST'>
        <input type="text" name="messages" id="userInput" placeholder="Please enter your message here" required>
        <input type="submit" id="send" value="Send">
      </form>
    </div>
  </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="script.js"></script>
    <script>
    //     document.querySelector("#send").addEventListener("click", async (e) => {
    //         e.preventDefault();
    //         var userMessage = document.querySelector("#userInput").value
    //         jQuery.ajax({
    //     url: "ChatBot.php",
    //     type: "POST",
    //     data: userMessage,
    //     success: function(){
    //         document.querySelector('#body').innerHTML+= '<div class="userSection">'+'<div class="messages user-message">'+userMessage+'</div>'+'<div class="seperator"></div>'+'</div>';
    //         document.querySelector('#body').innerHTML+= '<div class="botSection">'+'<div class="messages bot-reply">'+userMessage+'</div>'+'<div class="seperator"></div>'+'</div>';
    //     }
    // });
    // })
    </script>
</body>
</html>