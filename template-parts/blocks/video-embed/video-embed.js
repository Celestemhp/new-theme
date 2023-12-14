(function () {
  document.addEventListener("DOMContentLoaded", () => {
    const overlay = document.querySelector("#fullscreen-overlay");
    const overlayContent = document.querySelector("#fullscreen-overlay .video-container");
    const lunnarEmbeds = document.querySelectorAll(".lunnar-embed");

    for (const lunnarEmbed of lunnarEmbeds) {
      lunnarEmbed.addEventListener("click", (e) => {
        e.preventDefault();

        const videoID = lunnarEmbed.dataset.id;
        const type = lunnarEmbed.dataset.type;

        overlay.classList.add("active");

        var iframe;

        if (type == "youtube") {
          iframe = '<div class="container-16-9"><iframe src="https://www.youtube.com/embed/' + videoID + '?version=3&autoplay=1&rel=0" width="560" height="315" frameborder="0" allow="autoplay" allowfullscreen></iframe></div>';
        } else if (type == "vimeo") {
          iframe = '<div class="container-16-9"><iframe src="https://player.vimeo.com/video/' + videoID + '?autoplay=1&byline=0&title=0&rel=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
        } else {
          iframe = "No valid video URL found!";
          console.log("No valid video URL found");
        }

        overlayContent.innerHTML = iframe;
      });
    }

    // overlay.addEventListener('click', (e) => {
    // 	overlay.classList.remove('active');
    // 	overlayContent.innerHTML = ``;
    // });
  });
})();
