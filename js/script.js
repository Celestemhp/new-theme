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
    let transparentOnInit = false;

    if (header.classList.contains("is-transparent")) {
        transparentOnInit = true;
    }

    window.onscroll = function () {
        // at the top
        if (window.scrollY < 2 && transparentOnInit) {
            header.classList.add("is-transparent");
        }

        if (window.scrollY < 2) {
            header.classList.remove("is-fixed");
            return;
        }

        if (window.scrollY < 150) {
            header.classList.remove("is-fixed");
            header.classList.remove("is-hidden");
            if (transparentOnInit) {
                header.classList.add("is-transparent");
            }
        } else {
            if (transparentOnInit) {
                header.classList.remove("is-transparent");
            }
        }

        if (lastY > window.scrollY) {
            // when scrolling up
            header.classList.remove("is-hidden");

            // when scrolling down first 5px
            if (window.scrollY > 5) {
                header.classList.add("is-fixed");
            }
        } else {
            // when scrolling down
            header.classList.add("is-hidden");
            header.classList.remove("is-fixed");
        }

        if (transparentOnInit) {
            header.classList.add("is-fixed");
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
