let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm= document.querySelector('.login-form-container');
let formClose= document.querySelector('#form-close');
let signUpForm= document.querySelector('.signup-form-container');
let formClose2= document.querySelector('#form-close2');
let menu = document.querySelector('#menu-bar');
let navBar =  document.querySelector('.navbar');
let videoBtn =  document.querySelectorAll('.vid-btn');
let signUpFormOpen = document.getElementById("sign_up_form_open");
let loginFormOpen = document.getElementById("login_form_open");
window.onscroll = ()=>
{
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navBar.classList.remove('active');
}
menu.addEventListener('click' , ()=>
{
    menu.classList.toggle('fa-times');
    navBar.classList.toggle('active');
});
signUpFormOpen.addEventListener('click' , ()=>
{
    loginForm.classList.remove('active');
    signUpForm.classList.add('active');
});
loginFormOpen.addEventListener('click' , ()=>
{
    signUpForm.classList.remove('active');
    loginForm.classList.add('active');
});
searchBtn.addEventListener('click' , ()=>
{
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});
formBtn.addEventListener('click' , ()=>{
    loginForm.classList.add('active');
});
formClose.addEventListener('click' , ()=>{
    loginForm.classList.remove('active');
});
formClose2.addEventListener('click' , ()=>{
    signUpForm.classList.remove('active');
});
videoBtn.forEach(btn =>{
    btn.addEventListener('click',()=>{
        document.querySelector('.controls .active').classList.remove('active');
        btn.classList.add('active');
        let src = btn.getAttribute('data-src');
        document.querySelector('#video-slider').src = src;

    });
    });