<?php
//检测登录状态
if(isset($_SESSION['uid'])){
    $wrapperCtrl = "";
}
else{
    if(isset( $_SESSION['regWrapperms'])){        
    $wrapperCtrl="active-popup active";
    }else{
        $wrapperCtrl="active-popup";        
    }
}

?>

<div class="wrapper <?php echo $wrapperCtrl; ?>" id="wrapper">
    <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>

    <!-- 登录 -->
    <div class="form-box login">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <!-- 用户名 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <input type="text" id="login-text" name="name" onblur="checkLoginName()" oninput="checkLoginSub()" required>
                <label>Name</label>
                <span id="loginNameid"></span>
            </div>
            <!-- 密码 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="eye-off-outline" id='pwIcon0' onclick="showPassword0()"></ion-icon></span>
                <input type="password" id="login-password" name="password" onblur="checkLoginPwd();" oninput="checkLoginSub()" required>
                <label>Password</label>
                <span class='loginMs' id="loginPwdid"></span>
            </div>
            <!-- <div class="remember-forget">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div> -->

            <button type="submit" class="btn" id='loginBtn' disabled>Login</button>
            <span class='loginMs' id='loginWrappermsid'><?php 
            if(isset($_SESSION['loginWrapperms'])){
                echo $_SESSION['loginWrapperms'];
                unset($_SESSION['loginWrapperms']);                
            }
            ?></span>
            <div class="login-register">
                <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
            </div>
        </form>
    </div>

    <!-- 注册 -->
    <div class="form-box register">
        <h2>Registration</h2>
        <form action="register.php" method="post">
            <!-- 用户名 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
                <input type="name" id="register-text" name="name" onblur="checkRegName()" oninput="checkRegSubmit()" required>
                <label>Name</label>
                <span id="regNameid"></span>
            </div>
            <!-- 密码 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="eye-off-outline" id='pwIcon1' onclick="showPassword()"></ion-icon></span>
                <input type="password" id="register-password1" name="password" onblur="checkRegPwd()" oninput="checkRegSubmit()" required>
                <label>Password</label>
                <span id="regPwdid"></span>
            </div>        
            <!-- 密码确认 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="eye-off-outline" id='pwIcon2' onclick="showPassword1()"></ion-icon></span>
                <input type="password" id="register-password2" name="password" onblur="isPwdCom()" oninput="checkRegSubmit()" required>
                <label>Password Confirm</label>
                <span id="pwd2span"></span>
            </div>         
            <!-- 邮箱 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                <input type="email" id="register-email" name="email" onblur="checkEmail()" oninput="checkRegSubmit()" required>
                <label>Email</label>
                <span id="emailid"></span>
            </div>
            <!-- 地址 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <input type="text" id="register-address" name="address" onblur="checkAddress()" oninput="checkRegSubmit()" required>
                <label>Address</label>
                <span id="addressid"></span>
            </div>
            <!-- 检查框 -->
            <div class="remember-forget">
                <label><input type="checkbox" id="agree" onclick="checkRegSubmit()" >I agree to the <a href="#">terms & conditions</a></label>
            </div>
            <button type="submit" class="btn" id="regBtn" disabled>Register</button>
            <span class='loginMs' id='regWrappermsid'><?php 
            if(isset($_SESSION['regWrapperms'])){
                echo $_SESSION['regWrapperms'];
                unset($_SESSION['regWrapperms']);                
            }
            ?></span>
                
            <div class="login-register">
                <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </div>
        </form>
    </div><br>
</div>
