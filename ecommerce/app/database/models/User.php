<?php
namespace app\database\models;
use app\database\config\connection;
// include_once "../config/connection.php";
include_once __DIR__ . "..\..\..\..\\vendor\autoload.php";

class User extends connection{
   private $id, $first_name, $last_name, $email, $password, $phone, $gender,
    $status, $image, $code, $email_verified_at, $expired_at, $updated_at, $code_expired_at ;

   /**
    * Get the value of id
    */ 
   public function getId()
   {
      return $this->id;
   }

   /**
    * Set the value of id
    *
    * @return  self
    */ 
   public function setId($id)
   {
      $this->id = $id;

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
   public function setPassword($password)
   {
      $this->password = $password;

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

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of email_verified_at
     */ 
    public function getEmail_verified_at()
    {
        return $this->email_verified_at;
    }

    /**
     * Set the value of email_verified_at
     *
     * @return  self
     */ 
    public function setEmail_verified_at($email_verified_at)
    {
        $this->email_verified_at = $email_verified_at;

        return $this;
    }

    /**
     * Get the value of expired_at
     */ 
    public function getExpired_at()
    {
        return $this->expired_at;
    }

    /**
     * Set the value of expired_at
     *
     * @return  self
     */ 
    public function setExpired_at($expired_at)
    {
        $this->expired_at = $expired_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
     /**
     * Get the value of code_expired_at
     */ 
    public function getCode_expired_at()
    {
        return $this->code_expired_at;
    }

    /**
     * Set the value of code_expired_at
     *
     * @return  self
     */ 
    public function setCode_expired_at($code_expired_at)
    {
        $this->code_expired_at = $code_expired_at;

        return $this;
    }

     public function get_user_by_email(){

      $query = "SELECT * FROM `users` WHERE `email` = '$this->email' ";
      return $this->runDQL($query);
     }

     public function get_user_by_phone(){

      $query = "SELECT * FROM `users` WHERE `phone` = '$this->phone' ";
      return $this->runDQL($query);
     }

     public function insert()
    {
        $query = "INSERT INTO `users` (`first_name`,`last_name`,`phone`,`email`,`gender`,`password`,`code`)
         VALUES ('{$this->first_name}','{$this->last_name}','{$this->phone}','{$this->email}'
         ,'{$this->gender}','{$this->password}','{$this->code}') ";
        return $this->runDML($query);
    }


    public function checkcode(){
       $query = "SELECT * FROM `users` WHERE `email` ='{$this->email}' AND `code` = {$this->code} ";
       return $this->runDQL($query);
    }


    public function change_user_status(){
        
      $query = "UPDATE `users` SET
      `status` = '{$this->status}' , `email_verified_at` = '{$this->email_verified_at}'
      WHERE `email` = '{$this->email}' ";
      return $this->runDML($query);

    }

    public function update_code ()
    {
        $query = "UPDATE `users` SET 
        `code` = {$this->code} , `code_expired_at` = '{$this->code_expired_at}'
         WHERE `email` = '{$this->email}'";
        return $this->runDML($query);
    }

    public function updateExpirationTime ()
    {
        $query = "UPDATE `users` SET `code_expired_at` = '{$this->code_expired_at}'
         WHERE `email` = '{$this->email}'";
        return $this->runDML($query);
    }


    public function update_password()
    {
        $query = "UPDATE `users` SET 
        `password` = '{$this->password}'
         WHERE `email` = '{$this->email}'";
        return $this->runDML($query);
    }
   
    public function update()
    {
        $updateImage = "";
        if($this->image){
            $updateImage = " , `image`='{$this->image}'";
        }
        $query = "UPDATE `users` SET 
        `first_name` = '{$this->first_name}' , `last_name` = '{$this->last_name}' 
        , `gender` = '{$this->gender}'  , `phone` = '{$this->phone}' $updateImage
         WHERE `email` = '{$this->email}'";
        return $this->runDML($query);
    }
    
    public function update_email()
    {
        $query = "UPDATE `users` SET 
        `email` = '{$this->email}' , `status` = '{$this->status}' 
        , `email_verified_at` = {$this->email_verified_at} , `code_expired_at` = '{$this->code_expired_at}'
         WHERE `id` = '{$this->id}'";

        return $this->runDML($query);
    }


   
}




?>