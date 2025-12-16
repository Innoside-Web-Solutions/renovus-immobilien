function sliderHeader() {
    let elms = document.querySelectorAll('.tsc-slider-header .splide');
    for (let i = 0; i < elms.length; i++) {
        new Splide(elms[i], {
            type: 'loop',
            autoplay: true,
            pagination: true,
            perPage: 1,
            perMove: 1,
            duration: 500,
            arrows: true
        }).mount();
    }
}


function testimonialSlider() {
    let elms = document.querySelectorAll('.tsc-testimonial-slider .splide');
    for (let i = 0; i < elms.length; i++) {
        new Splide(elms[i], {
            type: 'fade',
            autoplay: true,
            pagination: true,
            rewind: true,
            perPage: 1,
            perMove: 1,
            duration: 500,

            arrows: true,
            breakpoints: {
                768: {
                    arrows: false,
                }
            }
        }).mount();
    }
}

function imageCarousel() {
    let elms = document.querySelectorAll('.image-carousel .splide');
    for (let i = 0; i < elms.length; i++) {
        new Splide(elms[i], {
            type: 'fade',
            autoplay: true,
            pagination: true,
            rewind: true,
            perPage: 1,
            perMove: 1,
            duration: 500,

            arrows: true,
            breakpoints: {
                768: {
                    arrows: false,
                }
            }
        }).mount();
    }
}

function logoCarousel() {
    let logo_carousel = document.querySelectorAll('.logo-carousel .splide');
    for (let i = 0; i < logo_carousel.length; i++) {
        new Splide(logo_carousel[i], {
            type: 'loop',
            rewind: true,
            autoplay: true,
            arrows: false,
            pagination: false,
            perPage: 5,
            perMove: 1,
            interval: 2000,
            duration: 7000,
            speed: 2000,
            gap: '2em',


            breakpoints: {
                600: {
                    perPage: 1
                },
                768: {
                    perPage: 2
                },
                992: {
                    perPage: 3
                },
                1200: {
                    perPage: 4
                }
            }
        }).mount();
    }
}

document.addEventListener('DOMContentLoaded', function () {
    sliderHeader();
    testimonialSlider();
});



