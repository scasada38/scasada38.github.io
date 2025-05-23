
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

// dropdown code
document.getElementById("dropdown-button").addEventListener('click', () => {
  document.getElementById("dropdown-div").style.display = "block";
});

window.onclick = function(event) {
  if (!event.target.closest('.dropdown-obj')) {
    document.getElementById("dropdown-div").style.display = "none";
  }
}

// hamburger menu
const hamburger = document.getElementById('hamburger-menu');
const navLinks = document.getElementById('nav-links');

hamburger.addEventListener('click', () => {
  navLinks.classList.toggle('active');
  document.body.classList.toggle('menu-open');

  if (hamburger.textContent === "☰") {
    hamburger.textContent = "✕";
  } else {
    hamburger.textContent = "☰";
  }
});

// Auto-close hamburger menu when screen gets big
window.addEventListener('resize', () => {
  if (window.innerWidth > 760) {
    navLinks.classList.remove('active');
    document.body.classList.remove('menu-open');
    if (hamburger.textContent === "✕") {
      hamburger.textContent = "☰";
    }
  }
});
