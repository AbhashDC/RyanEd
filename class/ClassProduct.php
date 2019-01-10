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
        while($row=$sql->fetch(PDO::FETCH_BOTH))
        {
            $getArray[]=$row;
        }
        return $getArray;
    }

    public function search($category)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM product WHERE category LIKE '%".$category."%'";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

    public function findId($id)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM product WHERE id =$id";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

    public function getReview($id)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM review WHERE product_id = $id";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

    public function getUserReview($id)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM review WHERE user_id = $id";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

    public function productName($id)
    {
//        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM product WHERE id=$id";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray=$var['title'];
        }
        return $getArray;
    }
    public function searchItems($item)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM product WHERE title LIKE '%".$item."%'";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }
    public function sideBar()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql=$this->pdo->query("SELECT * FROM product WHERE `featured` = '0'");
        while($row=$sql->fetch(PDO::FETCH_BOTH))
        {
            $getArray[]=$row;
        }
        return $getArray;
    }
}
