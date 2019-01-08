<aside>

    <?php
    $sideBar=$product->sideBar();
    foreach($sideBar as  $displays){
    ?>
        <h1><a href="product.php?id=<?php echo$displays['id'];?>">Featured Product</a></h1>
        <p><strong><?php  echo $displays['title']; ?></strong></p>
        <p><?php  echo $displays['description']; ?> </p>
    <?php }?>


</aside>