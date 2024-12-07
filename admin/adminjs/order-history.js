
// function neto pag pinindot mo yung "What do you think of our product? Write here." is mag hihide and show

// hide
function clearDefaultValue() {
  var input = document.getElementById('productInput');
  if (input.value === "What do you think of our product? Write here.") {
    input.value = "";
  }
}

// show
function restoreDefaultValue() {
  var input = document.getElementById('productInput');
  if (input.value === "") {
    input.value = "What do you think of our product? Write here.";
  }
}
