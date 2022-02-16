<?php
if($_POST){
    if(!empty($_POST['user_name'] && $_POST['loan_amount'] && $_POST['loan_years'])){
        $user_name=$_POST['user_name'];
        $loan_amount=$_POST['loan_amount'];
        $loan_years=$_POST['loan_years'];

       if($loan_years<3){
           $r=0.1;
       }else{$r=0.15;}

        
        
        $rate=($loan_amount*$r)*$loan_years;
        $lai=($loan_amount+$rate);
        $monthly=($lai)/($loan_years*12);
    }

// echo($rate);
// echo($lai);
// echo($monthly);
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
      <!-- Background image -->
<div style="background-image: url('https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp');">
</div>
      <div class="container">
        <div class="row">
           <h1 class="offset-4">Bank</h1>
        </div>
        <div class="clo-4 form-group row">
        <form action="" method="POST" class="offset-4" >

        <label for="tex" class="form">User name</label>
        <input type="text" id="tex" class="form-control" name="user_name" value="<?php echo (isset($user_name))?$user_name:'';?>">

        <label for="num1"class="form">Loan amount</label>
        <input type="number" id="num1" class="form-control" name="loan_amount" value="<?php echo (isset($loan_amount))? $loan_amount:'';?>" >

        <label for="num2"class="form">Loan years</label>
        <input type="number" id="num2" class="form-control" name="loan_years" value="<?php echo (isset($loan_years))?$loan_years:'';?>">

        <button class="btn btn-primary mt-2" name="submit">Calculate</button>
           </form>
        </div>
      </div>
      <?php
      
      if(isset($_POST['submit'])){ 
          if(!empty($user_name) && !empty($loan_amount) && !empty($loan_years)){?>
         
 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">User name</th>
      <th scope="col">Interest rate</th>
      <th scope="col">Loan after interest</th>
      <th scope="col">Monthly</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo (isset($user_name))?$user_name:'';?></th>
      <td><?php echo (isset($rate))?$rate:'';?></td>
      <td><?php echo(isset($lai))?$lai:""; ?></td>
      <td><?php echo (isset($monthly))?$monthly:'';?></td>
    </tr>
    
  </tbody>
</table>

      <?php } } ?>
      
      
     
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>