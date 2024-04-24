let button = document.getElementById("addProdButton");

function addProd() {
  let form = document.getElementById("add-prod-form");

  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;

      return {
        name,
        value,
      };
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: #cfcfcf;";

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      document.getElementById(element["name"]).style = style_input_red;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  let sale = document.getElementById("saleprod");

  if (sale.value !== "" && (sale.value < 0 || sale.value > 99)) {
    prov = false;
    alert("Введите корректную скидку");
    sale.style = style_input_red;
  }

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/products/add.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Товар добавлен");
    prodid = xhr.response;
    window.location.replace("upd-prod.php?prodid=" + prodid);
  };
}

button.onclick = function () {
  addProd();
};
