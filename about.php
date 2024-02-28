<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
          body{padding: 100px;}
          .footer{
            margin-top: 30px;
          }
        </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
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
              <li class="nav-item">
                <a class="nav-link active" href="about.php">About</a>
              </li>
              <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
             
              
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


<div class="container">
        <h1>About Us</h1>
        <p>Welcome to Your Forum, a platform where users can engage in discussions, share knowledge, and connect with like-minded individuals. Our mission is to provide a vibrant and inclusive community for everyone.</p>

        <h2>Our Team</h2>
        <p>Behind Your Forum is a dedicated team of developers, designers, and moderators who work tirelessly to ensure the platform runs smoothly and remains a safe space for all users. Meet our team:</p>
        <ul>
            <li><strong>Krisha Shah</strong> - Founder & CEO</li>
            <li><strong>Jane Smith</strong> - Lead Developer</li>
            <li><strong>Michael Johnson</strong> - Community Manager</li>
        </ul>

        <h2>Contact Us</h2>
        <p>If you have any questions, feedback, or concerns, feel free to reach out to us:</p>
        <ul>
            <li>Email: info@yourforum.com</li>
            <li>Phone:+91-942787876</li>
        </ul>
    </div>
    <div class="footer">
    <?php include 'partials/_footer.php';?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
 