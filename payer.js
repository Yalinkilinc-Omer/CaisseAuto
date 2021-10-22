function horloge(){
  var tt = new Date().toLocaleTimeString();
  document.getElementById('timer').innerHTML = tt;
  setTimeout(horloge, 1000);
}