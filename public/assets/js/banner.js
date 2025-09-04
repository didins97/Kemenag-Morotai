document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.sidebar-banner-slider', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        centeredSlides: true,
        slidesPerView: 1,
        spaceBetween: 0,
    });
});
