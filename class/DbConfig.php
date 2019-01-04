<?php
// @include_once('session.php');
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_DATABASE','ed');

Class dbConnect
{
    public $db;
    public function dbConnection()
    {
         $this->db=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
       // $this->db=new mysqli("localhost","root","","vtg");
    }
}



?>
