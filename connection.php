<?php
$connect=mysqli_connect('localhost','root','','mobile');
if(!$connect){
    die('sorry we faild to connect'.mysqli_connect_error());
}else{
   // echo "connected successefully";
}


?>