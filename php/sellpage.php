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
  <link rel="stylesheet" href="\final project\css\sellpage.css">
  <title>Sellpage</title>


</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">

    <div>
      <center>
        <h2> upload games information </h2>
      </center>
      <label for="fname">First Name</label>
      <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

      <label for="games">Game-Category</label>
      <select id="games" name="games" required>
        <option value="not selected">NO SELECTED</option>
        <option value="pubg">PUBG</option>
        <option value="valorant">VALORANT</option>
        <option value="clash of clan">CLASH OF CLANS</option>
        <option value="call of duty ">CALL OF DUTY(MOBILE)</option>
      </select>

      <div class="game-photo">
        <input type="file" name="image">
      </div>
      <div class="price">

        <label>Price</label><input type="number" min=1 max="99999" placeholder="enter price " name="price" required>
      </div>
      <div class="contact_level">

        <div class="number">
          <label for="">Phone-number</label>
          <input type="text" id="mobile" name="mobileno" placeholder="enter a mobile number" pattern="[0-9]+"
            minlength="10" maxlength=10 title="only using number" required>

        </div>

        <div class="id_level">
          <label for="">Games-id</label>
          <input type="number" name="game_id" placeholder="Game-id" required>
        </div>
        <div class="description">
          <textarea rows="5" name="description" required> </textarea>


        </div>
        <input type="submit" value="Submit" name="submit">
      </div>

  </form>
</body>

</html>
<?php

if(isset($_POST['submit']))
{    //data for user
     $fname=$_POST['firstname'];
     $lname=$_POST['lastname'];
     $email=$_SESSION['email'];
     $games=$_POST['games'];
     $mobileno=$_POST['mobileno'];
     $games_id=$_POST['game_id'];
     $description=$_POST['description'];
     $price=$_POST['price'];

     //image details 
    $file_name=$_FILES['image']['name'];
     $file_size=$_FILES['image']['size'];
     $file_tmp=$_FILES['image']['tmp_name'];
     $file_type=$_FILES['image']['type'];
     $sellid=$_POST['sellid'];
     
     
     
     move_uploaded_file($file_tmp,"img/". $file_name);
     
    $createcard=mysqli_query($connection,"insert into infogames (firstname,lastname,email,category_of_games,mobileno,games_id,description,price,images) values ('$fname','$lname','$email','$games','$mobileno','$games_id','$description','$price','$file_name')");

     
      echo '<script> 
      alert(" card is successfully created");
      window.location.href="index.php";
      
      </script>';

  }

?>