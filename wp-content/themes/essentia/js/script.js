const toggleMenu = document.querySelector('.toggleMenu');
const menu = document.querySelector('.navigation');
toggleMenu.addEventListener('click', () => {
  if (toggleMenu.classList.contains('active')) {
    toggleMenu.classList.remove('active');
    menu.classList.remove('active');
  } else {
    toggleMenu.classList.add('active');
    menu.classList.add('active');
  }
});
