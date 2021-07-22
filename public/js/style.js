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