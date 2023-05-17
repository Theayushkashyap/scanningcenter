const hamburger = document.querySelector('.hamburger');
const navContent = document.querySelector('.nav-content');

hamburger.addEventListener('click', function() {
  navContent.classList.toggle('show');
});
