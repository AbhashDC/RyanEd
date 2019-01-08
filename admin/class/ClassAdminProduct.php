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

    public function getFeaturedProduct()
    {
        dbConnect::dbConnection();
        $sql="SELECT * FROM product WHERE featured = 0";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray=$var;
        }
        return $getArray;
    }
    public function updateFeaturedProduct($id)
    {
        dbConnect::dbConnection();

        $sql1="UPDATE product SET featured = 1";
        mysqli_query($this->db,$sql1);

        $sql="UPDATE product SET featured = 0 WHERE id = $id";
        mysqli_query($this->db,$sql);

    }
}
