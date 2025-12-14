<?php
include "connection.php";
$pid = $_GET['edit'];
if (isset($_POST['update'])){
  //  $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $thumb1 = $_FILES['thumb1']['name'];
    $thumb1_tmp_name = $_FILES['thumb1']['tmp_name'];
    $thumb1_folder1 = 'pic2/' .$thumb1;

    if(empty($name )|| empty($price)|| empty($details)|| empty($thumb1)){
     $message[] = 'please fill out all'  ;
    } else{
        $update = "UPDATE  products SET name='$name',price='$price',details='$details',thumb1='$thumb1'
        WHERE pid = $pid ";
        $upload = mysqli_query($connect,$update);
        if($upload){
            move_uploaded_file( $thumb1_tmp_name,$thumb1_folder1);
        }else{
            $message[] = 'could not added the Product '  ;
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin update</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="css/styleIndx.css">
</head>
<body>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
    
        }
    }
    ?>
    <div class="container">
    <form  method="post" enctype="multipart/form-data" class="form centered">
        <?php
$select = mysqli_query($connect,"SELECT * FROM products  WHERE pid=$pid");
while($row = mysqli_fetch_assoc($select)){
        ?>
    <h1>update the  products </h1>
    <div class="input-filed">
        <label>product name</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>">
    </div>
    <div class="input-filed">
        <label>product price</label>
        <input type="text" name="price" value="<?php echo $row['price']; ?>">
    </div>
    <div class="input-filed">
        <label>thumb1</label>
        <input type="file" name="thumb1" accept="pic/jpg, pic/png, pic/jpeg, pic/webp">
    </div>
   
    <div class="textarea">
        <label>product details</label>
        <textarea name="details"></textarea>
    </div>
    <input type="submit" name="update" value="update product" class="btn">
    <a href="product.php" class="btn">go back</a>
</form>
<?php
};
?>
    </div>
    
</body>
</html>