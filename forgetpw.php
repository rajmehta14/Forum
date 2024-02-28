<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget password</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        #cbutton{
            margin-top: 10px;
        }
    </style>
</head>
<body>
<form action="/forum/partials/forget_password.php" method="POST">
          
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text"  class="form-control" id="un" name="un" >
            <label for="exampleInputEmail1" class="form-label">Enter new password</label>
            <input type="password"  class="form-control" id="repw" name="re" >
           </div>
          <div class="mb-10">
              <label for="exampleFormControlTextarea1" class="form-label">Confirm password</label>
              <input type="password"  class="form-control" id="confirm" name="confirmpw" aria-describedby="emailHelp">
         
          <button type="submit" class="btn btn-success" id="cbutton" name="confirm">Confirm</button>
</form>
    
</body>
</html>


