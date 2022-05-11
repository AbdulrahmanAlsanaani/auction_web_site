
var flag = true;
var div = document.getElementById("con");

function fun() {
    if (flag ^= true) {
                     div.style.display = "none" ;// display
    } else {
                     div.style.display = "block";// hide
    }
}