<?php

include 'config.php';
include 'login.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link real="stylesheet" href="editprofile.css">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
  
    
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  background-color: #fafafa;
  font-family: Arial, sans-serif;
 
  margin: 0;
}
.container {
  max-width: 350px;
  margin: 0 auto;
  padding: 20px;
  margin-top: 240px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 20px;
  margin-top:2px;
}
.form-group a{
  text-decoration: none;
}
label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}
input[type="text"],
input[type="password"],
input[type="email"]
 {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-size: 16px;
}
#submit {
  background-color: #3897f0;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 3px;
  font-size: 16px;
  cursor: pointer;
  transition:background-color 0.3s;
}
input[type="submit"]:hover {
  background-color: #357ae8;
}

#submit a{
  text-decoration: none;
  color:white;
  
}
 #account {

  margin-left: 80px;
  
}
#btn-back 
{
    height: 44px;
    width: 91px;
    background: #6c757d;
    color: #fff;
    float:right;
    margin-top:-60px;
    border:none;
}

@media screen and (max-width: 500px) {
  .container {
    max-width: 100%;
    padding: 10px;
  }
}

/* registration css */




   </style>
</head>
<body>
<div class="container">
    <h2> Change Password</h2>
    <form action="" method="post" autocomplete="off">
      
      <div class="form-group">
        <label for="password">Old Password</label>
        <input type="password" id="password" name="oldpassword" minlength="8" maxlength="16"
          placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
      </div>
      <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" id="password" name="newpassword" minlength="8" maxlength="16"
          placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
      </div>
     
      <div class="form-group">
     
        <input type="submit" id="submit" value="Update" name="update"/>
        
      </div>
    </form>
    <div class="form-group">
    <a href="profile.php"><button id="btn-back">Back</button></a>
    </div>
  </div>
  
</body>
</html>
<?php
if(isset($_POST['update']))
{
    $username=$_SESSION['username'];
    $oldpassword=$_POST['oldpassword'];
    $newpassword=$_POST['newpassword'];
   
    
    $query=mysqli_query($connection,  "SELECT * FROM account WHERE email = '$username'");
    $row=mysqli_fetch_array($query);

    if($row['password']==$oldpassword)
    {
        
        $update=mysqli_query($connection,"update account set password='$newpassword', confirm_password='$newpassword' where email='$username'");
       
        echo '<script> 
		alert(" Password is successfully updated");
		window.location.href="profile.php";
		</script>';
      

    }
    else
    {
        echo '<script> 
		alert(" old password is unvalid");
		window.location.href="profile.php";
		</script>';
    }
}
?>