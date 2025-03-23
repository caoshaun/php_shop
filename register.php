<?php
include 'connect.php';
session_start();

//接收数据
$name=$_POST["name"];
$password=$_POST["password"];
$email=$_POST["email"];
$address=$_POST["address"];
$date=date('Ymd');

$res=mysqli_query($conn, "select name,email from user where name='$name' or email='$email'");
if ($res) {
    $ress=mysqli_fetch_assoc($res);
    if ($ress==NULL) {
        $res=mysqli_query($conn, "insert into user (name, password,email,address,date) values ('$name', '$password','$email','$address','$date')");
        $_SESSION['ms'] = '登録完了';
        header('location:index.php#');        
    }else if($name==$ress['name']){        
        $_SESSION['regWrapperms'] = 'ユーザー名重複';
        header('location:index.php#');      
    }else if($email==$ress['email'])
    {
        $_SESSION['regWrapperms'] = 'メール重複';
        header('location:index.php#');
    }
    else{
        $_SESSION['regWrapperms'] = 'アカウント重複';
        header('location:index.php#');
    }
}


?>