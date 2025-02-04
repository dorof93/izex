
document.addEventListener('DOMContentLoaded', function() {

    var swiper = new Swiper(".thumb-gallery", {
        spaceBetween: 20,
        slidesPerView: 2,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            480: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 5,
                spaceBetween: 10,
            },
        },
      });
    var swiper2 = new Swiper(".gallery", {
        loop: true,
        zoom: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".arrow-nav_next",
            prevEl: ".arrow-nav_prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });


    var swiper3 = new Swiper(".partners__list", {
        loop: true,
        slidesPerView: 1,
        navigation: {
            nextEl: ".arrow-nav_next",
            prevEl: ".arrow-nav_prev",
        },
        breakpoints: {
            480: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
        },
    });
	
});


function toggleMenu (switcher) {
    if (switcher.parentNode.classList.contains('header_menu-open')) {
        switcher.parentNode.classList.remove('header_menu-open');
    } else {
        switcher.parentNode.classList.add('header_menu-open');
    }
}