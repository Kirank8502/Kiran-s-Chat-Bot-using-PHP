// document.querySelector("#send").addEventListener("click", async (e) => {
    jQuery('#chatbox').submit(function(e){
    e.preventDefault();
    // let xhr = new XMLHttpRequest();
    var userMessage = document.querySelector("#userInput").value;
    var repsoneData = jQuery(this).serialize();
    jQuery.ajax({
        type: "POST",
        url: "ChatBot.php",
        data : repsoneData,
        success: function(data){
            // let userHtml = 
            document.querySelector('#body').innerHTML+= '<div class="userSection">'+'<div class="messages user-message">'+userMessage+'</div>'+'<div class="seperator"></div>'+'</div>';
            // let botHtml = 
            document.querySelector('#body').innerHTML+= '<div class="botSection">'+'<div class="messages bot-reply">'+data+'</div>'+'<div class="seperator"></div>'+'</div>';
            document.getElementById('userInput').value = '';
        }
    });

    // xhr.open("POST","ChatBot.php");
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xhr.send(`messageValue=${userMessage}`);

    // xhr.onload = function () {
    // }

})