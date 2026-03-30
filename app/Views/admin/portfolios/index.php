<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?= site_url('admin/portfolios/create') ?>" class="btn btn-primary">Add Portfolio</a>
</div>

<div class="card card-shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Published</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($portfolios)): ?>
                        <tr><td colspan="6" class="text-center text-muted">No portfolios found.</td></tr>
                    <?php endif; ?>
                    <?php foreach ($portfolios as $index => $portfolio): ?>
                        <tr>
                            <td><?= esc($index + 1) ?></td>
                            <td><?= esc($portfolio['title']) ?></td>
                            <td><?= esc($portfolio['slug']) ?></td>
                            <td><?= $portfolio['is_active'] ? 'Active' : 'Inactive' ?></td>
                            <td><?= esc($portfolio['published_at'] ?? '-') ?></td>
                            <td class="text-end">
                                <a href="<?= site_url('admin/portfolios/edit/' . $portfolio['id']) ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form method="post" action="<?= site_url('admin/portfolios/delete/' . $portfolio['id']) ?>" class="d-inline">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Delete this portfolio?')">Delete</button>
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
