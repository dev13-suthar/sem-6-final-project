
<html>

<style>
  @import url('https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700&display=swap');
* {
    margin: 0;
    padding: 0;
    font-family: 'Work Sans', sans-serif;
    font-size: 18px;
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

  
  #editbtn
  {
    background-color:blue;
    color:#fff;
    height:40px;
    width:70px;
    border-radius:0.5rem;
  }
  #deletebtn
  {
    background-color:red;
    color:#fff;
    height:20px;
    width:70px;
    border-radius:0.5rem;
  }


  </style>
<body>

<div >
  <h3>Category Items</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Category Name</th>
        <th class="text-center" colspan=2>Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from category";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["category"]?></td>   
      
      <script>
        function edit(){
          let edit =  document.getElementsByClassName('edit');

        }
      </script>
      <td>
      <form action="" method="post">

          <input type="hidden" name="srno" value="<?php echo $row['srno']?>">

          <input type="submit" name="delete" value="delete">
      </form>
      </td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
      <tr>
        <td>
          <p>Add catagary</p>
        </td>
        
          <form action="" method="post">
            <!-- <input type="text" name="srno" placeholder="sr no.."> -->
            <td>

              <input type="text" name="category" placeholder = "category name">
            </td>
            <td>
              <input name="add" type="submit" value="✅">

            </td>
            
          </form>
          
        

        
      </tr>
  </table>
<?php
    if(isset($_POST['add'])){
      $no = $_POST['srno'];
      $cat = $_POST['category'];
      $qr = "insert into category values ('$no','$cat')";
      $res = mysqli_query($conn,$qr);
    }

    if(isset($_POST['delete']))
    {
      $srno=$_POST['srno'];
      $delete="delete from category where srno='$srno'";

      $query=mysqli_query($conn,$delete);
      echo '<script> 
      alert(" order is deleted");
      window.location.href="viewCategories.php";
      
      </script>';
    }


?>
 



  
</div>

<div class="popup">
  <form action="" method="post">

  </form>
</div>
   
      </body>
      </html>