
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>store me</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styleM.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <script src="script.js" defer></script>
</head>
<body>
    <header>
       <a href="#" class="logo" style="font-family: 'Pacifico', cursive; font-size: 27px; font-weight: normal; text-decoration: none; color: black;">
    &#128029;TechBee
</a>


        <div class="navbar">
            <a class="active" href="index.php">Home</a>
            <a href="display.php">Product</a>
            <a href="about.html">About</a>
            <a href="contact.php">contact</a>
            <a href="cart.php">Order</a>
            <a href="register.php">account</a>
            
        </div>
        <div class="icons">
            <i  class="fas fa-bars" id="menu-bars"></i>
          
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <i  class="fas fa-bars" id="menu-bars"></i>
          
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            
        </div>            
    </header>
    <!--end header-->
    <!--search form-->
    <form action="" id="search-form">
        <input type="search" placeholder="Search here.." name="" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>
    <!--start main site-->


    <section class="home " id="home">
<div class="swiper mySwiper home-slider">
    <div class=" swiper-wrapper wrapper">
        <div class=" swiper-slide slide">
            <div class="content">
                <span><b>iphone 17 pro max</b></span>
                <h3>Now <br>
                Available</h3>
                <a href="display.php" class="btn">Order Now</a>
            </div>
        <div class="image">
            <img src="pic/17pro max.png" alt="">
        </div>
        </div>
        <div class="swiper-slide slide">
            <div class="content">
                <span>iphone</span>
                <h3>iphone 16 pro max</h3>
                <a href="display.php" class="btn"> Order Now</a>
            </div>
        <div class="image">
            <img src="pic/16 pro max.jpg" alt="">
        </div>
        </div>
        <div class="swiper-slide slide">
            <div class="content">
                <span>SAMSUNG</span>
                <h3> GALAXY  S25 ultra </h3>
                <h3> Plus</h3>
                <a href="display.php" class="btn">Order Now</a>
            </div>
        <div class="image">
            <img src="pic/Samsung Galaxy S25 Ultra.jpg.jpg" alt="">
        </div>
        </div>
        <div class="swiper-slide slide">
            <div class="content">
                <span>Laptops</span>
                <h3>Microsoft Surface Laptop 7</h3>
                <a href="display.php" class="btn">Order Now</a>
            </div>
        <div class="image">
            <img src="pic/lap3.jpg" alt="">
        </div>
        </div>


    </div>
    <div class="swiper-pagination"></div>
</div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!--!end main site-->
    <!--js files-->
  <!-- F product section start-->
 <section class="featured" id="featured">
    <h1 class="sub-heading">Featured Products</h1>
    <div class="box-container">
        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="pic/17pro max.png" alt="">
            <h3>Iphone 17pro max</h3>
        <span>Rs.513,000.00</span>
        <a href="display.php" class="btn">add to cart</a>

        </div>
        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="pic/Samsung Galaxy S25 Ultra.jpg" alt="">
            <h3>Samsung Galaxy S25 Ultra</h3>
        <span>Rs.432,000.00</span>
        <a href="display.php" class="btn">add to cart</a>
        </div>
        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="pic/lap2.png" alt="">
            <h3> ASUS ROG Strix G16 </h3>
        <span>Rs.665,000.00</span>
        <a href="display.php" class="btn">add to cart</a>
     </div>
     <div class="box">
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-eye"></a>
        <img src="pic/ASUS-Zenbook-DUO-UX8406CA.jpg" alt="">
        <h3>Asus Zenbook DUO UX8406</h3>
    <span>Rs.779,000.00</span>
    <a href="display.php" class="btn">add to cart</a>
 </div>
 <div class="box">
    <a href="#" class="fas fa-heart"></a>
    <a href="#" class="fas fa-eye"></a>
    <img src="pic/iPhone-12-Purple.webp" alt="">
    <h3>Iphone 12</h3>
<span>Rs.462,000.00</span>
<a href="display.php" class="btn">add to cart</a>
</div>
<div class="box">
    <a href="#" class="fas fa-heart"></a>
    <a href="#" class="fas fa-eye"></a>
    <img src="pic/Samsung Galaxy S24 Ultra.jpg" alt="">
    <h3>S24 ultra</h3>
<span>Rs.462,000.00</span>
<a href="display.php" class="btn">add to cart</a>
</div>
    
    </div>
   
 </section>


  <!--!F product section end-->
 
