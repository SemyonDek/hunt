function delBasket(idbasket) {
  let formData = new FormData();
  formData.append("idbasket", idbasket);

  var url = "functions/basket/del.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("basket-table-tbody").innerHTML =
      xhr.response.getElementById("basket-table-tbody").innerHTML;
    document.getElementById("basket-count-block").innerHTML =
      xhr.response.getElementById("basket-count-block").innerHTML;
    document.getElementById("basket-amount-price").innerHTML =
      xhr.response.getElementById("basket-amount-price").innerHTML;
    if (document.getElementById("basket-table-tbody").innerHTML == "") {
      window.location.replace("index.php");
    }
  };
}

function clearBasket() {
  var url = "functions/basket/clear.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send();
  xhr.onload = () => {
    console.log(xhr.response);
    window.location.replace("index.php");
  };
}

function addCoupon() {
  let formData = new FormData();

  formData.append("coupon", document.getElementById("coupon").value);

  var url = "functions/basket/addCoupon.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);

  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("sale-value").innerHTML =
      xhr.response.getElementById("sale-value").innerHTML;
    document.getElementById("basket-amount-price").innerHTML =
      xhr.response.getElementById("basket-amount-price").innerHTML;
  };
}

function updValue(idbasket, prodid) {
  let formData = new FormData();

  let valuebasket = document.getElementById("value-prod-" + idbasket).value;

  formData.append("idbasket", idbasket);
  formData.append("prodid", prodid);
  formData.append("valuebasket", valuebasket);

  var url = "functions/basket/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);

  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("basket-amount-price").innerHTML =
      xhr.response.getElementById("basket-amount-price").innerHTML;
    document.getElementById("amount-prod-" + idbasket).innerHTML =
      xhr.response.getElementById("amount-prod").innerHTML;
  };
}

function oneclick() {
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

  var url = "functions/one-click/basket.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Заказ оформлен");
    window.location.replace("index.php");
  };
}

function addOrder() {
  let form = document.getElementById("order-form");
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

  if (!prov) return;

  let formData = new FormData(form);

  var url = "functions/order/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Заказ оформлен");
    window.location.replace("index.php");
  };
}
