<?php 
include 'connect.php';
session_start();

//update query
if(isset($_POST['update_product_quantity'])){
    $update_value=$_POST['update_quantity'];
    $update_id=$_POST['update_quantity_id'];
    $update_quantity_query=mysqli_query($conn,"update cart set quantity=$update_value where id=$update_id");    
}

if(isset($_GET['remove'])){
    $remove_id=$_GET['remove'];
    mysqli_query($conn,"delete from cart where id=$remove_id");
    header('location:cart.php');
}

if(isset($_GET['delete_all'])){
    mysqli_query($conn,"delete from cart");
    header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
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
    if(isset($display_message)){
        echo "
        <div class='display_message'>
            <span>$display_message</span>
            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
        </div>";
    }
    if(!isset($_SESSION['uid'])){
        echo "
        <div class='display_message'>
            <span>请登录</span>
            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
        </div>";
    }else{
    ?>
        <section class="shopping_cart">
            <h1 class="heading">购物车</h1>
            <table>
                <?php
                $uid=$_SESSION['uid'];
                $select_cart_product=mysqli_query($conn,"select * from cart where uid=$uid");
                $all_manay=0;
                if(mysqli_num_rows($select_cart_product)>0){
                    echo "
                    <thead>
                        <th>序号</th>
                        <th>商品名</th>
                        <th>图片</th>
                        <th>价格</th>
                        <th>数量</th>
                        <th>总价</th>
                        <th>操作</th>
                    </thead>
                    <tbody>";
                    $num=0;
                    while($fetch_cart_product=mysqli_fetch_assoc($select_cart_product)){
                        $each_all_price=$fetch_cart_product['price'] * $fetch_cart_product['quantity'];
                        $all_manay+=$each_all_price;
                        $num+=1;
                        ?>

                        <tr>
                            <td><?php echo $num?></td>
                            <td><?php echo $fetch_cart_product['name']?></td>
                            <td>
                                <img src="image/<?php echo $fetch_cart_product['image']?>" alt="">
                            </td>
                            <td><?php echo number_format($fetch_cart_product['price']) ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $fetch_cart_product['id']?>" name="update_quantity_id">
                                    <div class="quantity_box">
                                        <input type="number" min='1' value=<?php echo $fetch_cart_product['quantity']?> name="update_quantity">
                                        <input type="submit" class="update_quantity"  value="更新" name="update_product_quantity">
                                    </div>
                                </form>
                            </td>
                            <td><?php echo number_format($each_all_price) ?></td>
                            <td>
                                <a href="cart.php?remove=<?php echo $fetch_cart_product['id']?>" class="delete_product_btn" onclick="return confirm('确认删除商品？')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                <?php
                    }

                }else{
                    echo "<div class='empty_text'>暂无商品选中</div>";
                }
                ?>
                </tbody>
            </table>

            <?php
            if($all_manay>0){
                $all_manay_format=number_format($all_manay);
                echo "
                <!-- bottom area -->
                <div class='table_bottom'>
                    <a href='index.php' class='bottom_btn'>继续购物</a>
                    <h3 class='bottom_btn'>总价：￥<span>$all_manay_format</span></h3>
                    <a href='checkout.php' class='bottom_btn '>购买</a>
                </div>
                <a href='cart.php?delete_all' class='delete_all_btn' onclick='return confirm(`确认删除商品？`)'>
                    <i class='fas fa-trash'>删除全部</i>
                </a>";
            }
            ?>
        </section>
        <?php }?>
    </div>










    
    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>