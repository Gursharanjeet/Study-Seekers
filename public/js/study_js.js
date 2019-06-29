function gotop(){
  document.body.scrollTop = 0; 
  document.documentElement.scrollTop = 0;
}
$(window).scroll(function() {
  if ($(window).scrollTop() > 10) {
    $('#go_top').addClass('show');
  } else {
    $('#go_top').removeClass('show');
  }
});

function showans() {
  document.getElementById('ans').style.display = "block";
  document.getElementById('close').style.display = "block";
  document.getElementById('answer').style.display = "none";
}
function hideans() {
  document.getElementById('ans').style.display = "none";
  document.getElementById('close').style.display = "none";
  document.getElementById('answer').style.display = "block";
}