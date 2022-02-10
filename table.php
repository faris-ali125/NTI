<?php
// dynamic table
// dynamic rows
// dynamic columns
// check if gender of user == m ==> male
// check if gender of user == f ==> female


// collection => laravel => array of objects
$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => 'm',
        'hobbies' => 'football'.','.'swimming'.','. 'running',
        'activities' => 'drawing'.','.'painting',
        'email' =>'as@hh'
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" =>'m', 
        'hobbies' => 'swimming'.','. 'running',
        'activities' =>'drawing'.','.'painting',
    'email' =>'as@hh'
    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" =>'f', 
        'hobbies' => 'running',
        'activities' => 'drawing'.','.'painting',
            'email' =>''
    ],
    
    
];

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
    <table class="container">
        <thead class="row-14 alert alert-success">
            <?php
            foreach($users[0] as $key=>$value ){?>
                <th><?php echo $key?></th>
    
          <?php }?>
        </thead>

        <tbody class="col-14 alert alert-danger">
        
            <?php
            for($i=0;$i<=array_key_last($users);$i++){
              echo' <tr>' ;
                foreach($users[$i] as $key=>$value){?>
                   
                    <td><?php echo$value ?></td>
                    
              <?php }?>
               
                <tr>
                <?php }?> 
                
              
          
           
           
        </tbody>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>