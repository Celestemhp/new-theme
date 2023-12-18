window.addEventListener("DOMContentLoaded", () => {
  SVGInject(document.querySelectorAll("img.injectable"));
});

(function () {
  const desktopMenuBtn = document.querySelectorAll(".toggle-menu");
  const desktopMenu = document.querySelector("#fgc-menu");

  const header = document.querySelector("#header");
  const logoStd = document.querySelector(".logo-std");
  const logoTransparent = document.querySelector(".logo-transparent");

  let lastY = window.scrollY;
  let transparentOnInit = false;

  if (header.classList.contains("is-transparent")) {
    transparentOnInit = true;
    // Initially, hide the transparent logo and show the standard logo
    logoStd.style.display = "block";
    logoTransparent.style.display = "none";
  }

  window.onscroll = function () {
    const scrollTop = window.scrollY;

    console.log("Scroll Top:", scrollTop);

    if (scrollTop < 2 && transparentOnInit) {
      console.log("Adding is-transparent class");
      header.classList.add("is-transparent");
      // Show the transparent logo and hide the standard logo
      logoStd.style.display = "none";
      logoTransparent.style.display = "flex";
    } else if (scrollTop < 150) {
      header.classList.remove("is-fixed");
      header.classList.remove("is-hidden");
      if (transparentOnInit) {
        console.log("Adding is-transparent class");
        header.classList.add("is-transparent");
        // Show the transparent logo and hide the standard logo
        logoStd.style.display = "none";
        logoTransparent.style.display = "flex";
      }
    } else {
      header.classList.remove("is-transparent");
      if (scrollTop > lastY) {
        header.classList.add("is-hidden");
        header.classList.remove("is-fixed");
      } else {
        header.classList.remove("is-hidden");
        if (scrollTop > 5) {
          header.classList.add("is-fixed");
        }
      }

      // Show the standard logo and hide the transparent logo
      logoStd.style.display = "block";
      logoTransparent.style.display = "none";
    }

    lastY = scrollTop;
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
