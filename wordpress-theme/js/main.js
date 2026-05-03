// Sticky header: add/remove class when user scrolls so it can be styled differently if needed.
var header = document.querySelector('.site-header');
if (header) {
  window.addEventListener('scroll', function () {
    header.classList.toggle('scrolled', window.scrollY > 10);
  }, { passive: true });
}
