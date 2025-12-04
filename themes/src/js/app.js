gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(TextPlugin);
gsap.registerPlugin(SplitText);

function fadeInText(){
    ["main p:not(.text):not(#page-footer *):not(.contact-infos-mail-phone):not(.not-animated)", "main h2:not(.not-animated)", "main h3:not(.not-animated)"].forEach(selector => {
        gsap.utils.toArray(selector).forEach(element => {
            gsap.from(element, {
                y: "30",
                scale: .95,
                opacity: 0,
                duration: .7,
                scrollTrigger: {
                    trigger: element,
                    start: "top 90%",
                    end: "top 70%",
                    ease: "power3.out",
                    scrub: true,
                },
            });
        });
    });
}
function wpParallax(){
    gsap.utils.toArray('.wp-block-cover__image-background.has-parallax').forEach(element => {
        gsap.from(element, {
            //y: '50%',
            backgroundPositionY: 100,
            scrollTrigger: {
                trigger: element,
                start: 'top 90%',
                end: 'bottom top',
                scrub: 2,
            },




        });
    });
}
function delayedFadeInItems() {
    const elements = gsap.utils.toArray('.is-style-delayed-fade-in > *');

    elements.forEach((element, index) => {
        gsap.from(element, {
            x: 50,
            opacity: 0,
            scale: 0.95,
            delay: index === 0 ? 0 : index * 0.15, // Erstes Element ohne Verzögerung
            scrollTrigger: {
                trigger: element,
                start: 'top 99%',
                end: 'bottom top',
                ease: "bounce.out",
            },
        });
    });
}
function scrollInRight(){
    gsap.utils.toArray('.is-style-scroll-in-right').forEach(element => {
        gsap.from(element, {
            x: -200,  // Startwert der Animation
            opacity: 0,
            duration: 2,         // Dauer der Animation
            scrollTrigger: {
                trigger: element,   // Element, das die Animation auslöst
                start: "top 95%",      // Startpunkt der Animation
                end: "top 55%",        // Endpunkt der Animation
                scrub: true,           // Animation ist mit Scrollen synchron
                ease: "power3.out",    // Sanfter Übergang
            }
        });
    });
}
function scrollInLeft(){
    gsap.utils.toArray('.is-style-scroll-in-left').forEach(element => {
        gsap.from(element, {
            x: 200,  // Startwert der Animation
            opacity: 0,
            duration: 2,         // Dauer der Animation
            scrollTrigger: {
                trigger: element,   // Element, das die Animation auslöst
                start: "top 95%",      // Startpunkt der Animation
                end: "top 55%",        // Endpunkt der Animation
                scrub: true,           // Animation ist mit Scrollen synchron
                ease: "power3.out",    // Sanfter Übergang
            }
        });
    });
}
function staggerUp() {
    document.querySelectorAll('.is-style-stagger-up').forEach(element => {
        let split = SplitText.create(element, {
            type: 'words'
        });

        gsap.from(split.words, {
            y: 100,
            autoAlpha: 0,
            stagger: {
                amount: 0.25,
                from: "random",
            },
            scrollTrigger: {
                trigger: element,
                start: 'top 70%',
                toggleActions: 'play none none none',
                // markers: true
            }
        });
    });
}


function typewriting() {
    document.fonts.ready.then(() => {
        document.querySelectorAll('.is-style-typewriting').forEach(element => {
            let typeChars = SplitText.create(element, {
                type: 'chars, words',
                charsClass: 'char'
            });

            gsap.from(typeChars.chars, {
                autoAlpha: 0,
                ease: "power2.inOut",
                duration: 0.3,
                stagger: {
                    each: 0.05,
                    from: "start"
                },
                scrollTrigger: {
                    trigger: element,
                    start: 'top 95%',
                }
            });
        });
    });
}
function waveChars() {
    document.fonts.ready.then(() => {
        document.querySelectorAll('.is-style-wave-chars').forEach(element => {
            let splitWave = SplitText.create(element, {
                type: 'chars, words',
                charsClass: 'char'
            });

            gsap.from(splitWave.chars, {
                y: 40,
                skewY: 30,
                autoAlpha: 0,
                ease: "power3.out",
                duration: 0.3,
                stagger: {
                    each: 0.03,
                    from: "start"
                },
                scrollTrigger: {
                    trigger: element,
                    start: 'top 75%',
                }
            });
        });
    });
}

function swingTextOnScroll() {

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: ".swing-text",
            start: "top 80%",      // kannst du anpassen
            toggleActions: "play none none reverse"
        }
    });

    // 3× schwingen
    tl.fromTo(".swing-text",
        {rotateX: 40,
            opacity: .7

        },

        {
            opacity: 1,
            rotateX: -40,
            duration: 1,
            ease: "none", repeat: 1,
            yoyo: true
        }
    )

        // zum Schluss auf 0°
        .to(".swing-text", {
            rotateX: 0,
            duration: 0.6,
            ease: "none",
            opacity: 1,
        });
}


document.addEventListener("DOMContentLoaded", function () {
    wpParallax();
    fadeInText();
    delayedFadeInItems();
    scrollInLeft();
    scrollInRight();
    staggerUp();
    typewriting();
    waveChars();
});