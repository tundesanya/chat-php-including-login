<?php
  session_start();
  if (!isset($_SESSION['username'])) {
?>
<form name="form2" action="login.php" method="post">
<table border="1" align="center">
<tr>
  <td>Username: </td>
  <td><input type="text" name="username"></td>
</tr>
<tr>
  <td>password: </td>
  <td><input type="password" name="password"></td>
</tr>
 <tr>
  <td colspan="2"><input type="submit" name="submit" value="Login"></td>
</tr>
<tr>
  <td colspan="2"><a href="register.php">Register here to get an account</a></td>
</tr>
</table>
</form> 

<?php
  exit;
   }
?>

<html>
  <head>
    <title>Chat Box</title> 
    <script src="jquery-3.2.1.js"></script>
    <link rel="stylesheet" href="style.css">
    <script>
      
      function saveInput(){
        
        if(form1.msg.value == ''){
          alert('Enter Your Message!!!!!');
        
        } else{
          // alert("Working");
        
        var msg = form1.msg.value;
        var dataString ='&msg=' + msg;
        $.ajax({
          type:"POST",
          url:"insert.php",
          data: dataString,
          cache: false,
          success: function(html){
            $('#chatlogs').html(html);
          }
        })
        }
        
      }

      $(document).ready(function(e){
        $.ajaxSetup({cache:false});
        setInterval(function() {$('#chatlogs').load('logs.php');}, 2000);
      });

      $('#chat_form').on('submit', function(){
        console.log('trigger');
            
           $.ajax({
               url: "out.php",
               type:"POST",
               data: new FormData(this),
               cache: false,
               success: function(html){
                 $('#chatlogs').html(html);
               }
           });

           return true;
      });

      $(document).ready(function(){
        $('#submit').click(function(){
          var msgs = $('#msgs').val();
          if (msgs == '') {
            alert('Enter Your Message!!!!!');
          } else {
            $.ajax({
               url: "out.php",
               type:"POST",
               data: $('#chat_form').serialize(),
               cache: false,
               success: function(html){
                 $('form').trigger("reset");
               }
               
           });
          }

        });
      });

    </script>
  </head>
  <body>
    <form name="form1" id="chat_form" method="post" >
      <table border="1" align="center">
      <tr>
       <td>Your Chat Name:</td> <td><b><?php echo $_SESSION['username'];?></b><br></td>
      </tr>
      <tr>
        <td>
        Your Message: <br/></td>
        <td>
        <textarea id="msgs" name="msg" style="width:200px; height: 70px"></textarea></td>
      </tr>
      <tr>
        <td colspan="2">
        <a href="#" class="button" onclick="saveInput()">Send</a></td>
      </tr>

      <tr>
        <td colspan="2">
        <input type="button" name="submit" id="submit" value="submit"/></td>
      </tr>

      <tr>
        <td colspan="2">
        <a href="logout.php">Logout</a></td>
      </tr>
      </table>

        <div id="chatlogs" style="width:100%; text-align:center">please wait.....!!!!! </div>
      

    </form>

    
  </body>
</html>