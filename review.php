<?php include_once('include/_header.php'); ?>
<?php
$user_id=$_GET['id'];
$displayUserReview=($product->getUserReview($user_id));?>

    <h4>User Review</h4>
    <ul class="reviews">
        <?php foreach($displayUserReview as  $showReview){
            ?>
            <li>
                <p>Product: <?php echo $product->productName($showReview['product_id']); ?></p>
                <p><?php echo $showReview['review']; ?> </p>

                <div class="details">
                    <strong><?php echo $showReview['user_name']; ?></strong>
                    <em><?php echo $showReview['date']; ?></em>
                    <?php  $pid='https://www.facebook.com/sharer/sharer.php?u=product.php?id='.$_GET['id']; ?>
                    <a href='<?php echo $pid; ?>' target='_blank'>
                        Share on Facebook
                    </a>
                </div>
            </li>

        <?php }?>


    </ul>

<?php include_once('include/_sidebar.php'); ?>
<?php include_once('include/_footer.php'); ?>