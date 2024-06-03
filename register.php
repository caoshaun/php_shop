<?php
include 'connect.php';
session_start();

//接收数据
$name=$_POST["name"];
$password=$_POST["password"];
$email=$_POST["email"];
$address=$_POST["address"];
$date=date('Ymd');

$res=mysqli_query($conn, "select name from user where name='$name'");
if ($res) {
    $ress=mysqli_fetch_assoc($res);
    if ($ress==NULL) {
        $res=mysqli_query($conn, "insert into user (name, password,email,address,date) values ('$name', '$password','$email','$address','$date')");
        $_SESSION['ms'] = '注册成功';
        header('location:index.php');        
    }else {
        $_SESSION['ms'] = '该名字已注册';
        header('location:index.php');
    }
}


?>