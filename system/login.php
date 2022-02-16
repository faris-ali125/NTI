<?php
session_start();


// $pass=$_POST['pass'];
// $mail=$_POST['mail'];


//Validation


  // header("location:login.php");

if(empty($_POST['pass']) || empty($_POST['mail'])){
   echo('Enter valid data');
}else{
  $_SESSION['passs']=$_POST['pass'];
  $_SESSION['mails']=$_POST['mail'];
    // header("location:login.php");
  }
 


// foreach($_POST as $index=>$vale){
//     echo($ibdex);
// }


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      

    <div class="container offset-4 mt-5">
        <div class="row ">
           <h1>Faris System</h1>
        </div>
        <div class="col-4 ">
            <form action="database.php" method="post">
                <label for="mail" class="form-label">E-mail</label>
                <input type="mail"  id="mail" name="mail" class="form-control">

                <label for="pass" class="form-label mt-2">Password</label>
                <input type="password" id="pass" name="pass" class="form-control">

                <button type="submit" name="sub" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

