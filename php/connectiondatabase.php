<?php


//connection establish
$connection=mysqli_connect("localhost","root","");
//select database
$db =mysqli_select_db($connection,"project");

mysqli_close($connection);

?>