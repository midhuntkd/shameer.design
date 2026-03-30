<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<?php $isEdit = $method === 'edit'; ?>
<div class="card card-shadow">
    <div class="card-body">
        <form method="post" action="<?= site_url($action) ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="<?= esc(old('title', $banner['title'] ?? '')) ?>" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-control" value="<?= esc(old('year', $banner['year'] ?? '')) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Type</label>
                    <input type="text" name="type" class="form-control" value="<?= esc(old('type', $banner['type'] ?? '')) ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Image <?= $isEdit ? '(optional)' : '' ?></label>
                <input type="file" name="image" class="form-control" <?= $isEdit ? '' : 'required' ?> accept="image/*">
                <?php if ($isEdit && !empty($banner['image_path'])): ?>
                    <div class="mt-2">
                        <img src="<?= base_url($banner['image_path']) ?>" width="150" alt="">
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Link URL</label>
                <input type="url" name="link_url" class="form-control" value="<?= esc(old('link_url', $banner['link_url'] ?? '')) ?>">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="<?= esc(old('sort_order', $banner['sort_order'] ?? 0)) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <?php $active = old('is_active', $banner['is_active'] ?? 1); ?>
                    <select name="is_active" class="form-select">
                        <option value="1" <?= ((int)$active === 1) ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= ((int)$active === 0) ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit"><?= $isEdit ? 'Update' : 'Create' ?> Banner</button>
                <a href="<?= site_url('admin/banners') ?>" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
