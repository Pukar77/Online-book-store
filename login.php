<?php
// PHP code can be added here for backend functionality if needed
include ("dbput.php");
include("navbar.php");

if(isset($_POST["submit"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql= "select * from auth where
  username='$username' and password='$password'";

  $result = mysqli_query($conn, $sql);
  if($result){
  $num=mysqli_num_rows($result);

  if($num>0) {
      header('location: index.php');
  } else {
      echo "Invalid username or password";
  }
}
}

  



    




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Book Store - Login</title>
  <link rel="stylesheet" href="style.css">
  <style>
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Open Sans", sans-serif;
}

body {
  margin: 0;
  padding: 0;
  min-height: 100vh;
  width: 100%;
  background: linear-gradient(to bottom, #6a4c93, #f06543), url("https://source.unsplash.com/1600x900/?books,library");
  background-blend-mode: overlay;
  background-position: center;
  background-size: cover;
  overflow: hidden;
  display: flex;
  flex-direction: column; /* Arrange navbar on top, content below */
}

.navbar {
  width: 100%;
  background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent background */
  color: #fff;
  padding: 10px 20px;
  position: fixed; /* Keep navbar at the top */
  top: 0;
  left: 0;
  z-index: 10; /* Ensure it stays above other content */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.navbar a {
  color: #fff;
  text-decoration: none;
  margin-right: 20px;
}

.navbar a:hover {
  text-decoration: underline;
}

.wrapper {
  width: 400px;
  border-radius: 8px;
  padding: 30px;
  text-align: center;
  border: 1px solid rgba(255, 255, 255, 0.5);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  margin-top: 100px; /* Add margin to push content below navbar */
  align-self: center; /* Center the form horizontally */
}

form {
  display: flex;
  flex-direction: column;
}

h2 {
  font-size: 2rem;
  margin-bottom: 20px;
  color: #fff;
}

.input-field {
  position: relative;
  border-bottom: 2px solid #ccc;
  margin: 15px 0;
}

.input-field label {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  color: #fff;
  font-size: 16px;
  pointer-events: none;
  transition: 0.15s ease;
}

.input-field input {
  width: 100%;
  height: 40px;
  background: transparent;
  border: none;
  outline: none;
  font-size: 16px;
  color: #fff;
}

.input-field input:focus~label,
.input-field input:valid~label {
  font-size: 0.8rem;
  top: 10px;
  transform: translateY(-120%);
}

.forget {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 25px 0 35px 0;
  color: #fff;
}

#remember {
  accent-color: #fff;
}

.forget label {
  display: flex;
  align-items: center;
}

.forget label p {
  margin-left: 8px;
}

.wrapper a {
  color: #efefef;
  text-decoration: none;
}

.wrapper a:hover {
  text-decoration: underline;
}

button {
  background: #fff;
  color: #000;
  font-weight: 600;
  border: none;
  padding: 12px 20px;
  cursor: pointer;
  border-radius: 3px;
  font-size: 16px;
  border: 2px solid transparent;
  transition: 0.3s ease;
}

button:hover {
  color: #fff;
  border-color: #fff;
  background: rgba(255, 255, 255, 0.15);
}

.register {
  text-align: center;
  margin-top: 30px;
  color: #fff;
}
  </style>
</head>
<body>
 
  <div class="wrapper">
    <form action="" method="POST">
      <h2>Login</h2>
      <div class="input-field">
        <input type="text" name="username" required>
        <label>Enter your username</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your passwords</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit" name="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="signup.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>
