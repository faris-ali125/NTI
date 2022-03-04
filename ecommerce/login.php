
     <?php
     $title="LOGIN  ";
     include "layouts/header.php";
    //  include "layouts/nav.php";
     include_once "app/database/Requests/register_request.php";
     include_once  "app/database/models/User.php";

use app\database\models\User;
use app\database\Requests\register_request;

     

    if($_POST){
        $errors=[''];
           $login_req= new register_request;
           $login_req-> setEmail($_POST['email']);
           $errors['email'] = $login_req->email_validation2();

           $login_req->setPassowrd($_POST['password']);
           $errors['password'] = $login_req->password_validation();

          if(empty($errors['email']) && empty($errors['password'])){
              $user_object = new User;
              $user_object-> setEmail($_POST['email']);
              $result = $user_object->get_user_by_email();
              if($result->num_rows == 1){
                  $user = $result->fetch_object();
                  if(password_verify($_POST['password'],$user->password)){
                      switch($user->status){
                          case 0:  // not verified
                            header('location:check_code.php');
                          case 2:  // blocked
                            $errors['email']['blocked']="This email is blocked";
                           default : // verified
                           print_r($_POST);
                           if(isset($_POST['rem'])){
                               setcookie("email", $_POST['email'], time() + 24 * 60 * 60 * 30 * 12, '/');
                           }
                           $_SESSION['user']=$user;
                            header('location:index.php');
                      }
                  }else{
                      $errors['password']['wrong_password'] = "This doesn't match our records";
                  }
              }
          }
    }
    // print_r($errors);

     ?>
            

        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <?php
                                            if(isset($errors['email']['email_required'])){
                                               echo"<p class='alert alert-danger'>{$errors['email']['email_required']}</p>";
                                            }
                                            
                                            
                                            ?>
                                            <form action="#" method="post">
                                                <input type="text" name="email" placeholder="email">
                                                <?php
                                                if(!empty($errors['email'])){
                                                    foreach($errors['email'] as $error){
                                                                echo "<p class='text-danger' >{$error}</p>";
                                                    }
                                                                 
                                                }
                                                
                                                ?>
                                                <input type="password" name="password" placeholder="Password">

                                                <?php
                                                if(!empty($errors['password'])){
                                                    foreach($errors['password'] as $error){
                                                                echo "<p class='text-danger' >{$error}</p>";
                                                    }
                                                                 
                                                }
                                                
                                                ?>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox" name="rem">
                                                        <label>Remember me</label>
                                                        <a href="check_email.php">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit"><span>Login</span></button>
                                                    <a class="text-success ml-150" href="register.php" >Register if you dont have an account</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php
    // include "layouts/footer.php";
    include "layouts/scripts.php";
    
    
    ?>    
