<?php
include "connection.php";

$message = "";

if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Validate and sanitize user input
    $name = mysqli_real_escape_string($connect, $name);
    $email = mysqli_real_escape_string($connect, $email);
    $message = mysqli_real_escape_string($connect, $message);

    $sql = "INSERT INTO comment (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($connect->query($sql) === true) {
        $message = 'Comment posted successfully.';
    } else {
        $message = 'Error: Comment not posted.';
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>store me</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/main.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
              <a href="#" class="logo" style="font-family: 'Pacifico', cursive; font-size: 27px; font-weight: normal; text-decoration: none; color: black;">
    &#128029;TechBee
</a>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="display.php">Product</a>
            <a href="about.html">About</a>
            <a class="active" href="#">Contact</a>
            <a href="register.php">Account</a>
        </div>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-heart"></a>
        </div>          
    </header>

    <br><br><br><br><br><br><br><br><br><br> <br>

    <section id="contact-details" class="contact-details">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us</h2>
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

    <section id="form-details">
        <form action="" method="post">
            <span>LEAVE A MESSAGE</span>
            <h2>We Love To Hear From You</h2>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="message" cols="30" rows="10" placeholder="Your message" required></textarea>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
        <?php if (!empty($message)): ?>
            <label class="text-<?php echo $connect->query($sql) === true ? 'success' : 'danger'; ?>"><?php echo $message; ?></label>
        <?php endif; ?>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Order Status</a></li>
                        <li><a href="#">Payment Options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Online Shop</h4>
                    <ul>
                       <li><a href="#">New Arrivals</a></li>
                <li><a href="#">Smartphones</a></li>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">iMac & MacBook</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
