function buyProd(prodid) {
  let formData = new FormData();
  formData.append("prodid", prodid);

  var url = "functions/basket/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("basket-count-block").innerHTML =
      xhr.response.getElementById("basket-count-block").innerHTML;
    document.getElementById("basket-count-block").classList.remove("empty");
  };
}
