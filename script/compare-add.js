function compareProd(prodid) {
  let formData = new FormData();
  formData.append("prodid", prodid);

  var url = "functions/compare/add.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("compare-leash").innerHTML =
      xhr.response.getElementById("compare-leash").innerHTML;
    document.getElementById("compare-leash").style.bottom = "0";
  };
}
