<h2>Product list</h2>
<form action="" method="get">
<input type="text" placeholder="Type products to search" name="search">
    <input type="submit" value="Search">
</form>
<ul class="products">

    <?php
    if ((@$_GET['category'])!=('' OR null))
    {
        $category=@$_GET['category'];
        $displayCat=($product->search($category));

    }elseif((@$_GET['search'])!=='')
    {
        $search=@$_GET['search'];
        $displayCat=($product->searchItems($search));
    }
    else
    {
        $displayCat=($product->getProduct());
    }

    foreach($displayCat as  $displays){
        ?>
        <li>
            <h3><a href="product.php?id=<?php  echo $displays['id']; ?>"><?php  echo $displays['title']; ?></a></h3>
            <p><?php  echo $displays['description']; ?></p>
            <div class="price">£<?php  echo $displays['price']; ?></div>
        </li>
    <?php }?>

</ul>