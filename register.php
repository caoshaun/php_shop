<?php
include 'connect.php';

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
        $display_message = '注册成功';
        header('location:index.php');        
    }else {
        $display_message = '该名字已注册';
    }
}


?>