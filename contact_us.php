<?php
include"navbar.php";

include "dbput.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['Name'];
    $user_address = $_POST['Address'];
    $user_number = $_POST['Number'];
    $user_feedback = $_POST['Feedback'];

    $sql = "Insert Into contactus (Name, Address, Number, Feedback) values('$username', '$user_address', '$user_number', '$user_feedback')";

    $result = mysqli_query($conn, $sql);

    if($result){
     echo"   <script>
           alert('Thank you for your feedback!');
           window.location.href = 'index.php';
        </script>";
        
    }
    else{
        echo"Data insertion unsucessful";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<form action="contact_us.php" method = "POST">

<div class="contactusform">
<h1>Your Privacy, Our Concern</h1>


<div class="name">
  <p class="name1"> Enter Your Name  : </P> <input class="input1" type = "text" placeholder = "Name" name = "Name"> </br></br>
 </div>

 <div class="address">
<p class="address1"> Enter Your Address : </P> <input class="input2" type = "text" placeholder = "Address" name = "Address"> </br></br>
</div>

<div class="number">
<p class="number1"> Enter Your Phone Number: </p><input class="input3" type = "number" placeholder = "Number" name = "Number"> </br></br>
</div>



<div class="feedback">
    <P class = "feedback"> Send your valuable feedback   </p>
    <input class="feedback1" type = "textarea" name = "Feedback" placeholder="Your feedback" label="feedback">
</div>

<input class="sub" type="submit" name="submit">
</div>

</form>
    
</body>
</html>