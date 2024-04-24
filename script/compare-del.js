function clearCompare() {
  var url = "functions/compare/clear.php";
  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";
  xhr.open("POST", url);
  xhr.send();
  xhr.onload = () => {
    document.getElementById("block-comprasion-list").innerHTML = "";
    document.getElementById("compare-leash").innerHTML =
      xhr.response.getElementById("compare-leash").innerHTML;
    document.getElementById("compare-leash").style.bottom = "-40px";
  };
}

function delCompare(idcompare) {
  let formData = new FormData();
  formData.append("idcompare", idcompare);

  var url = "functions/compare/del.php";
  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";
  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    document.getElementById("block-comprasion-list").innerHTML =
      xhr.response.getElementById("block-comprasion-list").innerHTML;
    if (document.getElementById("block-comprasion-list").innerHTML == "") {
      document.getElementById("compare-leash").style.bottom = "-40px";
    }
    document.getElementById("compare-leash").innerHTML =
      xhr.response.getElementById("compare-leash").innerHTML;
  };
}
