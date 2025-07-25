// Material 3 Sidebar: submenu expand/collapse, ripple, active indicator, overlay
// Inspired by material-web navigation drawer

document.addEventListener('DOMContentLoaded', function () {
    var sidebar = document.getElementById('mainSidebar');
    var overlay = document.querySelector('.sidebar-mobile-overlay');
    var body = document.body;

    // Hamburger toggle (already in template, skip if present)

    // Submenu expand/collapse
    document.querySelectorAll('.sidebar-menu .has-sub > a').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            var parent = link.parentElement;
            var submenu = parent.querySelector('.submenu');
            var isOpen = parent.classList.contains('open');
            // Close all other submenus
            document.querySelectorAll('.sidebar-menu .has-sub').forEach(function (item) {
                if (item !== parent) item.classList.remove('open');
            });
            if (isOpen) {
                parent.classList.remove('open');
            } else {
                parent.classList.add('open');
            }
        });
    });

    // Ripple effect for all sidebar links
    document.querySelectorAll('.sidebar-menu a').forEach(function (el) {
        el.addEventListener('pointerdown', function (e) {
            var ripple = document.createElement('span');
            ripple.className = 'md3-ripple';
            var rect = el.getBoundingClientRect();
            var size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (e.clientX - rect.left - size/2) + 'px';
            ripple.style.top = (e.clientY - rect.top - size/2) + 'px';
            el.appendChild(ripple);
            setTimeout(function () {
                ripple.remove();
            }, 480);
        });
    });
});
