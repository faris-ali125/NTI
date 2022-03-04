<?php
     $title="REGISTER  ";
     include "layouts/header.php";
     include "app/database/Requests/register_request.php";
     include_once __DIR__ . "\\vendor\\autoload.php";
     include "app/database/helpers/hash.php";
     define('Expiration_Duration', 120);

    //  require("vendor/autoload.php");
      use app\database\Requests\register_request;
      use app\database\models\User;
      use app\database\helpers\mail\mail;


    //   use app\database\helpers\mail;
     if($_POST){
       $errors=[];

        //   email validation
       $email_Validation =new register_request;
       $email_Validation->setEmail($_POST['email']);
      $errors['email'] = $email_Validation->email_validation();

          // phone validaion 
        $phone_validation = new register_request;
        $phone_validation->setPhone($_POST['phone']);
        $errors['phone'] = $phone_validation-> phone_validation();

          // Password validation
          $password_validation = new register_request;
          $password_validation-> setPassowrd($_POST['password']);
          $errors['password'] = $password_validation-> password_validation();


          // Confirm Password validation
          $confirm_password_validation = new register_request;
          $confirm_password_validation-> setPassword_confirmation($_POST['user-password']);
          $password_validation-> setPassowrd($_POST['password']);
          $errors['confirm_password'] = $confirm_password_validation->confirm_password_validation();
            if($_POST['user-password'] != $_POST['password']){
            $errors['confirm_password']['confirm_password_match']= "It doesn't match the password";}

              // first name validation
          $first_name_validation = new register_request;
          $first_name_validation-> setFirst_name($_POST['first_name']);
          $errors['first_name'] = $first_name_validation-> first_name_validation();


              // last name validation
          $last_name_validation = new register_request;
          $last_name_validation-> setLast_name($_POST['last_name']);
          $errors['last_name'] = $last_name_validation-> last_name_validation();


          if(empty($errors['first_name']) && empty($errors['last_name']) && empty($errors['confirm_password']) && empty($errors['password']) && empty($errors['phone']) && empty($errors['email'])){

            $code=rand(10000,99999);
            $expirationDate = date('Y-m-d H:i:s',strtotime('+'.Expiration_Duration.' seconds'));
            $insert_user = new User;
            $insert_user->setFirst_name($_POST["first_name"]);
            $insert_user->setLast_name($_POST['last_name']);
            $insert_user->setEmail($_POST['email']);
            $insert_user->setPhone($_POST['phone']);
            $insert_user->setGender($_POST['gender']);
            $insert_user->setCode($code);
            $insert_user->setPassword(bcrypt($_POST['password']));
            $_SESSION['email']=$_POST['email'];
            $result= $insert_user->insert();
                        // var_dump($result); die;
                    

            if($result){
            $mail = new mail( $_POST['email'], 'Verification Code :', $code);
            if($mail->send()){
                header('location:check_code.php');die;

            }else{

                echo "There is a problem try again later";
            }
            

            // print_r($mail);
            }

            
          }


     }

    
    
     ?>

        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <?php
                                               if(isset($result) && !$result){
                                                   echo "<div class='aler alert-danger'>Something went wrong</div>";
                                               }
                                            ?>
                                            <form  method="post">
                                                <input type="text" name="first_name" placeholder="First name" value="<?php if(isset($_POST['first_name'])){echo($_POST['first_name']);} ?>">
                                                <?php
                                                    if(isset($errors['first_name']['first_name_required'])){
                                                        echo "<p class='text-danger' >" . $errors['first_name']['first_name_required'] . "</p>";
                                                    }
                                                  
                                                ?>
                                                <input type="text" name="last_name" placeholder="Last name" value="<?php if(isset($_POST['last_name'])){echo($_POST['last_name']);} ?>">
                                                <?php
                                                    if(isset($errors['last_name']['last_name_required'])){
                                                        echo "<p class='text-danger' >" . $errors['last_name']['last_name_required'] . "</p>";
                                                    }
                                                  
                                                ?>
                                                <input name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){echo($_POST['email']);} ?>" >
                                                <?php
                                                    if(isset($errors['email']['email_required'])){
                                                        echo "<p class='text-danger' >" . $errors['email']['email_required'] . "</p>";
                                                    }
                                                    if(isset($errors['email']['email_reqex'])){
                                                        echo "<p class='text-danger' >" . $errors['email']['email_reqex'] . "</p>";
                                                    }
                                                    if(isset($errors['email']['email_unique'])){
                                                        echo "<p class='text-danger' >" . $errors['email']['email_unique'] . "</p>";
                                                    }
                                                    
                                                ?>
                                                <input type="number" name="phone" placeholder="Phone" value="<?php if(isset($_POST['phone'])){echo($_POST['phone']);} ?>">
                                                <?php
                                                    if(isset($errors['phone']['phone_required'])){
                                                        echo "<p class='text-danger' >" . $errors['phone']['phone_required'] . "</p>";
                                                    }
                                                    if(isset($errors['phone']['phone_reqex'])){
                                                        echo "<p class='text-danger' >" . $errors['phone']['phone_reqex'] . "</p>";
                                                    }
                                                    if(isset($errors['phone']['phone_unique'])){
                                                        echo "<p class='text-danger' >" . $errors['phone']['phone_unique'] . "</p>";
                                                    }
                                                    
                                                ?>
                                                <input type="password" name="password" placeholder="Password">
                                                <?php
                                                    if(isset($errors['password']['password_required'])){
                                                        echo "<p class='text-danger' >" . $errors['password']['password_required'] . "</p>";
                                                    }
                                                    if(isset($errors['password']['pass_regex'])){
                                                        echo "<p class='text-danger' >" . $errors['password']['pass_regex'] . "</p>";
                                                    }
 
                                                ?>

                                                <input type="password" name="user-password" placeholder="confirm Password">
                                                <?php
                                                    if(isset($errors['confirm_password']['confirm_password_required'])){
                                                        echo "<p class='text-danger' >" . $errors['confirm_password']['confirm_password_required'] . "</p>";
                                                    }
                                                    if(isset($errors['confirm_password']['confirm_password_match'])){
                                                        echo "<p class='text-danger' >" . $errors['confirm_password']['confirm_password_match'] . "</p>";
                                                    }
                                                   
                                                ?>
                                                
                                                <select class="form-control mb-25" name="gender">
                                                    <option value="m">Male</option >
                                                    <option value="f">Female</option >
                                                </select>
                                                <div class="button-box">
                                                    <button type="submit"><span>Register</span></button>
                                                    <a class="text-success ml-150" href="login.php" >Login if you alreardy have an account</a>

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
 
