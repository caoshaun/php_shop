const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');




registerLink.addEventListener('click',()=>{
    wrapper.classList.add('active');
    document.getElementById("login-text").value="";
    document.getElementById("login-password").value="";
    document.getElementById('loginNameid').innerHTML='';
    document.getElementById('loginPwdid').innerHTML='';
    document.getElementById('loginWrappermsid').innerHTML='';
})

loginLink.addEventListener('click',()=>{
    wrapper.classList.remove('active');
    document.getElementById("register-text").value="";
    document.getElementById("register-password1").value="";
    document.getElementById("register-password2").value="";
    document.getElementById("register-email").value="";
    document.getElementById("register-address").value="";
    document.getElementById('regWrappermsid').innerHTML='';

    let ids=['regNameid','regPwdid','pwd2span','emailid','addressid'];
    for (let id of ids){          
        document.getElementById(id).innerHTML='';
    }
})

btnPopup.addEventListener('click',()=>{
    wrapper.classList.add('active-popup');
})

iconClose.addEventListener('click',()=>{
    wrapper.classList.remove('active-popup');
})

//----------------------------登录---------------------------
function checkLoginName(){
    var uname=document.getElementById('login-text').value;
    var span=document.getElementById('loginNameid');
    if(uname=='' || uname==null){
        return false;
    }else if(uname.length>20){
        span.innerHTML ='用户名长度超过20';
        span.style.color='red';
        return false;
    }else{
        span.innerHTML='';
        return true;
    }
}

function checkLoginPwd(){
    var loginPwd=document.getElementById('login-password').value;
    var span=document.getElementById('loginPwdid');

    if(loginPwd=="" || loginPwd==null){
        return false;
    }else if(loginPwd.length>20){
        span.innerHTML ='密码过长';
        span.style.color='red';
        return false;
    }else{
        span.innerHTML='';
        return true;
    }    
}
function checkLoginSub(){
    var loginBtnStat=document.getElementById('loginBtn');
    const loginmsstat=document.getElementById('loginWrappermsid');
    if(checkLoginName()&&checkLoginPwd()){
        loginBtnStat.disabled=false;
    }else{
        loginBtnStat.disabled=true;
    }
    loginmsstat.innerHTML='';
}

function showPassword0(){
    const pressIconText=document.getElementById("login-password");
    const pressIcon=document.getElementById("pwIcon0");
    if (pressIconText.type=='password'){
        pressIconText.type='text';
        pressIcon.name="eye-outline";
    }else{
        pressIconText.type='password';
        pressIcon.name="eye-off-outline";
    }
}


//----------------------------注册---------------------------

function checkRegName(){
    var uname=document.getElementById('register-text').value;
    var span=document.getElementById('regNameid');
    var reg=/^[a-zA-Z0-9\u4e00-\u9fa5\u3040-\u30ff\s]+$/; //    /^[u4e00-u9fa5·0-9A-z]+$/
    if(uname=='' || uname==null){
        return false;
    }else if(uname.length>20){
        span.innerHTML ='用户名长度超过20';
        span.style.color='red';
        return false;
    }else if (reg.test(uname)){
        span.innerHTML='✓';
        span.style.color='green';
        return true;
    }else{
        span.innerHTML ='用户名为半角大小写字母，数字，空格，中文，日语';
        span.style.color='red';
        return false;
    }
}

function checkRegPwd(){
    var RegPwd=document.getElementById('register-password1').value;
    var span=document.getElementById('regPwdid');

    const hasUpperCase = /[A-Z]/;
    const hasLowerCase = /[a-z]/;
    const hasDigit = /\d/;
    const validChars = /^[a-zA-Z0-9]+$/;
    const fullWidthRegex = /[\u3000-\u303F\u3040-\u309F\u30A0-\u30FF\uFF00-\uFFEF\u4E00-\u9FAF\uAC00-\uD7AF]/; //正则匹配全角字符          
    
    const checks = [
        { type: "大写字母", valid: hasUpperCase.test(RegPwd) },
        { type: "小写字母", valid: hasLowerCase.test(RegPwd) },
        { type: "数字", valid: hasDigit.test(RegPwd) }
    ];

    const passedChecks = checks.filter(check => check.valid);

    if (RegPwd=="" || RegPwd ==null){
        return false;
    }else if(fullWidthRegex.test(RegPwd)){
        span.innerHTML='请输入半角字母数字';
        span.style.color='red';
        return false; 
    }else if(!validChars.test(RegPwd)){
        span.innerHTML='只能输入大小写字母和数字';
        span.style.color='red';
        return false; 
    }else if(passedChecks.length===1){
        span.innerHTML='需要有两种及以上类型的字符';
        span.style.color='red';
        return false; 
    }else if (RegPwd.length<6){  
        span.innerHTML='长度小于6';
        span.style.color='red';
        return false; 
    }else if(RegPwd.length>30){
        span.innerHTML='长度大于30';
        span.style.color='red';
        return false; 
    }else{
        span.innerHTML='✓';
        span.style.color='green';
        return true;
    }

}

function showPassword(){
    const pressIconText=document.getElementById("register-password1");
    const pressIcon=document.getElementById("pwIcon1");
    if (pressIconText.type=='password'){
        pressIconText.type='text';
        pressIcon.name="eye-outline";
    }else{
        pressIconText.type='password';
        pressIcon.name="eye-off-outline";
    }
}

function showPassword1(){
    const pressIconText=document.getElementById("register-password2");
    const pressIcon=document.getElementById("pwIcon2");
    if (pressIconText.type=='password'){
        pressIconText.type='text';
        pressIcon.name="eye-outline";
    }else{
        pressIconText.type='password';
        pressIcon.name="eye-off-outline";
    }
}

function isPwdCom(){
    var text1=document.getElementById("register-password1").value;
    var text2=document.getElementById("register-password2").value;
    var span=document.getElementById("pwd2span");
    if (text2=="" || text2==null){
        return false;
    }else if (text1==text2){
        span.innerHTML = "✓";
        span.style.color='green';
        return true;
    }else{
        span.innerHTML = "密码不一致";        
        span.style.color='red';
        return false;
    }
}

function checkEmail(){
    var emailText=document.getElementById("register-email").value;
    var span=document.getElementById("emailid");
    const reg = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if(emailText=="" || emailText==null){
        return false;
    }else if(emailText.length>40){
        span.innerHTML ='邮箱长度超过40';
        span.style.color='red';
        return false;
    }else if(reg.test(emailText)){   
        span.innerHTML='✓';
        span.style.color='green';
        return true;
    }else{
        span.innerHTML = "请输入正确邮箱";        
        span.style.color='red';
        return false;
    }
}

function checkAddress(){
    var address=document.getElementById("register-address").value;
    var span=document.getElementById("addressid");
    if(address=="" || address==null){
        return false;
    }else if(address.length>20){
        span.innerHTML ='地址长度超过255';
        span.style.color='red';
        return false;
    }else{      
        span.innerHTML='✓';
        span.style.color='green';
        return true;
    }
}

function checkRegSubmit(){
    const regbtn=document.getElementById('regBtn');
    const regms=document.getElementById('regWrappermsid');
    var checkbox=document.getElementById("agree").checked;
    if(checkRegName()&&checkRegPwd()&&isPwdCom()&&checkEmail()&&checkAddress()&&checkbox){
        regbtn.disabled=false;
    }else{
        regbtn.disabled=true;
    }
    regms.innerHTML='';
}