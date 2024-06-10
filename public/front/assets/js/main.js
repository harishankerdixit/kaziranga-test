(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    };

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all);
        if (selectEl) {
            if (all) {
                selectEl.forEach((e) => e.addEventListener(type, listener));
            } else {
                selectEl.addEventListener(type, listener);
            }
        }
    };

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
        el.addEventListener("scroll", listener);
    };

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select("#navbar .scrollto", true);
    const navbarlinksActive = () => {
        let position = window.scrollY + 200;
        navbarlinks.forEach((navbarlink) => {
            if (!navbarlink.hash) return;
            let section = select(navbarlink.hash);
            if (!section) return;
            if (
                position >= section.offsetTop &&
                position <= section.offsetTop + section.offsetHeight
            ) {
                navbarlink.classList.add("active");
            } else {
                navbarlink.classList.remove("active");
            }
        });
    };
    window.addEventListener("load", navbarlinksActive);
    onscroll(document, navbarlinksActive);

    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
        let header = select("#header");
        let offset = header.offsetHeight;

        let elementPos = select(el).offsetTop;
        window.scrollTo({
            top: elementPos - offset,
            behavior: "smooth",
        });
    };

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select("#header");
    let selectTopbar = select("#topbar");
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 100) {
                selectHeader.classList.add("header-scrolled");
                if (selectTopbar) {
                    selectTopbar.classList.add("topbar-scrolled");
                }
            } else {
                selectHeader.classList.remove("header-scrolled");
                if (selectTopbar) {
                    selectTopbar.classList.remove("topbar-scrolled");
                }
            }
        };
        window.addEventListener("load", headerScrolled);
        onscroll(document, headerScrolled);
    }

    /**
     * Back to top button
     */
    let backtotop = select(".back-to-top");
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add("active");
            } else {
                backtotop.classList.remove("active");
            }
        };
        window.addEventListener("load", toggleBacktotop);
        onscroll(document, toggleBacktotop);
    }

    /**
     * Mobile nav toggle
     */
    on("click", ".mobile-nav-toggle", function (e) {
        select("#navbar").classList.toggle("navbar-mobile");
        this.classList.toggle("bi-list");
        this.classList.toggle("bi-x");
    });

    /**
     * Mobile nav dropdowns activate
     */
    on(
        "click",
        ".navbar .dropdown > a",
        function (e) {
            if (select("#navbar").classList.contains("navbar-mobile")) {
                e.preventDefault();
                this.nextElementSibling.classList.toggle("dropdown-active");
            }
        },
        true
    );

    /**
     * Scrool with ofset on links with a class name .scrollto
     */
    on(
        "click",
        ".scrollto",
        function (e) {
            if (select(this.hash)) {
                e.preventDefault();

                let navbar = select("#navbar");
                if (navbar.classList.contains("navbar-mobile")) {
                    navbar.classList.remove("navbar-mobile");
                    let navbarToggle = select(".mobile-nav-toggle");
                    navbarToggle.classList.toggle("bi-list");
                    navbarToggle.classList.toggle("bi-x");
                }
                scrollto(this.hash);
            }
        },
        true
    );

    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener("load", () => {
        if (window.location.hash) {
            if (select(window.location.hash)) {
                scrollto(window.location.hash);
            }
        }
    });

    /**
     * Preloader
     */
    let preloader = select("#preloader");
    if (preloader) {
        window.addEventListener("load", () => {
            preloader.remove();
        });
    }

    /**
     * Initiate glightbox
     */
    const glightbox = GLightbox({
        selector: ".glightbox",
    });

    /**
     * Initiate Gallery Lightbox
     */
    const galleryLightbox = GLightbox({
        selector: ".galelry-lightbox",
    });

    /**
     * Init swiper slider with 1 slide at once in desktop view
     */
    new Swiper(".slides-1", {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        slidesPerView: "auto",
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    new Swiper(".slides-3", {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        slidesPerView: "auto",
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 40,
            },

            1200: {
                slidesPerView: 3,
            },
        },
    });

    /**
     * Testimonials slider
     */
    new Swiper(".testimonials-slider", {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        slidesPerView: "auto",
        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
            clickable: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

            1200: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
        },
    });
    new PureCounter();
})();
// ====increment /decrement counter
// function toggleAccordion(panelNumber) {
//   var panel = document.getElementById("panel" + panelNumber);
//   var arrow = document.querySelector("#panel" + panelNumber + " + .accordion-header .arrow");
//   if (panel.style.display === "block") {
//     panel.style.display = "none";
//     arrow.classList.remove("rotate");
//   } else {
//     panel.style.display = "block";
//     arrow.classList.add("rotate");
//   }
// }
function increment() {
    var input = document.getElementById("counterInput");
    input.value = parseInt(input.value) + 1;
}

function decrement() {
    var input = document.getElementById("counterInput");
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
}
function increment1() {
    var input = document.getElementById("counterInput1");
    input.value = parseInt(input.value) + 1;
}

function decrement1() {
    var input = document.getElementById("counterInput1");
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
}
function increment2() {
    var input = document.getElementById("counterInput2");
    input.value = parseInt(input.value) + 1;
}

function decrement2() {
    var input = document.getElementById("counterInput2");
    if (parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
    }
}
//  =====india===
const select = document.querySelector(".select");
const options_list = document.querySelector(".options-list");
const options = document.querySelectorAll(".option");

//show & hide options list
select.addEventListener("click", () => {
    options_list.classList.toggle("active");
    select.querySelector(".fa-angle-down").classList.toggle("fa-angle-up");
});

//select option
options.forEach((option) => {
    option.addEventListener("click", () => {
        options.forEach((option) => {
            option.classList.remove("selected");
        });
        select.querySelector("span").innerHTML = option.innerHTML;
        option.classList.add("selected");
        options_list.classList.toggle("active");
        select.querySelector(".fa-angle-down").classList.toggle("fa-angle-up");
    });
});
// ====button active =====
const buttons = document.querySelectorAll(".service_btn");

buttons.forEach((button) => {
    button.addEventListener("click", () => {
        // Remove active class from all buttons
        buttons.forEach((btn) => btn.classList.remove("active"));
        // Add active class to the clicked button
        button.classList.add("active");
    });
});

// =====js for counter====
// Get the paragraphs container
const paragraphsContainer = document.getElementById("paragraphs");

// Function to update the counter when new paragraphs are added
function updateCounters() {
    const paragraphs = paragraphsContainer.querySelectorAll("p");
    paragraphs.forEach((paragraph, index) => {
        const counter = paragraph.querySelector(".count");
        if (counter) {
            counter.textContent = index + 1 + ".";
        }
    });
}

// Call the function initially
updateCounters();
