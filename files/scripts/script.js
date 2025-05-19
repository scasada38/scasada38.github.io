
// collapsibe button code
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
    content.style.display = "none";
    } else {
    content.style.display = "block";
    }
});
}

// carousel code
var slideIndex = 1;
showSlide(slideIndex);
var next_btn = document.getElementsByClassName("next");
var prev_btn = document.getElementsByClassName("prev");

next_btn.addEventListener("click", changeSlide(1));
next_btn.addEventListener("click", changeSlide(-1));


function changeSlide(n) {
  showSlide(slideIndex += n);
}

function showSlide(n) {
  var i;
  var slides = document.getElementsByClassName("carousel-item");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}
