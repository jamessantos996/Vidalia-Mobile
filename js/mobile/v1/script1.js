window.addEventListener(
    "load",
    function () {
        // Sticky Navbar
        $(function () {
            $(document).scroll(function () {
                var $nav = $(".fixed-top");
                $nav.toggleClass(
                    "scrolled",
                    $(this).scrollTop() > $nav.height()
                );
            });
        });

        // Swiper Banner
        const swiperBanner = new Swiper(".swiper-banner", {
            direction: "horizontal",
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".banner-swiper-button-next",
                prevEl: ".banner-swiper-button-prev",
            },
            slidesPerView: 1,
            spaceBetween: 50,
        });

        // Mobile Product Section
        const productSwiper = new Swiper(".product-swiper", {
            slidesPerView: 1,
            direction: "horizontal",
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            spaceBetween: 90,
        });

        // Swiper How to Use
        const swiperHowToUse = new Swiper(".swiper-how-to-use", {
            direction: "horizontal",
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },

            navigation: {
                nextEl: ".how-to-use-swiper-button-next",
                prevEl: ".how-to-use-swiper-button-prev",
            },

            slidesPerView: 1,

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function (index, className) {
                    return `<span class="swiper-pagination-bullet"></span>`;
                },
            },
            spaceBetween: 50,

            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
            },
        });

        // Testimonial
        const testimonialSwiper = new Swiper(".testimonial-swiper", {
            slidesPerView: 1,
            direction: "horizontal",
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            spaceBetween: 50,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                1200: {
                    slidesPerView: 2,
                },
            },
        });
    },
    false
);
