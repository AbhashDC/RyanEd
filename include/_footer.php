<footer>
    &copy; Ed's Electronics 2018
    <?php if (@$_SESSION['id'] == "") {
    } else { ?> <a href="logout.php">logout</a> <?php } ?>

</footer>

</body>

</html>
