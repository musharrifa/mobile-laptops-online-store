<?php
session_start();
include 'connection.php';
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $userId = $_SESSION['userId'];



    $select_cart = mysqli_query($connect, "SELECT * FROM cart WHERE user_id=$userId");
    $selectedProduct = mysqli_query($connect, "SELECT * FROM products WHERE pid=$productId");
    $product = mysqli_fetch_assoc($selectedProduct);
    $productPrice = $product["price"];

    if (mysqli_num_rows($select_cart) > 0) {
        $cart = mysqli_fetch_assoc($select_cart);
        $cartId = $cart["id"];
        $cartPrice = $cart["price"];
        $subtotal = ($quantity * $productPrice) + $cartPrice;
        mysqli_query($connect, "INSERT INTO `cart_product` (`quantity`, `total_price`, `cart_id`, `product_id`) VALUES ( $quantity, $quantity*$productPrice, $cartId, $productId)");
        mysqli_query($connect, "UPDATE cart SET price=$subtotal WHERE id=$cartId");
        $message[] = 'prodcuct added to cart sucessfully ';
    } else {
        $res = mysqli_query($connect, "INSERT INTO `cart` (`price`, `user_id`) VALUES ( $productPrice * $quantity, $userId)");
        if ($res) {
            $cart = mysqli_query($connect, "SELECT * FROM cart WHERE user_id=$userId");
            $cartId = mysqli_fetch_assoc($cart)["id"];
            mysqli_query($connect, "INSERT INTO `cart_product` (`quantity`, `total_price`, `cart_id`, `product_id`) VALUES ($quantity, $quantity*$productPrice, $cartId,$productId)");
        }
    }
}



?>
<style type="text/css">
    <?php include 'css/styleIndx.css' ?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>display products</title>
</head>

<body>
<?php 
    include 'hd.html' ;
     ?>   
  



    <section class="products-details">

        <?php
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $select_products = mysqli_query($connect, "SELECT * FROM products WHERE pid=$pid") or die('query faild');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {


        ?>
                    <div class="popup-card">
                        <div class="popup-card-detail">
                            <div class="popup-img">
                                <figure>
                                    <img src="pic2/<?php echo $fetch_products['thumb1']; ?>" id="mainImage">
                                </figure>

                            </div>
                            <div class="info">
                                    
                                    <p><?php echo $fetch_products['details'] ?></p>
                                    <h4>Price: <span>Rs <?php echo $fetch_products['price'] ?></span></h4>
                                    <form action="" class="cart-form" method="POST">
                                        <input type="hidden" name="productId" value="<?php echo $fetch_products["pid"] ?>">
                                        <input type="number" name="quantity" class="quantity-input">
                                        <button type="submit" name="add_to_cart" class="btn">add to cart<i class="fas fa-shopping-cart"></i></button>
                                    </form>
                            </div>
                        </div>

                    </div>
                    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.
            display =`none`;"> </i> </div>';
        };
    };
    ?>
        <?php

                }
            }
        }
        ?>


    </section>





</body>