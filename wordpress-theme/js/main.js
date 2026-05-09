// Sticky header: add/remove class when user scrolls so it can be styled differently if needed.
const header = document.querySelector('.site-header');
if (header) {
  window.addEventListener('scroll', function () {
    header.classList.toggle('scrolled', window.scrollY > 10);
  }, { passive: true });
}

// Mobile hamburger menu toggle
const navToggle = document.querySelector('.nav-toggle');
const primaryNav = document.querySelector('nav');

function closeThemeMobileMenu() {
  if (!navToggle || !primaryNav) {
    return;
  }

  navToggle.setAttribute('aria-expanded', 'false');
  navToggle.setAttribute('aria-label', 'Open navigation');
  primaryNav.classList.remove('is-open');
}

if (navToggle && primaryNav) {
  navToggle.addEventListener('click', function () {
    var isOpen = navToggle.getAttribute('aria-expanded') === 'true';
    navToggle.setAttribute('aria-expanded', String(!isOpen));
    navToggle.setAttribute('aria-label', isOpen ? 'Open navigation' : 'Close navigation');
    primaryNav.classList.toggle('is-open', !isOpen);
  });

  // Close menu when a nav link is clicked
  primaryNav.querySelectorAll('a').forEach(function (link) {
    link.addEventListener('click', function () {
      closeThemeMobileMenu();
    });
  });

  // Prevent open menu from lingering over content while scrolling.
  window.addEventListener('scroll', closeThemeMobileMenu, { passive: true });
  window.addEventListener('resize', closeThemeMobileMenu);
}

function closeElementorMobileMenus() {
  document.querySelectorAll('.elementor-location-header .elementor-menu-toggle').forEach(function (toggle) {
    if (toggle.getAttribute('aria-expanded') === 'true') {
      toggle.click();
    }

    var navWidget = toggle.closest('.elementor-widget-nav-menu');
    if (!navWidget) {
      return;
    }

    var dropdown = navWidget.querySelector('.elementor-nav-menu--dropdown');
    if (dropdown) {
      dropdown.setAttribute('aria-hidden', 'true');
    }
  });
}

document.querySelectorAll('.elementor-location-header .elementor-nav-menu a').forEach(function (link) {
  link.addEventListener('click', closeElementorMobileMenus);
});

window.addEventListener('scroll', closeElementorMobileMenus, { passive: true });
window.addEventListener('resize', closeElementorMobileMenus);
