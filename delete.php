<!-- delete logic -->

<?php
include 'connect.php';

if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn,"Delete from `products` where id=$delete_id") or die("Query failed");

    if($delete_query){
        header('location:view_products.php');
    }else{
        echo "出错了";
        header('location:view_products.php');       
    }
}

?>