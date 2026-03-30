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
                    <h1 class="font-semibold pb-7" data-aos="fade-up" data-aos-delay="300">
                        Projects
                    </h1>
                    <div class="discription flex flex-col lg:space-y-20 md:space-y-12 space-y-7" data-aos="fade-up"
                        data-aos-delay="300">
                        <p> I create purposeful digital experiences that balance clarity, usability, and impact. Explore
                            my client
                            collaborations and see why my design perspective stands out.</p>
                    </div>
                </div>
                <!-- Projects -->
                <div class="grid lg:grid-cols-2 gap-7 pb-24">
                    <?php $visibleIndex = 0; ?>
                    <?php foreach (($projects ?? []) as $project): ?>
                        <?php
                            $cardImagePath = $project['cover_image_path'] ?? '';
                            if (empty($cardImagePath)) {
                                $cardImagePath = $project['main_image_path'] ?? '';
                            }
                        ?>
                        <?php if (empty($cardImagePath)): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <?php $visibleIndex++; ?>
                        <a href="<?= site_url('projects/' . $project['slug']) ?>" data-aos="fade-up" data-aos-delay="300">
                            <div class="overflow-hidden about rounded-2xl">
                                <img src="<?= esc(base_url($cardImagePath)) ?>" alt="<?= esc($project['title'] ?? 'Project') ?>" width="702" height="635"
                                    class="w-full max-w-full about-img h-full">
                            </div>
                            <div class="pt-4">
                                <div class="text-base"><?= esc($project['project_type'] ?? '') ?></div>
                                <div class="text-2xl"><?= esc($project['title'] ?? '') ?></div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    <?php if ($visibleIndex === 0): ?>
                        <div class="lg:col-span-2 text-center text-muted">No projects found.</div>
                    <?php endif; ?>
                </div>
                <div class="pb-24 text-center flex justify-center" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="more-btn group"><span>load more</span> </a>
                </div>
            </div>
