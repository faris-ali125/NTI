<?php



?>






<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Hospital</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<style>
body {
  padding-top: 50px;
}
.spacer {
  margin-top: 2%;
  margin-bottom: 2%;
}      
.block {
  height: 300px;
  padding-top: 15px;  
  background-color: darkorange;
}  
.block2 {
  min-height: 160px;
  padding-top: 15px; 
} 
.center {
  position: absolute;
/*  top: 0;
  bottom: 0; */
  left: 0;
  right: 0;
  margin: auto;  
}
</style>

</head>

<body>

    <!-- <nav class="navbar navbar-inverse navbar-fixed-top ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand " href="#">Hospital</a>
        </div> -->
        <!-- <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>/.nav-collapse -->
      <!-- </div> -->
    <!-- </nav> -->

<div class="container col-lg-12 spacer"></div>
    


    <div class="container col-lg-12 block">
        
        <div class="row col-xs-6 block2 bg-primary center">
            
            <form method="post" action="Review.php"  class="form-horizontal" role="form" align="center">
            <!-- <div class="form-group" >
                <label class="control-label col-sm-3"  for="username">username<em>*</em></label>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" name="username" id="username" placeholder="username" required="true" class="form-control"/>
                </div>
            </div>   -->
            <div class="form-group">
                <label class="control-label col-sm-3" for="password">phone number<em>*</em></label>
                <div class="col-sm-8 col-xs-12">            
                    <input type="tel" name="phone" value="" id="password" required="true" class="form-control"/> 
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-8">  
                    <input type="submit" name="result1" value="Result" required class="btn btn-default"/>
                </div>
            </div>     
        </form>
        </div>
            
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
</body>
</html>