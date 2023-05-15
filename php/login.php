<?php
session_start();
include 'config.php';
//when click button of login
if(isset($_POST['login']))
{
  
  //create session 
  $_SESSION['username']=$_POST['username'];
  $_SESSION['password']=$_POST['log_password'];
 
  //session value store in variable 
    $ulogin=$_SESSION['username'];
    $log_password=$_SESSION['password'];

  $login=mysqli_query($connection,  "SELECT * FROM account WHERE email = '$ulogin' AND password = '$log_password'");
  $row=mysqli_fetch_array($login);
 

  if($row['email'] == $_SESSION['username'] && $row['password'] == $_SESSION['password'] ) 
  {

    // create session
    $_SESSION['firstname']=$row['firstname'];
    $_SESSION['lastname']=$row['lastname'];
    $_SESSION['mobileno']=$row['mobileno'];
    $_SESSION['email']=$row['email'];
    $_SESSION['login']=true;
    //  header('location:index.php');
  }

  else
  {
    echo '<script> 
		alert(" username and password invalid");
		window.location.href="login.php";
		</script>';
  }
 

}

?>