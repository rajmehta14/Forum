<?php
ini_set('display_errors',1);
?>


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
    #ques {
        min-height: 333px;
    }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <!-- <?php
    
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
    while($row = mysqli_fetch_assoc($result))
    {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
    }
    }
    ?>
    <?php
    
$id = $_GET['threadid'];
$sql = "SELECT * FROM `threads` WHERE thread_id=$id"; 
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error: " . mysqli_error($conn);
} else {
    while($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
    }
}
?>
 <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // Insert into thread db
        $comment = $_POST['comment'];
        $sno = $_POST['id'];
       
        $sql = " INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '$sno', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo'
            <div class="alert alert-sucess alert-dismissible fade show" role="alert">
            <strong>Sucess!</strong> Your comment has been added please wait for community to respond.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            
            ';

        }
    }
    ?>

   


    <!-- Category container starts here -->

    <div class="container my-4" id="ques">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead"><?php echo $desc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.
                Be civil.
                Don't post anything that a reasonable person would consider offensive, abusive,
                or hate speech.
                Keep it clean. Don't post anything obscene or sexually explicit.
                Respect each other. Don't harass or grief anyone, impersonate people, or expose their private
                information.
                Respect our forum.
            </p>
        
        </div>
    </div>
<?php
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    echo'
    <div class="container">
        <h1 class="py-2"> Post a Comment </h1>
        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
            <div class="form-group">
                
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="id" value=" ' . $_SESSION["id"] . ' ">
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>';
}
else{
    
        echo'
        <div class="container">
        <h1 class="py-2"> Start a discussion.. </h1>
        <div class="alert alert-sucess alert-dismissible fade show" role="alert">
        <strong>Alert!</strong> Please login first to start a discussion.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        </div>
        ';
     
}
?>

    <div class="container my-3">
        <h2 class="py-2">Discussions</h2>


        <?php
        ini_set("display_errors",1);
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    $noResult= true;
    while($row = mysqli_fetch_assoc($result)) {
        $noResult= false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $time = $row['comment_time'];
        $thread_user_id= $row['comment_by'];

        $sql2 = "SELECT * FROM `registeredusers` WHERE id=$thread_user_id"; 
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
   

        /*$thread_user_id = $row['thread_user_id']; 
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            $row2 = mysqli_fetch_assoc($result2);
}*/

    echo '<div class="media my-3">
            <img src="partials/img/userdefault.png" width="44px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-0">' . $row2['username'] . ' ' . $time . '</p>
               
                '. $content . ' 
            </div>
        </div>';
      
   }
//    echo var_dump($noResult);    To check bool(true)
   if($noResult){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
        <p class="display-4">No comments found!</p>
        <p class="lead">Be the first person to ask a question.</p>
        </div>
        </div>';
   }

        
        ?>

    </div>



    <?php include 'partials/_footer.php';?>
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