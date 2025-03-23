<?php

//检测登录状态
if(isset($_SESSION['uid'])){
    $name=$_SESSION['name'];
    $login_stats = "<a href='index.php'>ユーザー：$name</a>"."<form action='' method='post' style='margin: 0px;display: inline;'><button class='btnLogin-popup' type='submit' name='logout'>退出</button></form>";
}
else{
    $login_stats="<button class='btnLogin-popup'>登録</button>";
}

//登出
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: index.php');
    exit();
}



?>

<header class="header">
    <div class="header_body">
        <a href="index.php" class="logo">Mall</a>
        <nav class="navigation">
            <a href="index.php">商品一覧</a>
            <!-- select query -->
            <?php
            if(isset($_SESSION['uid'])){
            $uid=$_SESSION['uid'];
            $select_product=mysqli_query($conn,"select * from cart where uid=$uid") or die("query failed");
            if(mysqli_num_rows($select_product)>0){
                $all_quantities=0;
                while($fetch_product=mysqli_fetch_assoc($select_product)){
                    $all_quantities+=$fetch_product['quantity'];
                }
            }
        }
            ?>
            <!-- shopping icon -->
            <a href="cart.php">カット<i class="fa-solid fa-cart-shopping"></i><span><sup><?php 
            if (isset($all_quantities)){
                echo $all_quantities;
            }
            ?></sup></span></a>
            <?php echo $login_stats;?>
            <!-- <button class="btnLogin-popup">登録</button> -->
        </nav>
        <!-- <div id="menu-btn" class="fas fa-bars"></div> -->

    </div>
</header>
