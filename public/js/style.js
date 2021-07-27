const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

// nav element color changes when current page is active

/* const currentLocation = location.href;
    const menuItem = document.querySelectorAll('a');
    const menuLength = menuItem.length
        for (let i=0; i<menuLength; i++){
            if(menuItem[i].href === currentLocation){
                menuItem[i].className = "active"
                }
            } */

// SLIDER

var slides = document.querySelectorAll('.slide');
var btns = document.querySelectorAll('.btn');
let currentSlide = 1;

// Javascript for image slider manual navigation

var manualNav = function(manual){
  slides.forEach((slide) => {
    slide.classList.remove('active');

    btns.forEach((btn) => {
      btn.classList.remove('active');
    });
  });

  slides[manual].classList.add('active');
  btns[manual].classList.add('active');
}

btns.forEach((btn, i) => {
  btn.addEventListener("click", () => {
    manualNav(i);
    currentSlide = i;
  });
});

// Javascript for image slider autoplay navigation

var repeat = function(activeClass){
  let active = document.getElementsByClassName('active');
  let i = 1;

  var repeater = () => {
    setTimeout(function(){
      [...active].forEach((activeSlide) => {
        activeSlide.classList.remove('active');
      });

    slides[i].classList.add('active');
    btns[i].classList.add('active');
    i++;

    if(slides.length == i){
      i = 0;
    }
    if(i >= slides.length){
      return;
    }
    repeater();
  }, 10000);
  }
  repeater();
}
repeat();


// CAROUSEL BLOG
/*
var items = document.querySelectorAll('.item');
var arrows = document.querySelectorAll('.arrow');
let currentPic = 1;

var arrowNav = function(manual){
  items.forEach((item) => {
    item.classList.remove('active');

    arrows.forEach((arrow) => {
      arrow.classList.remove('active');
    });
  });

  items[manual].classList.add('active');
  arrows[manual].classList.add('active');
}
arrows.forEach((arrow, i) => {
  arrow.addEventListener("click", () => {
    arrowNav(i);
    currentPic = i;
  });
});

var itemIndex = 1;

function showSlides(n) {
  var i;
  var items = document.getElementsByClassName("item");
  
  if (n > items.length) {itemIndex = 1}    
  if (n < 1) itemIndex = items.length}
  for (i = 0; i < items.length; i++) {
      items[i].style.display = "none";  
  }
  items[itemIndex-1].style.display = "block";
}*/