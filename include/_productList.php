<h2>Product list</h2>

<ul class="products">

    <?php
    if ((@$_GET['category']) == '' || null)
    {
        $displayCat=($product->getProduct());

    }
    else{
        $category=$_GET['category'];
        $displayCat=($product->search($category));}



    foreach($displayCat as  $displays){
        ?>
        <li>
            <h3><a href="product.php?id=<?php  echo $displays['id']; ?>"><?php  echo $displays['title']; ?></a></h3>
            <p><?php  echo $displays['description']; ?></p>
            <div class="price">£<?php  echo $displays['price']; ?></div>
        </li>

    <?php }?>

</ul>