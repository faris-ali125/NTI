<?php
 session_start();

    if(!isset($_POST['radio1']) || !isset($_POST['radio2']) || !isset($_POST['radio3']) || !isset($_POST['radio4']) || !isset($_POST['radio5'])){
        header("location:Review.php");
        // echo 'eee';
    }


    $value=0;
    for($i=1; $i<=5; $i++){
    if($_POST['radio'.$i]=='bad'){
         $value+=0;
    }elseif($_POST['radio'.$i]=='good'){
          $value+=3;
    }elseif($_POST['radio'.$i]=='verygood'){
           $value+=5;
    }elseif($_POST['radio'.$i]=='excellent'){
           $value+=10;
    }
}


    
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
  <table class="table table-striped mt-5 w-auto offset-2  ">
  <thead>
    <tr class="table-primary">
      <th scope="col">Question?</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th scope="col">Reviews</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">Are you satisfied with the level of cleanliness?</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo($_POST['radio1']) ?></td>
    </tr>
    <tr>
      <th scope="row">Are you satisfied with the level of the service prices?</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo($_POST['radio2']) ?></td>
    </tr>
    <tr>
      <th scope="row">Are you satisfied with the level of the nursing services?</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo($_POST['radio3']) ?></td>
    </tr>
    <tr>
      <th scope="row">Are you satisfied with the level of doctors?</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo($_POST['radio4']) ?></td>
    </tr>
    <tr>
      <th scope="row">Are you satisfied with the level of the calmness in the hospital?</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo($_POST['radio5']) ?></td>
    </tr>
  
    <tr>
    <?php if($value>=25){ ?>
      <td colspan="9" class="text-center alert alert-success">Thank you</td>
      <?php } ?>

    <?php if($value<25){ ?>
      <td colspan="9" class="text-center alert alert-danger">Please contact the patient to find out the reason for bad evalution <?= $_SESSION['phone'] ?></td>
      <?php } ?>
    </tr>
  </tbody>
</table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

