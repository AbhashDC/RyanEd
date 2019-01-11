<?php
ob_start();
include_once('../class/DbConfig.php');
include_once('session.php');
class adminReview extends dbConnect
{
    public function showReview()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql = $this->pdo->query("SELECT * FROM review  ORDER BY date ASC");
        while($row=$sql->fetch())
        {
            $getArray[]=$row;
        }
        return $getArray;

    }
    public function showReviewProductName($id)
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

    public function enableReview($id)
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

    public function disableReview($id)
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
