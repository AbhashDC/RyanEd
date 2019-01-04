<?php include_once('include/_header.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include('class/ClassUser.php');
    $user=new User();
    extract($_POST);
    $user->userLogin($name,$password);
}
?>

    <br>
    <form action="" method="post">
        <p>Log In</p>
        <label>Email</label> <input type="email" name="email" />
        <label>Password</label> <input type="password" name="password" />


        <input type="submit" name="submit" value="submit" />
    </form>
    <hr />

<?php include_once('include/_sidebar.php'); ?>
<?php include_once('include/_footer.php'); ?>