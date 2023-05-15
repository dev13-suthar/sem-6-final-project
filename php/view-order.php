<html>

<style>
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

  img {
    height: 150px;
    width: 150px;
  }

  input[type=submit] {}
</style>

<body>
  <div>
   <h2>Uploaded Games</h2>
    <table class="table">
      <thead>
        <tr>
          <th class="text-center">Sr.No</th>
          <th class="text-center">Images</th>
          <th class="text-center">Category </th>
          <th class="text-center">Mobileno</th>
          <th class="text-center">description</th>
          <th class="text-center">price</th>
          <th class="text-center">Delete</th>
        </tr>
      </thead>
      <?php
      include_once "login.php";
      $user=$_SESSION['username'];
      $sql="SELECT * from infogames where  email='$user'";
      $result=mysqli_query($connection,$sql);
    
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
      <tr>
        <td>
          <?=$row["sellid"]?>
        </td>

        <td><img src="<?php  echo " img/".$row['images'];?>"></td>
        <td>
          <?=$row["category_of_games"]?>
        </td>
        <td>
          <?=$row["mobileno"]?>
        </td>
        <td>
          <?=$row["description"]?>
        </td>
        <td>
          <?=$row["price"]?>
        </td>
          <form action="" method="post">

            <input type="hidden" name="sellid" value="<?php echo $row['sellid']?>">
        
          <td> <input type="submit" name="delete" value="delete"></td>
        </form>
        </td>
      
      </tr>
      <?php
           
           
        }
    }
    ?>
    </table>
</body>

</html>
<?php
 
  if(isset($_POST['delete']))
  {
    $id=$_POST['sellid'];
    $delete="delete from infogames where sellid='$id'";

    $query=mysqli_query($connection,$delete);
    echo '<script> 
		alert(" order is deleted");
		window.location.href="view-order.php";
		
		</script>';
  }
 
?>