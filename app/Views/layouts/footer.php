<footer class="bg-black text-white pt-9 md:pb-0 pb-14">
  <div class="container mx-auto">
    <div
      class="text-center 2xl:text-[163px] xl:text-9xl lg:text-8xl md:text-7xl sm:text-6xl text-4xl font-semibold md:pb-14 pb-9"
      data-aos="fade-up" data-aos-delay="300">
      stay connected
    </div>
    <div class="flex justify-center md:gap-10 md:flex-row flex-col gap-3 lg:pb-24 md:pb-16" data-aos="fade-up"
      data-aos-delay="300">
      <a href="#"
        class="border border-[#2B2B2B] md:py-4.5 py-3 px-8 rounded-full text-gray-500 hover:text-white transition-all text-base text-center">mailme@iamshameer.com</a>
      <a href="tel:+971558651485" tel="971558651485"
        class="border border-[#2B2B2B] md:py-4.5 py-3 px-8 rounded-full text-gray-500 hover:text-white transition-all text-base text-center">+971
        55 8651 485</a>
    </div>

    <div
      class="flex md:justify-between justify-center items-center md:flex-row flex-col border-t border-t-[#1E1E1E] py-9 md:text-base text-sm space-y-3"
      data-aos="fade-up" data-aos-delay="300">
      <nav class="flex space-x-5 lg:space-x-9 xl:space-x-12 justify-center">
        <a href="www.linkedin.com/in/abdul-shameer-88097248" target="_blank">LinkedIn</a>
        <a href="#">Dribble</a>
        <a href="#">Behance</a>
      </nav>
      <div>Design by: Shameer©</div>
    </div>
  </div>
</footer>
</div>
</div>
<script src="https://unpkg.com/gsap@3/dist/gsap.min.js"></script>
<script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
<script src="https://unpkg.com/gsap@3/dist/ScrollSmoother.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="<?= base_url('assets/js/main.js') ?>"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    let itemHeight = $(".item").outerHeight();
    let interval = 4000;

    setInterval(function () {
      $(".parent").animate(
        {
          marginTop: -itemHeight,
        },
        600,
        function () {
          $(".parent .item:first").appendTo(".parent");
          $(".parent").css("marginTop", 0);
        },
      );
    }, interval);
  });

  // swiper
  $(document).ready(function () {
    const swiper = new Swiper(".mySwiper", {
      slidesPerView: 1.5,
      spaceBetween: 20,
      centeredSlides: true,
      loop: true,
      autoplay: {
        delay: 3000,            // ⏱ time between slides (3 sec)
        disableOnInteraction: false, // keep autoplay after user swipe
        pauseOnMouseEnter: true // pause on hover (optional)
      },

      speed: 2500, // 🎬 transition duration (0.8 sec)

      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },

      pagination: false,

      // breakpoints: {
      //   768: {
      //     slidesPerView: 2.2,
      //   },
      //   1024: {
      //     slidesPerView: 2.5,
      //   }
      // }
    });
  });

  window.addEventListener("load", function () {
    document.getElementById("page-loader").style.display = "none";
  });
</script>
</body>

</html>