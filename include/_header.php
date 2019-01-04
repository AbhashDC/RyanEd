<!doctype html>

<?php
include_once('class/ClassProduct.php');
include_once('class/ClassCategory.php');
$product=new displayProduct();
$category=new displayCategory();


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

                <li><a href="product.php?category=<?php  echo $displays['id']; ?>"><?php  echo $displays['category']; ?></a></li>
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
