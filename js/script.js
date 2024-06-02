const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');




registerLink.addEventListener('click',()=>{
    wrapper.classList.add('active');
    document.getElementById("login-text").value="";
    document.getElementById("login-password").value="";
})

loginLink.addEventListener('click',()=>{
    wrapper.classList.remove('active');
    document.getElementById("register-text").value="";
    document.getElementById("register-password").value="";
})

btnPopup.addEventListener('click',()=>{
    wrapper.classList.add('active-popup');
})

iconClose.addEventListener('click',()=>{
    wrapper.classList.remove('active-popup');
})