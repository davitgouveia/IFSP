//Sticky Navbar
window.onscroll = function() {stickNavBar()};

var Navbar = document.getElementById("navbar");

var Sticky = Navbar.offsetTop;

function stickNavBar() {
    if(window.pageYOffset >= Sticky){
        Navbar.classList.add("stickynav")
    } else {
        Navbar.classList.remove("stickynav");
    }
}