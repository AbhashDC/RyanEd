<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    include('class/ClassProduct.php');
    $product=new displayProduct();
    extract($_GET);
    $product->search($category);
}
?>

<h2>Product list</h2>

<ul class="products">
    <?php foreach($product as $products){ ?>
    <li>
        <h3><?php $products->title; ?></h3>

        <p><?php $products->description; ?> </p>


        <div class="price"><?php $products->price; ?></div>
    </li>
    <?php } ?>
</ul>