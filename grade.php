<?php

if($_POST){
    $Physics=$_POST['Physics'];
    $Chemistry=$_POST['Chemistry'];
    $Biology=$_POST['Biology'];
    $Mathematics=$_POST['Mathematics'];
    $Computer=$_POST['Computer'];

    if( 0<$Physics && $Chemistry && $Biology && $Biology && $Mathematics && $Computer<=50 ){
        $message=(($Physics+$Chemistry+$Biology+ $Mathematics+$Computer)*100)/250;
        if($message>=90){
           $grade='A';

        }elseif($message>=80){
            $grade='B';

        }elseif($message>=70){
            $grade='C';

        }elseif($message>=60){
            $grade='D';

        }elseif($message>=40){
            $grade='E';

        }else{
            $grade='F';
        }


    }else{$false="";}
   

    
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
                 <h4>Enter your grades to Calculate year percentage</h4>
            </div>
                  <form method="POST">
                      <!-- Write a PHP program to input marks of five subjects Physics, Chemistry, Biology, Mathematics and Computer -->
                      <input type="number" name="Physics" class="form-control" placeholder="Physics Grade ">
                      <input type="number" name="Chemistry" class="form-control" placeholder="Chemistry Grade ">
                      <input type="number" name="Biology" class="form-control" placeholder="Biology Grade">
                      <input type="number" name="Mathematics" class="form-control" placeholder="Mathematics Grade">
                      <input type="number" name="Computer" class="form-control" placeholder="Computer Grade">
                      <button class="btn btn-dark rounded mt-2">Calculate</button>
                  </form>
                  <?php
               if(isset($message)){
                  echo "<div class='alert alert-success'>Percentage:$message% =>$grade</div>";
                }elseif(isset($false)){echo "<div class='alert alert-danger'>Entar valid number</div>";}
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