<?php include_once('include/_header.php');
$id = $_GET['id'];
$pr = $admin->showOneAdmin($id); ?>
<div class="grid-10">
    <?php include('include/_sidebar.php') ?>

    <div class="grid-85 main-content " style=" height:auto;margin-left:205px;">
        <center>
            <table class="form grid-3">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $pr['id']; ?>">
                    <input type="hidden" name="type" value="editAdmin">
                    <tr>
                        <td class="table-title" colspan="2"
                            style="color:white;text-align:center;font-weight:bolder;text-transform:uppercase;">Edit
                            Admin
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" value="<?php echo $pr['name']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" value="<?php echo $pr['email']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" value="<?php echo $pr['address']; ?>" required></td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-center"><input type="submit" value="Update" class="button success">
                        </td>
                    </tr>
            </table>

            </form>
            </table>
        </center>
    </div>
</div>


<!--</div>-->
<?php include_once('include/_footer.php'); ?>
