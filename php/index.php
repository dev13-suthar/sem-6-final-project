<?php
session_start();
include 'config.php';

// include 'login.php';
?>

<?php 


// when click button of login
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
    
    $_SESSION['login'] =true;
    // header('location:index.php');
  }

  else
  {
    echo '<script> 
		alert(" username and password invalid");
		window.location.href="//localhost/final project/html/login.html";
		
		</script>';
  }
}
if(isset($_SESSION['login']))
{
  $ulogin=$_SESSION['username'];
  $numrow=mysqli_query($connection,"select * from infogames where email='$ulogin'");
  $count=mysqli_num_rows($numrow);
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="\final project\css\main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .col-4 button {
      background-color: red;
      color: white;
      margin-left: 0px;
      height: 29px;
      width: 95px;
      border-radius: 1rem;
      border: 1px solid white;
    }

    .search-box {
      height: 1.7rem;
      padding-left: 50px;

    }

    input[type='search'] {
      background-color: #ffffff;
      height: 20px;
      border-block-end-width: inherit;
    }

    input[type='submit'] {
      height: 20px;
      color: #555;
    }

    #cardquantity {
      color: red;
      margin-bottom: 15px;
      font-size: inherit;
    }

    .products-preview {
      position: fixed;
      top: 0;
      left: 0;
      min-height: 100vh;
      width: 100%;
      background: rgba(0, 0, 0, .8);
      display: none;
      align-items: center;
      justify-content: center;
    }

    .products-preview .preview {
      display: none;
      padding: 2rem;
      text-align: center;
      background: #fff;
      position: relative;
      margin: 2rem;
      /* width: 40rem; */
    }

    .products-preview .preview.active {
      display: inline-block;
    }

    .product_img {
      width: 1200px;
      display: flex;
      margin: auto;
      margin-bottom: 100px;
      margin-top: 50px;
    }

    .image_discription {
      width: 800px;
    }

    .image_discription img {
      width: 800px;
      border-radius: 5px;
    }

    /* card open and close icons */
    .products-preview .preview .fa-times {
      position: absolute;
      top: 1rem;
      right: 1.5rem;
      cursor: pointer;
      color: #444;
      font-size: 3rem;
    }

    .products-preview .preview .fa-times:hover {
      transform: rotate(90deg);
    }

    /* <!-- =============================== *  descriptiopn *============================================ --> */

    .descriptiopn {
      padding-left: 20px;
      border: 1px solid rgb(179, 178, 178);
      border-radius: 5px;
      background-color: white;
      padding-bottom: 15px;
    }

    .descriptiopn h3 {
      padding: 10px 10px 10px 0;
      font-size: 20px;
    }

    .descriptiopn p {
      line-height: 20px;
      color: rgb(51, 51, 51);
    }

    /* <!-- =============================== *  product_details *============================================ --> */

    .product_details {
      width: 400px;
      margin-left: 10px;
    }

    /* <!-- =============================== *  box 1 *============================================ --> */

    .box {
      background-color: white;
      border: 1px solid rgb(179, 178, 178);
      border-radius: 5px;
    }

    .price {
      display: flex;
      justify-content: space-between;
    }

    .price h3 {
      font-size: 30px;
      font-weight: bold;
      padding: 10px;
    }

    .price p {
      font-size: 25px;
      font-weight: normal;
      float: left;
      margin-right: 10px;
      padding: 10px 0 10px 10px;
      cursor: pointer;
    }

    .box span {
      color: #757674;
      padding: 0 0 10px 10px;
    }

    .location {
      display: flex;
      justify-content: space-between;
      font-size: 11px;
      padding: 15px 10px 15px 10px;
    }

    /* <!-- =============================== *  box 2 *============================================ --> */
    .seller_detail img {
      width: 55px;
      border-radius: 50%;
      margin: 10px 10px 8px 10px;
    }

    .seller_detail {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .Seller_description {
      font-size: 17px;
      color: #212f34;
      padding: 10px 0 5px 10px;
    }

    .seller_detail h2 {
      font-size: 18px;
    }

    .seller_detail p {
      font-size: 13px;
    }

    .box a {
      text-decoration: none;
      color: black;
      padding: 10px 125px;
      border: 2px solid black;
      margin: 10px;
      transition: all 0.3s;
    }

    .box a:hover {
      border: 4px solid black;
    }

    #box2 {
      height: 170px;
      margin-top: 10px
    }

    /* <!-- =============================== *  box 3 *============================================ --> */
    #box3 {
      margin-top: 10px;
    }

    #box3 h2 {
      font-size: 18px;
      padding: 15px;
    }

    #box3 p {
      font-size: 13px;
      padding: 0 0 10px 15px;
    }

    #box3 img {
      width: 390px;
      padding: 0 15px;
      padding-bottom: 10px;
    }
  </style>



  </style>
