<?php

session_start();
@include 'connection.php';

$userId = $_SESSION["userId"];
if (isset($_POST['update_update_btn'])) {
  $update_value = $_POST['update_quantity'];
  $update_id = $_POST['update_quantity_id'];
  $update_quantity_query = mysqli_query($connect, "UPDATE `cart_product` SET quantity = '$update_value' WHERE id = '$update_id'");
  if ($update_quantity_query) {
    header('location:cart.php');
  };
};

if (isset($_GET['remove'])) {
  $remove_id = $_GET['remove'];
  $query = "SELECT c.price FROM cart_product JOIN cart c ON c.id=cart_product.cart_id JOIN products ON products.pid=cart_product.product_id WHERE user_id = $userId";
  $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result) == 1) {
    mysqli_query($connect, "DELETE FROM `cart` WHERE user_id=$userId");
    header('location:cart.php');
  } else {
    $query = "SELECT * FROM cart_product WHERE id=$remove_id ";
    $result2 = mysqli_query($connect, $query);

    $totalPrice = mysqli_fetch_assoc($result2)["total_price"];
    $oldCartTotal = mysqli_fetch_assoc($result)["price"];
    $query = "UPDATE cart SET price=$oldCartTotal-$totalPrice";

    mysqli_query($connect, $query);
    mysqli_query($connect, "DELETE FROM `cart_product` WHERE id = '$remove_id'");

    header('location:cart.php');
  }
};

if (isset($_GET['delete_all'])) {
  mysqli_query($connect, "DELETE FROM `cart` WHERE user_id=$userId");
  header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopping cart</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/style4.css">

</head>

<body>


  <div class="container">

    <section class="shopping-cart">

      <h1 class="heading">shopping cart</h1>

      <table>

        <thead>
          <th>image</th>
          <th>name</th>
          <th>price</th>
          <th>quantity</th>
          <th>total price</th>
          <th>action</th>
        </thead>

        <tbody>

          <?php
          $userId = $_SESSION["userId"];
          $select_cart = mysqli_query($connect, "SELECT * FROM `cart` WHERE user_id=$userId");

          if (mysqli_num_rows($select_cart) > 0) {
            $cart = mysqli_fetch_assoc($select_cart);
            $cartPrice = $cart["price"];
            $cartId = $cart['id'];
            $selectedProducts = mysqli_query($connect, "SELECT * FROM cart_product JOIN products ON cart_product.product_id=products.pid WHERE cart_product.cart_id=$cartId");

            if (mysqli_num_rows($selectedProducts) > 0) {
              while ($fetch_cart = mysqli_fetch_assoc($selectedProducts)) {


          ?>

                <tr>
                  <td><img src="pic2/<?php echo $fetch_cart['thumb1']; ?>" height="100" alt=""></td>
                  <td><?php echo $fetch_cart['name']; ?></td>
                  <td>$<?php echo number_format($fetch_cart['price']); ?></td>
                  <td>
                    <form action="" method="post">
                      <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                      <p><?php echo $fetch_cart['quantity']; ?></p>

                    </form>
                  </td>
                  <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
                  <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
                </tr>
            <?php

              };
            }

            ?>
            <tr class="table-bottom">
              <td><a href="display.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
              <td colspan="3">grand total</td>
              <td>$<?php echo $cartPrice ?></td>
              <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
            </tr>


        </tbody>

      </table>

      <div class="checkout-btn">
        <a href="checkout.php" class="btn <?= ($cartPrice > 1) ? '' : 'disabled'; ?>">procced to checkout</a>
      </div>
    <?php

          };
    ?>
    </section>

  </div>

  <!-- custom js file link  -->
  <script src="js/script1.js"></script>

</body>

</html>