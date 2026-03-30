<div class="p-3">
    <div class="fw-semibold mb-3">Admin Panel</div>
    <div class="small text-muted mb-3">Logged in as <?= esc(session()->get('admin_username')) ?></div>
    <a href="<?= site_url('admin') ?>" class="<?= url_is('admin') ? 'active' : '' ?>">Dashboard</a>
    <a href="<?= site_url('admin/banners') ?>" class="<?= url_is('admin/banners*') ? 'active' : '' ?>">Home Banners</a>
    <a href="<?= site_url('admin/portfolios') ?>" class="<?= url_is('admin/portfolios*') ? 'active' : '' ?>">Portfolios</a>
</div>
