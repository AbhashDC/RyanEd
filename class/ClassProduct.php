<?php
ob_start();
session_start();

include_once('DbConfig.php');

class displayProduct extends dbConnect
{


    public function getProduct()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql=$this->pdo->query("SELECT * FROM product ORDER BY `date` ASC");
        while($row=$sql->fetch())
        {
            $getArray[]=$row;

        }
        return $getArray;
    }
    public function search($category)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("SELECT * FROM product WHERE category LIKE  :category");
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

        $sql=$this->pdo->prepare("SELECT * FROM review WHERE product_id = :id");
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
        while($var=$sql->fetch())
        {
            $getArray[]=$var;
        }
        return $getArray;
    }
    public function searchItems($item)
    {
        $getArray=array();
        dbConnect::dbConnection();

        $sql=$this->pdo->prepare("SELECT * FROM product WHERE title LIKE :item");
        $values=[
            'item'=>$item
        ];
        $sql->execute($values);
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
        $sql=$this->pdo->query("SELECT * FROM product WHERE `featured` = :feat");
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
}
