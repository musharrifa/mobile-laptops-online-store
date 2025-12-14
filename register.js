const wrapper=document.querySelector('.wrapper');
const loginLink=document.querySelector('.login-link');
//const adminlink=document.querySelector('.admin-link');
const registerLink=document.querySelector('.register-link');

 registerLink.addEventListener('click',()=>{
    wrapper.classList.add('active');
}); 
//adminlink.addEventListener('click',()=>{
 //   wrapper.classList.remove('active');
//});
loginLink.addEventListener('click',()=>{
   wrapper.classList.remove('active');
});
 const iconClose= document.querySelector('.icon-close');
 iconClose.addEventListener('click',()=>{
    wrapper.classList.remove('active-popup');
 });


 