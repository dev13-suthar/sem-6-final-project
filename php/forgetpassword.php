<?php 

 include 'config.php';

?>
<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="\final project\css\login.css">
</head>

<body>
  <div class="container">
    <h2> Forget Password</h2>
    <form action="\final project\php\index.php" method="post" autocomplete="off">
      
      
      <div class="form-group">
        <label for="username">Username</label>
        <input type="email" placeholder="Enter your email" name="username" pattern=".+@gmail.com" maxlength="30"
          required />
      </div>
      <div class="form-group">
        <label for="password">Mobile No</label>
        <input type="text" id="mobile" name="mobileno" placeholder="enter a mobile number" pattern="[0-9]+"  
        minlength="10"    maxlength=10 title="only using number" required>

      </div>
    
      <div class="form-group">
        <input type="submit" id="submit" value="Submit" name="login"/>
       
      </div>
    </form>
  </div>
</body>

</html>

<script>
 


</script>