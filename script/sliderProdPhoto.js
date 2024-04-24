let mainPhoto = document.getElementById("main-photo");
let imgList = document.getElementsByClassName("item-img");

var swipePhoto = function (e) {
  mainPhoto.src = e.currentTarget.src;
};

for (var i = 0; i < imgList.length; i++) {
  imgList[i].addEventListener("click", swipePhoto, false);
}

let width = document.getElementsByClassName("hidden-block")[0].offsetWidth + 27;

function swipeSlides(n, slider, page, countPage) {
  slider.style.left = "-" + (page + n - 1) * width + "px";
}

let CountPage = document.getElementById("page-number").value;
let left = document.getElementById("left-slide");
let right = document.getElementById("right-slide");
let Slider = document.getElementsByClassName("swipe-block")[0];
let Page = 1;

left.onclick = function () {
  if (Page > 1) {
    swipeSlides(-1, Slider, Page, CountPage);
    Page -= 1;
  }
};

right.onclick = function () {
  if (Page < CountPage) {
    swipeSlides(1, Slider, Page, CountPage);
    Page += 1;
  }
};