<!--offer -->
<div class="offer">
    <div class="small-container">
        <div class="row">
           <div class="col-2">
            <img src="pic/Apple-MacBook-Air.jpg" class="offer-img">
           </div>
           <div class="col-2">
           <h2>Exclusively Available On TechBee store</h2>
           <h1><b>MacBook Air (M4)</b></h1>
           <h3>The MacBook Air (M4) is a thin and light laptop with a fanless design<br> 
            powered by the Apple M4 chip for improved performance, especially for AI tasks. <br>
            The new model also includes advanced features like the 12MP Center Stage camera and a silent, fanless design. .</h3><br>
           <a href="display.php" class="btn">Buy Now &#10140;</a>
        </div>
    </div>
    </div>
</div>
<!--about us-->
<section class="about" id="about">
    <h3 class="sub-heading">About Us</h3>
    <h1 class="sub-heading">Why Choose Us</h1>
    <div class="row">
        <div class="image">
            <img src="pic/about1.jpg" alt="">
        </div>
        <div class="content">
            <h3>De Best All Collections In The Country</h3>
            <p>Welcome to our TechBee shopping website! <br>
                 We're dedicated to bringing you a seamless and convenient shopping
                  experience right from your smartphone. With a wide range of high-quality products and 
                  exceptional customer service, we strive to make your shopping journey effortless and enjoyable.<br>
                </p>
                <p>
                    Thank you for choosing TechBee as your go-to mobile shopping destination.
                     We hope you enjoy your experience with us,
                     and we look forward to serving you with the utmost dedication.<br>
                      Happy shopping with us!
                </p>
<div class="icon-container">
    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <span>Fast Delivery</span>
    </div>
    <div class="icons">
        <i class="fas fa-dollar-sign"></i>
        <span>Easy payment</span>
    </div>
    <div class="icons">
        <i class="fas fa-headset"></i>
        <span>24/7 Service</span>
    </div>
</div>
<a href="#" class="btn">Learn More</a>
        </div>
    </div>
   
</section>
<!--!about us-->
 <!--contact-->
 <section id="contact-details" class="contact-details">
    <div class="details">
        <span>GET IN TOUCH</span>
        <h2> Visit one of our agency locations or contact us</h2>
        <h3>Head office</h3>
        <div>
            <li>
                <i class="fas fa-map"></i>
                <p>No 3, Main Street, kandy</p>
            </li>
            <li>
                <i class="fas fa-envelope"></i>
                <p>techbee@gmail.com</p>
            </li>
            <li>
                <i class="fas fa-phone-alt"></i>
                <p>035 2267589 , 0764563452</p>
        </li>
        <li>
                <i class="fas fa-clock"></i>
                <p>Monday-Sunday: 9.30am-9.00pm</p>
            </li>
        </div>
    </div>
    <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6103355410387!2d80.62277787317232!3d7.285098613848535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36896c3c013b3%3A0xd3eabcf88853c1da!2sESOFT%20Metro%20Campus%20Kandy%20-%20Primary%20Division!5e0!3m2!1sen!2slk!4v1765462031455!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
 </section>
 
 

 
 </section>


 <!--!end all product-->

  <!--!oder section end-->
   <!--footer section start-->
   <footer class="footer">
    <div class="container">
        <div class="row">
           <div class="footer-col">
            <h4> company</h4>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">our services</a></li>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">affiliate program</a></li>
            </ul>
           </div>
           <div class="footer-col">
            <h4>get help</h4>
            <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">shipping</a></li>
                <li><a href="#">returns</a></li>
                <li><a href="#">order status</a></li>
                <li><a href="#">payment options</a></li>
            </ul>
           </div>
           <div class="footer-col">
            <h4>online shop</h4>
            <ul>
                <li><a href="#">New Arrivals</a></li>
                <li><a href="#">Smartphones</a></li>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">iMac & MacBook</a></li>
            </ul>
           </div>
           <div class="footer-col">
            <h4>follow us</h4>
            <div class="social-links">
                <a href="www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                <a href="www.twitter.com"><i class="fab fa-twitter"></i></a>
                <a href="www.instragram.com"><i class="fab fa-instagram"></i></a>
                <a href="www.linkdin.com"><i class="fab fa-linkedin-in"></i></a>
            </div>
           
           </div>
        </div>
    </div>
   </footer>
    <!--!footer  section end-->
</body>
</html>
