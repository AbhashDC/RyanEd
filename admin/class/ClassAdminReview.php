<?php
ob_start();
include_once('../class/DbConfig.php');
include_once('session.php');
class adminReview extends dbConnect
{
    public function showReview() //Lists all the review to the admin panel. It returns all the review data
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql = $this->pdo->query("SELECT * FROM review  ORDER BY `date` DESC");
        while($row=$sql->fetch())
        {
            $getArray[]=$row;
        }
        return $getArray;

    }
    public function showReviewProductName($id) //returns a single product detail to admin panel
    {
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("SELECT * FROM product WHERE id= :id");
        $values=[
            'id'=>$id
        ];
        $sql->execute($values);
        while($var=$sql->fetch())
        {
            $getArray=$var;
        }
        return @$getArray;

    }

    public function enableReview($id) //Updates the status of the review to 0 which is meant to show in public
    {
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("UPDATE review SET status= :status WHERE id = :id");
        $values=[
            'id'=>$id,
            'status'=>'0'
        ];
        if($sql->execute($values))
       {
           echo"<script> alert('Review is Updated'); </script>";
       }
       else{
           echo"<script> alert('Could not update'); </script>";
       }
    }

    public function disableReview($id) //Updates the status of the review to 1 which is not meant to show in public
    {
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("UPDATE review SET status= :status WHERE id = :id");
        $values=[
            'id'=>$id,
            'status'=>'1'
        ];
        if($sql->execute($values))
        {
            echo"<script> alert('Review is Updated'); </script>";
        }
        else{
            echo"<script> alert('Could not update'); </script>";
        }
    }


}
