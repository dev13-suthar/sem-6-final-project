<?php 
include 'login.php';
$ulogin=$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist</title>

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

</head>
  <div>
     <h2>WishList</h2>
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
      $ulogin=$_SESSION['username'];
      $sql="SELECT * from wishlist where  email='$ulogin'";
      $result=mysqli_query($connection,$sql);
    
      if ($result-> num_rows > 0){
        while ($rw=$result-> fetch_assoc()) {
          $sellid = $rw['sellid'];
          $sq = "select * from infogames where sellid = '$sellid' ";
          $res=mysqli_query($connection,$sq);
          while($row = mysqli_fetch_assoc($res)){

         
           
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
          <form action="" method="post">

            <input type="hidden" name="sellid" value="<?php echo $row['sellid']?>">
        
          <td> <input type="submit" name="delete" value="delete"></td>
        </form>
        </td>
      
      </tr>
      <?php
           
          }   
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
    $delete="delete from wishlist where sellid='$id'";

    $query=mysqli_query($connection,$delete);
    echo '<script> 
		alert(" order is deleted");
		window.location.href="watchlist.php";
		
		</script>';
  }
 
?>
    
</body>
</html>