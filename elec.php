<?php

if($_POST){
    $cons=$_POST['cons'];
    if($cons>=0){
        if($cons<=50){
            $price=0.50;
        }elseif($cons<=150){
         $price=0.75;
        }elseif($cons<=250){
         $price=1.20;
        }else{$price=1.50;}
     }else{$false="";}
    // if($cons<=50){
    //        $price=0.50;
    // }elseif($cons<=150){
    //     $price=0.75;
    // }elseif($cons<=250){
    //     $price=1.20;
    // }else{$price=1.50;}
   
    // $bill=$cons*$price;
    // $bill=$bill+(($bill*20)/100);
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

        <div class="container text-center">
            
            <div  class="col-4  offset-4">
            <div class="row mt-5 ">
                 <h3>Enter your electricity consumption</h3>
            </div>
            <!-- Write a PHP program to input electricity unit charges and calculate total electricity bill -->
                  <form method="POST">
                      <input type="number" name="cons" class="form-control" placeholder="consumption">
                      <button class="btn btn-dark rounded mt-2">calculate</button>
                  </form>
                  <?php
               if(isset($price)){
                $bill=$cons*$price;
                $bill=$bill+(($bill*20)/100);
                echo "<div class='alert alert-success'>$bill dollar</div>";
                  
               }elseif(isset($false)){
                echo "<div class='alert alert-danger'>Enter valid number</div>";
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