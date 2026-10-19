/**
 * Masjid Sumpah Masigit — custom front-end behaviours
 */
document.addEventListener('DOMContentLoaded', function () {
    initRevealAnimations();
    initGalleryLightbox();
    initAdminSidebar();
    initNavbarScroll();
    initAutoDismissFlash();
});

/** Scroll-reveal elements */
function initRevealAnimations() {
    var elements = document.querySelectorAll('.reveal');

    if (
        !('IntersectionObserver' in window) ||
        window.matchMedia('(prefers-reduced-motion: reduce)').matches
    ) {
        elements.forEach(function (el) { el.classList.add('revealed'); });
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    elements.forEach(function (el) { observer.observe(el); });
}

/** Gallery lightbox using Bootstrap modal */
function initGalleryLightbox() {
    var triggers = document.querySelectorAll('[data-lightbox-image]');
    var modal = document.getElementById('galleryLightbox');
    if (!modal) return;

    var img = document.getElementById('galleryLbImage');
    var title = document.getElementById('galleryLbTitle');
    var category = document.getElementById('galleryLbCategory');
    var description = document.getElementById('galleryLbDescription');
    var year = document.getElementById('galleryLbYear');

    triggers.forEach(function (trigger) {
        trigger.addEventListener('click', function () {
            var image = trigger.getAttribute('data-lightbox-image');
            var titleText = trigger.getAttribute('data-lightbox-title');
            var categoryText = trigger.getAttribute('data-lightbox-category');
            var descriptionText = trigger.getAttribute('data-lightbox-description');
            var yearText = trigger.getAttribute('data-lightbox-year');

            img.src = image;
            img.alt = titleText || 'Foto galeri';
            title.textContent = titleText || '';
            category.textContent = categoryText ? 'Kategori: ' + categoryText : '';
            description.textContent = descriptionText || '';
            year.textContent = yearText ? 'Tahun: ' + yearText : '';
        });
    });
}

/** Admin sidebar toggle on mobile */
function initAdminSidebar() {
    var sidebar = document.getElementById('adminSidebar');
    if (!sidebar) return;

    var openers = document.querySelectorAll('[data-sidebar-open]');
    var closers = document.querySelectorAll('[data-sidebar-close]');
    var backdrop = document.querySelector('.admin-sidebar-backdrop');

    openers.forEach(function (btn) {
        btn.addEventListener('click', function () {
            sidebar.classList.add('open');
            if (backdrop) backdrop.classList.add('show');
        });
    });

    var closeSidebar = function () {
        sidebar.classList.remove('open');
        if (backdrop) backdrop.classList.remove('show');
    };

    closers.forEach(function (btn) { btn.addEventListener('click', closeSidebar); });
    if (backdrop) backdrop.addEventListener('click', closeSidebar);
}

/** Navbar shrink on scroll */
function initNavbarScroll() {
    var navbar = document.getElementById('siteNavbar');
    if (!navbar) return;

    var toggle = function () {
        navbar.classList.toggle('is-scrolled', window.scrollY > 40);
    };

    window.addEventListener('scroll', toggle, { passive: true });
    toggle();
}

/** Auto dismiss flash messages */
function initAutoDismissFlash() {
    var flash = document.querySelector('.flash-container .alert');
    if (!flash) return;

    setTimeout(function () {
        var dismiss = new bootstrap.Alert(flash);
        if (dismiss) dismiss.close();
    }, 4500);
}