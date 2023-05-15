<html>
  <link rel="stylesheet" href="./css/style.css">
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
    padding:10px 16px;
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
    height:20px;
    width:70px;
    border-radius:0.5rem;
  }
  
  input[type="submit"]{
    
    padding:5px;
    background-color:red;
    color:#fff;
    height:40px;
    width:70px;
    border-radius:0.5rem;
  }
 
    </style>
<body>
<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Sr.No</th>
        <th class="text-center">FirstName</th>
        <th class="text-center">Last Name </th>
        <th class="text-center">Email</th>
        <th class="text-center">Mobile No</th>
        <th class="text-center" >Action</th>
        <!-- <th class="text-center">Joining Date</th> -->
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from account";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["firstname"]?></td>
      <td> <?=$row["lastname"]?></td>
      <td><?=$row["email"]?></td>
     
      <td><?=$row["mobileno"]?></td>
      
      <!-- <td><button class="btn btn-primary" style="height:40px" id="editbtn" >Update</button></td> -->

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
  </body>
  </html>
  <?php
 
if(isset($_POST['delete']))
{
  $email=$_POST['email'];
  $delete="delete from account where email='$email'";

  $query=mysqli_query($conn,$delete);
  echo '<script> 
  alert(" order is deleted");
  window.location.href="viewCustomers.php";
  
  </script>';
}

?>