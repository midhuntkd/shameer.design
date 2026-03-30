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
                <div class="lg:py-36 md:py-24 py-16" data-aos="fade-up" data-aos-delay="300">

                    <div class="xl:text-8xl lg:text-7xl md:text-5xl text-3xl font-bold">
                        I'm a designer, maker, nomad,
                        and coffee lover obsessed with
                        the world of digital

                    </div>
                </div>
            </div>
            <div class="about lg:mb-28 md:mb-11 mb-8 overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                <img src="<?= base_url('assets/media/about.jpg') ?>" alt="Abdual Shameer" width="1928" height="654"
                    class="w-full max-w-full about-img">
            </div>

            <div class="container mx-auto">
                <div class="flex-col lg:space-y-20 md:space-y-12 space-y-7 justify-between flex pb-24">
                    <div class="title flex items-center gap-3" data-aos="fade-up" data-aos-delay="300">
                        <div>
                            <h4 class="text-xl font-normal">
                                . hello
                            </h4>
                        </div>
                        <div class="flex-1 h-[1px] bg-gray-200 "></div>
                    </div>
                    <div class="discription flex flex-col lg:space-y-20 md:space-y-12 space-y-7" data-aos="fade-up"
                        data-aos-delay="300">
                        <p>I'm Abdul Shameer, a product designer based in Dubai, boasting over 9 years of rich
                            professional
                            experience. My passion lies in transforming abstract ideas into captivating designs that
                            resonate deeply
                            with people, clients, and users alike. Over the years, I've had the privilege of
                            collaborating with
                            top-tier industry clients and innovative startups, honing my craft across diverse sectors,
                            devices, and
                            platforms.</p>
                        <p>While I excel at delivering creative and impactful designs that meet objectives, my approach
                            doesn't stop
                            there. I'm driven by a desire to push boundaries, elevate projects to new heights, and
                            instill a sense
                            of pride in my clients. For me, design isn't just a profession; it's a transformative force
                            that has the
                            power to shape experiences and inspire meaningful connections.</p>
                    </div>
                    <?php 
                        $cvPath = base_url('uploads/resume/resume.pdf');
                    ?>
                    <a href="<?php echo $cvPath; ?>" target="_blank" class="more-btn group" data-aos="fade-up" data-aos-delay="300"><span>Download CV </span>
                        <i class="ri-file-pdf-2-line md:text-2xl text-xl"></i>
                    </a>
                </div>
            </div>
            <!-- Explore Brands -->
            <div class="container mx-auto pb-20">
                <h3 class="font-semibold pb-6 md:pb-11" data-aos="fade-up" data-aos-delay="300">Explore the brands I’ve
                    partnered with</h3>
                <div class="discription flex flex-col lg:space-y-20 md:space-y-12 space-y-7" data-aos="fade-up"
                    data-aos-delay="300">
                    <p>I work with fashion retail, automotive, education, and government organizations across the UAE
                        and other GCC
                        countries, helping them create simple, meaningful, and human-centered digital solutions.</p>
                </div>
            </div>
            <div class="bg-[#F8F8F8] py-14 mb-24">
                <div class="container mx-auto">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-3 2xl:grid-cols-5 
         items-center brands justify-center text-center gap-x-9 gap-y-14
         [&>*:last-child]:col-span-2 md:[&>*:last-child]:col-span-1">
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-1.png') ?>" alt="barand"
                                width="116" height="76" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-2.png') ?>" alt="barand"
                                width="144" height="46" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-3.png') ?>" alt="barand"
                                width="105" height="44" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-4.png') ?>" alt="barand"
                                width="117" height="73" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-5.png') ?>" alt="barand"
                                width="117" height="97" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-6.png') ?>" alt="barand"
                                width="210" height="79" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-7.png') ?>" alt="barand"
                                width="94" height="100" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-8.png') ?>" alt="barand"
                                width="239" height="47" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-9.png') ?>" alt="barand"
                                width="183" height="31" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-10.png') ?>" alt="barand"
                                width="220" height="118" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-11.png') ?>" alt="barand"
                                width="135" height="48" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-12.png') ?>" alt="barand"
                                width="242" height="26" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-13.png') ?>" alt="barand"
                                width="109" height="84" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-14.png') ?>" alt="barand"
                                width="222" height="77" data-aos="fade-up" data-aos-delay="300"> </div>
                        <div class="text-center flex justify-center"><img src="<?= base_url('assets/media/brand-15.png') ?>" alt="barand"
                                width="82" height="100" data-aos="fade-up" data-aos-delay="300"> </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto">
                <!-- Experiance -->
                <div class="experiance lg:pb-28 md:pb-16 pb-3">
                    <div class="title flex gap-3 pb-5 md:pb-6 lg:pb-8 items-center" data-aos="fade-up"
                        data-aos-delay="300">
                        <div>
                            <h4 class="text-xl font-normal">
                                . experience
                            </h4>
                        </div>
                        <div class="flex-1 h-[1px] bg-[#C3C3C3] "></div>
                    </div>


                    <div class="items" data-aos="fade-up" data-aos-delay="300">
                        <div>
                            <h3 class="pb-0">2023 Nov</h3>
                        </div>
                        <div>
                            <h3 class="lg:pb-5 pb-0">Azadea Group Holding</h3>
                            <div class="lg:text-base text-xs text-gray-900">Internet City, Dubai, UAE.</div>
                        </div>
                        <div class="lg:text-end">
                            Product Designer
                        </div>
                    </div>

                    <div class="items" data-aos="fade-up" data-aos-delay="300">
                        <div>
                            <h3 class="pb-0">2021 - 2023</h3>
                        </div>
                        <div>
                            <h3 class="lg:pb-5 pb-0">HitPixel Technologies LLC</h3>
                            <div class="lg:text-base text-xs text-gray-900">Business Bay, Dubai, UAE</div>
                        </div>
                        <div class="lg:text-end">
                            Senior UI Designer
                        </div>
                    </div>

                    <div class="items" data-aos="fade-up" data-aos-delay="300">
                        <div>
                            <h3 class="pb-0">2018 - 2021</h3>
                        </div>
                        <div>
                            <h3 class="lg:pb-5 pb-0">Boopin Interactive</h3>
                            <div class="lg:text-base text-xs text-gray-900">Jumeirah Lake Towers, Dubai, UAE.</div>
                        </div>
                        <div class="lg:text-end">
                            UI/UX Designer
                        </div>
                    </div>

                    <div class="items" data-aos="fade-up" data-aos-delay="300">
                        <div>
                            <h3 class="pb-0">2014 - 2018</h3>
                        </div>
                        <div>
                            <h3 class="lg:pb-5 pb-0">Mastermind Digital Agency</h3>
                            <div class="lg:text-base text-xs text-gray-900">Sky Business Centre , Dubai, UAE.</div>
                        </div>
                        <div class="lg:text-end">
                            UI Designer
                        </div>
                    </div>





                </div>
            </div>
