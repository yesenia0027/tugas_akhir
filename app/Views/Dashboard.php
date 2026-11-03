<h2>Dashboard</h2>
<p>Halo, <?= esc(session('nama')) ?> (<?= esc(session('role')) ?>)</p>
<a href="<?= base_url('logout') ?>">Logout</a>