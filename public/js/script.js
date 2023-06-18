var now = new Date();
var year = now.getFullYear();
var month = now.getMonth() + 1;
var day = now.getDate();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds();
var formattedDate =
  year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
document.getElementById("date1").innerHTML = formattedDate;
