<?php
$title = "My Account";
include "vendor/autoload.php";
include_once "layouts/header.php";
include_once "app/middleware/auth.php";
include "app/database/helpers/hash.php";
use app\database\helpers\mail\mail;
use app\database\models\User;
use app\database\Requests\login_request;
use app\database\Requests\register_request;


$errors = [];
$success = [];

if (isset($_POST['account_updated'])) {
    // print_r($_FILES);die;
    // validaiton
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['gender']) || empty($_POST['phone'])) {
        $errors['account_updated']['fields'] = "All fields Are Required";
    }
    // if no validtion errors
    if (empty($errors)) {
        $user_object = new User;
        $user_object->setFirst_name($_POST['first_name']);
        $user_object->setLast_name($_POST['last_name']);
        $user_object->setGender($_POST['gender']);
        $user_object->setPhone($_POST['phone']);
        $user_object->setEmail($_SESSION['user']->email);
        // if the request contains an image
        if ($_FILES['image']['error'] == 0) {
            // validate on size
            if ($_FILES['image']['size'] > 1024 ** 2) {
                $errors['account_updated']['image']['size'] = "Maximum Size of Photo Is: " . 1024 ** 2 / (1024 ** 2) . " Mega Byte";
            }
            // validate on extension 
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            if (!in_array($extension, ['png', 'jpg'])) {
                $errors['account_updated']['image']['extension'] = "Allowed Extensiosn Are : " . implode(', ', ['png', 'jpg']);
            }
            if (empty($errors['account_updated']['image'])) {
                $photoName = uniqid() . '.' . $extension; // 21asd1sf321sfds.png
                $photoPath = 'assets/img/users/';
                // upload image
                move_uploaded_file($_FILES['image']['tmp_name'], $photoPath . $photoName);
                $_SESSION['user']->image = $photoName; // update image in Session
                $user_object->setImage($photoName);
            }
        }

        // if image has no errors
        if (empty($errors['account_updated']['image'])) {
            // update data in DB
            $result =  $user_object->update();
            if ($result) {
                // update data in SESSION
                $_SESSION['user']->first_name = $_POST['first_name'];
                $_SESSION['user']->last_name = $_POST['last_name'];
                $_SESSION['user']->gender = $_POST['gender'];
                $_SESSION['user']->phone = $_POST['phone'];
                // success
                $success['account_updated']['done'] = "Account Updated Successfully";
            } else {
                $errors['account_updated']['something'] = "Phone Already Exists";
            }
        }
    }
}

if (isset($_POST['change-password'])) {
    $errors = [];
    if (empty($_POST['old_password'])) {
        $errors['password']['old_pasword-required'] = "This Secion Is Required";
    } else {
        if (!password_verify($_POST['old_password'], $_SESSION['user']->password)) {
            $errors['password']['old_pasword-wrong'] = "This Secion Is Wrong";
        }
    }

    if (empty($errors)) {
        $validation = new register_request;
        $validation->setPassowrd($_POST['new_password']);
        $validation->setPassword_confirmation($_POST['password_confirmation']);
        $errors['password'] = $validation->password_validation();
        if ($_POST['old_password'] == $_POST['new_password']) {
            $errors['password']['new_pasword-repeated'] = "There is a error try later";
        }
        if (empty($errors['password'])) {
            $user_object = new User;
            $user_object->setPassword(bcrypt($_POST['new_password']));
            $user_object->setEmail($_SESSION['user']->email);
            $result = $user_object->update_password();

            if ($result) {
                $success['password']['done'] = "Password Updated Successfully";
            } else {
                $errors['password']['something'] = "There is a error try later";
            }
        }
    }
}

