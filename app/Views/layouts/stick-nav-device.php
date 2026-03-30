    <button id="scrollTopBtn"
    class="fixed md:bottom-6 bottom-16 right-6 bg-black h-10 w-10 rounded-full text-white text-xl shadow-lg transition-all duration-300 hover:scale-110 z-40 transition-all duration-300 hover:scale-110 animate-bounce">
    <i class="ri-arrow-up-line"></i>
  </button>
  <nav   class="shadow-[0_-6px_14px_rgba(0,0,0,0.12)] navbar md:hidden fixed bottom-0 left-0 w-full flex justify-around items-center space-x-7  bg-white py-3 z-50 text-base px-8">
    <a href="<?= site_url('/') ?>" class="items flex flex-col items-center justify-center active text-xl">
      <i class="ri-home-4-line line-icon"></i>
      <i class="ri-home-5-fill fill-icon hidden"></i>
      <!-- home -->
    </a>

    <a href="<?= site_url('projects') ?>" class="items flex flex-col items-center justify-center text-xl">
      <i class="ri-folder-line line-icon"></i>
      <i class="ri-folder-fill fill-icon hidden"></i>
      <!-- projects -->
    </a>

    <a href="<?= site_url('about') ?>" class="items flex flex-col items-center justify-center text-xl">
      <i class="ri-user-line line-icon"></i>
      <i class="ri-user-fill fill-icon hidden"></i>
      <!-- about -->
    </a>

    <a href="<?= site_url('contact') ?>" class="items flex flex-col items-center justify-center text-xl">
      <i class="ri-phone-line line-icon"></i>
      <i class="ri-phone-fill fill-icon hidden"></i>
      <!-- contact -->
    </a>
  </nav>
