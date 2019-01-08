<?php
ob_start();
include_once('../../classDbConfig.php');

class adminReview extends dbConnect
{
    public function showReview()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM review ORDER BY `date` ASC";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;

    }
    public function showReviewProductName($id)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM product WHERE id=$id ";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;

    }

    public function enableReview($id)
    {
        dbConnect::dbConnection();
        $sql="UPDATE review SET status='0' WHERE id = $id";
        $result=mysqli_query($this->db,$sql);
       if($result)
       {
           echo"<script> alert('Review is Updated'); </script>";
       }
       else{
           echo"<script> alert('Could not update'); </script>";
       }
    }

    public function disableReview($id)
    {
        dbConnect::dbConnection();
        $sql="UPDATE review SET status='1' WHERE id = $id";
        $result=mysqli_query($this->db,$sql);
        if($result)
        {
            echo"<script> alert('Review is Updated'); </script>";
        }
        else{
            echo"<script> alert('Could not update'); </script>";
        }
    }


}
