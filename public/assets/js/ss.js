
// var flag = true;
// var div = document.getElementById("con");

// function fun() {
//     if (flag ^= true) {
//                      div.style.display = "none" ;// display
//     } else {
//                      div.style.display = "block";// hide
//     } 
    
// }
// get all the images
var getAllImages = document.getElementById('btn');
var inp = document.getElementById('inp');
var con = document.getElementById('con');
const img =document.getElementById('aaa');
// loop through it
/* for (var i = 0; i < getAllImages.length; i++) {
  (function(x) {   */// closure starts here
    getAllImages.addEventListener('click', function() {
        con.style.display = "none";
        inp.value =  img.innerText
})
//   }(i))  // pass the value of i
// }