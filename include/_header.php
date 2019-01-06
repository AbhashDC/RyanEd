<!doctype html>

<?php

include_once('class/ClassProduct.php');
include_once('class/ClassCategory.php');
include_once('class/ClassUser.php');
$product=new displayProduct();
$category=new displayCategory();
$user=new userActivity();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        extract($_POST);
        if($type=="review")
        {

          $user->userReview($review,$id);
        }
        if($type=="login")
        {
          $user->userLogin($email,$password);
        }
        if($type=="register")
        {
            $user->userRegister($name,$email,$password,$address);
        }
    }

?>
<html>
<head>
    <title>Ed's Electronics</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/electronics.css" />

</head>

<body>

<header>
    <h1>Ed's Electronics</h1>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php">Products</a>
            <ul>
                <?php
                $displayCat=($category->getCategory());
                foreach($displayCat as  $displays){
                ?>

                <li><a href="index.php?category=<?php  echo $displays['category']; ?>"><?php  echo $displays['category']; ?></a></li>
                <?php }?>
            </ul>
        </li>

    </ul>

    <address>
        <p> <?php if(@$_SESSION['uid']==""){ ?>
                <a href="login.php" class="red">Login</a>|<a href="register.php" class="yellow">Register</a></p>
        <?php }
        else{ ?>
            logged in <?php echo $_SESSION['uname']; ?>
            <?php
        }?>
        <p>We are open 9-5, 7 days a week. Call us on
            <strong>01604 11111</strong>
        </p>
    </address>



</header>

<section></section>
