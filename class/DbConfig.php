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
        //$this->dbConn = new PDO("mysql:host={DB_SERVER};dbname={DB_DATABASE}", DB_USERNAME, DB_PASSWORD);
//        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}



?>
