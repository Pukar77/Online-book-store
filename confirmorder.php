<?php


include("navbar.php");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1 class="order_heading">Online Book Store Nepal</h1>

    <form class="confirm" method="POST" action="sendmail.php">
     
      <div class="namee">
        <p>Enter your name</p>
        <input type="text" name="name" placeholder="your name" />
      </div>

      <div class="addresss">
        <p>Enter your address</p>
        <input type="text" name="address" placeholder="your address" />
      </div>

      <div class="email">
        <p>Enter your valid emailid</p>

        <input type="email" id="email_msg" name="email" placeholder="xyz@gmail.com" />
      </div>
 
    <button class="submit_order" type="submit" name="send" >Send</button>


    
    </form>


    
    <div class="gooback1">
    <button class="goback1"  onclick="window.location.href='esewa.php'" >Pay via Esewa</button>
    </div>

<div class="gooback">
    <button class="goback"  onclick="window.location.href='index.php'" >Go to home page</button>
    </div>
    

  
  
   
    
  </body>
</html>

