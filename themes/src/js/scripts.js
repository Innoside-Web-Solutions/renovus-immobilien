function DomReady(fn) {
    if (typeof fn !== 'function') {
        return;
    }
    if (document.readyState === 'interactive' || document.readyState === 'complete') {
        return fn();
    }
    document.addEventListener('DOMContentLoaded', fn, false);
}

function jsLoaded() {
    const htmlTag = document.querySelector('html')
    htmlTag.classList.remove('no-js');
    htmlTag.classList.add('js');
}


/* === submenu accessfree*/
function addAccessFreeMenuToggle() {
    const menuHasChildren = document.querySelectorAll('#primary-nav .nav-menu .menu-item-has-children > a');

    for (let i = 0; i < menuHasChildren.length; i++) {
        const li = menuHasChildren[i].parentNode;
        const sub = li.querySelector('ul.sub-menu');
        if (!sub) continue;

        // ID fürs Submenü setzen, falls keine existiert
        if (!sub.id) sub.id = li.id + '-submenu';

        // Button-HTML einfügen – s
        menuHasChildren[i].insertAdjacentHTML('afterend',
            '<button type="button" class="menu-toggle" ' +
            'aria-expanded="false" ' +
            'aria-controls="'
            + sub.id + '">' +
            '<em aria-hidden="true"></em>' +
            '<span class="screen-reader-text">Untermenü öffnen</span>' +
            '</button>'
        );
    }
}
function toggleSubmenu(){
    document.querySelectorAll('#primary-nav ul.sub-menu').forEach(ul => ul.hidden = true);
    document.querySelectorAll('#primary-nav .menu-toggle[aria-controls]').forEach(btn => {
        btn.addEventListener('click', () => {
            const sub = document.getElementById(btn.getAttribute('aria-controls'));
            if (!sub) return;
            const open = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', String(!open));
            sub.hidden = open;
        });
    });

}

function toggleMenuButton(){
    const btn = document.getElementById('menu-button');
    btn.addEventListener('click', () => {
        const open = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!open));
        // optional: SR-Text anpassen
        const sr = btn.querySelector('.screen-reader-text');
        if (sr) sr.textContent = open ? 'Menü öffnen' : 'Menü schließen';
    });
}
function toggleSideNavButton(){
    const b = document.getElementById('side-menu-button');
    b.addEventListener('click', () => {
        b.setAttribute('aria-expanded', b.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');
    });

}

function toggleScrollTop() {
    const scrollTop = document.getElementById('scroll-top');
    console.log(scrollTop);

    if (window.scrollY > 100) {
        scrollTop.classList.add("visible");
    } else {
        scrollTop.classList.remove("visible");
    }
}






function initWpGalleryLightbox() {

    const allWpGalleries = document.querySelectorAll('.wp-block-gallery');
    // Index je gallery
    let index = 1;
    allWpGalleries.forEach((gallery, index) => {
        const galleryID = `gallery-${index + 1}`
        const lbImages = gallery.querySelectorAll('.wp-block-image > a');

        // Setze Attribut
        lbImages.forEach(image => {
            image.setAttribute('data-fslightbox', galleryID);
        });
    });


}


function toggleNavbarOnScroll() {
    const navbar = document.getElementById('navbar');
    let oldScroll = window.scrollY;

    window.addEventListener('scroll', function () {
        if (oldScroll > (window.scrollY + 8)) {
            navbar.classList.remove("hide-menu");
        } else if (oldScroll < (window.scrollY - 15)) {
            navbar.classList.add("hide-menu");
        }
        oldScroll = window.scrollY;
    });
}
function navbarRecolor() {
    const navbar = document.querySelector('#navbar');
    if (!navbar) return; // Falls Navbar noch nicht im DOM ist

    // --- Farbwechsel-Logik ---
    const recolor = () => {
        if (window.scrollY > 100) {
            navbar.classList.add("box-shadow", "colored");
            navbar.classList.remove("lighted");
        } else {
            navbar.classList.add("lighted");
            navbar.classList.remove("colored", "box-shadow");
        }
    };

    // --- Direkt beim Laden einmal ausführen ---
    recolor();

    // --- Nur EINEN Scroll-Listener hinzufügen (wenn noch keiner existiert) ---
    if (!navbar.dataset.recolorInit) {
        window.addEventListener('scroll', recolor, { passive: true });
        window.addEventListener('resize', recolor, { passive: true });
        navbar.dataset.recolorInit = 'true'; // Flag, um doppelte Bindung zu verhindern
    }
}



DomReady(() => {

    // Immobilien-Heading weg!!!!!
    document.querySelectorAll('.oo-listheadline').forEach(el => el.remove());


    jsLoaded();
    toggleNavbarOnScroll();
    navbarRecolor();
    toggleScrollTop();


    /* === accessfree menu toggle*/
    toggleMenuButton();
    addAccessFreeMenuToggle();
    toggleSubmenu();
    toggleSideNavButton();

    initWpGalleryLightbox();

    // entferne alle onOffice h1 headings




    require("fslightbox");

});


window.addEventListener("resize", function () {
    toggleScrollTop();

});

window.addEventListener('scroll', function () {
    toggleScrollTop();
}, false);


