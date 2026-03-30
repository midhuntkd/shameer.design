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
                <div class="lg:py-36 md:py-24 py-16 space-y-7">
                    <div class="xl:text-8xl lg:text-7xl md:text-5xl text-3xl font-bold" data-aos="fade-up"
                        data-aos-delay="300">
                        Let’s talk about your idea and create something futuristic!
                    </div>
                    <div class="max-w-4xl" data-aos="fade-up" data-aos-delay="300">
                        <p>Whether for a quote, a collaboration, or just to share some good vibes, fill out the form
                            below!</p>
                    </div>
                </div>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                        <?= esc(session()->getFlashdata('success')) ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
                        <?= esc(session()->getFlashdata('error')) ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
                        <ul class="list-disc pl-5 space-y-1">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="grid lg:grid-cols-[1fr_330px] lg:pb-36 md:pb-24 pb-16 gap-x-24 gap-y-7">
                    <div>
                        <form method="post" action="<?= site_url('contact') ?>">
                            <?= csrf_field() ?>
                            <div
                                class="flex flex-col  md:space-y-0 md:flex-none md:grid grid-cols-1 md:grid-cols-2 md:gap-y-9 gap-y-6 md:gap-x-3.5 pb-11">
                                <div class="space-y-0 leading-8" data-aos="fade-up" data-aos-delay="300">
                                    <div class="text-sm text-gray-900">Full name</div>
                                    <input type="text" name="first_name"
                                        class="w-full border-0 focus:shadow-none text-lg placeholder:text-gray-950 text-gray-950 focus:border-0 focus:border-b outline-0 border-b pb-2 border-gray-300"
                                        placeholder="Your first name" value="<?= esc(old('first_name')) ?>" required />
                                </div>
                                <div class="space-y-0 leading-8" data-aos="fade-up" data-aos-delay="300">
                                    <div class="text-sm text-gray-900">Full name</div>
                                    <input type="text" name="last_name"
                                        class="w-full border-0 focus:shadow-none text-lg placeholder:text-gray-950 text-gray-950 focus:border-0 focus:border-b outline-0 border-b pb-2 border-gray-300"
                                        placeholder="Your last name" value="<?= esc(old('last_name')) ?>" required />
                                </div>
                                <div class="space-y-0 leading-8" data-aos="fade-up" data-aos-delay="300">
                                    <div class="text-sm text-gray-900">Email address</div>
                                    <input type="email" name="email"
                                        class="w-full border-0 focus:shadow-none text-lg placeholder:text-gray-950 text-gray-950 focus:border-0 focus:border-b outline-0 border-b pb-2 border-gray-300"
                                        placeholder="Your email address" value="<?= esc(old('email')) ?>" required />
                                </div>
                                <div class="space-y-0 leading-8" data-aos="fade-up" data-aos-delay="300">
                                    <div class="text-sm text-gray-900">Project type</div>
                                    <input type="text" name="project_type"
                                        class="w-full border-0 focus:shadow-none text-lg placeholder:text-gray-950 text-gray-950 focus:border-0 focus:border-b outline-0 border-b pb-2 border-gray-300"
                                        placeholder="Your project type" value="<?= esc(old('project_type')) ?>" />
                                </div>
                                <div class="space-y-0 leading-8 col-span-2" data-aos="fade-up" data-aos-delay="300">
                                    <div class="text-sm text-gray-900">Message</div>
                                    <textarea name="message"
                                        class="w-full border-0 focus:shadow-none text-lg placeholder:text-gray-950 text-gray-950 focus:border-0 focus:border-b outline-0 border-b pb-2 border-gray-300"
                                        placeholder="Describe your project..." required><?= esc(old('message')) ?></textarea>
                                </div>
                            </div>
                            <button type="submit" class="more-btn group text-sm" data-aos="fade-up" data-aos-delay="300"><span>send
                                    message</span></button>
                        </form>
                    </div>
                    <div class="md:space-y-8 space-y-4 md:text-2xl text-lg" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="font-semibold md:text-3xl text-xl">Do you prefer to talk?
                            No problem!</h3>
                        <div class="md:text-2xl text-lg">
                            schedule a call
                        </div>
                        <div>
                            UAE
                            <div class="font-semibold">+971 55 865 1485</div>
                        </div>
                        <div>
                            IND
                            <div class="font-semibold">+91 799 488 9 284</div>
                        </div>
                    </div>
                </div>
            </div>
