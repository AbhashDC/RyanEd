<?php include_once('session.php'); ?>
<div class="sidebar grid-15">
    <a href="#" class="sidebar-title"><?php echo $_SESSION['aname']; ?></a>
    <a class="" href="product.php">Products</a>
    <?php if (($_SESSION['type']) == 0) { ?><a href="admins.php">Admin list</a> <?php } ?>
    <a href="review.php">Review</a>

    <a href="logout.php" class="red">Logout</a>
</div>
