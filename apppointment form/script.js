function clearErrors() {
  errors = document.getElementsByClassName("formerror");

  for (let item of errors) {
    item.innerHTML = "";
  }
}
function seterror(id, error) {
  element = document.getElementById(id);
  element.getElementsByClassName("formerror")[0].innerHTML = error;
}

function validateForm() {
  var returnval = true;
  clearErrors();

  var name = document.forms["myForm"]["fullname"].value;

  if (name.length < 5) {
    seterror("full_name", "**Name must be 6 letters ");
    returnval = false;
  }

  return returnval;
}

var todayDate = new Date();
var month = todayDate.getMonth() + 1;
var year = todayDate.getUTCFullYear();
var tdate = todayDate.getDate();
if (month < 10) {
  month = "0" + month;
}
if (tdate < 10) {
  tdate = "0" + tdate;
}
var maxDate = year + "-" + month + "-" + tdate;
document.getElementById("demo").setAttribute("min", maxDate);
console.log(month);
