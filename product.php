<?php

include "connection.php";
if (isset($_POST['submit'])){
  
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $thumb1 = $_FILES['thumb1']['name'];
    $thumb1_tmp_name = $_FILES['thumb1']['tmp_name'];
    $thumb1_folder1 = 'pic2/' .$thumb1;

    if(empty($name )|| empty($price)|| empty($details)|| empty($thumb1)){
     $message[] = 'please fill out all'  ;
    } else{
        $stmt=mysqli_prepare($connect,"INSERT INTO products(`name`, `price`, `details`, `thumb1`) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt,"siss",$name,$price,$details,$thumb1);
        $result = mysqli_stmt_execute($stmt);
        if($result==true){
            move_uploaded_file( $thumb1_tmp_name,$thumb1_folder1);
            $message[] = 'New Product Added Successfully'  ;
        }else{
            $message[] = 'could not added the Product '  ;
        }
    }
}
    
  // $query = mysqli_query($connect, "INSERT INTO `products`(`name`, `price`, `details`, `thumb1`)
   //VALUES ('$name', '$price', '$details', '$thumb1')") or die('query failed');
    
   /* if ($query){
        move_uploaded_file($thumb1_tmp_name, $thumb1_folder1);
        move_uploaded_file($thumb2_tmp_name, $thumb2_folder2);
        move_uploaded_file($thumb3_tmp_name, $thumb3_folder3);
        move_uploaded_file($thumb4_tmp_name, $thumb4_folder4);
        echo "product added successfuly";
        header('location: display.php');
    } else{
        echo  'query faild'.mysqli_connect_error();
    }
} */









if(isset($_GET['delete'])){
    $pid = $_GET['delete'];
    mysqli_query($connect,"DELETE FROM products WHERE pid = $pid ");
    header('location:product.php');
};


?>
<style type="text/css">
    <?php include 'styleindx.css' ?>
    </style>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>product</title>
<link rel="stylesheet" href="css/styleIndx.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
     <script src="script.js" defer></script>
</head>
<body>
    
<?php 
    include 'hd.html' ;
     ?>
    <br><br><br><br><br>



<form method="post" enctype="multipart/form-data" class="form">
    <h1>add products </h1>
    <div class="input-filed">
        <label>product name</label>
        <input type="text" name="name">
    </div>
    <div class="input-filed">
        <label>product price</label>
        <input type="number" name="price">
    </div>
<br/>
    
    <div class="input-filed">
        <label>thumb1</label>
        <input type="file" name="thumb1" accept="pic/jpg, pic/png, pic/jpeg, pic/webp">
    </div>
   
    <div class="textarea">
        <label>product details</label>
        <textarea name="details"></textarea>
    </div>
    <input type="submit" name="submit" value="add product" class="btn">
</form>
<?php
$select = mysqli_query($connect,"SELECT * FROM products ");
   


if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';

    }
}

?>
<div class="product-display">
    <table class="product-display-table">
        <thead>
            <tr>
                <th>product image</th>
                <th>product name</th>
                <th>product price</th>
                <th>product details</th>
                <th >action</th>
            </tr>
        </thead>
        <?php 
        while($row = mysqli_fetch_assoc($select)){
        ?>
        <tr>
                <td><img src="pic2/<?php echo $row['thumb1']; ?>" height="100" alt=""></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['details'];?></td>
                <td>
<a href="admin_update.php?edit=<?php echo $row['pid'];?>" class="btn"  onclick="return confirm('Are you sure you want to update this product?')"><i class="fas fa-edit">edit</i></a><br>
<a href="product.php?delete=<?php echo $row['pid']; ?>" class="btn" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fas fa-trash">Delete</i></a>
                </td>
            </tr>
        <?php
         }; ?>
    </table>
</div>
</body>



</html>