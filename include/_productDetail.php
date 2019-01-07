<h2>Product Page</h2>

<?php
if ((@$_GET['id']) == '' || null)
{
    header('location: index.php');
}
else{
    $id=$_GET['id'];
    $displayId=($product->findId($id));
    $displayReview=($product->getReview($id));}

foreach($displayId as  $showProduct){
    ?>
    <li>
        <h3><a href="product.php?id=<?php  echo $showProduct['id']; ?>"><?php  echo $showProduct['title']; ?></a></h3>
        <p><?php  echo $showProduct['description']; ?></p>
        <div class="price">£<?php  echo $showProduct['price']; ?></div>
    </li>

<?php }?>

<h4>Write a review?</h4>
<form method="post" action="">
    <textarea rows="5" cols="300" name="review" required>
    </textarea>
    <input type="hidden" name="type" value="review">
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    <input type="submit" value="Submit">
</form>

<h4>User Review</h4>
<ul class="reviews">
<?php foreach($displayReview as  $showReview){
    ?>
    <li>
        <p><?php echo $showReview['review']; ?> </p>

        <div class="details">
            <strong><a href="review.php?id=<?php echo $showReview['user_id']; ?> "> <?php echo $showReview['user_name']; ?></a></strong>
            <em><?php echo $showReview['date']; ?></em>
            <?php  $pid='https://www.facebook.com/sharer/sharer.php?u=product.php?id='.$_GET['id']; ?>
            <a href='<?php echo $pid; ?>' target='_blank'>
                Share on Facebook
            </a>
        </div>
    </li>

<?php }?>


</ul>