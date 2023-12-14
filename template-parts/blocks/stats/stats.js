(function () {
  document.addEventListener("DOMContentLoaded", function () {
    const element = document.querySelector(".lunnar-stats");

    if (!element) {
      return;
    }

    const swiper = new Swiper(".stats-slider", {
      // Optional parameters
      direction: "horizontal",
      spaceBetween: 20,
      slidesPerView: "1",

      breakpoints: {
        // when window width is <= 768px
        575: {
          slidesPerView: 2,
        },
        // when window width is <= 992px
        768: {
          slidesPerView: 3,
        },
      },

      // If we need pagination
      pagination: {
        el: ".stats-slider .swiper-pagination",
      },

      // Navigation arrows
      navigation: {
        nextEl: ".stats-slider .swiper-button-next",
        prevEl: ".stats-slider .swiper-button-prev",
      },

      // And if we need scrollbar
      scrollbar: {
        el: ".swiper-scrollbar",
        draggable: true,
      },

      freeMode: {
        enabled: true,
      },

      // Allow mouse drag
      simulateTouch: true,

      // Enable mousewheel control
      mousewheel: {
        invert: false,
        forceToAxis: true,
        releaseOnEdges: true,
      },
    });
  });
})();
