<?php
session_start();

// Script to connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "idiscuss";
$conn = mysqli_connect($servername, $username, $password, $database);
?>




<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tutorial</title>
        <link rel="stylesheet" href="bootstrap.css">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

        <link rel="stylesheet" href="style.css">

        <style>
          #register-popup{
            z-index: 99;
          }
          div.popup-container{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    display: none;
  }
  
  div.popup-container div.popup{
    background-color: #f0f0f0;
    width: 350px;
    border-radius: 5px;
    padding: 20px 25px 30px 25px;
  }
  
  div.popup-container div.popup h2{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
    color: #30475e;
  }
  
  div.popup-container div.popup h2 button{
    border: none;
    background-color: transparent;
    outline: none;
    font-size: 18px;
    font-weight: 550;
    color: #797775;
  }
  
  div.popup-container div.popup input{
    width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
    border: none;
    border-bottom: 2px solid #30475e;
    border-radius: 0;
    padding: 5px 0;
    font-weight: 550;
    font-size: 14px;
    outline: none;
  }
  div.popup-container div.popup button.login-btn,div.popup-container div.register button.register-btn{
    font-weight: 550;
    font-style: 15px;
    color: white;
    background-color: #30475e;
    padding: 4px 10px;
    border: none;
    outline: none;
    margin-top: 5px;
  }
  
  div.popup-container div.register{
    background-color: #edeef7;
  }
  
  div.popup-container div.register h2{
    color: #fa9579;
  }
  
  div.popup-container div.register input{
    border-bottom-color: #fa9579;
  }
  
  div.popup-container div.register button.register-btn{
    background-color: #fa9579;
  }

  #login-popup{
    z-index: 99;
  }
  .user{
    color: #edeef7;
    padding: 8px;
  }
        </style>
    </head>

    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark  fixed-top ">
        <div class="container">
          <a class="navbar-brand" href="#">iDiscuss</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span ><i id="bar" class="fas fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ml-8px">
              
              <li class="nav-item">
                <a class="nav-link active" href="/forum">Home</a>
              </li>
              
              <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <div class="dropdown-menu">
          <?php
          $sql="SELECT * FROM `categories`";
          $result = mysqli_query($conn, $sql);

          // Categories table
  
     while($row = mysqli_fetch_assoc($result)){
      echo'

          <a class="dropdown-item" href="threadlist.php?catid= ' . $row['category_id'] . '">' . $row['category_name'] . '</a>';
     }
     ?>
      </li>
      <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search" onkeyup="showUser(this.value)" required>
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
             
             
              
              <div class="logged">
              <?php
                      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
                        echo"
                        <div class='user'>
                        welcome-$_SESSION[username] --- <a href='/forum/logout.php'>LOGOUT
                       
                        
                        </a>
                        </div>";
        
                        }  
                        else{
                          echo"
                          
                          <div class='sign-in-up py-2'>
                            <button type='button' onclick=\"popup('login-popup')\">LOGIN</button>
                            <button type='button' onclick=\"popup('register-popup')\">REGISTER</button>
                          </div>

                          ";
                        }
  
               ?>

            
            
          </div>
        </div>
      </nav>

<div class="popup-container" id="login-popup">
    <div class="popup">
      <form method="POST" action="/forum/partials/login_register.php" id="form">
        <h2>
          <span>USER LOGIN</span>
          <button type="reset" onclick="popup('login-popup')">X</button>
        </h2>
        <input type="text" placeholder="E-mail or Username" name="email_username" required>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit" class="login-btn" name="login">LOGIN</button>
        <a href="/forum/partials/forgetpw.php" >Forget Password?</a>
      </form>
    </div>
  </div>

  <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="/forum/partials/login_register.php">
        <h2>
          <span>USER REGISTER</span>
          <button type="reset" onclick="popup('register-popup')">X</button>
        </h2>
        <input type="text" placeholder="Full Name" name="name" required>
        <input type="text" placeholder="Username" name="username" required>
        <input type="email" placeholder="E-mail" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit" class="register-btn" name="register">REGISTER</button>
      </form>
    </div>
  </div>

  <script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
  </script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
            integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
            crossorigin="anonymous"></script>
    </body>
</html>