</head>

<body>
  <!-- Header Section -->
  <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <h3 id="logo"> Game Store</h3>
        </div>
        <!-- <div class="search-box">
          
          <form action="search.php" method="post">
            <input type="search" name="search" placeholder="...search games">
            <input type="submit" name="submt" value="search">
          </form>
        </div> -->
        <nav>
          <ul id="MenuItems">
            <li><a href="\final project\php\index.php">Home</a></li>
            <li><a href="\final project\php\search.php">Find Games</a></li>
            <li><a href="\final project\php\sellpage.php">Sell</a></li>
            <li><a href="#contactus">Contact</a></li>
            <li><a href="\final project\php\profile.php">Edit Profile</a></li>
            <li><a href="\final project\php\watchlist.php">Wishlist</a></li>
            <li><a href="\final project\php\logout.php">Log Out</a></li>
          </ul>
        </nav>

         <?php
       
         $numrow=mysqli_query($connection,"select * from infogames where email='$ulogin'");
        //  $numr= mysqli_query($connection,$numrow);
         $count=mysqli_num_rows($numrow);
        ?> 
        <a href="\final project\php\view-order.php"><img src="https://i.ibb.co/PNjjx3y/cart.png" alt="" width="30px"
            height="30px" /></a>
        <img src="https://i.ibb.co/6XbqwjD/menu.png" alt="" class="menu-icon" onclick="menutoggle()" />
        <div id="cardquantity">
          <?php echo $count ?>
        </div>
      </div>
      <div class="row">
        <div class="col-2">
          <h1>
            Welcome to <br />
            Game Store Website
          </h1>
          <p>
            Website
            <br />Our website is provide buy and sell game account.
          </p>
          <a href="#" target="_blank" rel="noopener noreferrer" class="btn">Explore Now →</a>
        </div>
        <div class="col-2">
          <img src="\final project\images\OIP.jfif" alt="" />
        </div>
      </div>
    </div>
  </div>



  <!--latest games account-->
  <h2 class="title">Latest Games Account </h2>
  <div class="row">
    <div class="col-4" data-name="c-1">
      <img src="\final project\images\freefire.jfif" alt="" />
      <h4>Free Fire</h4>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>

      <p>₹5000.00</p>
      <button type="submit" value="Add to Cart">Add to Cart</button>
    </div>



    <div class="col-4" data-name="c-2">
      <img src="\final project\images\cod.jfif" alt="" />
      <h4>Call of Duty</h4>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="far fa-star"></i>
      </div>
      <p>₹1400.00</p>
      <button type="submit" value="Add to Cart">Add to Cart</button>
    </div>

    <div class="col-4" data-name="c-3">
      <img src="\final project\images\valorant.jfif" alt="" />
      <h4>Valorant</h4>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
      </div>
      <p>₹3500.00</p>
      <button type="submit" value="Add to Cart">Add to Cart</button>
    </div>

    <div class="col-4" data-name="c-4">
      <img src="\final project\images\valorant.jfif" alt="" />
      <h4>Valorant</h4>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="far fa-star"></i>
      </div>
      <p>₹3500.00</p>
      <button type="submit" value="Add to Cart">Add to Cart</button>
    </div>
  </div>

  <div class="row">
    <div class="col-4" data-name="c-5">
      <img src="\final project\images\cor.jfif" alt="" />
      <h4>Clash of Royal</h4>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <p>₹1500.00</p>
      <button type="submit" value="Add to Cart">Add to Cart</button>
    </div>

    <div class="col-4" data-name="c-6">
      <img src="\final project\images\pubg.jfif" alt="" />
      <h4>Battle Ground Mobile india</h4>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="far fa-star"></i>
      </div>
      <p>₹4500.00</p>
      <button type="submit" value="Add to Cart">Add to Cart</button>
    </div>
    <div class="col-4" data-name="c-7">
      <img src="\final project\images\pubg.jfif" alt="" />
      <h4>Battle Ground Mobile india</h4>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="far fa-star"></i>
      </div>
      <p>₹4500.00</p>
      <button type="submit" value="Add to Cart">Add to Cart</button>
    </div>
    <div class="col-4" data-name="c-8">
      <img src="\final project\images\pubg.jfif" alt="" />
      <h4>Battle Ground Mobile india</h4>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
      </div>
      <p>₹4500.00</p>
      <button type="submit" value="Add to Cart">Add to Cart</button>
    </div>
  </div>
  </div>

  <!-- click on card and open full page  -->
  <div class="products-preview">

    <div class="preview" data-target="c-1">
      <i class="fas fa-times"></i>
      <div class="product_img">

        <div class="image_discription">
          <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"> <img src="\final project\images\freefire.jfif"></div>
            </div>
          </div>

          <div class="descriptiopn">
            <h3> descriptiopn </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ex, nemo expedita veritatis molestias
              blanditiis veniam unde quos doloremque odio excepturi! Quibusdam fugit quod asperiores praesentium ratione
              voluptates error id? <br>
              <b>MRP 3,500<b>
            </p>
          </div>
        </div>

        <div class="product_details">
          <div class="box">
            <div class="price">
              <h3> ₹3,500</h3>
              <div>
                <p><i class="fa-solid fa-share-nodes"></i> </p>
                <p> <i class="fa-regular fa-heart"></i> </p>
              </div>
            </div>
            <span> <b>Name Of Game:</b> pubg </span>
            <div class="location">

              <p>Date:22/3/2023</p>
            </div>
          </div>

          <div class="box" id="box2">
            <p class="Seller_description"> Seller Description </p>
            <div class="seller_detail">
              <img src="\final project\images\user.png">
              <div>
                <h2> Kirti patel </h2>
                <h2>Contact No:6354090086</h2>
              </div>
            </div>

          </div>

          <div class="box" id="box3">
            <h2> Game Details </h2>
            <p><b>Game id:</b>1857284</p>
          </div>
        </div>
      </div>
    </div>
    <div class="preview" data-target="c-2">
      <i class="fas fa-times"></i>
      <div class="product_img">

        <div class="image_discription">
          <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"> <img src="\final project\images\freefire.jfif"></div>
            </div>
          </div>

          <div class="descriptiopn">
            <h3> descriptiopn </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ex, nemo expedita veritatis molestias
              blanditiis veniam unde quos doloremque odio excepturi! Quibusdam fugit quod asperiores praesentium ratione
              voluptates error id? <br>
              <b>MRP 3,500<b>
            </p>
          </div>
        </div>

        <div class="product_details">
          <div class="box">
            <div class="price">
              <h3> ₹3,500</h3>
              <div>
                <p><i class="fa-solid fa-share-nodes"></i> </p>
                <p> <i class="fa-regular fa-heart"></i> </p>
              </div>
            </div>
            <span> <b>Name Of Game:</b> pubg </span>
            <div class="location">

              <p>Date:22/3/2023</p>
            </div>
          </div>

          <div class="box" id="box2">
            <p class="Seller_description"> Seller Description </p>
            <div class="seller_detail">
              <img src="\final project\images\user.png">
              <div>
                <h2> Kirti patel </h2>
                <h2>Contact No:6354090086</h2>
              </div>
            </div>

          </div>

          <div class="box" id="box3">
            <h2> Game Details </h2>
            <p><b>Game id:</b>1857284</p>
          </div>
        </div>
      </div>
    </div>
    <div class="preview" data-target="c-3">
      <i class="fas fa-times"></i>
      <div class="product_img">

        <div class="image_discription">
          <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"> <img src="\final project\images\freefire.jfif"></div>
            </div>
          </div>

          <div class="descriptiopn">
            <h3> descriptiopn </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ex, nemo expedita veritatis molestias
              blanditiis veniam unde quos doloremque odio excepturi! Quibusdam fugit quod asperiores praesentium ratione
              voluptates error id? <br>
              <b>MRP 3,500<b>
            </p>
          </div>
        </div>

        <div class="product_details">
          <div class="box">
            <div class="price">
              <h3> ₹3,500</h3>
              <div>
                <p><i class="fa-solid fa-share-nodes"></i> </p>
                <p> <i class="fa-regular fa-heart"></i> </p>
              </div>
            </div>
            <span> <b>Name Of Game:</b> pubg </span>
            <div class="location">

              <p>Date:22/3/2023</p>
            </div>
          </div>

          <div class="box" id="box2">
            <p class="Seller_description"> Seller Description </p>
            <div class="seller_detail">
              <img src="\final project\images\user.png">
              <div>
                <h2> Kirti patel </h2>
                <h2>Contact No:6354090086</h2>
              </div>
            </div>

          </div>

          <div class="box" id="box3">
            <h2> Game Details </h2>
            <p><b>Game id:</b>1857284</p>
          </div>
        </div>
      </div>
    </div>
    <div class="preview" data-target="c-4">
      <i class="fas fa-times"></i>
      <div class="product_img">

        <div class="image_discription">
          <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"> <img src="\final project\images\freefire.jfif"></div>
            </div>
          </div>

          <div class="descriptiopn">
            <h3> descriptiopn </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ex, nemo expedita veritatis molestias
              blanditiis veniam unde quos doloremque odio excepturi! Quibusdam fugit quod asperiores praesentium ratione
              voluptates error id? <br>
              <b>MRP 3,500<b>
            </p>
          </div>
        </div>

        <div class="product_details">
          <div class="box">
            <div class="price">
              <h3> ₹3,500</h3>
              <div>
                <p><i class="fa-solid fa-share-nodes"></i> </p>
                <p> <i class="fa-regular fa-heart"></i> </p>
              </div>
            </div>
            <span> <b>Name Of Game:</b> pubg </span>
            <div class="location">

              <p>Date:22/3/2023</p>
            </div>
          </div>

          <div class="box" id="box2">
            <p class="Seller_description"> Seller Description </p>
            <div class="seller_detail">
              <img src="\final project\images\user.png">
              <div>
                <h2> Kirti patel </h2>
                <h2>Contact No:6354090086</h2>
              </div>
            </div>

          </div>

          <div class="box" id="box3">
            <h2> Game Details </h2>
            <p><b>Game id:</b>1857284</p>
          </div>
        </div>
      </div>
    </div>
    <div class="preview" data-target="c-5">
      <i class="fas fa-times"></i>
      <div class="product_img">

        <div class="image_discription">
          <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"> <img src="\final project\images\freefire.jfif"></div>
            </div>
          </div>

          <div class="descriptiopn">
            <h3> descriptiopn </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ex, nemo expedita veritatis molestias
              blanditiis veniam unde quos doloremque odio excepturi! Quibusdam fugit quod asperiores praesentium ratione
              voluptates error id? <br>
              <b>MRP 3,500<b>
            </p>
          </div>
        </div>

        <div class="product_details">
          <div class="box">
            <div class="price">
              <h3> ₹3,500</h3>
              <div>
                <p><i class="fa-solid fa-share-nodes"></i> </p>
                <p> <i class="fa-regular fa-heart"></i> </p>
              </div>
            </div>
            <span> <b>Name Of Game:</b> pubg </span>
            <div class="location">

              <p>Date:22/3/2023</p>
            </div>
          </div>

          <div class="box" id="box2">
            <p class="Seller_description"> Seller Description </p>
            <div class="seller_detail">
              <img src="\final project\images\user.png">
              <div>
                <h2> Kirti patel </h2>
                <h2>Contact No:6354090086</h2>
              </div>
            </div>

          </div>

          <div class="box" id="box3">
            <h2> Game Details </h2>
            <p><b>Game id:</b>1857284</p>
          </div>
        </div>
      </div>
    </div>
    <div class="preview" data-target="c-6">
      <i class="fas fa-times"></i>
      <div class="product_img">

        <div class="image_discription">
          <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"> <img src="\final project\images\freefire.jfif"></div>
            </div>
          </div>

          <div class="descriptiopn">
            <h3> descriptiopn </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ex, nemo expedita veritatis molestias
              blanditiis veniam unde quos doloremque odio excepturi! Quibusdam fugit quod asperiores praesentium ratione
              voluptates error id? <br>
              <b>MRP 3,500<b>
            </p>
          </div>
        </div>

        <div class="product_details">
          <div class="box">
            <div class="price">
              <h3> ₹3,500</h3>
              <div>
                <p><i class="fa-solid fa-share-nodes"></i> </p>
                <p> <i class="fa-regular fa-heart"></i> </p>
              </div>
            </div>
            <span> <b>Name Of Game:</b> pubg </span>
            <div class="location">

              <p>Date:22/3/2023</p>
            </div>
          </div>

          <div class="box" id="box2">
            <p class="Seller_description"> Seller Description </p>
            <div class="seller_detail">
              <img src="\final project\images\user.png">
              <div>
                <h2> Kirti patel </h2>
                <h2>Contact No:6354090086</h2>
              </div>
            </div>

          </div>

          <div class="box" id="box3">
            <h2> Game Details </h2>
            <p><b>Game id:</b>1857284</p>
          </div>
        </div>
      </div>
    </div>
    <div class="preview" data-target="c-7">
      <i class="fas fa-times"></i>
      <div class="product_img">

        <div class="image_discription">
          <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"> <img src="\final project\images\freefire.jfif"></div>
            </div>
          </div>

          <div class="descriptiopn">
            <h3> descriptiopn </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ex, nemo expedita veritatis molestias
              blanditiis veniam unde quos doloremque odio excepturi! Quibusdam fugit quod asperiores praesentium ratione
              voluptates error id? <br>
              <b>MRP 3,500<b>
            </p>
          </div>
        </div>

        <div class="product_details">
          <div class="box">
            <div class="price">
              <h3> ₹3,500</h3>
              <div>
                <p><i class="fa-solid fa-share-nodes"></i> </p>
                <p> <i class="fa-regular fa-heart"></i> </p>
              </div>
            </div>
            <span> <b>Name Of Game:</b> pubg </span>
            <div class="location">

              <p>Date:22/3/2023</p>
            </div>
          </div>

          <div class="box" id="box2">
            <p class="Seller_description"> Seller Description </p>
            <div class="seller_detail">
              <img src="\final project\images\user.png">
              <div>
                <h2> Kirti patel </h2>
                <h2>Contact No:6354090086</h2>
              </div>
            </div>

          </div>

          <div class="box" id="box3">
            <h2> Game Details </h2>
            <p><b>Game id:</b>1857284</p>
          </div>
        </div>
      </div>
    </div>
    <div class="preview" data-target="c-8">
      <i class="fas fa-times"></i>
      <div class="product_img">

        <div class="image_discription">
          <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"> <img src="\final project\images\freefire.jfif"></div>
            </div>
          </div>

          <div class="descriptiopn">
            <h3> descriptiopn </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ex, nemo expedita veritatis molestias
              blanditiis veniam unde quos doloremque odio excepturi! Quibusdam fugit quod asperiores praesentium ratione
              voluptates error id? <br>
              <b>MRP 3,500<b>
            </p>
          </div>
        </div>

        <div class="product_details">
          <div class="box">
            <div class="price">
              <h3> ₹3,500</h3>
              <div>
                <p><i class="fa-solid fa-share-nodes"></i> </p>
                <p> <i class="fa-regular fa-heart"></i> </p>
              </div>
            </div>
            <span> <b>Name Of Game:</b> pubg </span>
            <div class="location">

              <p>Date:22/3/2023</p>
            </div>
          </div>

          <div class="box" id="box2">
            <p class="Seller_description"> Seller Description </p>
            <div class="seller_detail">
              <img src="\final project\images\user.png">
              <div>
                <h2> Kirti patel </h2>
                <h2>Contact No:6354090086</h2>
              </div>
            </div>

          </div>

          <div class="box" id="box3">
            <h2> Game Details </h2>
            <p><b>Game id:</b>1857284</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Testimonial -->


  <hr>
  <h2 class="title">Contact Us </h2>
  <div class="container" id="contactus">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">sector-26,</div>
          <div class="text-two">Gandhinagar</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+91 635 409 0080</div>
          <div class="text-two">+91 635 409 0080 </div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">kirti123@gmail.com</div>
          <div class="text-two">abc@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any work from me or any types of quries related , you can send me message from here. It's my
          pleasure to help you.</p>
        <form action="#">
          <div class="input-box">
            <input type="text" placeholder="Enter your name">
          </div>
          <div class="input-box">
            <input type="text" placeholder="Enter your email">
          </div>
          <div class="input-box message-box">

          </div>
          <div class="button">
            <input type="button" value="Send Now">
          </div>
        </form>
      </div>
    </div>
  </div>
  <hr>
  <!-- footer -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col-1">
          <h3>Access </h3>
          <p>Website access by Any Browser</p>
          <div class="app-logo">
            <img src="\final project\images\browser.webp" alt="" />

          </div>
        </div>

        <div class="footer-col-2">
          <img src="\final project\images\gmaccount.jpg" alt="" />
          <p>
            Our Purpose Is To Sustainably Make the Pleasure and Benefits of
            game Id plateform.
          </p>
        </div>

        <div class="footer-col-3">
          <h3>Useful Links</h3>
          <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">Sell</a></li>
            <li><a href="">Buy</a></li>
          </ul>
        </div>

        <div class="footer-col-4">
          <h3>Follow us</h3>
          <ul>
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Instagram</li>

          </ul>
        </div>
      </div>
      <hr>
      <p class="copyright">Copyright &copy; 2023 - Game Store</p>
    </div>
  </div>

