<?php 
include 'login.php';
$ulogin=$_SESSION['username'];
// $ulogin=$_SESSION[''];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>product carad</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="\final project\css\search.css">  -->
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;700;900&family=Raleway:wght@100;300;500;700&display=swap');

  :root {
    --bodyBack: #ffeaed;
    --textColor: #1b2741;
    --starColor: #f67034;
    --sectionBack: #f7f6f9;
  }

  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Raleway', sans-serif;
  }

  body {
    background-color: var(--bodyBack);
    min-height: 100vh;
    display: grid;
    place-content: center;
  }

  .container {
    width: 80vw;
    height: 80vh;
    display: flex;
    flex-direction: column;
    /* justify-content: space-around; */
  }

  .header {
    width: 100%;
    text-align: center;
  }

  .header h1 {
    font-size: 4em;
    text-transform: uppercase;
    color: var(--textColor);
  }

  .products {
    width: 100%;
    align-self: center;
    height: 70%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 40px;
  }

  .product {
    position: relative;
    background-color: var(--sectionBack);
    width: 350px;
    height: 100%;
    box-shadow: 0 5px 20px rgba(0, 0, 0, .3);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 20px 20px 40px;
    border-radius: 10px;
    transition: .3s;
  }

  .product:hover {
    transform: translateY(-15px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
  }

  .image {
    width: 100%;
    height: 60%;
    display: grid;
    place-content: center;
  }

  .image img {
    max-width: 284px;
  }

  .namePrice {
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .namePrice h3 {
    font-size: 2em;
    text-transform: capitalize;
    color: var(--textColor);
  }

  .namePrice span {
    font-size: 1.5em;
    color: var(--starColor);
  }

  .product p {
    font-size: 18px;
    line-height: 25px;
  }

  .stars svg {
    font-size: 1.3em;
    color: var(--starColor);
  }

  .bay {
    position: absolute;
    bottom: 20px;
    right: 20px;
  }

  .bay button {
    padding: 10px 20px;
    border-radius: 7px;
    border: none;
    background-color: var(--textColor);
    color: var(--sectionBack);
    font-size: 18px;
    text-transform: capitalize;
    cursor: pointer;
    transition: .5s;
  }

  .bay button:hover {
    transform: scale(1.1);
  }

  /* menu */
  @media only screen and (max-width: 1000px) {
    nav ul {
      position: absolute;
      top: 70px;
      left: 0;
      background: #333;
      width: 100%;
      overflow: hidden;
      transition: max-height 0.5s;
    }

    nav ul li {
      display: block;
      margin-right: 50px;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    nav ul li a {
      color: #fff;
    }

    .menu-icon {
      display: block;
      cursor: pointer;
    }
  }

  #logo {
    letter-spacing: 1px;

  }

  .container {
    justify-content: space-around;
  }

  .navbar {
    display: flex;
    align-items: center;
    padding: 20px;
    height: 75px;
    width: 100%;
  }

  nav {
    flex: 1;
    text-align: right;
  }

  nav ul {
    display: inline-block;
    list-style-type: none;
  }

  nav ul li {
    display: inline-block;
    margin-right: 20px;
  }

  a {
    text-decoration: none;
    color: #555;
  }

  p {
    color: #555;
  }

  #menu {
    display: none;
  }

  #watchlist {
    margin-top: -25px;

  }

  .search-box {
    margin-left: 10px;
  }
</style>

<body>
  <div class="navbar">
    <div class="logo">
      <h3 id="logo"> Game Store</h3>
    </div>
    <div class="search-box">
      <form action="" method="post">
        <input type="search" name="search" placeholder="...search games">
        <input type="submit" name="submt" value="search">
      </form>
    </div>
    <nav>
      <ul id="MenuItems">
        <li><a href="\final project\php\index.php">Home</a></li>
        
        <li><a href="\final project\php\sellpage.php">Sell</a></li>
        <li><a href="#contactus">Contact</a></li>
        <li><a href="\final project\php\profile.php">Edit Profile</a></li>
        <li><a href="">Watchlist</a></li>
        <li><a href="\final project\php\logout.php">Log Out</a></li>
      </ul>
    </nav>
  
    <!-- <a href="\final project\php\view-order.php"><img src="https://i.ibb.co/PNjjx3y/cart.png" alt="" width="30px"
        height="30px" id="watchlist" /></a>
        
    <img src="https://i.ibb.co/6XbqwjD/menu.png" alt="" class="menu-icon" onclick="menutoggle()" id="menu" /> -->
  </div>
  <div class="container">

    <div class="header">
      <h1></h1>
    </div>

    <div class="products">

      <?php
       if(isset($_POST['search']))
       {

        $search=$_POST['search'];
        $searchquery=mysqli_query($connection,"select * from infogames where category_of_games LIKE '%$search%'");
         while($data=mysqli_fetch_assoc($searchquery))
         {
        ?>
      <div class="product col-3">
        
        <div class="image">
          <img src="<?php echo " img/".$data['images']?>" alt="">
        </div>
        <div class="namePrice">
          <h3>
            <?php echo $data['category_of_games']?>
          </h3>
          <span>Rs.
            <?php echo $data['price']?>
          </span>
        </div>
        <p><b>Name:</b>
          <?php echo $data['firstname']." ".$data['lastname']?>
        </p>

        <div class="bay">
         

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $data  ['sellid']?>">
              <input type="submit" name="submit" value="Add to Cart">
         </form>
         
        </div>
       
      </div>
      <?php
         }
        
       }
       else
       {

        $searchquery=mysqli_query($connection,"select * from infogames");
         while($data=mysqli_fetch_assoc($searchquery))
         {
        ?>
        
      <div class="product col-3">
     
        <div class="image">
          <img src="<?php echo " img/".$data['images']?>" alt="">
        </div>
        <div class="namePrice">
          <h3>
            <?php echo $data['category_of_games']?>
          </h3>
          <span>Rs.
            <?php echo $data['price']?>
          </span>
        </div>
        <p><b>Name:</b>
          <?php echo $data['firstname']." ".$data['lastname']?>
        </p>

        <div class="bay">
         

          <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $data  ['sellid']?>">
              <input type="submit" name="submit" value="Add to Cart">
         </form>
         
        </div>
         
      </div>
      <?php
         }
        }
        ?>

    </div>
    
  </div>
</div>


      
<?php 

 if(isset($_POST['submit']))
 {
  $id = $_POST['id'];
  echo $id;
   $qr = "insert into wishlist values('$ulogin','$id')";
   $res = mysqli_query($connection,$qr);
    // array_push($wish,$id);

    // $sid = "$sid"._."$id";
  
    echo '<script> 
		alert(" Added to cart ");
		window.location.href="search.php";
		
		</script>';
  }
     
 
?>


</body>

</html>
<!-- <script>
  var MenuItems = document.getElementById('MenuItems');
  MenuItems.style.maxHeight = '0px';

  function menutoggle() {
    if (MenuItems.style.maxHeight == '0px') {
      MenuItems.style.maxHeight = '200px';
    } else {
      MenuItems.style.maxHeight = '0px';
    }
  }

</script> -->