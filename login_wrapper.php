<div class="wrapper" id="wrapper">
    <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>

    <!-- 登录 -->
    <div class="form-box login">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <!-- 用户名 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <input type="text" id="login-text" name="name" required>
                <label>Name</label>
            </div>
            <!-- 密码 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" id="login-password" name="password" required>
                <label>Password</label>
            </div>
            <div class="remember-forget">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="btn">Login</button>
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
                <input type="name" id="register-text" name="name" required>
                <label>Name</label>
            </div>
            <!-- 密码 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" id="register-password" name="password" required>
                <label>Password</label>
            </div>            
            <!-- 邮箱 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                <input type="email" id="register-email" name="email" required>
                <label>Email</label>
            </div>
            <!-- 地址 -->
            <div class="input-box">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <input type="address" id="register-address" name="address" required>
                <label>Address</label>
            </div>
            <div class="remember-forget">
                <label><input type="checkbox">I agree to the terms & conditions</label>
            </div>
            <button type="submit" class="btn">Register</button>
                
            <div class="login-register">
                <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </div>
        </form>
    </div><br>
</div>
