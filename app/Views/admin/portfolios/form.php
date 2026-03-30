<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<?php
    $isEdit = $method === 'edit';
    $projectTypes = $projectTypes ?? ['E-commerce Website', 'Website Design', 'Web Application', 'E-comm Mobile App', 'Subscription Website', 'Corporate Website', 'Digital Campaign'];
    $publishedVal = '';
    if (!empty($portfolio['published_at'])) {
        $publishedVal = date('Y-m-d\TH:i', strtotime($portfolio['published_at']));
    }
?>
<div class="card card-shadow">
    <div class="card-body">
        <form method="post" action="<?= site_url($action) ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="<?= esc(old('title', $portfolio['title'] ?? '')) ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-control" value="<?= esc(old('year', $portfolio['year'] ?? '')) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Live URL</label>
                    <input type="url" name="url" class="form-control" value="<?= esc(old('url', $portfolio['url'] ?? ($portfolio['live_url'] ?? ''))) ?>">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_description" class="form-control" rows="3"><?= esc(old('short_description', $portfolio['short_description'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5"><?= esc(old('content', $portfolio['content'] ?? '')) ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Cover Image <?= $isEdit ? '(optional)' : '' ?></label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['cover_image_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['cover_image_path']) ?>" width="160" alt=""></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Published At</label>
                    <input type="datetime-local" name="published_at" class="form-control" value="<?= esc(old('published_at', $publishedVal)) ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Industry</label>
                    <input type="text" name="industry" class="form-control" value="<?= esc(old('industry', $portfolio['industry'] ?? '')) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Project Type</label>
                    <?php $projectTypeVal = old('project_type', $portfolio['project_type'] ?? ''); ?>
                    <select name="project_type" class="form-select">
                        <option value="">Select project type</option>
                        <?php foreach ($projectTypes as $type): ?>
                            <option value="<?= esc($type) ?>" <?= ($projectTypeVal === $type) ? 'selected' : '' ?>><?= esc($type) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Roler</label>
                <input type="text" name="roler" class="form-control" value="<?= esc(old('roler', $portfolio['roler'] ?? '')) ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Main Image</label>
                <input type="file" name="main_image" class="form-control" accept="image/*">
                <?php if ($isEdit && !empty($portfolio['main_image_path'])): ?>
                    <div class="mt-2"><img src="<?= base_url($portfolio['main_image_path']) ?>" width="160" alt=""></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Project Overview</label>
                <textarea name="project_overview" class="form-control" rows="4"><?= esc(old('project_overview', $portfolio['project_overview'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Problem Statement</label>
                <textarea name="problem_statement" class="form-control" rows="4"><?= esc(old('problem_statement', $portfolio['problem_statement'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Key Challenges Identified</label>
                <textarea name="key_challenges_identified" class="form-control" rows="4"><?= esc(old('key_challenges_identified', $portfolio['key_challenges_identified'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Goals &amp; Objectives</label>
                <textarea name="goals_objectives" class="form-control" rows="4"><?= esc(old('goals_objectives', $portfolio['goals_objectives'] ?? '')) ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Problem Statement Image 1</label>
                    <input type="file" name="problem_statement_image1" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['problem_statement_image1_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['problem_statement_image1_path']) ?>" width="160" alt=""></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Problem Statement Image 2</label>
                    <input type="file" name="problem_statement_image2" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['problem_statement_image2_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['problem_statement_image2_path']) ?>" width="160" alt=""></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Research &amp; Analysis</label>
                <textarea name="research_analysis" class="form-control" rows="4"><?= esc(old('research_analysis', $portfolio['research_analysis'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Information Architecture</label>
                <textarea name="information_architecture" class="form-control" rows="4"><?= esc(old('information_architecture', $portfolio['information_architecture'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Wireframing</label>
                <textarea name="wireframing" class="form-control" rows="4"><?= esc(old('wireframing', $portfolio['wireframing'] ?? '')) ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">User Experience Process Img 1</label>
                    <input type="file" name="user_experience_process_img1" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['user_experience_process_img1_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['user_experience_process_img1_path']) ?>" width="160" alt=""></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">User Experience Process Img 2</label>
                    <input type="file" name="user_experience_process_img2" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['user_experience_process_img2_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['user_experience_process_img2_path']) ?>" width="160" alt=""></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Design System</label>
                <textarea name="design_system" class="form-control" rows="4"><?= esc(old('design_system', $portfolio['design_system'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">The System Included</label>
                <textarea name="the_system_included" class="form-control" rows="4"><?= esc(old('the_system_included', $portfolio['the_system_included'] ?? '')) ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Design System Img 1</label>
                    <input type="file" name="design_system_img1" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['design_system_img1_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['design_system_img1_path']) ?>" width="140" alt=""></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Design System Img 2</label>
                    <input type="file" name="design_system_img2" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['design_system_img2_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['design_system_img2_path']) ?>" width="140" alt=""></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Design System Img 3</label>
                    <input type="file" name="design_system_img3" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['design_system_img3_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['design_system_img3_path']) ?>" width="140" alt=""></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">UI Design</label>
                <textarea name="ui_design" class="form-control" rows="4"><?= esc(old('ui_design', $portfolio['ui_design'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Design Highlights</label>
                <textarea name="design_highlights" class="form-control" rows="4"><?= esc(old('design_highlights', $portfolio['design_highlights'] ?? '')) ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">UI Design Img 1</label>
                    <input type="file" name="ui_design_img1" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['ui_design_img1_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['ui_design_img1_path']) ?>" width="120" alt=""></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">UI Design Img 2</label>
                    <input type="file" name="ui_design_img2" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['ui_design_img2_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['ui_design_img2_path']) ?>" width="120" alt=""></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">UI Design Img 3</label>
                    <input type="file" name="ui_design_img3" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['ui_design_img3_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['ui_design_img3_path']) ?>" width="120" alt=""></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">UI Design Img 4</label>
                    <input type="file" name="ui_design_img4" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['ui_design_img4_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['ui_design_img4_path']) ?>" width="120" alt=""></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Responsive Design</label>
                <textarea name="responsive_design" class="form-control" rows="4"><?= esc(old('responsive_design', $portfolio['responsive_design'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Special Attention Given To</label>
                <textarea name="special_attention_given_to" class="form-control" rows="4"><?= esc(old('special_attention_given_to', $portfolio['special_attention_given_to'] ?? '')) ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Responsive Design Img 1</label>
                    <input type="file" name="responsive_design_img1" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['responsive_design_img1_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['responsive_design_img1_path']) ?>" width="140" alt=""></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Responsive Design Img 2</label>
                    <input type="file" name="responsive_design_img2" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['responsive_design_img2_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['responsive_design_img2_path']) ?>" width="140" alt=""></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Responsive Design Img 3</label>
                    <input type="file" name="responsive_design_img3" class="form-control" accept="image/*">
                    <?php if ($isEdit && !empty($portfolio['responsive_design_img3_path'])): ?>
                        <div class="mt-2"><img src="<?= base_url($portfolio['responsive_design_img3_path']) ?>" width="140" alt=""></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Final Outcome</label>
                <textarea name="final_outcome" class="form-control" rows="4"><?= esc(old('final_outcome', $portfolio['final_outcome'] ?? '')) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Key Learnings</label>
                <textarea name="key_learnings" class="form-control" rows="4"><?= esc(old('key_learnings', $portfolio['key_learnings'] ?? '')) ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <?php $active = old('is_active', $portfolio['is_active'] ?? 1); ?>
                    <select name="is_active" class="form-select">
                        <option value="1" <?= ((int)$active === 1) ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= ((int)$active === 0) ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="<?= esc(old('sort_order', $portfolio['sort_order'] ?? 0)) ?>">
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button class="btn btn-primary" type="submit"><?= $isEdit ? 'Update' : 'Create' ?> Portfolio</button>
                <a href="<?= site_url('admin/portfolios') ?>" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
