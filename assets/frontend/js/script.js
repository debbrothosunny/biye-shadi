/** @format */

const preloader = document.querySelector(".preloader");

window.addEventListener("load", () => {
  preloader.classList.add("active");
});

window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  if (this.scrollY >= 1) {
    header.classList.add("active");
  } else {
    header.classList.remove("active");
  }
});

// menu

const navBtn = document.querySelector("#menu-btn");
const navContent = document.querySelector(".nav-bar");

navBtn.addEventListener("click", () => {
  navContent.classList.toggle("active");
  navBtn.classList.toggle("fa-xmark");
});

// menu end

//  video play

const videoBtn = document.querySelectorAll(".video-play-btn");
const videoContent = document.querySelector(".video-modal");

videoBtn.forEach((btn) => {
  let btnUrl = btn.getAttribute("data-video");
  let videoCon = videoContent.querySelector("iframe");

  btn.addEventListener("click", () => {
    videoContent.classList.add("active");

    videoCon.setAttribute("src", btnUrl);
  });

  videoContent.querySelector("i").onclick = () => {
    videoContent.classList.remove("active");
    videoCon.setAttribute("src", "");
  };
});

//  video play  end

// ===============

function filter(filterBtn, items) {
  $(filterBtn).on("change", function () {
    var selected = $(this).find(":selected").attr("data-target");
    var item = items;
    $(item).hide();
    $(item + "." + selected).fadeIn();
    if (selected == "all") {
      $(item).fadeIn();
    }
  });
}

filter(".study-select", ".sort-box");
filter(".flive", ".father-filter");
filter(".mlive", ".mother-filter");
filter(".filter-edu", ".filter-edu-items");
filter(".filter-mar", ".filter-mar-item");

// end  ===============
