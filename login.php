<?php
include 'connect.php';

session_start();

//接收数据
$name=$_POST["name"];
$password=$_POST["password"];
$res=mysqli_query($conn, "select name,id from user where name='$name' AND password='$password'");
$ress=mysqli_fetch_assoc($res);
$admin_res=mysqli_query($conn, "select name,id from admin where name='$name' AND password='$password'");
$admin_ress=mysqli_fetch_assoc($admin_res);

    if($ress){
        //普通用户
        $_SESSION['uid']=$ress['id'];
        unset($_SESSION['admin_uid']);
        $_SESSION['name']=$ress['name'];
        $_SESSION['ms']="登录成功";
        //$_SESSION['$display_message']='uid:'.$_SESSION['uid'].'name:'.$_SESSION['name'].'admin_uid:'.$_SESSION['admin_uid'];
        header('Location: index.php');
        exit();
    }else if($admin_ress){
        //管理员
        $_SESSION['admin_uid']=$admin_ress['id'];
        unset($_SESSION['uid']);
        $_SESSION['ms']="管理员登录成功";
        header('Location: admin_add.php');
        exit();
    }else{
        //登录失败
        $_SESSION['ms']="名字或密码输入错误";
    }
?>