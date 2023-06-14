<?php
class connecttt{
    public $sever;
    public $user;
    public $password;
    public $dbName;
    public function __construct()
    {
        $this->sever = "co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->user = "ihtx2tee6pwxcz70";
        $this->password = "qdjx6v5clp045ggq";
        $this->dbName = "hm7klepxqaurb6rk";
    }
    //option 1: mysql
    function connectToMYSQL():mysqli{
       $conn_my = new mysqli($this->sever, $this->user, $this->password , $this->dbName);
       if($conn_my->connect_error){
        die("Failed".$conn_my->connect_error);
       }else{
        //echo"Connect form mysqli";
       }
       return $conn_my;
    }
    //option 2: PDO
    function connectToPDO():PDO{
        try{
            $conn_pdo = new PDO (
                "mysql:host=$this->sever;
                dbname=$this->dbName",$this->user,
                $this->password);
               // echo "Connect from PDO";
            
        }catch(PDOException $e){
            die("Failes $e");
        }
        return $conn_pdo;
    }
}
$c = new connecttt();
//$c->connectToMYSQL(); //op1
$c->connectToPDO();
