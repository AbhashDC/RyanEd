<?php include_once('include/_header.php'); ?>


    <br>
    <form action="" method="post">
        <p>Log In</p>
        <label>Email</label> <input type="email" name="email"/>
        <label>Password</label> <input type="password" name="password"/>
        <input type="submit" name="submit" value="submit"/>
        <input type="hidden" name="type" value="login"/>
        <hr>
        <hr>
        <label>Not a member?</label>
        <a href="register.php"><input type="button" name="submit" value="Register"/></a>

    </form>
    <hr/>

<?php include_once('include/_sidebar.php'); ?>
<?php include_once('include/_footer.php'); ?>