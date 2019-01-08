<?php include_once('include/_header.php'); ?>

<div class="grid-10">
  <?php include('include/_sidebar.php')?>

<div class="grid-85 main-content " style=" height:auto;margin-left:205px;">
  <table class="grid-9 bg-grey text-center table-radius product-table" style="padding:20px;">
    <tr>
      <td colspan="1" style="text-align:left;">
         <a href="addadmin.php"><button class="button success add">Add New Admin</button></a>
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
      <tr>
          <td>
              1
          </td>
          <td>
           John Doe
          </td>
          <td>
            johndoe@gmail.com
          </td>
          <td>
            Shinamangal
          </td>
          <td rowspan="1">
            <button class="button view text-white"><a href="editadmin.php" class="text-decoration">Edit</a></button>
            <button class="button delete text-white"><a href="" class="text-decoration">Delete</a></button>

          </td>
      </tr>



  </table>

</div>
</div>


<!--</div>-->
<?php include_once('include/_footer.php'); ?>
