// Get the button:
let elNavbar = document.getElementById("myFun");
let elMain = document.getElementsByClassName('myFun1');

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 160 || document.documentElement.scrollTop > 160) {
    elNavbar.style.position = "fixed";
    elMain[0].style.marginTop = "49px";
    elMain[1].style.marginTop = "49px";
    elMain[2].style.marginTop = "49px";
    elMain[3].style.marginTop = "49px";
    elMain[4].style.marginTop = "49px";
  } else {
    elNavbar.style.position = "relative";
    elMain[0].style.marginTop = "0px";
    elMain[1].style.marginTop = "0px";
    elMain[2].style.marginTop = "0px";
    elMain[3].style.marginTop = "0px";
    elMain[4].style.marginTop = "0px";
  }
}

function windowAncho() {
  if (screen.width <= 425) {

  } else {
    
  }
}