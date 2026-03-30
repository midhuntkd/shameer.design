<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?= site_url('admin/banners/create') ?>" class="btn btn-primary">Add Banner</a>
</div>

<div class="card card-shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Link</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($banners)): ?>
                        <tr><td colspan="7" class="text-center text-muted">No banners found.</td></tr>
                    <?php endif; ?>
                    <?php foreach ($banners as $banner): ?>
                        <tr>
                            <td><?= esc($banner['id']) ?></td>
                            <td><?= esc($banner['title']) ?></td>
                            <td>
                                <?php if (!empty($banner['image_path'])): ?>
                                    <img src="<?= base_url($banner['image_path']) ?>" alt="" width="100">
                                <?php endif; ?>
                            </td>
                            <td><?= esc($banner['link_url'] ?? '-') ?></td>
                            <td><?= esc($banner['sort_order']) ?></td>
                            <td><?= $banner['is_active'] ? 'Active' : 'Inactive' ?></td>
                            <td class="text-end">
                                <a href="<?= site_url('admin/banners/edit/' . $banner['id']) ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form method="post" action="<?= site_url('admin/banners/delete/' . $banner['id']) ?>" class="d-inline">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Delete this banner?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
