// Material 3 sidebar: expand/collapse submenu & active indicator

document.addEventListener('DOMContentLoaded', function () {
    // Expand/collapse submenu
    document.querySelectorAll('.md3-nav-link + .md3-nav-submenu').forEach(function (submenu) {
        const parentLink = submenu.previousElementSibling;
        if (!parentLink) return;
        // Set initial state
        if (!parentLink.classList.contains('md3-active')) {
            submenu.style.maxHeight = '0';
            submenu.style.overflow = 'hidden';
            submenu.style.transition = 'max-height 0.32s cubic-bezier(.4,0,.2,1)';
        } else {
            submenu.style.maxHeight = submenu.scrollHeight + 'px';
        }
        parentLink.addEventListener('click', function (e) {
            e.preventDefault();
            const isOpen = submenu.style.maxHeight !== '0px' && submenu.style.maxHeight !== '';
            if (isOpen) {
                submenu.style.maxHeight = '0';
                parentLink.classList.remove('md3-open');
            } else {
                submenu.style.maxHeight = submenu.scrollHeight + 'px';
                parentLink.classList.add('md3-open');
            }
        });
    });

    // Active indicator (left border)
    document.querySelectorAll('.md3-nav-link.md3-active').forEach(function (link) {
        link.style.position = 'relative';
        let indicator = document.createElement('span');
        indicator.className = 'md3-nav-indicator';
        link.prepend(indicator);
    });
});
