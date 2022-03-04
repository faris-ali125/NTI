<?php  
namespace app\database\Requests;
use app\database\models\User;
include_once __DIR__ . "..\..\..\..\\vendor\autoload.php";




class register_request{
     private $email;
     private $phone;
     private $password;
     private $password_confirmation;
     private $first_name;
     private $last_name;
     private $gender;

     /**
      * Get the value of email
      */ 
     public function getEmail()
     {
          return $this->email;
     }

     /**
      * Set the value of email
      *
      * @return  self
      */ 
     public function setEmail($email)
     {
          $this->email = $email;

          return $this;
     }

     /**
      * Get the value of phone
      */ 
     public function getPhone()
     {
          return $this->phone;
     }

     /**
      * Set the value of phone
      *
      * @return  self
      */ 
     public function setPhone($phone)
     {
          $this->phone = $phone;

          return $this;
     }

     /**
      * Get the value of password
      */ 
     public function getPassword()
     {
          return $this->password;
     }

     /**
      * Set the value of password
      *
      * @return  self
      */ 
     public function setPassowrd($password)
     {
          $this->password = $password;

          return $this;
     }

     /**
      * Get the value of password_confirmation
      */ 
     public function getPassword_confirmation()
     {
          return $this->password_confirmation;
     }

     /**
      * Set the value of password_confirmation
      *
      * @return  self
      */ 
     public function setPassword_confirmation($password_confirmation)
     {
          $this->password_confirmation = $password_confirmation;

          return $this;
     }
       /**
      * Get the value of first_name
      */ 
      public function getFirst_name()
      {
           return $this->first_name;
      }
 
      /**
       * Set the value of first_name
       *
       * @return  self
       */ 
      public function setFirst_name($first_name)
      {
           $this->first_name = $first_name;
 
           return $this;
      }
 
      /**
       * Get the value of last_name
       */ 
      public function getLast_name()
      {
           return $this->last_name;
      }
 
      /**
       * Set the value of last_name
       *
       * @return  self
       */ 
      public function setLast_name($last_name)
      {
           $this->last_name = $last_name;
 
           return $this;
      }

      
     /**
      * Get the value of gender
      */ 
     public function getGender()
     {
          return $this->gender;
     }

     /**
      * Set the value of gender
      *
      * @return  self
      */ 
     public function setGender($gender)
     {
          $this->gender = $gender;

          return $this;
     }







         // VALIDATION PART

        public function first_name_validation(){
            $errors=[];
               if(empty($this->first_name)){
                   $errors['first_name_required']="First Name Is Required";
               }
               
               return $errors;
        }


        public function last_name_validation(){
            $errors=[];
               if(empty($this->last_name)){
                   $errors['last_name_required']="Last Name Is Required";
               }
               
               return $errors;
        }


     public function password_validation()
     {
           $errors= [];
            
           if(empty($this->password)){
               $errors['password_required']="Password Is Required";
           }

           if(empty($errors)){
               if(!preg_match( "/^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?]).*$/" ,$this->password)){
                   $errors['pass_regex']="Password must contain 8 characters and at least one number, one letter and one unique character ";
               }
           }

           return $errors;
     }



     public function confirm_password_validation(){
         $errors=[];
            if(empty($this->password_confirmation)){
                $errors['confirm_password_required']="Password Confirmation Is Required";
            }

            return $errors;
     }


      public function email_validation()
      {
          $errors=[];
          if(empty($this->email)){
              $errors['email_required']="Email Is Required";
          }

          if(empty($errors)){
              if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$this->email)){
                  $errors['email_reqex']="Please Enter a Valid Email";
              }
          }

          if(empty($errors))
          {
              $user= new User;
              $user->setEmail($this->email);
              $result = $user->get_user_by_email();
              if($result->num_rows == 1){
                  $errors['email_unique'] = "Email Already Exists";
              }

          }
          
          return $errors;
      }

      
      public function email_validation2()
      {
          $errors=[];
          if(empty($this->email)){
              $errors['email_required']="Email Is Required";
          }

          if(empty($errors)){
              if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$this->email)){
                  $errors['email_reqex']="Please Enter a Valid Email";
              }
          }

          if(empty($errors))
          {
              $user= new User;
              $user->setEmail($this->email);
              $result = $user->get_user_by_email();
              if($result->num_rows==0){
                  $errors['email_unique'] = "Email Already Exists";
              }

          }
          
          return $errors;
      }

 
      public function phone_validation()
      {
          $errors=[];
          if(empty($this->phone)){
              $errors['phone_required']="Phone Is Required";
          }

          if(empty($errors)){
              if(!preg_match("/^01[0125][0-9]{8}$/",$this->phone)){
                  $errors['phone_reqex']="Please Enter a Valid Phone Number";
              }
          }

          if(empty($errors))
          {
              $user= new User;
              $user->setPhone($this->phone);
              $result = $user->get_user_by_phone();
              if($result->num_rows == 1){
                  $errors['phone_unique'] = "Phone Already Exists";
              }

          }
          return $errors;
      }



   

}




?>