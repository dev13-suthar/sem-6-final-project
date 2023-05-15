<?php

include 'config.php';

if(isset($_POST['submit']))
{
	// create variable for registration input 
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$mobileno=$_POST['mobileno'];
	$password=$_POST['password'];
	$con_password=$_POST['confirmpassword'];

	 //check email already exits
	 $mobilequery="select * from account where mobileno='$mobileno'";
     //check mobile no already exits ?
	 $query=mysqli_query($connection,"select * from account where email='$email'");
	 $moquery=mysqli_query($connection,$mobilequery);
 
	 //retur no of rows
	 $emailcount=mysqli_num_rows($query);
	 $mobilecount=mysqli_num_rows($moquery);
 
	 if($emailcount>0) 
	 {
		echo '<script> 
		alert("email already exited");
		window.location.href="//localhost/final project/html/registration.html";
		
		</script>';
		 
	 }
	 else if($mobilecount>0)
	 {
		 
		echo '<script> alert("mobile number already exited");
		window.location.href="//localhost/final project/html/registration.html";
		</script>';
	 }else if($password===$con_password)
	 {
		 
		$insert="INSERT INTO account (firstname,lastname,email,mobileno,password) VALUES ('$fname','$lname' ,'$email','$mobileno','$password')";
          $register=mysqli_query($connection,$insert);
		  header('location:\final project\html\login.html');
		  
 
	 }
	 else
	 {
		echo '<script> alert("password and confirm password not same !");
		window.location.href="//localhost/final project/html/registration.html";
		</script>';
		
	 }
 

}



?>