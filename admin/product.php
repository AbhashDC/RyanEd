<?php include_once('include/_header.php'); ?>
<div class="grid-10">
    <?php include('include/_sidebar.php') ?>

    <div class="grid-85 main-content " style=" height:auto;margin-left:205px;">

        <table class="grid-9 bg-grey text-center table-radius product-table" style="padding:20px;">
            <tr>
                <td colspan="2" style="text-align:left;">
                    <a href="addproduct.php">
                        <button class="button success add">Add New Product</button>
                    </a>
                </td>
                <td colspan="8"><p class="title">Products</p></td>
            </tr>

            <tr class="table-title">
                <th>
                    ID
                </th>
                <th>
                    Title
                </th>
                <th>
                    Price
                </th>
                <th>
                    Manufacturer
                </th>
                <th>
                    Description
                </th>
                <th>
                    Category
                </th>

                <th>Added By</th>
                <th>Image</th>
                <th rowspan="1">
                    Action
                </th>
            </tr>

            <form method="POST" action="">
                <?php

                $productv = $product->getAdminProduct();
                foreach ($productv as $productdet) {

                    ?>
                    <tr>
                        <td>
                            <?php echo $productdet['id']; ?>
                        </td>
                        <td>
                            <?php echo $productdet['title']; ?>
                        </td>
                        <td>
                            <?php echo $productdet['price']; ?>
                        </td>
                        <td>
                            <?php echo $productdet['manufacturer']; ?>
                        </td>
                        <td>
                            <?php echo $productdet['description']; ?>
                        </td>
                        <td>
                            <?php echo $productdet['category']; ?>
                        </td>

                        <td><?php echo $productdet['admin_name']; ?></td>
                        <td><img src="<?php echo "../" . $productdet['img_name']; ?>" alt="image unavailable"
                                 style="height:30px; width:30px"></td>
                        <td rowspan="1">


                            <button class="button edit "><a href="editproduct.php?id=<?php echo $productdet['id']; ?>"
                                                            class="text-decoration">Edit</a></button>

                            <input type="submit" value="delete" class="button delete text-white">
                            <input type="hidden" name="type" value="deleteProduct">
                            <input type="hidden" name="id" value="<?php echo $productdet['id']; ?>">


                        </td>
                    </tr>
                <?php } ?>
            </form>
        </table>

        <br>

        <table class="grid-3 bg-grey text-center table-radius product-table">
            <tr class="table-title">
                <th colspan="2 text-white">Featured</th>
            </tr>
            <?php $featuredProduct = $product->getFeaturedProduct();
            ?>
            <tr>
                <td>Title:</td>
                <td>
                    <?php echo $featuredProduct['title']; ?>
                </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>
                    Rs. <?php echo $featuredProduct['price']; ?>
                </td>
            </tr>
            <tr>
                <td>Manufaturer:</td>
                <td>
                    <?php echo $featuredProduct['manufacturer']; ?>
                </td>
            </tr>
            <tr>
                <td> Description:</td>
                <td>
                    <?php echo $featuredProduct['description']; ?>
                </td>
            </tr>
            <tr>
                <td>Change Product?</td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="type" value="featuredProductChange">
                        <?php $productFeaturedDisplay = $product->getAdminProduct(); ?>
                        <select name="featuredProduct">
                            <?php foreach ($productFeaturedDisplay as $a) { ?>
                                <option value="<?php echo $a['id']; ?>"><?php echo $a['title']; ?></option>
                            <?php } ?>
                        </select>
                        <input type="submit" value="Save" class="button success">
                    </form>
                    <br>

                </td>
            </tr>
        </table>

        <!--<br>-->
        <!--<hr> <br>-->
        <table class="grid-5 bg-grey text-center table-radius product-table">
            <tr>
                <td colspan="3" style="text-align:left;">
                    <a href="addcategory.php">
                        <button class="button success add">Add New Category</button>
                    </a>
                </td>
            </tr>

            <tr>
                <th class="table-title">
                    Id
                </th>
                <th class="table-title">
                    Title
                </th>
                <th class="table-title">
                    Action
                </th>
            </tr>

            <form method="POST" action="">
                <?php
                $categ = new adminCategory();
                $category = $categ->showCategory();
                foreach ($category as $category) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $category['id']; ?>
                        </td>
                        <td>
                            <?php echo $category['category']; ?>
                        </td>
                        <td>

                            <button class="button edit "><a href="editcategory.php?id=<?php echo $category['id']; ?>"
                                                            class="text-decoration">Edit</a></button>

                            <input type="submit" value="delete" class="button delete text-white">
                            <input type="hidden" name="type" value="deleteCategory">
                            <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                        </td>
                    </tr>
                <?php } ?>
            </form>
        </table>
    </div>
</div>


<!--</div>-->
<?php include_once('include/_footer.php'); ?>
