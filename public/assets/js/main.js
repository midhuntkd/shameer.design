 AOS.init({
    once: false,   
    duration: 1000,
    offset: 100,
  });


 const scrollBtn = document.getElementById("scrollTopBtn");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
      scrollBtn.classList.remove("opacity-0", "pointer-events-none", "translate-y-5");
    } else {
      scrollBtn.classList.add("opacity-0", "pointer-events-none", "translate-y-5");
    }
  });

  scrollBtn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

 // Register plugins
gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

//  Initialize ScrollSmoother FIRST
const smoother = ScrollSmoother.create({
  wrapper: "#smooth-wrapper",
  content: "#smooth-content",
  smooth: 1.2,
  effects: true,
  smoothTouch: 0.1,
  normalizeScroll: true // Add this for better compatibility
});

// Card stacking animation
gsap.set(".card", {
  yPercent: 100,
  opacity: 0,
  scale: 1
});

gsap.set(".card1", {
  yPercent: 0,
  opacity: 1,
  scale: 1
});

const tl = gsap.timeline({
  scrollTrigger: {
    trigger: ".cards",
    start: "top top",
    end: "+=3000",
    scrub: 1,
    pin: true,
    markers: false,
    anticipatePin: 1,
    invalidateOnRefresh: true,
    normalizeScroll: true // Match with ScrollSmoother
  }
});

tl
  // Card 2 entrance
  .to(".card2", { yPercent: 0, opacity: 1, duration: 1 })
  .to(".card1", { scale: 0.95, yPercent: -5, duration: 1 }, "<")

  // Card 3 entrance
  .to(".card3", { yPercent: 0, opacity: 1, duration: 1 })
  .to(".card2", { scale: 0.95, yPercent: -5, duration: 1 }, "<")
  .to(".card1", { scale: 0.90, yPercent: -10, duration: 1 }, "<")

  // Card 4 entrance
  .to(".card4", { yPercent: 0, opacity: 1, duration: 1 })
  .to(".card3", { scale: 0.95, yPercent: -5, duration: 1 }, "<")
  .to(".card2", { scale: 0.90, yPercent: -10, duration: 1 }, "<")
  .to(".card1", { scale: 0.85, yPercent: -15, duration: 1 }, "<");


      // text animation
        const swiper = new Swiper(".text-slide-animation", {
      direction: "vertical",
      loop: true,
      slidesPerView: 1,
      speed: 2000,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      allowTouchMove: false, 
    });

    // about
   gsap.registerPlugin(ScrollTrigger);

// Loop through each about block
gsap.utils.toArray(".about").forEach((about) => {
  const img = about.querySelector(".about-img");

  gsap.fromTo(
  img,
  { scale: 1.15 },
  {
    scale: 1,
    ease: "none",
    scrollTrigger: {
      trigger: about,
      start: "top 80%",   
      end: "bottom 20%",
      scrub: true
    }
  }
);

});


// browser scrool smooth
gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

  ScrollSmoother.create({
    wrapper: "#smooth-wrapper",
    content: "#smooth-content",
    smooth: 1.2,        // scroll smoothness (1–2)
    effects: true,
    smoothTouch: 0.1    // mobile
  });
// home scrool banner slider 

$(document).ready(function () {
  const swiper = new Swiper(".mySwiper", {
    // slidesPerView: 1.5,
    spaceBetween: 20,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 3000,            // ⏱ time between slides (3 sec)
      disableOnInteraction: false, // keep autoplay after user swipe
      pauseOnMouseEnter: true // pause on hover (optional)
    },

    speed: 800, // 🎬 transition duration (0.8 sec)

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

    breakpoints: {
      768: {
        slidesPerView: 2.2,
      },
      1024: {
        slidesPerView: 2.5,
      }
    }
  });
});