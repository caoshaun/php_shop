<?php include 'connect.php';
session_start();

if(isset($_POST['add_product'])){
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_FILES['product_image']['name'];
    $product_image_temp_name=$_FILES['product_image']['tmp_name'];
    $product_image_folder='image/'.$product_image;

    $insert_query=mysqli_query($conn, "insert into products (name, price, image) values ('$product_name','$product_price','$product_image')") or die("Insert query failed");
    if($insert_query){
        move_uploaded_file($product_image_temp_name,$product_image_folder); 
        $display_message = "追加成功";
    }else{$display_message = "追加失敗";}
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add products</title>

    <!-- css  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- header -->
    <?php include 'admin_header.php'?>

    <!-- form section -->
    <div class="container">
        <!-- message display -->
        <?php
        //echo 'uid:'.$_SESSION['uid'].'name:'.$_SESSION['name'].'admin_uid:'.$_SESSION['admin_uid'];
        if(isset($_SESSION['ms'])){
            $ms= $_SESSION['ms'];
            echo "
            <div class='display_message'>
                <span>$ms</span>
                <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
            </div>";
            unset($_SESSION['ms']);
        }
        if(isset($display_message)){
            echo "
            <div class='display_message'>
                <span>$display_message</span>
                <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
            </div>";
        }
        ?>

        <section>
            <h3 class="heading">商品追加</h3>
            <form action="" class="add_product" method="post" enctype="multipart/form-data">
                <input type="text" name="product_name" placeholder="商品名前入力" class="input_fields" id="goodsName" oninput="checkGoodsName();checkAll()" required>
                <span id='addGoodsms'>&nbsp</span>
                <input type="number" name="product_price" min="0" placeholder="値段入力" class="input_fields" id="num" oninput="checknum();checkAll()" required>
                <span id="numms">&nbsp</span>
                <input type="file" name="product_image" class="input_fields" id="fileInput"  oninput="checkFile();checkAll()" required accept="image/png,image/jpg,image/jpeg">
                <span id='addFilems'>&nbsp</span>
                <input type="submit" name="add_product" class="submit_btn" id="addBtn" value="追加"  disabled>
            </form>
        </section>
    </div>

    <script src="js/adminAdd.js"></script>
    
</body>
</html>