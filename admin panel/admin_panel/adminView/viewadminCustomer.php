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
  

    </style>
<body>
<div >
  <h2>All Admin User</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Sr.No</th>
        <th class="text-center">FirstName</th>
        <th class="text-center">Last Name </th>
        <th class="text-center">Email</th>
        <th class="text-center">Mobile No</th>
        <th class="text-center" colspan="2">Action</th>
        <!-- <th class="text-center">Joining Date</th> -->
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from admin_user";
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
      
        <td><button>Edit</button></td>
       <td> <button>Delete</button></td>

    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>
  </body>
  </html>