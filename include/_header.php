<!doctype html>

<?php
include_once('class/ClassProduct.php');
include_once('class/ClassCategory.php');
$product=new displayProduct();
$category=new displayCategory();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include('class/ClassUser.php');
        $user=new User();
        extract($_POST);
        $user->userLogin($name,$password);
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
        <p>We are open 9-5, 7 days a week. Call us on
            <strong>01604 11111</strong>
        </p>
    </address>



</header>

<section></section>