</body>
<script>
  var MenuItems = document.getElementById('MenuItems');
  MenuItems.style.maxHeight = '0px';

  function menutoggle() {
    if (MenuItems.style.maxHeight == '0px') {
      MenuItems.style.maxHeight = '200px';
    } else {
      MenuItems.style.maxHeight = '0px';
    }
  }

  // card perview 
  let preveiwContainer = document.querySelector('.products-preview');
  let previewBox = preveiwContainer.querySelectorAll('.preview');

  document.querySelectorAll('.row .col-4').forEach(product => {
    product.onclick = () => {
      preveiwContainer.style.display = 'flex';
      let name = product.getAttribute('data-name');
      previewBox.forEach(preview => {
        let target = preview.getAttribute('data-target');
        if (name == target) {
          preview.classList.add('active');
        }
      });
    };
  });

  previewBox.forEach(close => {
    close.querySelector('.fa-times').onclick = () => {
      close.classList.remove('active');
      preveiwContainer.style.display = 'none';
    };
  });

</script>

</html>

<?php
}else{?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/final project/css/main.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>





<body>
  <!-- Header Section -->
  <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <h3 id="logo"> Game Store</h3>
        </div>
        <nav>
          <ul class="bgtr" id="">

            <li><a href="\final project\html\login.html">Login</a></li>
          </ul>
        </nav>

      </div>
      <div class="row">
        <div class="col-2">
          <h1>
            Welcome to <br />
            Our website
          </h1>
          <p>
            Our website provide is gaming plateform.
            <br />Our website is provide buy and sell game account.
          </p>
          <a href="#" target="_blank" rel="noopener noreferrer" class="btn">Explore Now →</a>
        </div>
        <div class="col-2">
          <img src="\final project\images\OIP.jfif" alt="" />
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonial -->
  <hr>
  <h2 class="title">Contact Us </h2>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">sector-26,</div>
          <div class="text-two">Gandhinagar</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+91 635 409 0080</div>
          <div class="text-two">+91 635 409 0080 </div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">kirti123@gmail.com</div>
          <div class="text-two">abc@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any work from me or any types of quries related , you can send me message from here. It's my
          pleasure to help you.</p>
        <form action="#">
          <div class="input-box">
            <input type="text" placeholder="Enter your name">
          </div>
          <div class="input-box">
            <input type="text" placeholder="Enter your email">
          </div>
          <div class="input-box message-box">

          </div>
          <div class="button">
            <input type="button" value="Send Now">
          </div>
        </form>
      </div>
    </div>
  </div>
  <hr>
  <!-- footer -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col-1">
          <h3>Access </h3>
          <p>Website access by Any Browser</p>
          <div class="app-logo">
            <img src="\final project\images\browser.webp" alt="" />

          </div>
        </div>

        <div class="footer-col-2">
          <img src="\final project\images\gmaccount.jpg" alt="" />
          <p>
            Our Purpose Is To Sustainably Make the Pleasure and Benefits of
            game Id plateform.
          </p>
        </div>

        <div class="footer-col-3">
          <h3>Useful Links</h3>
          <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">Sell</a></li>
            <li><a href="">Buy</a></li>
          </ul>
        </div>

        <div class="footer-col-4">
          <h3>Follow us</h3>
          <ul>
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Instagram</li>

          </ul>
        </div>
      </div>
      <hr>
      <p class="copyright">Copyright &copy; 2023 - Game Store</p>
    </div>
  </div>

</body>

</body>
<?php } ?>


</html>