<?php

include 'connection.php';  // this file defines $connect

$search = "";
$result = [];

if(isset($_GET['search'])) {
    $search = $_GET['search'];

    // AI-style smart search query
    $sql = "
        SELECT *,
        (CASE 
            WHEN name LIKE '$search%' THEN 3
            WHEN name LIKE '%$search%' THEN 2
            WHEN details LIKE '%$search%' THEN 1
            ELSE 0
        END) AS score
        FROM products
        WHERE name LIKE '%$search%'
        OR details LIKE '%$search%'
        ORDER BY score DESC;
    ";

    $result = mysqli_query($connect, $sql);  // FIXED !!

} else {
    $result = mysqli_query($connect, "SELECT * FROM products");  // FIXED !!
}
?>

<style type="text/css">
    <?php include 'css/styleIndx.css' ?>
    /* Container positioned at top-left */
.search-container {
    width: 100%;
    display: flex;
    justify-content: flex-start;
    padding: 15px 20px;
}

/* Search box styling */
.search-box {
    display: flex;
    align-items: center;
    background: #ffffff;
    padding: 6px 12px;
    border-radius: 25px;
    border: 1px solid #ccc;
    width: 260px;
    transition: 0.3s;
}

/* Input field */
.search-box input {
    border: none;
    outline: none;
    font-size: 14px;
    width: 100%;
}

/* Search button */
.search-box button {
    border: none;
    background: none;
    cursor: pointer;
    font-size: 18px;
    color: #333;
}

/* Hover effect */
.search-box:hover {
    box-shadow: 0 0 8px rgba(0,0,0,0.2);
}

    
<?php 

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($connect, "SELECT * FROM `cart` WHERE name = '$product_name'");
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'product already added to cart';
    }else{
       $insert_product = mysqli_query($connect, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
       $message[] = 'product added to cart succesfully';
    }
 
 }
?> 

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
    <!--  Search Bar -->
<div class="search-container">
    <form method="GET" action="display.php" class="search-box">
        <input type="text" name="search" placeholder="Search products..."
               value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>


<?php
if(isset($_GET['search'])) {
    echo "<h3 style='text-align:center; color:gray;'>AI Suggestions for: <b>$search</b></h3>";
}
?>


<!-- end  Search Bar -->
    <section class="show-products">
        <div class="box-container">
            <?php
            if(mysqli_num_rows($result) > 0){
    while($fetch_products = mysqli_fetch_assoc($result)){

            ?>
            <div class="box">
                <a href="view_details.php?pid=<?php echo $fetch_products["pid"]?>" class="add"><i class="fas fa-eye"></i></a>
                <img src="pic/<?php echo $fetch_products['thumb1']; ?>">
                <div class="heading">
                    <h2><?php echo $fetch_products['name']; ?></h2>
                    <h2>price <span>Rs.<?php echo $fetch_products['price']; ?>/-</span></h2>
                </div>
               
                
            </div>
            <?php
                }
            }
            
            ?>
        </div>

    </section>
</body>