(function () {
    document.addEventListener("DOMContentLoaded", () => {
        for (const accordionItem of document.querySelectorAll(
            ".accordion-item"
        )) {
            const title = accordionItem.querySelector(".accordion-item--title");

            title.addEventListener("click", (e) => {
                e.preventDefault();

                if (accordionItem.classList.contains("is-active")) {
                    accordionItem.classList.remove("is-active");
                } else {
                    accordionItem.classList.add("is-active");
                }
            });
        }
    });
})();
