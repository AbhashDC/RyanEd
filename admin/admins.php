<?php include_once('include/_header.php'); ?>
<?php
if (($_SESSION['type']) != 0) {
    header('location: product.php');
}
?>
<div class="grid-10">
    <?php include('include/_sidebar.php') ?>

    <div class="grid-85 main-content " style=" height:auto;margin-left:205px;">
        <table class="grid-9 bg-grey text-center table-radius product-table" style="padding:20px;">
            <tr>
                <td colspan="1" style="text-align:left;">
                    <a href="addadmin.php">
                        <button class="button success add">Add New Admin</button>
                    </a>

                </td>
                <td colspan="4"><p class="title">Admin</p></td>
            </tr>
            <tr class="table-title">
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                <th>Email</th>
                <th>Address</th>
                <th rowspan="1">
                    Action
                </th>
            </tr>
            <form method="post" action="">
                <?php $admins = $admin->getAdmin();
                foreach ($admins as $admin) {
                    ?>
                    <tr>

                        <td>
                            <?php echo $admin['id']; ?>
                        </td>
                        <td>
                            <?php echo $admin['name']; ?>
                        </td>
                        <td>
                            <?php echo $admin['email']; ?>
                        </td>
                        <td>
                            <?php echo $admin['address']; ?>
                        </td>
                        <td rowspan="1">
                            <button class="button edit "><a href="editadmin.php?id=<?php echo $admin['id']; ?>"
                                                            class="text-decoration">Edit</a></button>
                            <input type="hidden" name="type" value="deleteAdmin">
                            <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
                            <input type="submit" value="delete" class="button delete text-white">


                        </td>
                    </tr>
                <?php } ?>
        </table>
        </form>

        </table>

    </div>
</div>


<!--</div>-->
<?php include_once('include/_footer.php'); ?>
