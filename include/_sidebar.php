<aside>

    <?php
    $sideBar = $product->sideBar();
    foreach ($sideBar as $displays) {
        ?>
        <h1>Featured Product</h1>
        <a href="product.php?id=<?php echo $displays['id']; ?>">
            <p><strong><?php echo $displays['title']; ?></strong></p>
        </a><img src="<?php echo $displays['img_name']; ?>" style="height:100px; width:100px;">
        <p><?php echo $displays['description']; ?> </p>
    <?php } ?>


</aside>