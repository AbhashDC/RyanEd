<?php include_once('include/_header.php'); ?>

<div class="grid-10">
<ul>
    <li><a class="active" href="index.php">Products</a></li>
    <li><a href="categories.php">Admin</a></li>

    <li><a href="logout.php" class="red">Logout</a></li>
</ul>
</div>
<br>
<!--<div class="grid-10 ">-->

<table class="grid-10 bg-grey">
<!--    <tr>-->
<!--        <td>-->
<!--            <a href="#">Add New Product</a>-->
<!--        </td>-->
<!--    </tr>-->

    <tr class="bg-title">
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
        <th>
            Status
        </th>
        <th rowspan="1">
            Action
        </th>
    </tr>


    <?php
    $displayCat=($category->getCategory());
    foreach($displayCat as  $displays){
        ?>

        <li><a href="index.php?category=<?php  echo $displays['category']; ?>"><?php  echo $displays['category']; ?></a></li>
    <?php }?>

    <tr>
        <td>
            1
        </td>
        <td>
         Pendrive
        </td>
        <td>
            42
        </td>
        <td>
            Dell
        </td>
        <td>
            Description
        </td>
        <td>
            Phone
        </td>
        <td>
            Shown
        </td>
        <td rowspan="1">
            <a href="" class="text-decoration">View</a>|
            <a href="" class="text-decoration">Edit</a>|
            <a href="" class="text-decoration">Delete</a>
        </td>
    </tr>
</table>

<br>

    <table  class="grid-5  bg-grey float-right">
        <tr class="bg-title">
            <th>Featured</th>
        </tr>
        <tr>
            <td>
                Title:Pendrive
            </td>
        </tr>
        <tr>
            <td>
                Price: Rs. 42
            </td>
        </tr>
        <tr>
            <td>
                Manufaturer: Rs. 42
            </td>
        </tr>
        <tr>
            <td>
                Description: dsafasdf
            </td>
        </tr>
        <tr>
            <td>
                Change Product? <form> <input type=""></form> <br>
                Save
            </td>
        </tr>
    </table>

<!--<br>-->
<!--<hr> <br>-->
    <table  class="grid-4  bg-grey ">
        <tr >
            <th class="bg-title" colspan="2">
                Category
            </th>
            <th class="bg-title">
                Title
            </th>
            <th class="bg-title">
                Action
            </th>
        </tr>


        <tr>
            <td colspan="2">
                1
            </td>
            <td>
                Phone
            </td>
            <td>

                <a href="" class="text-decoration">Edit</a>
                |
                <a href="" class="text-decoration">Delete</a>
            </td>
        </tr>

    </table>
<!--</div>-->
<?php include_once('include/_footer.php'); ?>