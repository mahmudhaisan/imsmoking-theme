/******/ (() => { // webpackBootstrap
/*!********************************************!*\
  !*** ./src/hamburger-menu-overlay/view.js ***!
  \********************************************/
document.addEventListener('DOMContentLoaded', () => {
  const blocks = document.querySelectorAll('.wp-block-imsmoking-theme-hamburger-menu-overlay');
  blocks.forEach(block => {
    const hamburgerIcon = block.querySelector('.hamburger-icon');
    const overlay = block.querySelector('.hamburger-menu-overlay');
    const menuCloseBtn = block.querySelector('.menu-close');
    const mainMenu = block.querySelector('.menu-main');
    const backButtons = block.querySelectorAll('.menu-back');
    const parentMenuItems = block.querySelectorAll('.menu-item.has-children');
    const closeSidebar = () => {
      overlay.classList.remove('is-active');
      mainMenu.classList.add('active');
      mainMenu.classList.remove('hidden');
      block.querySelectorAll('.menu-submenu.active').forEach(sub => sub.classList.remove('active'));
    };

    // 1. Toggle overlay
    if (hamburgerIcon && overlay) {
      hamburgerIcon.addEventListener('click', () => {
        overlay.classList.toggle('is-active');
        if (overlay.classList.contains('is-active')) {
          mainMenu.classList.add('active');
          mainMenu.classList.remove('hidden');
          block.querySelectorAll('.menu-submenu.active').forEach(sub => sub.classList.remove('active'));
        }
      });
    }

    // 2. Close overlay
    if (menuCloseBtn) {
      menuCloseBtn.addEventListener('click', closeSidebar);
    }

    // 3. Click outside to close
    document.addEventListener('click', e => {
      if (overlay.classList.contains('is-active') && !overlay.contains(e.target) && !hamburgerIcon.contains(e.target)) {
        closeSidebar();
      }
    });

    // Parent menu click
    parentMenuItems.forEach(item => {
      const link = item.querySelector('a');
      link.addEventListener('click', e => {
        const submenuId = item.dataset.menu;
        const targetSubmenu = block.querySelector(`.menu-submenu[data-menu-id="${submenuId}"]`);
        if (targetSubmenu) {
          e.preventDefault();
          mainMenu.classList.add('menu-out'); // slide left
          mainMenu.classList.add('hidden'); // slide left
          targetSubmenu.classList.add('active'); // slide in
        }
      });
    });

    // Back buttons
    backButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const activeSubmenu = btn.closest('.menu-submenu');
        if (activeSubmenu) activeSubmenu.classList.remove('active');
        mainMenu.classList.remove('menu-out'); // slide back in
        mainMenu.classList.remove('hidden'); // slide back in
      });
    });
  });
});
/******/ })()
;
//# sourceMappingURL=view.js.map