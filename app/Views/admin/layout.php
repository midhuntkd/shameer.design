<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Admin Panel') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f6f7fb; }
        .sidebar { min-height: 100vh; background: #1f2937; color: #fff; }
        .sidebar a { color: #cbd5f5; text-decoration: none; display: block; padding: 0.6rem 1rem; }
        .sidebar a.active, .sidebar a:hover { background: #111827; color: #fff; }
        .content-wrap { padding: 1.5rem; }
        .card-shadow { box-shadow: 0 6px 18px rgba(16,24,40,0.08); }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-3 col-lg-2 sidebar p-0">
            <?= $this->include('admin/partials/sidebar') ?>
        </div>
        <div class="col-12 col-md-9 col-lg-10 content-wrap">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="m-0"><?= esc($pageTitle ?? 'Dashboard') ?></h4>
                <form method="post" action="<?= site_url('admin/logout') ?>" class="m-0">
                    <?= csrf_field() ?>
                    <button class="btn btn-sm btn-outline-dark" type="submit">Logout</button>
                </form>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= esc(session()->getFlashdata('success')) ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= esc(session()->getFlashdata('error')) ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
