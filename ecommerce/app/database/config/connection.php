<?php
namespace app\database\config;

use  mysqli;

class connection{
    private $hostname='localhost';
    private $username='root';
    private $password='';
    private $database='e_commerce';
    protected $con;

    public function __construct(){

        $this->con= new mysqli($this->hostname,$this->username,$this->password,$this->database); 
        
        // if($this->con->connect_error){

        //     die("connection failed: " . $this->con->connect_error);
        // }

        // echo "connected successfuly";
    }


    //insert update  delete
    public function runDML($query) :bool
    {
            $result = $this->con->query($query);
            if($result){
                return true;
            }else{
                return false;
            }
    }

    //select
    public function runDQL($query) 
    {
          return $this->con->query($query);
    }


    public function __destruct()
    {
        $this->con->close();
    }



}



?>