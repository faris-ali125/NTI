<?php
include "vendor/autoload.php";
use app\database\helpers\mail\mail;
use app\database\models\User;
use app\database\Requests\login_request;

$title = "Check Your Email Address";
include_once "layouts/header.php";
// include_once "app/middleware/guest.php";
if($_POST){
    /// validation
    // rules => required , regex , exists:users,email
    $errors = [];
    $login_request = new login_request;
    $login_request->set_email($_POST['email']);
    $errors['email'] = $login_request->email_validaiton();

    if(empty($errors['email'])){
        $_SESSION['email']=$_POST['email'];
        $user_object = new User;
        $user_object->setEmail($_POST['email']);
        $result = $user_object->get_user_by_email();
        if($result->num_rows == 1){
            $user = $result->fetch_object();
            // exipration time
            // $expiration_time = date('Y-m-d H:i:s',strtotime('+'.Expiration_Duration.' seconds'));
            //  expiraiton time in DB
            // $user_object->setCode_expired_at($expiration_time);
            // $result = $user_object->updateExpirationTime();
            // if($result){
                // send code
                    //    --------------------------------------------------------
                    if(isset($_POST['email'])){
                        $errors= [];
                        $code = rand(10000,99999);
                        // $expirationDate = date('Y-m-d H:i:s',strtotime('+'.Expiration_Duration.' seconds'));  
                        $user_object->setCode($code);
                        // $user_object->setCode_expired_at($expiration_date);
                        $result = $user_object->update_code();
                        // var_dump($result);
                        if($result){
                            $mail = new mail($_SESSION['email'],"Resend Code :",$code);
                            if($email_result = $mail->send()){
                                $succsess['suc'] = "We Resend a Code";
                                header("location:check_code2.php");
                            }
                        }else{
                            $errors['code']['error'] = "Try Again Later";
                        }
            
            }
                    // -------------------------------------------------------------------/




                // $body = "<div>
                //             <h5> Hello </h5>
                //             <p> Please Click on link to reset your password
                //                 <b style='color:gray'> <a href='http://localhost/nti/NTI/Tasks/ecommerce/set_new_password.php' target='_blank'> SET PASSWORD  </a> </b> <br> </b>
                //             </p>
                //             <h5> Thank You. </h5>
                //         </div>";
                // $subject = 'Froget Password Verification Link';
                // $mail = new Mail($_POST['email'], $subject, $body);
                // if ($emailResult = $mail->send()) {
                //     $_SESSION['forget-password']['email'] = $_POST['email'];
                //     // $_SESSION['forget-password']['expiration'] = $expiration_time;
                //     $success['done'] = "We have sent you an email address please Check Your Mailbox";
                // }else{
                //     $errors['email']['try-again'] = "Try Again Later";
                // }





                // header to check code
            // }else{
            //     $errors['email']['wrong'] = "something went wrong";
            // }
            
        }else{
            $errors['email']['email-exists'] = "Email Not Found";
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
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> <?= $title ?> </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?php 
                                        if(isset($success['done'])){
                                            echo "<div class='alert alert-success text-center'> {$success['done']} </div>";
                                        }
                                    ?>
                                    <form action="" method="post">
                                        <input type="email" name="email" placeholder="Email">
                                        <?php 
                                            if(isset($errors['email'])){
                                                foreach ($errors['email'] as $error) {
                                                   echo "<p class='text-danger'>{$error}</p>";
                                                }
                                            }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit" ><span><?= $title ?></span></button>
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
include_once "layouts/scripts.php";
?>