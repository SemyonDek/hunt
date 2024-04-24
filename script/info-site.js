let button = document.getElementById("button-upd");

function updText() {
  let text = document.getElementById("info-site-text").value;

  let formData = new FormData();
  formData.append("text", text);

  var url = "../functions/info-site/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    if (xhr.response == "") {
      alert("Текст изменен");
    } else {
      alert(xhr.response);
    }
  };
}

button.onclick = function () {
  updText();
};
