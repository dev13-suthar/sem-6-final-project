<?php

include 'search.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  </title>
    <style>
        *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}



body{
    background-color: #f2f4f5;
}

/* <!-- =============================== * product img * ============================================ --> */


.product_img{
    width: 1200px;
    display: flex;
    margin: auto;
    margin-bottom: 100px;
    margin-top: 50px;
}
.image_discription{
    width: 800px;
}
.image_discription img{
    width: 800px;
    border-radius: 5px;
}
#prev{
    color: white;
}
#next{
    color: white;
}





/* <!-- =============================== *  descriptiopn *============================================ --> */





.descriptiopn{
 padding-left: 20px;
 border: 1px solid rgb(179,178,178);
 border-radius: 5px;
 background-color: white;
 padding-bottom: 15px;
}
.descriptiopn h3{
 padding: 10px 10px 10px 0;
 font-size: 20px;
}
.descriptiopn p{
    line-height: 20px;
    color: rgb(51,51,51);
}





/* <!-- =============================== *  product_details *============================================ --> */

.product_details{
    width: 400px;
    margin-left: 10px;
}



/* <!-- =============================== *  box 1 *============================================ --> */

.box{
    background-color: white;
    border: 1px solid rgb(179, 178, 178);
    border-radius: 5px;
}
.price{
    display: flex;
    justify-content: space-between;
}
.price h3{
    font-size: 30px;
    font-weight: bold;
    padding: 10px;
}
.price p{
  font-size: 25px;
  font-weight: normal;
  float: left;
  margin-right: 10px;
  padding: 10px 0 10px 10px;
  cursor: pointer;
}
.box span{
    color: #757674;
    padding: 0 0 10px 10px;
}
.location{
    display: flex;
    justify-content: space-between;
    font-size: 11px;
    padding: 15px 10px 15px 10px ;
}




/* <!-- =============================== *  box 2 *============================================ --> */


.seller_detail img{
    width: 55px;
    border-radius: 50%;
    margin: 10px 10px 8px 10px ;
}
.seller_detail{
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}
.Seller_description{
    font-size: 17px;
   color:  #212f34;
   padding: 10px 0 5px 10px;
}
.seller_detail h2{
    font-size: 18px;
}
.seller_detail p{
    font-size: 13px;
}
.box a{
    text-decoration: none;
    color: black;
    padding: 10px 125px;
    border: 2px solid black;
    margin: 10px;
    transition: all 0.3s;
}
.box a:hover{
    border: 4px solid black;
}
#box2{
    height: 170px;
    margin-top: 10px
}






/* <!-- =============================== *  box 3 *============================================ --> */



#box3{
    margin-top: 10px;
}
#box3 h2{
    font-size: 18px;
    padding: 15px;
}
#box3 p{
    font-size: 13px;
    padding: 0 0 10px 15px;
}
#box3 img{
    width: 390px;
    padding: 0 15px;
    padding-bottom: 10px;
}
     </style>
<body>
    <!-- =============================== * product img * ============================================ -->



    <div class="product_img">


        <div class="image_discription">
            <div class="swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide"> <img src="images/pro_1.jpg"> </div>
                    <div class="swiper-slide"> <img src="images/pro_2.jpg"></div>
                    <div class="swiper-slide"> <img src="images/pro_3.jpg"></div>
                    <div class="swiper-slide"> <img src="images/pro_4.jpg"></div>

                </div>

                <div class="swiper-pagination"></div>


                <div class="swiper-button-prev" id="prev"></div>
                <div class="swiper-button-next" id="next"></div>
            </div>

            <div class="descriptiopn">
                <h3> descriptiopn </h3>
                <p>Convert your TV into smart TV using HDMI of your TV. All online platform available downloaded. <br>
                    Include MI stick, Bluetooth remote, Power adapter. <br>
                    Condition new. <br>
                    MRP 3,500</p>
            </div>
        </div>

        <div class="product_details">
            <div class="box">
                <div class="price">
                    <h3> <?php echo $data['price']?></h3>
                    <div>
                        <p><i class="fa-solid fa-share-nodes"></i> </p>
                        <p> <i class="fa-regular fa-heart"></i> </p>
                    </div>
                </div>
                <span> Mi TV Stick </span>
                <div class="location">
                    <p>Ghatkopar West, Mumbai, Maharashtra</p>
                    <p>Today</p>
                </div>
            </div>

            <div class="box" id="box2">
                <p class="Seller_description"> Seller Description </p>
                <div class="seller_detail">
                    <img src="images/pic2.jpg">
                    <div>
                        <h2> AsKAki </h2>
                        <p>Member since Nov 2021</p>
                    </div>
                </div>
                <a href="olx_chatbox.html"> Chat with Seller  </a>

            </div>

         <div class="box" id="box3">
              <h2> Posted in </h2>
              <p>Bandra East, Mumbai</p>
              <img src="images/location.png" >
         </div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
      
        //  =============================== * product img* ============================================//
        const swiper = new Swiper('.swiper', {

            loop: true,


            pagination: {
                el: '.swiper-pagination',
            },


            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });


    </script>

</body>

</html>