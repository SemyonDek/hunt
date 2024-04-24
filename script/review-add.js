function addComm(prodid) {
  let comm = document.getElementById("comm-text");

  prov = true;
  if (comm.value == "") {
    prov = false;
  }

  if (!prov) {
    alert("Введите комментарий");
  } else {
    let formData = new FormData();
    formData.append("comm", comm.value);
    formData.append("prodid", prodid);

    var url = "functions/reviews/add.php";

    let xhr = new XMLHttpRequest();

    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      console.log(xhr.response);
      document.getElementById("rewiews-list-block").innerHTML =
        xhr.response.getElementById("rewiews-list-block").innerHTML;
      document.getElementById("countReviews").innerHTML =
        xhr.response.getElementById("countReviews").innerHTML;
      document.getElementById("comm-text").value = "";
    };
  }
}
