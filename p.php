<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $thumb1 = $_FILES['thumb1']['name'];
    $thumb1_tmp_name = $_FILES['thumb1']['tmp_name'];
    $thumb1_folder1 = 'pic2/' . $thumb1;

    if (empty($name) || empty($price) || empty($details) || empty($thumb1)) {
        $message[] = 'Please fill out all fields.';
    } else {
        $stmt = mysqli_prepare($connect, "INSERT INTO products(`name`, `price`, `details`, `thumb1`) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "siss", $name, $price, $details, $thumb1);
        $result = mysqli_stmt_execute($stmt);
        if ($result == true) {
            move_uploaded_file($thumb1_tmp_name, $thumb1_folder1);
            $message[] = 'New Product Added Successfully';
        } else {
            $message[] = 'Could not add the Product.';
        }
    }
}

if (isset($_GET['delete'])) {
    $pid = $_GET['delete'];
    echo '<script>
            if (confirm("Are you sure you want to delete this product?")) {
                window.location.href = "product.php?confirm_delete=' . $pid . '";
            }
          </script>';
}

if (isset($_GET['confirm_delete'])) {
    $pid = $_GET['confirm_delete'];
    mysqli_query($connect, "DELETE FROM products WHERE pid = $pid");
    header('location: product.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="css/styleIndx.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="script.js" defer></script>
    <style type="text/css">
        <?php include 'styleindx.css' ?>
    </style>
</head>

<body>
    <?php include 'hd.html'; ?>
    <br><br><br><br><br>

    <form method="post" enctype="multipart/form-data" class="form">
        <h1>Add Products</h1>
        <div class="input-filed">
            <label>Product Name</label>
            <input type="text" name="name">
        </div>
        <div class="input-filed">
            <label>Product Price</label>
            <input type="number" name="price">
        </div>
        <br />
        <div class="input-filed">
            <label>Thumb1</label>
            <input type="file" name="thumb1" accept="pic/jpg, pic/png, pic/jpeg, pic/webp">
        </div>
        <div class="textarea">
            <label>Product Details</label>
            <textarea name="details"></textarea>
        </div>
        <input type="submit" name="submit" value="Add Product" class="btn">
    </form>

    <?php
    $select = mysqli_query($connect, "SELECT * FROM products");

    if (isset($message)) {
        foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
        }
    }
    ?>

    <div class="product-display">
        <table class="product-display-table">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($select)) {
                ?>
                <tr>
                    <td><img src="pic2/<?php echo $row['thumb1']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['details']; ?></td>
                    <td>
                        <a href="admin_update.php?edit=<?php echo $row['pid']; ?>" class="btn"><i class="fas fa-edit">Edit</i></a><br>
                        <a href="product.php?delete=<?php echo $row['pid']; ?>" class="btn" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fas fa-trash">Delete</i></a>
                    </td>
                </tr>
            <?php
        }
        ?>
        </table>
    </div>
</body>

</html>
