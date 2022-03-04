
     <?php
     $title="CHECK CODE   ";
     include "layouts/header.php";
     include "layouts/nav.php";
     require("vendor/autoload.php");
     define('Expiration_Duration', 120);

use app\database\helpers\mail\mail;
use app\database\models\User;
      if(isset($_POST['submit'])){
          $errors=[];
          if(empty($_POST['code'])){
             $errors['code']['required']= 'Code Is Required';
          }else{
              if(strlen($_POST['code']) != 5){
                  $errors['code']['digits']= 'Code Must Contains 5 Digits';
              }
          }

      if(empty($errors)){
        $user_object = new User;
        $user_object->setCode($_POST['code']);
        $user_object->setEmail($_SESSION['email']);
        $result = $user_object->checkcode();

      if($result->num_rows == 1){
          $user = ($result->fetch_object());
          date_default_timezone_set('Africa/Cairo');
          $user_object->setEmail_verified_at(date("Y-m-d H:i:s"));
          $user_object->setStatus('1');
          $update_result = $user_object->change_user_status();

        //   var_dump($update_result);
          if($update_result){

            header('location:set_new_password.php');
        }else{
              $errors['code']['error'] = "Something Went Wrong";
          }

      }else{
          $errors['code']['wrong'] = 'Wrong Code';
      }
    }
//    var_dump($user_object);

}

// $user_object = new user;
// $user_object->setEmail($_SESSION['email']);

// if(isset($_POST['resend'])){
//             $errors= [];
//             $code = rand(10000,99999);
//             $expirationDate = date('Y-m-d H:i:s',strtotime('+'.Expiration_Duration.' seconds'));  
//             $user_object->setCode($code);
//             $user_object->setCode_expired_at($expiration_date);
//             $result = $user_object->update_code();
//             // var_dump($result);
//             if($result){
//                 $mail = new mail($_SESSION['email'],"Resend Code :",$code);
//                 if($email_result = $mail->send()){
//                     $succsess['suc'] = "We Resend a Code";
//                 }
//             }else{
//                 $errors['code']['error'] = "Try Again Later";
//             }

// }

//              $expiration_date_time = $user_object->get_user_by_email($_SESSION['email'])->fetch_object()->code_expired_at;
//              if(isset($_POST['submit'])){
//                  $errors = [];
//                  if(empty($_POST['code'])){
//                      $errors['code']['required'] = "Code is required";
//                  } else{
//                      if(strlen($_POST['code'])){
//                          $errors['code']['digits'] = 'Code Must Contain 5 Digits';
//                      }
//                  }


//                  if(empty($errors)){
//                      $user_object->setCode($_POST['code']);
//                      $result = $user_object->checkcode();
//                      if($result->num_rows == 1){
//                          if(check_if_code_expired()){
//                              $user = ($result->fetch_object());
//                              $user_object->setEmail_verified_at('Y-m-d H:i:s');
//                              $user_object->setStatus(1);
//                              $update_result = $user_object->change_user_status();

//                              if($update_result){
//                                  header('location: login.php');
//                              }else{
//                                  $errors['code']['error'] = "Some Thing Wrong";
//                              }
//                          }else{
//                              $errors['code']['expired'] = 'Expired Code';
//                          }
//                      }else{
//                          $errors['code']['wrong'] ="Wrong Code";
//                      }
//                  }
//              }

      
//              function check_if_code_expired(){
//                  global $expiration_date_time;
//                  if(date('Y-m-d H:i:s') <= $expiration_date_time){
//                                return true;
//                  }else{
//                      return false;
//                  }
//              }


     ?>

        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> CHeck Code</h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="#" method="post">
                                                <?php
                                                if(isset($succsess['suc'])){
                                                    echo "<p class='alert alert-success'>{$succsess['suc']}</p>";
                                                }
                                                
                                                
                                                ?>
                                                <h4>Enter the code we were sent to your email</h4>
                                                <input type="number" name="code" placeholder="code">
                                                  <?php
                                                      if(isset($errors['code'])){
                                                                           
                                                        foreach($errors['code'] as $error){
                                                            echo "<p class='text-danger'>{$error}</p>";
                                                          }
                                                        }
                                                  ?>
                                                <div class="button-box">
                                                    <button type="submit" name="submit"><span>Submit</span></button>
                                                    <button type="submit" name="resend" ><span>Resend</span></button>
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
    include "layouts/footer.php";
    include "layouts/scripts.php";
    
    
    ?>    
