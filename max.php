<?php

if(isset($_POST['m1'])){
    
    $x=$_POST['x'];
    $y=$_POST['y'];
    $z=$_POST['z'];
    
    $max=$x;
    if($max>$y){
       if($max>$z){
           $message=($max);
       }else{$message=($z);}
    }elseif($y>$z){
              $message=($y);
    }else{$message=($z);}
  
}

if(isset($_POST['m2'])){
    
    $x=$_POST['x'];
    $y=$_POST['y'];
    $z=$_POST['z'];
    
    $max=$x;
    if($max<$y){
       if($max<$z){
           $message=($max);
       }else{$message=($z);}
    }elseif($y<$z){
              $message=($y);
    }else{$message=($z);}
  
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

     <div class="container text-center" >
         <div class="row-4 mt-5">
            <h1 class="">Enter 3 numbers</h1>
         </div>
         <div class="col-4 offset-4">
              <form method="POST">
                  <div class="form-groups">
                       <input type= "number" name="x" class="form-control" placeholder="first number" >
                       <input type= "number" name="y" class="form-control mt-1" placeholder="second number" >
                       <input type= "number" name="z" class="form-control mt-1" placeholder="third number"> 
                  </div>
                  <div class="form-group">
                        <button class="btn btn-dark rounded mt-2" name="m1">calculate max </button>
                        <button class="btn btn-dark rounded mt-2" name="m2">calculate mini </button>
                  </div>
              </form>
              <?php
               if(isset($message)){
                  echo "<div class='alert alert-success'>$message</div>";
               }

              ?>

         </div>

     </div>



      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

