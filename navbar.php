<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Bookstore</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <div class="navbar py-0 ">
      <nav class="navbar navbar-expand-lg py-0 ">
       
        <div class="container-fluid">
          <img class="logo" src="images/ebook_logo.png" />
          <a class="navbar-brand" href="books.php">E-BOOK</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarScroll"
            aria-controls="navbarScroll"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul
              class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
              style="--bs-scroll-height: 100px"
            >
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact_us.php">Contact us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About us</a>
              </li>

              <!-- <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a>

              </li> -->
            </ul>



            <div class="user-login">
             <a href="login.php"> <button class="login_btn">Login</button></a>
              <a href="signup.php"><button class="signup_btn">Signup</button></a>
            </div>

            <div class="search">
              <input class="searching" type="text" placeholder="search" />

              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
          </div>
        </div>
      </nav>
    </div>



    