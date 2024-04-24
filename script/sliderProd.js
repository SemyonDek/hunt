let width = document.getElementsByClassName("slider-list")[0].offsetWidth;

function swipeSlides(n, slider, page, countPage) {
  slider.style.left = "-" + (1 + (page + n - 1) * width) + "px";
}

let saleCountPage = document.getElementById("sale-page-number").value;
let leftSale = document.getElementById("left-sale");
let rightSale = document.getElementById("right-sale");
let saleSlider = document.getElementById("sale-slider");
let salePage = 1;

leftSale.onclick = function () {
  if (salePage > 1) {
    swipeSlides(-1, saleSlider, salePage, saleCountPage);
    salePage -= 1;
  }
};

rightSale.onclick = function () {
  if (salePage < saleCountPage) {
    swipeSlides(1, saleSlider, salePage, saleCountPage);
    salePage += 1;
  }
};

let newCountPage = document.getElementById("new-page-number").value;
let leftNew = document.getElementById("left-new");
let rightNew = document.getElementById("right-new");
let newSlider = document.getElementById("new-slider");
let newPage = 1;

leftNew.onclick = function () {
  if (newPage > 1) {
    swipeSlides(-1, newSlider, newPage, newCountPage);
    newPage -= 1;
  }
};

rightNew.onclick = function () {
  if (newPage < newCountPage) {
    swipeSlides(1, newSlider, newPage, newCountPage);
    newPage += 1;
  }
};
