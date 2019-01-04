<?php

include_once('DbConfig.php');

class displayCategory extends dbConnect
{

    public function getCategory()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM category ORDER BY id ASC";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }



}
