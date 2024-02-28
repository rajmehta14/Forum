<?php

// Script to connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "idiscuss";
$conn = mysqli_connect($servername, $username, $password, $database);

require('forgetpw.php');

$un=$_POST['un'];
$re=$_POST['re'];
$confirm=$_POST['confirmpw'];



if(isset($_POST['confirm'])){

    $query="SELECT * FROM `registeredusers` WHERE username='$_POST[un]'";
    $result = mysqli_query($conn,$query);

    if($result){
        if(mysqli_num_rows($result)>0){
    
            $result_fetch=mysqli_fetch_assoc($result);
    
            if($result_fetch['username']==$_POST['un']){
               if($re==$confirm){
                
                    
        
                $password=password_hash($_POST['re'],PASSWORD_BCRYPT);
                $sql="UPDATE `registeredusers` SET `password` = '$password'  WHERE `registeredusers`.`username` = '$un'";
                $result=mysqli_query($conn,$sql);
                if($result){
                    echo"
                <script>
                    window.alert('password change');
                    window.location.href='/forum/index.php';
    
                    
        
                </script>";

                }
                else{
                    echo"
                <script>
                    window.alert('password not change');
                    window.location.href='/forum/partials/forgetpw.php';
    
                    
        
                </script>";

                }


               }
               else{
                echo"
                <script>
                    window.alert('password not match');
                    window.location.href='/forum/partials/forgetpw.php';
    
                    
        
                </script>";

               }
            }
    
            else{
                echo"
                <script>
                    window.alert('username not match');
                    window.location.href='/forum/partials/forgetpw.php';
    
                    
        
                </script>";
            }
    
        }
        else{
            echo"
                <script>
                    window.alert('username not match');
                    window.location.href='/forum/partials/forgetpw.php';
    
                    
        
                </script>";
        }

    }
}

 
?>