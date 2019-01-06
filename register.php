<?php include_once('include/_header.php'); ?>


    <br>
    <form action="" method="post">
        <p>Register</p>
        <label>Name</label> <input type="text" name="name" />
        <label>Email</label> <input type="email" name="email" />
        <label>Password</label> <input type="password" name="password" />
        <label>Address</label> <input type="text" name="address" />
        <input type="hidden" name="type" value="register" />
        <input type="submit" name="submit" value="submit" />
        <hr><hr>
       <label>Already a member?</label>
        <a href="login.php"><input type="button" name="submit" value="Login" /></a>
    </form>
    <hr />

<?php include_once('include/_sidebar.php'); ?>
<?php include_once('include/_footer.php'); ?>