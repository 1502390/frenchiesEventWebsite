var btn = document.querySelector('.menu__icon');
var close = document.querySelector('.menu__close');
var menu = document.querySelector('.header__menu');

var show = function(){
  menu.style.transform = "translateY(0vh)";
  btn.style.display = "none";
  close.style.display = "block";
};

var hide = function(){
  menu.style.transform = "translateY(-100vh)";
  btn.style.display = "block";
  close.style.display = "none";
};

btn.addEventListener('click', show, false);
close.addEventListener('click', hide, false);
