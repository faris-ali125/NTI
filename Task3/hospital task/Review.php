<?php
session_start();
if(empty($_POST['phone'])){
    header("location:Number.php");die;
  }
 $_SESSION['phone']=$_POST['phone'];

// print_r($_POST);
// if($_POST['result']){
//     if(!empty($_POST['radio1']) || !empty($_POST['radio2']) || !empty($_POST['radio3'])){

//     }else{die;}
// // };




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
  <form action="Result.php" method="POST">
  <table class="table table-striped mt-5 w-auto offset-2  ">
  <thead>
    <tr class="table-primary">
      <th scope="col">Question?</th>
      <th scope="col">Bad</th>
      <th scope="col">Good</th>
      <th scope="col">Very good</th>
      <th scope="col">Excellent</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">Are you satisfied with the level of cleanliness?</th>
      <td><input type="radio" class="form-check-input ml-2" name="radio1" value="bad"></td>
      <td><input type="radio" class="form-check-input ml-3" name="radio1" value="good"></td>
      <td><input type="radio" class="form-check-input ml-4" name="radio1" value="verygood"></td>
      <td><input type="radio" class="form-check-input ml-4" name="radio1" value="excellent"></td>
    </tr>
    <tr>
      <th scope="row">Are you satisfied with the level of the service prices?</th>
      <td><input type="radio" class="form-check-input ml-2" name="radio2" value="bad"></td>
      <td><input type="radio" class="form-check-input ml-3" name="radio2" value="good"></td>
      <td><input type="radio" class="form-check-input ml-4" name="radio2" value="verygood"></td>
      <td><input type="radio" class="form-check-input ml-4" name="radio2" value="excellent"></td>
    </tr>
    <tr>
      <th scope="row">Are you satisfied with the level of the nursing services?</th>
      <td><input type="radio" class="form-check-input ml-2" name="radio3" value="bad"></td>
      <td><input type="radio" class="form-check-input ml-3" name="radio3" value="good"></td>
      <td><input type="radio" class="form-check-input ml-4" name="radio3" value="verygood"></td>
      <td><input type="radio" class="form-check-input ml-4" name="radio3" value="excellent"></td>
    </tr>
    <tr>
      <th scope="row">Are you satisfied with the level of doctors?</th>
      <td><input type="radio" class="form-check-input ml-2" name="radio4" value="bad"></td>
      <td><input type="radio" class="form-check-input ml-3" name="radio4" value="good"></td>
      <td><input type="radio" class="form-check-input ml-4" name="radio4" value="verygood"></td>
      <td><input type="radio" class="form-check-input ml-4" name="radio4" value="excellent"></td>
    </tr>
    <tr>
      <th scope="row">Are you satisfied with the level of the calmness in the hospital?</th>
      <td><input type="radio" class="form-check-input ml-2" name="radio5" value="bad"></td>
      <td><input type="radio" class="form-check-input ml-3" name="radio5" value="good"></td>
      <td><input type="radio" class="form-check-input ml-4" name="radio5" value="verygood"></td>
      <td><input type="radio" class="form-check-input ml-4" name="radio5" value="excellent"></td>
    </tr>
    <tr>
      <td colspan="5"><button type="submit" class="btn btn-primary btn-block" name="result">Result</button></td>
    </tr>
  </tbody>
</table>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>