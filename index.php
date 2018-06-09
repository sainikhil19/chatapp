<?php
?>

<html>
<head>
<title>Chat Box</title>
<style>
.button{
    background-color: lightgreen;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 32.5%;
	  overflow: hidden;
}
div {
    border: 1px solid black;
    background-color: lightblue;
    margin-left: 350px;
    margin-right: 350px;
    padding-top: 50px;
    padding-right: 100px;
    padding-bottom: 50px;
    padding-left: 200px;
}
</style>
<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script>
function myFunction() {
    $.ajax({
           type: "POST",
           url: 'http://localhost/php-chat/delete.php',
           data:{action:'delete'},
           success:function(html) {
             alert("Are you sure do you want to delete the conversation?");
           }

      });
    return true;
}
function success() {
  var name = document.getElementById('uname').value;
  var len = name.length;
  var msg = document.getElementById('msg').value;
  var msg_len = msg.length;
	 if(len===0 || msg_len===0) {
            document.getElementById("send").disabled = true;
    } else {
            document.getElementById("send").disabled = false;
    }
  }
function submitChat() {
	if(form1.uname.value == '' || form1.msg.value == '') {
		alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}
	var uname = form1.uname.value;
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
	xmlhttp.send();

}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});

</script>


</head>
<body onbeforeunload="return myFunction()">
    <form name="form1">
      <center>
        <br><br>
        <input type="text" id="uname" name="uname" placeholder="Enter your Chatname" /> <br />
        <br />
        <textarea rows="5" columns="10" name="msg" id="msg" placeholder="Message" onkeyup="success()"></textarea><br /><br />
        <input class="button" type="button" id="send" value="Send" href="#" onclick="submitChat()" disabled></input><br><br>
        <input class="button" type="button" value="Delete chat conversation" href="#" onclick="myFunction()"></input><br><br>
      </center>
    </form>
  <div id="chatlogs" >
  LOADING CHATLOG...
  </div>

</body>
