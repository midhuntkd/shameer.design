<body class="bg-white">
  <div id="page-loader">
    <div class="loader"></div>
  </div>


<?php include APPPATH . 'Views/layouts/stick-nav-device.php'; ?>
  <div id="smooth-wrapper">
    <div id="smooth-content">
      <div class="container mx-auto">
        <?php include APPPATH . 'Views/layouts/site-nav.php'; ?>
      </div>

      <div class="container mx-auto">
        <!-- Banner captions -->
        <div class="lg:py-36 md:py-24 py-16">
          <h1 class="text-xl font-normal">Hey, I'm Abdul Shameer</h1>
          <div class="2xl:text-9xl xl:text-8xl lg:text-7xl md:text-5xl text-3xl font-bold">
            <div>
              a product design<br />
              expert with focus on
            </div>
            <div class="text-slide-animation font-bold relative overflow-hidden">
              <div class="parent">
                <div class="item">user interfaces</div>
                <div class="item">Apps & SaaS interfaces</div>
                <div class="item">user strategy</div>
                <div class="item">interactive experiences</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Slider -->
        <h4 class="text-xl font-normal pb-6 md:pb-9 lg:pb-14">
          . recent projects
        </h4>
        <?php
          $bannerItems = $banners ?? [];
          $bannerBgClasses = ['bg-[#F0F0F0]', 'bg-[#EAD7FF]', 'bg-[#E4EBD4]', 'bg-[#F0F0F0]'];
        ?>
        <div class="carousel-section">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper py-12">
              <?php if (!empty($bannerItems)): ?>
                  <?php foreach ($bannerItems as $index => $banner): ?>
                    <?php
                      $bgClass = $bannerBgClasses[$index % count($bannerBgClasses)];
                      $bannerYear = trim((string) ($banner['year'] ?? ''));
                      $bannerType = trim((string) ($banner['type'] ?? ''));
                      $bannerTitle = trim((string) ($banner['title'] ?? ''));
                      $bannerLink = trim((string) ($banner['link_url'] ?? '')) ?: '#';
                      $bannerImage = !empty($banner['image_path'])
                        ? base_url($banner['image_path'])
                        : base_url('assets/media/slide-1.jpg');
                    ?>

              <div class="swiper-slide w-2/3 p-4 lg:p-10 rounded-2xl <?= esc($bgClass, 'attr') ?>">
                  
                <img src="<?= esc($bannerImage, 'attr') ?>" class="w-full rounded-lg "  width="1297" height="653" alt="<?= esc($bannerTitle !== '' ? $bannerTitle : 'banner') ?>" />
              </div>
              <?php endforeach; ?>      
              <?php endif; ?>      
            </div>

            <!-- navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- pagination -->
            <div class="swiper-pagination"></div>
          </div>
        </div>
        <!-- About -->
        <div
          class="about pt-12 md:pt-20 lg:pt-36 grid lg:grid-cols-[6fr_4fr] lg:gap-20 gap-10 lg:pb-28 md:pb-16 pb-3 bg-white">
          <div class="flex-col lg:space-y-20 md:space-y-12 space-y-7 justify-between flex">
            <div class="title flex items-center gap-3" data-aos="fade-up" data-aos-delay="300">
              <div>
                <h4 class="text-xl font-normal">. about</h4>
              </div>
              <div class="flex-1 h-[1px] bg-gray-200"></div>
            </div>
            <div class="discription flex flex-col lg:space-y-20 md:space-y-12 space-y-7" data-aos="fade-up"
              data-aos-delay="300">
              <p>
                Design, for me is about intention and impact. I create mindful
                user experiences and elegant interfaces that are rooted in
                usability and crafted with precision.
              </p>
              <p>
                My approach blends strategic thinking with refined visual
                design to deliver digital solutions that feel natural,
                engaging, and built for the future. I design future-ready user
                experiences that are intuitive, scalable, and purpose-driven.
              </p>
            </div>
            <a href="<?= site_url('about') ?>" class="more-btn group" data-aos="fade-up" data-aos-delay="300"><span>more about
                me</span>
              <i class="ri-arrow-right-up-line md:text-2xl text-xl transition-all group-hover:rotate-45"></i></a>
          </div>
          <div class="" data-aos="fade-up" data-aos-delay="300">
            <img src="<?= base_url('assets/media/abdulshameer.jpg') ?>" alt="abdulshameer" width="566" height="710"
              class="max-w-full w-full rounded-2xl object-cover h-full" />
          </div>
        </div>
        <!-- Certification -->
        <div class="certification lg:pb-28 md:pb-16 pb-3 pt-9 bg-white">
          <div class="title flex items-center gap-3 pb-5 md:pb-6 lg:pb-8" data-aos="fade-up" data-aos-delay="300">
            <div>
              <h4 class="text-xl font-normal">. certification</h4>
            </div>
            <div class="flex-1 h-[1px] bg-gray-200"></div>
          </div>
          <a href="https://www.linkedin.com/learning/certificates/85b4fb77d545e09fdc2f59dd61b8190bdc5c48bb92bc19d92584fc25e4b5a2a3" target="_blank" class="item no-underline group" data-aos="fade-up" data-aos-delay="300">
            <div>
              <h3 class="lg:pb-5 pb-0">Design Thinking in the Age of AI</h3>
              <div class="lg:text-base text-xs text-gray-900">
                completion date: May 31, 2025
              </div>
            </div>

            <div>
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="lg:pb-5 pb-0">LinkedIn learning</h3>
                  <div class="lg:text-base text-xs text-gray-900">
                    source: LinkedIn
                  </div>
                </div>

                <div>
                  <i
                    class="ri-arrow-right-line inline-block lg:text-6xl md:text-4xl text-2xl transform transition-transform duration-300 group-hover:-rotate-45"></i>
                </div>
              </div>
            </div>
          </a>
          <a href="https://www.linkedin.com/learning/certificates/6514bc3f45e3e1524afbd127ac5b2af307ed950ec8b0177f278d297f5e418ef5" target="_blank" class="item no-underline group" data-aos="fade-up" data-aos-delay="300">
            <div>
              <h3 class="lg:pb-5 pb-0">The AI-Driven Product Designer</h3>
              <div class="lg:text-base text-xs text-gray-900">
                completion date: June 8, 2025
              </div>
            </div>

            <div>
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="lg:pb-5 pb-0">LinkedIn learning</h3>
                  <div class="lg:text-base text-xs text-gray-900">
                    source: LinkedIn
                  </div>
                </div>

                <div>
                  <i
                    class="ri-arrow-right-line inline-block lg:text-6xl md:text-4xl text-2xl transform transition-transform duration-300 group-hover:-rotate-45"></i>
                </div>
              </div>
            </div>
          </a>
          <a href="https://www.linkedin.com/learning/certificates/99dd04040ac2bfeb823e3dab70bfc7d85c238d30d9926c5b7cbc7c59ef099134" target="_blank" class="item no-underline group" data-aos="fade-up" data-aos-delay="300">
            <div>
              <h3 class="lg:pb-5 pb-0">
                Prompt Engineering: How to Talk to the AIs
              </h3>
              <div class="lg:text-base text-xs text-gray-900">
                completion date: June 24, 2025
              </div>
            </div>

            <div>
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="lg:pb-5 pb-0">LinkedIn learning</h3>
                  <div class="lg:text-base text-xs text-gray-900">
                    source: LinkedIn
                  </div>
                </div>

                <div>
                  <i
                    class="ri-arrow-right-line inline-block lg:text-6xl md:text-4xl text-2xl transform transition-transform duration-300 group-hover:-rotate-45"></i>
                </div>
              </div>
            </div>
          </a>
          <a href="https://www.linkedin.com/learning/certificates/33cab8d26505456f970e05e25b4aa64ee2338eb8351622e230c9e7c1fd65daa5" target="_blank" class="item no-underline group" data-aos="fade-up" data-aos-delay="300">
            <div>
              <h3 class="lg:pb-5 pb-0">Figma for UX Design</h3>
              <div class="lg:text-base text-xs text-gray-900">
                completion date: July 29, 2025
              </div>
            </div>

            <div>
              <div class="flex justify-between items-center">
                <div>
                  <h3 class="lg:pb-5 pb-0">LinkedIn learning</h3>
                  <div class="lg:text-base text-xs text-gray-900">
                    source: LinkedIn
                  </div>
                </div>

                <div>
                  <i
                    class="ri-arrow-right-line inline-block lg:text-6xl md:text-4xl text-2xl transform transition-transform duration-300 group-hover:-rotate-45"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
