<aside>

    <?php
    $sideBar=$product->sideBar();
    foreach($sideBar as  $displays){
    ?>
        <h1><a href="product.php?id=<?php echo$displays['id'];?>">Featured Product</a></h1>
        <img src="<?php  echo $displays['img_name']; ?>" style="height:100px; width:100px;">

        <p><strong><?php  echo $displays['title']; ?></strong></p>
        <p><?php  echo $displays['description']; ?> </p>
    <?php }?>


</aside>