if (isset($_POST['change-email'])) {
    $validation = new login_request;
    $validation->set_email($_POST['email']);
    $errors['change-email']['email'] = $validation->email_Validaiton();

    if ($_POST['email'] == $_SESSION['user']->email) {
        $errors['change-email']['email']['old-email'] = "You didn't change your email address";
    }
    if (empty($errors['change-email']['email'])) {
        $user_object = new user;
        $user_object->setEmail($_POST['email']);
        $result = $user_object->get_user_by_email();
        if ($result->num_rows == 1) {
            $errors['change-email']['email']['email-exists'] = "Email Already Exists";
        } else {
            $user_object->setStatus(0);
            $user_object->setEmail_verified_at('NULL');
            $user_object->setId($_SESSION['user']->id);
            $expiration_time = date('Y-m-d H:i:s',strtotime('+'.Expiration_Duration.' seconds'));
            $userObject->setCode_expired_at($expiration_time);
            $result = $user_object->update_email();
            if ($result) {
                $body = "<div>
                            <h5> Hello </h5>
                            <p> Please Click on link to Activate Your Account
                                <b style='color:gray'> <a href='http://localhost:8000/change-status.php?email={$_POST['email']}' target='_blank'> Activate  </a> </b> <br>
                            And it will Expired After " . Expiration_Duration . " Seconds 
                                <b> $expiration_time </b>
                            </p>
                            <h5> Thank You. </h5>
                        </div>";
                $subject = 'Change Email Verification Link';
                $mail = new Mail($_POST['email'], $subject, $body);
                if ($emailResult = $mail->send()) {
                    $_SESSION['change-email']['email'] = $_POST['email'];
                    $_SESSION['change-email']['expiration'] = $expiration_time;
                    $_SESSION['change-email']['message']= "We Have Sent You an Email Address To Acitvate Your Account Please Check Your Mail Box";
                    header('location:logout.php');die;
                } else {
                $errors['change-email']['email']['tryAgian'] = "Try Agian Later";

                }
            } else {
                $errors['change-email']['email']['something'] = "There is a error try later";
            }
        }
    }
}
include_once "layouts/nav.php"; //print name
include_once "layouts/bread_cumb.php";
?>
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>#</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse <?= isset($_POST['account_updated']) ?  'show' : '' ?>">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>My Account Information</h4>
                                            <h5>Your Personal Details</h5>
                                        </div>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12">
                                                    <?php
                                                    if (!empty($errors['account_updated'])) {
                                                        foreach ($errors['account_updated'] as  $error) {
                                                            if (is_string($error)) {
                                                                echo "<p class='text-center alert alert-danger'> {$error} </p>";
                                                            } else {
                                                                foreach ($error as $e) {
                                                                    echo "<p class='text-center alert alert-danger'> {$e} </p>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    if (!empty($success['account_updated'])) {
                                                        foreach ($success['account_updated'] as  $success) {
                                                            echo "<p class='alert alert-success text-center'> {$success} </p>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-12 my-5">
                                                    <div class="row mb-5">
                                                        <div class="col-4 offset-4">
                                                            <label for="image">
                                                                <img src="assets/img/users/<?= $_SESSION['user']->image ?>" alt="<?= $_SESSION['user']->first_name ?>" class="w-100 rounded-circle">
                                                            </label>
                                                            <input type="file" name="image" id="image" class="d-none">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" value="<?= $_SESSION['user']->first_name ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" value="<?= $_SESSION['user']->last_name ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Phone</label>
                                                        <input type="number" name="phone" value="<?= $_SESSION['user']->phone ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div >
                                                        <label>Gender</label>
                                                        <select name="gender" id="" class="form-control">
                                                            <option <?= $_SESSION['user']->gender == 'm' ? 'selected' : '' ?> value="m">Male</option>
                                                            <option <?= $_SESSION['user']->gender == 'f' ? 'selected' : '' ?> value="f">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button name="account_updated" type="submit">Update My Account</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>#</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse <?= (isset($_POST['change-password'])) ? 'show' : '' ?>">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Password</h4>
                                            <h5>Your Password</h5>
                                        </div>
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <?php
                                                    if (isset($errors['password']['something'])) {
                                                        echo "<div class='alert alert-danger text-center'> {$errors['password']['something']} </div>";
                                                    }
                                                    if (isset($success['password']['done'])) {
                                                        echo "<div class='alert alert-success text-center'> {$success['password']['done']} </div>";
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Old Password</label>
                                                        <input type="password" name="old_password">
                                                    </div>
                                                    <?php
                                                    if (isset($errors['password']['old_pasword-required'])) {
                                                        echo "<p class='text-danger'>" . $errors['password']['old_pasword-required'] . "</p>";
                                                    }
                                                    if (isset($errors['password']['old_pasword-wrong'])) {
                                                        echo "<p class='text-danger'>" . $errors['password']['old_pasword-wrong'] . "</p>";
                                                    }
                                                    ?>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>New Password</label>
                                                        <input type="password" name="new_password">
                                                    </div>
                                                    <?php
                                                    if (isset($errors['password']['pasword-required'])) {
                                                        echo "<p class='text-danger'>" . $errors['password']['pasword-required'] . "</p>";
                                                    }
                                                    if (isset($errors['password']['pasword-regex'])) {
                                                        echo "<p class='text-danger'>" . $errors['password']['pasword-regex'] . "</p>";
                                                    }
                                                    if (isset($errors['password']['pasword-confirmed'])) {
                                                        echo "<p class='text-danger'>" . $errors['password']['pasword-confirmed'] . "</p>";
                                                    }
                                                    if (isset($errors['password']['new_pasword-repeated'])) {
                                                        echo "<p class='text-danger'>" . $errors['password']['new_pasword-repeated'] . "</p>";
                                                    }

                                                    ?>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password Confirmation</label>
                                                        <input type="password" name="password_confirmation">
                                                    </div>
                                                    <?php
                                                    if (isset($errors['password']['password_confirmation-required'])) {
                                                        echo  "<p class='text-danger'>" . $errors['password']['password_confirmation-required'] . "</p>";
                                                    }
                                                    ?>
                                                </div>

                                            </div>

                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="change-password">Change Password</button>
                                                </div>
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
</div>
<?php
$title = "My Account";
include_once "layouts/footer.php";
include_once "layouts/scripts.php";
?>