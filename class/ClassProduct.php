<?php
ob_start();
session_start();

include_once('DbConfig.php');

class displayProduct extends dbConnect
{
    public function search($category)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("SELECT * FROM product WHERE category = :category");
        $values=[
            'category'=>$category
        ];
        $sql->execute($values);
        while($var=$sql->fetch())
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

    public function findId($id)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("SELECT * FROM product WHERE id = :id");
        $values=[
            'id'=>$id
        ];
        $sql->execute($values);
        while($var=$sql->fetch())
        {
            $getArray[]=$var;
        }
        return $getArray;

    }

    public function getReview($id)
    {
        $getArray=array();
        dbConnect::dbConnection();

        $sql=$this->pdo->prepare("SELECT * FROM review WHERE product_id = :id AND status= :status");
        $values=[
            'id'=>$id,
            'status'=>'0'
        ];
        $sql->execute($values);
        while($var=$sql->fetch())
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

    public function getUserReview($id)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("SELECT * FROM review WHERE user_id = $id");
        $values=[
            'id'=>$id
        ];
        $sql->execute($values);
        while($var=$sql->fetch())
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

    public function productName($id)
    {

        dbConnect::dbConnection();

        $sql=$this->pdo->prepare("SELECT * FROM product WHERE id= :id");
        $values=[
            'id'=>$id
        ];
        $sql->execute($values);
        while($var=$sql->fetch(PDO::FETCH_ASSOC))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }
    public function searchItems($item)
    {
        $getArray=array();
        dbConnect::dbConnection();

        $sql=$this->pdo->prepare("SELECT * FROM product WHERE title LIKE ?");
        $sql->bindValue(1, "%$item%", PDO::PARAM_STR);
        $sql->execute();
        while($var=$sql->fetch())
        {
            $getArray[]=$var;
        }
        return $getArray;
    }
    public function sideBar()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("SELECT * FROM product WHERE `featured` = :feat");
        $values=[
            'feat'=>'0'
        ];
        $sql->execute($values);
        while($var=$sql->fetch())
        {
            $getArray[]=$var;
        }
        return $getArray;
    }
    public function getProduct()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql = $this->pdo->query("SELECT * FROM product BY date ASC");
        while($row=$sql->fetch(PDO::FETCH_ASSOC))
        {
            $getArray[]=$row;
        }
        return $getArray;
    }
}
