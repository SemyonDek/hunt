let menuBlock = document.getElementById("content-menu");
let openMenu = document.getElementById("button-block-menu");
let closeMenu = document.getElementById("close-block-menu");
let imgCategory = document.getElementsByClassName("img-category");

openMenu.onclick = function () {
  if (menuBlock.classList.contains("close")) {
    menuBlock.classList.remove("close");
    menuBlock.classList.add("open");
  } else {
    menuBlock.classList.remove("open");
    menuBlock.classList.add("close");
  }
};

closeMenu.onclick = function () {
  if (menuBlock.classList.contains("open")) {
    menuBlock.classList.remove("open");
    menuBlock.classList.add("close");
  }
};

var menuFunction = function () {
  console.log(123);
  if (menuBlock.classList.contains("close")) {
    menuBlock.classList.remove("close");
    menuBlock.classList.add("open");
  } else {
    menuBlock.classList.remove("open");
    menuBlock.classList.add("close");
  }
};

for (var i = 0; i < imgCategory.length; i++) {
  imgCategory[i].addEventListener("click", menuFunction, false);
}
