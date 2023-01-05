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
        const bannerSwiper = new Swiper(".banner-swiper", {
            direction: "horizontal",
            slidesPerView: 1,
            loop: true,
            navigation: {
                nextEl: ".banner-swiper-button-next",
                prevEl: ".banner-swiper-button-prev",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        const stepSwiper = new Swiper(".step-swiper", {
            direction: "horizontal",
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".step-swiper-button-next",
                prevEl: ".step-swiper-button-prev",
            },
            pagination: {
                el: ".step-swiper-pagination",
                clickable: true,
            },
        });

        const testimonialSwiper = new Swiper(".testimonial-swiper", {
            direction: "horizontal",
            slidesPerView: 2,
            loop: true,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                992: {
                    slidesPerView: 1,
                },
                1200: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    },
    false
);
