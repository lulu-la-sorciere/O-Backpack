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

var manualNav = function (manual) {
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

var repeat = function (activeClass) {
  let active = document.getElementsByClassName('active');
  let i = 1;

  var repeater = () => {
    setTimeout(function () {
      [...active].forEach((activeSlide) => {
        activeSlide.classList.remove('active');
      });

      slides[i].classList.add('active');
      btns[i].classList.add('active');
      i++;

      if (slides.length == i) {
        i = 0;
      }
      if (i >= slides.length) {
        return;
      }
      repeater();
    }, 10000);
  }
  repeater();
}
repeat();


// CAROUSEL BLOG

const items = document.getElementsByClassName('item');
const nbSlide = items.length;

const next = document.querySelector('.suivant');
const previous = document.querySelector('.precedent');
let count = 0;

function nextSlide() {
  items[count].classList.remove('active2');
  if (count < nbSlide - 1) {
    count++;
  } else {
    count = 0;
  }
  items[count].classList.add('active2')
}
next.addEventListener('click', nextSlide);
setInterval("nextSlide()", 4000);

function prevSlide() {
  items[count].classList.remove('active2');
  if (count > 0) {
    count--;
  } else {
    count = nbSlide - 1;
  }
  items[count].classList.add('active2');
}
previous.addEventListener('click', prevSlide);