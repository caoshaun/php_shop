<!-- delete logic -->

<?php
include 'connect.php';

if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn,"Delete from `products` where id=$delete_id") or die("Query failed");

    if($delete_query){
        header('location:admin_view.php');
    }else{
        echo "エラー";
        header('location:admin_view.php');       
    }
}

?>