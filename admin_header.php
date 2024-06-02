<?php

//检测登录状态
if(isset($_SESSION['admin_uid'])){

    $login_stats = "<form action='' method='post' style='margin: 0px;display: inline;'><button class='btnLogin-popup' type='submit' name='logout'>退出管理员</button></form>";
}
else{
    $login_stats="<button class='btnLogin-popup'>登录</button>";
    header('location:index.php');
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
        <a href="admin_add.php" class="logo">Mall</a>
        <nav class="navigation">
            <a href="admin_add.php">添加商品</a>
            <a href="admin_view.php">货架</a>
            <?php echo $login_stats;?>
        </nav>
    </div>
</header>
