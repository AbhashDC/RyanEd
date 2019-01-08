<?php
ob_start();
session_start();

include_once('../class/DbConfig.php');

class displayAdminProduct extends dbConnect
{
    public function getAdminProduct()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM product ORDER BY `date` ASC";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

//    public function getAdminProduct()
//    {
//        $getArray=array();
//        dbConnect::dbConnection();
//        $sql="SELECT * FROM product ORDER BY `date` ASC";
//        $result=mysqli_query($this->db,$sql);
//        while($var=mysqli_fetch_array($result))
//        {
//            $getArray[]=$var;
//        }
//        return $getArray;
//    }
}
