<?php 
include 'connect.php';
session_start();
if(isset($_POST['add_to_cart'])){
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    $product_quantity=1;

    //select cart data based on condition
    if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];

    $select_cart=mysqli_query($conn,"select * from cart where name='$product_name' and uid='$uid'");
    if(mysqli_num_rows($select_cart)>0){
        $product_quantities=mysqli_fetch_assoc($select_cart)['quantity']+$product_quantity;
        $add_quantity=mysqli_query($conn,"update cart set quantity='$product_quantities' where name='$product_name'");
    }else{
        //insert cart data in cart
        $insert_product=mysqli_query($conn,"insert into cart (uid,name,price,image,quantity) values ('$uid','$product_name','$product_price','$product_image','$product_quantity')");
    }
    $display_message = "カートに追加されました";

    }else{
        $display_message="ログインしてください";
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mall</title>

    <!-- css  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- include header -->
    <?php include('header.php') ?>
    <?php include('login_wrapper.php') ?>
    

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
        <section class="products">
            <h1 class="heading">Let's Shop</h1>
            <div class="product_container">
                <?php 
                $select_product=mysqli_query($conn,"select * from `products`");
                if(mysqli_num_rows($select_product)>0){
                    while($fetch_protuct=mysqli_fetch_assoc($select_product)){
                        ?>
                        
                <form method="post" action="">
                    <div class="edit_form">
                        <img src="image/<?php echo $fetch_protuct['image']?>" alt="">
                        <h3><?php echo $fetch_protuct['name']?></h3>
                        <div class="price">単価：¥<?php echo number_format($fetch_protuct['price']) ?></div>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_protuct['name']?>"> 
                        <input type="hidden" name="product_price" value="<?php echo $fetch_protuct['price']?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_protuct['image']?>">
                        <!-- <input type="number" value=1> -->
                        <input type="submit" class="submit_btn cart_btn" value="カートに追加" name="add_to_cart">
                    </div>
                </form>
                <?php
                    }
                    
                }else{
                    $display_message = "完売";
                }
                ?>
            </div>
        </section>
    </div>


    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>