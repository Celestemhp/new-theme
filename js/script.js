window.addEventListener("DOMContentLoaded", () => {
  SVGInject(document.querySelectorAll("img.injectable"));
});

// console.log("Script loaded!");

(function () {
  const desktopMenuBtn = document.querySelectorAll(".toggle-menu");
  const desktopMenu = document.querySelector("#lunnar-menu");

  desktopMenuBtn.forEach((item) => {
    item.addEventListener("click", (e) => {
      e.preventDefault();

      if (desktopMenu.classList.contains("is-active")) {
        desktopMenu.classList.remove("is-active");
      } else {
        desktopMenu.classList.add("is-active");
      }
    });
  });
})();

/**
 * Header Nav
 */
(function () {
  const header = document.querySelector("#header");

  let lastY = window.scrollY;
  let hasTransparentTop = header.classList.contains("has-transparent-top");

  window.onscroll = function () {
    if (window.scrollY < 2) {
      header.classList.remove("is-fixed");
      if (hasTransparentTop) {
        header.classList.add("is-transparent");
      }
    } else {
      header.classList.remove("is-transparent");
    }

    if (window.scrollY > 150) {
      if (lastY > window.scrollY) {
        header.classList.remove("is-hidden");
        header.classList.add("is-fixed");
      } else {
        header.classList.add("is-hidden");
        header.classList.remove("is-fixed");
      }
    }

    lastY = window.scrollY;
  };
})();

/**
 * Slide to anchor
 */
(function ($) {
  // slide to anchor
  $(document).on("click", ".slide-to", function (e) {
    var url = $(this).attr("href");
    var offset = 0;

    if ($(this).data("offset")) {
      offset = $(this).data("offset");
    }

    // check if link contains '#'
    if (/#/.test(url)) {
      // get text after hash
      var link = url.split("#")[1];
      var target = $("#" + link);

      // check if target div (anchor) exists on page
      if (target.length == 0) {
        return;
      }

      e.preventDefault();

      $("html, body").animate(
        {
          scrollTop: target.offset().top - 50,
        },
        500
      );
    }
  });
})(jQuery);

// gallery overlay
(function ($) {
  $(".wp-block-gallery").magnificPopup({
    delegate: "a",
    type: "image",
    gallery: {
      enabled: true,
      tCounter: "<span>%curr% af %total%</span>",
    },
  });
})(jQuery);
