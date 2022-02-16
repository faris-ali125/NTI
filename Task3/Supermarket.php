<?php
$number='';
$user_name='';
$total=0;
$city='';
$deliv=0;
// $_REQUEST['pn']='';
// $_REQUEST['price']=0;
// $_REQUEST['qu']=0;
// $_REQUEST['st']=0;
// $pn='';
// $price=0;
// $qu=0;
// $st=0;
if($_POST){
$user_name=$_POST['un'];
$city=$_POST['city'];
$number=$_POST['nov'];

// echo($user_name);
// echo($city);
// echo($number);

}

?>






<!doctype html>
<html lang="en">
  <head>
    <title>Super Narket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <form method="POST">
  <div class="form-row row-14 w-100 bg-secondary">

    <div class="form-group  mt-5  offset-2  col-lg-6">
      <label for="inputEmail4" class="form-lable mt-2">User name</label>
      <input type="text" class="form-control" id="inputEmail4" name="un" value="<?php echo($user_name) ?>">
      <label for="inputState" class="form-lable  mt-5">City</label>
      <select id="inputState" class="form-control" name="city" >
        <option value="<?php echo $city?>"></option>
        <option>Cairo</option>
        <option>Giza</option>
        <option>Alex</option>
        <option>Others</option>
      </select>

      <label for="inputAddress" class="form-lable  mt-2">Number of varieties</label>
      <input type="number" class="form-control" id="inputAddress" name="nov" value=<?php echo($number) ?>>

      <button type="submit" class="btn btn-primary  mt-3 btn-block" name="prod">Enter products</button>
    </div>
</form>


<?php
if(isset($_POST['prod']) && !empty($number) && !empty($user_name) && !empty($city)){ 
  if(isset($_POST['receipt'])){
    echo"";
  }else{?>
  
<div class="container  w-100 ">
<table class="table table-striped w-auto  offset-2 ">
  <thead>
    <tr>
      <th scope="col">Product name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantities</th>
    </tr>
  </thead>
  <?php } ?>

  
  <tbody>
  <?php
  if(!empty($user_name)){
  for($i=1; $i<=$number; $i++){ ?>
      <tr>
        <th scope="row"><input type="text"  name="pn<?php echo $i?>"></th>
        <th scope="row"><input type="number" name="price<?php echo $i?>"></th>
        <th scope="row"><input type="number"  name="qu<?php echo $i?>"></th>
      </tr>
  <?php } ?>
  </tbody>
 </table> 
 </div>
  <div class="col-sm-6 offset-2">
  <button type="submit" class="btn btn-primary  mt-3 btn-block " name="receipt">Receipt</button>
  </div>

  <?php } ?>
  <?php } ?>
  

<?php
if(isset($_POST["receipt"])){
  ?>

<table class="table table-striped mt-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Product name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantities</th>
      <th scope="col">Sub total</th>
    </tr>
  </thead>
  <tbody>

 <?php for($i=1; $i<=$number; $i++){ ?>
  <tr>
    <?php
    foreach($_POST as $key=>$value){ 
      
      if($key=='pn'.$i){
        $pn=$value;
      }elseif($key=='price'.$i){
        $price=$value;
      }elseif($key=='qu'.$i){
        $qu=$value;
      };
      
      ?>
    <?php }?>
    <td><?php echo($pn) ?></td>    
    <td><?php echo($price) ?></td>    
    <td><?php echo($qu) ?></td>    
    <td><?php echo($st=$price*$qu) ?></td>    
  </tr>
  <?php }?>

  </tbody>
  </table> 
  <?php }?>

  <?php
    if(isset($_POST['receipt'])){ ?>

  <table class="table">
  <thead >
    <tr>
      <th scope="col"><strong>Client name</strong></th>
      <th scope="col"><?php echo($user_name); ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><strong>City</strong></th>
      <td><?= $city ?></td>
    </tr>
    <tr>
      <th scope="row"><strong>Total</strong></th>
      <td><?php
      if(isset($_POST['receipt'])){
       for($i=1; $i<=$number; $i++){
      $total=$total+$_POST['price'.$i];
      // print_r();
     }      echo($total." ");
    } ?>EGP </td>
    </tr>
    <tr>
      <th scope="row"><strong>Discount</strong></th>
      <td><?php
      if($total<=1000){
          $discount=0;
      }elseif($total<=3000){
          $discount=$total*0.1;
      }elseif($total<=4500){
           $discount=$total*0.15;
      }else{$discount=$total*0.2;}
      echo($discount ." ");
      ?>EGP</td>
    </tr>
    <tr>
      <th scope="row"><strong>Total after discount</strong></th>
      <td> <?php 
      $tad=$total-$discount;
      echo($tad);
       ?>  </td>
    </tr>
    <tr>
      <th scope="row"><strong>Delivery</strong></th>
      <td>
        <?php
        if($city=='Cairo'){
            $deliv=0;
        }elseif($city=='Giza'){
            $deliv=30;
        }elseif($city=='Alex'){
            $deliv=50;
        }elseif($city=='Others'){
             $deliv=100;
        }
        echo($deliv);
        ?>
      </td>
    </tr>
    <tr>
      <th scope="row"><strong>Net Total</strong></th>
      <td>
        <?php
        echo($tad+$deliv);
        
        ?>
      </td>
    </tr>
  </tbody>
</table>
<?php }?>

  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>