function oneclick() {
  let prodid = document.getElementById("prodid").value;
  let form = document.getElementById("one-click-form");
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
  style_input_gray = "border-color: black;";

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      document.getElementById(element["name"]).style = style_input_red;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "functions/one-click/prod.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Заказ оформлен");
    window.location.replace("product-card.php?prodid=" + prodid);
  };
}
