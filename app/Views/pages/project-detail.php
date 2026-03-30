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

            <?php
                $projectItem = $project ?? [];

                $title = trim((string)($projectItem['title'] ?? ''));
                $shortDescription = trim((string)($projectItem['short_description'] ?? ''));
                $liveUrl = trim((string)($projectItem['url'] ?? ($projectItem['live_url'] ?? '')));
                $year = trim((string)($projectItem['year'] ?? ''));
                $industry = trim((string)($projectItem['industry'] ?? ''));
                $projectType = trim((string)($projectItem['project_type'] ?? ''));
                $role = trim((string)($projectItem['roler'] ?? ''));

                $projectOverview = trim((string)($projectItem['project_overview'] ?? ''));
                $problemStatement = trim((string)($projectItem['problem_statement'] ?? ''));
                $keyChallenges = trim((string)($projectItem['key_challenges_identified'] ?? ''));
                $goalsObjectives = trim((string)($projectItem['goals_objectives'] ?? ''));
                $researchAnalysis = trim((string)($projectItem['research_analysis'] ?? ''));
                $informationArchitecture = trim((string)($projectItem['information_architecture'] ?? ''));
                $wireframing = trim((string)($projectItem['wireframing'] ?? ''));
                $designSystem = trim((string)($projectItem['design_system'] ?? ''));
                $systemIncluded = trim((string)($projectItem['the_system_included'] ?? ''));
                $uiDesign = trim((string)($projectItem['ui_design'] ?? ''));
                $designHighlights = trim((string)($projectItem['design_highlights'] ?? ''));
                $responsiveDesign = trim((string)($projectItem['responsive_design'] ?? ''));
                $specialAttention = trim((string)($projectItem['special_attention_given_to'] ?? ''));
                $finalOutcome = trim((string)($projectItem['final_outcome'] ?? ''));
                $keyLearnings = trim((string)($projectItem['key_learnings'] ?? ''));

                $heroImagePath = trim((string)($projectItem['main_image_path'] ?? ''));
                $heroImage = $heroImagePath !== '' ? base_url($heroImagePath) : '';

                $problemImages = array_values(array_filter([
                    trim((string)($projectItem['problem_statement_image1_path'] ?? '')),
                    trim((string)($projectItem['problem_statement_image2_path'] ?? '')),
                ]));

                $uxImages = array_values(array_filter([
                    trim((string)($projectItem['user_experience_process_img1_path'] ?? '')),
                    trim((string)($projectItem['user_experience_process_img2_path'] ?? '')),
                ]));

                $designSystemImages = array_values(array_filter([
                    trim((string)($projectItem['design_system_img1_path'] ?? '')),
                    trim((string)($projectItem['design_system_img2_path'] ?? '')),
                    trim((string)($projectItem['design_system_img3_path'] ?? '')),
                ]));

                $uiImages = array_values(array_filter([
                    trim((string)($projectItem['ui_design_img1_path'] ?? '')),
                    trim((string)($projectItem['ui_design_img2_path'] ?? '')),
                    trim((string)($projectItem['ui_design_img3_path'] ?? '')),
                    trim((string)($projectItem['ui_design_img4_path'] ?? '')),
                ]));

                $responsiveImages = array_values(array_filter([
                    trim((string)($projectItem['responsive_design_img1_path'] ?? '')),
                    trim((string)($projectItem['responsive_design_img2_path'] ?? '')),
                    trim((string)($projectItem['responsive_design_img3_path'] ?? '')),
                ]));

                $previousUrl = !empty($previousProject['slug']) ? site_url('projects/' . $previousProject['slug']) : '';
                $nextUrl = !empty($nextProject['slug']) ? site_url('projects/' . $nextProject['slug']) : '';
                $renderHtml = static function (string $value): string {
                    $normalized = str_ireplace(
                        ['<br>', '<br/>', '<br />', '&lt;br&gt;', '&lt;br/&gt;', '&lt;br /&gt;'],
                        "\n",
                        $value
                    );

                    $placeholders = [];
                    $withPlaceholders = preg_replace_callback('/<\s*\/?\s*b\b[^>]*>/i', static function (array $matches) use (&$placeholders): string {
                        $token = '__B_TAG_' . count($placeholders) . '__';
                        $placeholders[$token] = (stripos($matches[0], '</') === 0) ? '</b>' : '<b>';
                        return $token;
                    }, $normalized);

                    $escaped = esc($withPlaceholders);
                    $safeWithBold = strtr($escaped, $placeholders);

                    return nl2br($safeWithBold, false);
                };
            ?>

            <div class="container mx-auto">
                <div class="lg:pt-36 lg:pb-20 md:pt-24 md:pb-15 pt-16 pb-12">
                    <?php if ($title !== ''): ?>
                        <h1 class="font-semibold text-3xl pb-7" data-aos="fade-up" data-aos-delay="300"><?= esc($title) ?></h1>
                    <?php endif; ?>

                    <?php if ($shortDescription !== ''): ?>
                        <div class="discription flex flex-col lg:space-y-20 md:space-y-12 space-y-7 mb-8" data-aos="fade-up" data-aos-delay="300">
                            <p><?= $renderHtml($shortDescription) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($liveUrl !== ''): ?>
                        <div data-aos="fade-up" data-aos-delay="300">
                            <a href="<?= esc($liveUrl) ?>" class="more-btn group" data-aos="fade-up" data-aos-delay="300">
                                <span>View Live</span>
                                <i class="ri-arrow-right-up-line md:text-2xl text-xl transition-all group-hover:rotate-45"></i>
                            </a>    
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($year !== '' || $industry !== '' || $projectType !== '' || $role !== ''): ?>
                    <div class="h-[1px] bg-gray-200" data-aos="fade-up" data-aos-delay="300"></div>
                    <div class="flex md:justify-between md:flex-row flex-col gap-5 text-[#313131] pt-9 md:pb-28 pb-9 capitalize">
                        <?php if ($year !== ''): ?>
                            <div class="flex flex-col space-y-1.5" data-aos="fade-up" data-aos-delay="300">
                                <div class="text-base">Year</div>
                                <div class="md:text-2xl md:text-xl text-base"><?= esc($year) ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($industry !== ''): ?>
                            <div class="flex flex-col space-y-1.5" data-aos="fade-up" data-aos-delay="350">
                                <div class="text-base">Industry</div>
                                <div class="md:text-2xl md:text-xl text-base"><?= esc($industry) ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($projectType !== ''): ?>
                            <div class="flex flex-col space-y-1.5" data-aos="fade-up" data-aos-delay="400">
                                <div class="text-base">Project type</div>
                                <div class="md:text-2xl md:text-xl text-base"><?= esc($projectType) ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($role !== ''): ?>
                            <div class="flex flex-col space-y-1.5" data-aos="fade-up" data-aos-delay="450">
                                <div class="text-base">role</div>
                                <div class="md:text-2xl md:text-xl text-base"><?= esc($role) ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($heroImage !== ''): ?>
                <div class="about xl-30 2xl:mb-40 lg:mb-30 md:mb-20 mb-10 overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                    <img src="<?= esc($heroImage) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="1934" height="856" class="w-full max-w-full about-img">
                </div>
            <?php endif; ?>

            <div class="container mx-auto">
                <?php if ($projectOverview !== ''): ?>
                    <div class="mb-14 xl:mb-18 2xl:mb-22 md:space-y-7 space-y-4" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-3xl font-semibold ">Project Overview</h3>
                        <p><?= $renderHtml($projectOverview) ?></p>
                    </div>
                <?php endif; ?>

                <?php if ($problemStatement !== ''): ?>
                    <div class="mb-14 xl:mb-18 2xl:mb-22 md:space-y-7 space-y-4" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-3xl font-semibold ">Problem Statement</h3>
                        <p><?= $renderHtml($problemStatement) ?></p>
                    </div>
                <?php endif; ?>

                <?php if ($keyChallenges !== '' || $goalsObjectives !== ''): ?>
                    <div class="mb-14 xl:mb-18 2xl:mb-22 md:space-y-12 space-y-8 md:text-xl text-base">
                        <?php if ($keyChallenges !== ''): ?>
                            <div class="grid md:grid-cols-[2.5fr_7.5fr] md:gap-5 gap-3" data-aos="fade-up" data-aos-delay="300">
                                <div class=" font-semibold">Key challenges identified</div>
                                <div><?= $renderHtml($keyChallenges) ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($goalsObjectives !== ''): ?>
                            <div class="grid md:grid-cols-[2.5fr_7.5fr] md:gap-5 gap-3" data-aos="fade-up" data-aos-delay="300">
                                <div class=" font-semibold">Goals & Objectives</div>
                                <div><?= $renderHtml($goalsObjectives) ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($problemImages)): ?>
                    <div class="grid lg:grid-cols-2 gap-7 pb-24" data-aos="fade-up" data-aos-delay="300">
                        <?php foreach ($problemImages as $problemImage): ?>
                            <div class="overflow-hidden about rounded-2xl">
                                <img src="<?= esc(base_url($problemImage)) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="711" height="800"
                                    class="w-full max-w-full about-img h-full">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($researchAnalysis !== '' || $informationArchitecture !== '' || $wireframing !== ''): ?>
                    <div class="mb-14 xl:mb-18 2xl:mb-22 md:space-y-12 space-y-8 md:text-xl text-base">
                        <h3 class="text-3xl font-semibold " data-aos="fade-up" data-aos-delay="300">User Experience Process</h3>

                        <?php if ($researchAnalysis !== ''): ?>
                            <div class="grid md:grid-cols-[2.5fr_7.5fr] md:gap-5 gap-3" data-aos="fade-up" data-aos-delay="300">
                                <div class=" font-semibold">Research & Analysis</div>
                                <div class="space-y-4">
                                    <p><?= $renderHtml($researchAnalysis) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($informationArchitecture !== ''): ?>
                            <div class="grid md:grid-cols-[2.5fr_7.5fr] md:gap-5 gap-3" data-aos="fade-up" data-aos-delay="300">
                                <div class=" font-semibold">Information Architecture</div>
                                <div class="space-y-4">
                                    <p><?= $renderHtml($informationArchitecture) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($wireframing !== ''): ?>
                            <div class="grid md:grid-cols-[2.5fr_7.5fr] md:gap-5 gap-3" data-aos="fade-up" data-aos-delay="300">
                                <div class=" font-semibold">Wireframing</div>
                                <div class="space-y-4">
                                    <p><?= $renderHtml($wireframing) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php foreach ($uxImages as $uxImage): ?>
                    <div class="pb-8" data-aos="fade-up" data-aos-delay="300">
                        <img src="<?= esc(base_url($uxImage)) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="1440" height="800" class="w-full rounded-2xl">
                    </div>
                <?php endforeach; ?>

                <?php if ($designSystem !== '' || $systemIncluded !== ''): ?>
                    <div class="mb-14 xl:mb-18 2xl:mb-22 md:space-y-12 space-y-8 md:text-xl text-base" data-aos="fade-up" data-aos-delay="300">
                        <?php if ($designSystem !== ''): ?>
                            <h3 class="text-3xl font-semibold ">Design System</h3>
                            <p><?= $renderHtml($designSystem) ?></p>
                        <?php endif; ?>

                        <?php if ($systemIncluded !== ''): ?>
                            <div class="grid md:grid-cols-[2.5fr_7.5fr] md:gap-5 gap-3">
                                <div class=" font-semibold">The system included</div>
                                <div class="space-y-4">
                                    <p><?= $renderHtml($systemIncluded) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($designSystemImages)): ?>
                    <div class="grid lg:grid-cols-2 gap-7 pb-24">
                        <?php if (!empty($designSystemImages[0])): ?>
                            <a href="#" data-aos="fade-up" data-aos-delay="300">
                                <div class="overflow-hidden about rounded-2xl">
                                    <img src="<?= esc(base_url($designSystemImages[0])) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="702" height="800"
                                        class="w-full max-w-full about-img h-full">
                                </div>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($designSystemImages[1])): ?>
                            <a href="#" data-aos="fade-up" data-aos-delay="300">
                                <div class="overflow-hidden rounded-2xl about">
                                    <img src="<?= esc(base_url($designSystemImages[1])) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="702" height="800"
                                        class="w-full max-w-full about-img h-full">
                                </div>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($designSystemImages[2])): ?>
                            <a href="#" class="lg:col-span-2" data-aos="fade-up" data-aos-delay="300">
                                <div class="overflow-hidden about rounded-2xl">
                                    <img src="<?= esc(base_url($designSystemImages[2])) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="1440" height="800"
                                        class="w-full max-w-full about-img h-full">
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($uiDesign !== '' || $designHighlights !== ''): ?>
                    <div class="mb-14 xl:mb-18 2xl:mb-22 md:space-y-12 space-y-8 md:text-xl text-base" data-aos="fade-up" data-aos-delay="300">
                        <?php if ($uiDesign !== ''): ?>
                            <h3 class="text-3xl font-semibold ">UI Design</h3>
                            <p><?= $renderHtml($uiDesign) ?></p>
                        <?php endif; ?>

                        <?php if ($designHighlights !== ''): ?>
                            <div class="grid md:grid-cols-[2.5fr_7.5fr] md:gap-5 gap-3">
                                <div class=" font-semibold">Design highlights</div>
                                <div class="space-y-4">
                                    <p><?= $renderHtml($designHighlights) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($uiImages)): ?>
                    <div class="grid lg:grid-cols-2 gap-7 pb-24">
                        <?php if (!empty($uiImages[0])): ?>
                            <a href="#" class="lg:col-span-2" data-aos="fade-up" data-aos-delay="300">
                                <div class="overflow-hidden about rounded-2xl">
                                    <img src="<?= esc(base_url($uiImages[0])) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="1440" height="800"
                                        class="w-full max-w-full about-img h-full">
                                </div>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($uiImages[1])): ?>
                            <a href="#" data-aos="fade-up" data-aos-delay="300">
                                <div class="overflow-hidden about rounded-2xl">
                                    <img src="<?= esc(base_url($uiImages[1])) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="702" height="800"
                                        class="w-full max-w-full about-img h-full">
                                </div>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($uiImages[2])): ?>
                            <a href="#" data-aos="fade-up" data-aos-delay="300">
                                <div class="overflow-hidden rounded-2xl about">
                                    <img src="<?= esc(base_url($uiImages[2])) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="702" height="800"
                                        class="w-full max-w-full about-img h-full">
                                </div>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($uiImages[3])): ?>
                            <a href="#" class="lg:col-span-2" data-aos="fade-up" data-aos-delay="300">
                                <div class="overflow-hidden about rounded-2xl">
                                    <img src="<?= esc(base_url($uiImages[3])) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="1440" height="800"
                                        class="w-full max-w-full about-img h-full">
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($responsiveDesign !== '' || $specialAttention !== ''): ?>
                    <div class="mb-14 xl:mb-18 2xl:mb-22 md:space-y-12 space-y-8 md:text-xl text-base" data-aos="fade-up" data-aos-delay="300">
                        <?php if ($responsiveDesign !== ''): ?>
                            <h3 class="text-3xl font-semibold ">Responsive Design</h3>
                            <p><?= $renderHtml($responsiveDesign) ?></p>
                        <?php endif; ?>

                        <?php if ($specialAttention !== ''): ?>
                            <div class="grid md:grid-cols-[2.5fr_7.5fr] md:gap-5 gap-3">
                                <div class=" font-semibold">Special attention given to</div>
                                <div class="space-y-4">
                                    <p><?= $renderHtml($specialAttention) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($responsiveImages)): ?>
                    <div class="grid lg:grid-cols-2 gap-7 pb-24">
                        <?php if (!empty($responsiveImages[0])): ?>
                            <a href="#" data-aos="fade-up" data-aos-delay="300">
                                <div class="overflow-hidden about rounded-2xl">
                                    <img src="<?= esc(base_url($responsiveImages[0])) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="1440" height="800"
                                        class="w-full max-w-full about-img h-full">
                                </div>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($responsiveImages[1])): ?>
                            <a href="#" data-aos="fade-up" data-aos-delay="300">
                                <div class="overflow-hidden about rounded-2xl">
                                    <img src="<?= esc(base_url($responsiveImages[1])) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="702" height="800"
                                        class="w-full max-w-full about-img h-full">
                                </div>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($responsiveImages[2])): ?>
                            <a href="#" class="lg:col-span-2" data-aos="fade-up" data-aos-delay="300">
                                <div class="overflow-hidden about rounded-2xl">
                                    <img src="<?= esc(base_url($responsiveImages[2])) ?>" alt="<?= esc($title !== '' ? $title : 'Project') ?>" width="1440" height="800"
                                        class="w-full max-w-full about-img h-full">
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($finalOutcome !== '' || $keyLearnings !== ''): ?>
                    <div class="mb-14 xl:mb-18 2xl:mb-22 md:space-y-12 space-y-8 md:text-xl text-base" data-aos="fade-up" data-aos-delay="300">
                        <?php if ($finalOutcome !== ''): ?>
                            <h3 class="text-3xl font-semibold ">Final Outcome</h3>
                            <p><?= $renderHtml($finalOutcome) ?></p>
                        <?php endif; ?>

                        <?php if ($keyLearnings !== ''): ?>
                            <div class="grid md:grid-cols-[2.5fr_7.5fr] md:gap-5 gap-3">
                                <div class=" font-semibold">Key Learnings</div>
                                <div class="space-y-4">
                                    <p><?= $renderHtml($keyLearnings) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($previousUrl !== '' || $nextUrl !== ''): ?>
                    <div class="md:pb-24 pb-12 md:pt-18 pt-10 text-center flex border-t border-gray-200 justify-between text-base" data-aos="fade-up" data-aos-delay="300">
                        <?php if ($previousUrl !== ''): ?>
                            <a href="<?= esc($previousUrl) ?>" class="more-btn2 group" data-aos="fade-up" data-aos-delay="300"><i class="ri-arrow-left-line"></i><span>Previous Project</span></a>
                        <?php else: ?>
                            <span></span>
                        <?php endif; ?>

                        <?php if ($nextUrl !== ''): ?>
                            <a href="<?= esc($nextUrl) ?>" class="more-btn2 group" data-aos="fade-up" data-aos-delay="300"><span>Next Project</span> <i class="ri-arrow-right-line"></i></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
