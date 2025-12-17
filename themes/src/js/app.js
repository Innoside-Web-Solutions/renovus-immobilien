// Smooth scrolling CSS aktivieren
document.documentElement.style.scrollBehavior = "smooth";

// GSAP Plugins registrieren
gsap.registerPlugin(ScrollTrigger, TextPlugin, SplitText);

/* ----------------------------------------
   FADE IN TEXT (NO SCRUB)
---------------------------------------- */
function fadeInText() {
    const selectors = [
        "main p:not(.text):not(#page-footer *):not(.contact-infos-mail-phone):not(.not-animated)",
        "main h2:not(.not-animated)",
        "main h3:not(.not-animated)"
    ];
    selectors.forEach(selector => {
        gsap.utils.toArray(selector).forEach(element => {
            gsap.from(element, {
                y: 30,
                scale: 0.95,
                opacity: 0,
                duration: 0.7,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: element,
                    start: "top 90%",
                    once: true
                }
            });
        });
    });
}

/* ----------------------------------------
   PARALLAX (SCRUB OK, BUT NO from())
---------------------------------------- */
function wpParallax() {
    gsap.utils.toArray('.wp-block-cover__image-background.has-parallax').forEach(element => {
        gsap.to(element, {
            backgroundPositionY: "60%",
            ease: "none",
            scrollTrigger: {
                trigger: element,
                start: "top bottom",
                end: "bottom top",
                scrub: 1
            }
        });
    });
}

/* ----------------------------------------
   DELAYED ITEMS
---------------------------------------- */
function delayedFadeInItems() {
    gsap.utils.toArray('.is-style-delayed-fade-in > *').forEach((element, index) => {
        gsap.from(element, {
            x: 50,
            opacity: 0,
            scale: 0.95,
            duration: 0.6,
            delay: index * 0.15,
            ease: "power2.out",
            scrollTrigger: {
                trigger: element,
                start: "top 85%",
                once: true
            }
        });
    });
}

/* ----------------------------------------
   SCROLL IN EFFECTS (LEFT/RIGHT)
---------------------------------------- */
function scrollIn(direction) {
    const className = `.is-style-scroll-in-${direction}`;
    gsap.utils.toArray(className).forEach(element => {
        const xValue = direction === "left" ? -200 : 200;
        gsap.from(element, {
            x: xValue,
            opacity: 0,
            duration: 0.9,
            ease: "power3.out",
            scrollTrigger: {
                trigger: element,
                start: "top 85%",
                once: true
            }
        });
    });
}

function scrollInLeft() {
    scrollIn("left");
}

function scrollInRight() {
    scrollIn("right");
}

/* ----------------------------------------
   STAGGER WORDS
---------------------------------------- */
function staggerUp() {
    document.querySelectorAll('.is-style-stagger-up').forEach(element => {
        const split = SplitText.create(element, { type: "words" });
        gsap.from(split.words, {
            y: 80,
            autoAlpha: 0,
            stagger: 0.04,
            duration: 0.6,
            ease: "power3.out",
            scrollTrigger: {
                trigger: element,
                start: "top 80%",
                once: true
            }
        });
    });
}

/* ----------------------------------------
   TYPEWRITING EFFECT
---------------------------------------- */
function typewriting() {
    document.fonts.ready.then(() => {
        document.querySelectorAll('.is-style-typewriting').forEach(element => {
            const typeChars = SplitText.create(element, {
                type: "chars, words",
                charsClass: "char"
            });
            gsap.from(typeChars.chars, {
                autoAlpha: 0,
                duration: 0.3,
                ease: "power2.inOut",
                stagger: 0.05,
                scrollTrigger: {
                    trigger: element,
                    start: "top 85%",
                    once: true
                }
            });
        });
    });
}

/* ----------------------------------------
   WAVE CHARS
---------------------------------------- */
function waveChars() {
    document.fonts.ready.then(() => {
        document.querySelectorAll('.is-style-wave-chars').forEach(element => {
            const splitWave = SplitText.create(element, { type: "chars, words", charsClass: "char" });
            gsap.from(splitWave.chars, {
                y: 40,
                skewY: 30,
                autoAlpha: 0,
                duration: 0.3,
                ease: "power3.out",
                stagger: 0.03,
                scrollTrigger: {
                    trigger: element,
                    start: "top 75%",
                    once: true
                }
            });
        });
    });
}

/* ----------------------------------------
   SWING TEXT (TIMELINE)
---------------------------------------- */
function swingTextOnScroll() {
    gsap.timeline({
        scrollTrigger: {
            trigger: ".swing-text",
            start: "top 80%",
            toggleActions: "play none none reverse"
        }
    })
        .fromTo(".swing-text", { rotateX: 40, opacity: 0.7 }, { rotateX: -40, opacity: 1, duration: 1, ease: "none", repeat: 1, yoyo: true })
        .to(".swing-text", { rotateX: 0, duration: 0.6, ease: "none", opacity: 1 });
}

/* ----------------------------------------
   INIT
---------------------------------------- */
document.addEventListener("DOMContentLoaded", () => {
    wpParallax();
    fadeInText();
    delayedFadeInItems();
    scrollInLeft();
    scrollInRight();
    staggerUp();
    typewriting();
    waveChars();
    swingTextOnScroll();

    ScrollTrigger.refresh();
});