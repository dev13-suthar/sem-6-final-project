<style>
  @import url('https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700&display=swap');

  * {
    margin: 0;
    padding: 0;
    font-family: 'Work Sans', sans-serif;
    font-size: 18px;
  }

  .user-cart span {
    background-color: red;
    padding-right: 3px;
    padding-left: 3px;
    border-radius: 10px;
    font-size: 18px;
    margin-left: -1.2rem;
  }






  /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
  @media screen and (max-height: 450px) {
    .sidebar {
      padding-top: 15px;
    }

    .sidebar a {
      font-size: 18px;
    }
  }

  /************************** product table styling *********************************/

  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    box-shadow: 0 2px 15px rgba(64, 64, 64, .7);
    border-radius: 12px 12px 0 0;
    margin-bottom: 50px;
  }

  td,
  th {
    padding: 10px 16px;
    text-align: center;
  }

  th {
    background-color: #584e46;
    color: #fafafa;
    font-family: 'Open Sans', Sans-serif;
    font-weight: bold;
  }

  tr {
    width: 100%;
    background-color: #fafafa;
    font-family: 'Montserrat', sans-serif;
  }

  tr:nth-child(even) {
    background-color: #eeeeee;
  }


  #editbtn {
    background-color: blue;
    color: #fff;
    height: 20px;
    width: 70px;
    border-radius: 0.5rem;
  }

  #deletebtn {
    background-color: red;
    color: #fff;
    height: 20px;
    width: 70px;
    border-radius: 0.5rem;
  }
</style>
<div>
  <h2>Games Card</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">sell Id</th>
        <th class="text-center">Games Image</th>
        <th class="text-center">User Name</th>
        <th class="text-center"> Description</th>
        <th class="text-center">Category Name</th>
        <th class="text-center"> Price</th>
        <th class="text-center" >Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from infogames ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td>
        <?=$row["sellid"]?>
      </td>
      <td><img height='100px' src='<?php echo"/final project/php/img/".$row["images"]?>'></td>
      <td>
        <?=$row["firstname"].$row["lastname"]?>
      </td>
      <td>
        <?=$row["description"]?>
      </td>
      <td>
        <?=$row["category_of_games"]?>
      </td>
      <td>
        <?=$row["price"]?>
      </td>
      <!-- <td><button class="btn btn-primary" style="height:40px" id="editbtn" >Update</button></td>-->

   <td>

    <form action="" method="post">

    <input type="hidden" name="email" value="<?php echo $row['email']?>">

    <input type="submit" name="delete" value="delete">
   </form>
</td>
    </tr>
    <?php
            $count=$count+1;
          }
        }
      ?>
  </table>
 
<?php
 
if(isset($_POST['delete']))
{
  $id=$_POST['sellid'];
  $delete="delete from infogames where sellid='$id'";

  $query=mysqli_query($conn,$delete);
  echo '<script> 
  alert(" order is deleted");
  window.location.href="viewAllProducts.php";
  
  </script>';
}

?>
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button> -->

  <!-- Modal -->
  <!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog"> -->

  <!-- Modal content-->
  <!-- <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addItems()" method="POST">
            <div class="form-group">
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" id="p_name" required>
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="number" class="form-control" id="p_price" required>
            </div>
            <div class="form-group">
              <label for="qty">Description:</label>
              <input type="text" class="form-control" id="p_desc" required>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="category" >
                <option disabled selected>Select category</option> -->
  <!-- <?php

                  $sql="SELECT * from category";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['category_id']."'>".$row['category_name'] ."</option>";
                    }
                  }
                ?> -->
  <!-- </select>
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>  -->


</div>