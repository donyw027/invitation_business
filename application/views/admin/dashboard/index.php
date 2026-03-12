<?php $this->load->view('admin/layout/header'); ?>
<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="card card-stat"><div class="card-body"><div class="text-muted">Orders</div><h3><?= $order_count; ?></h3></div></div></div>
    <div class="col-md-3"><div class="card card-stat"><div class="card-body"><div class="text-muted">Projects</div><h3><?= $project_count; ?></h3></div></div></div>
    <div class="col-md-3"><div class="card card-stat"><div class="card-body"><div class="text-muted">Published</div><h3><?= $published_count; ?></h3></div></div></div>
    <div class="col-md-3"><div class="card card-stat"><div class="card-body"><div class="text-muted">RSVP / Wishes</div><h3><?= $rsvp_count; ?> / <?= $wish_count; ?></h3></div></div></div>
</div>

<div class="alert alert-info">Total guests terdaftar: <strong><?= (int) $guest_total; ?></strong></div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card table-card">
            <div class="card-header bg-white"><strong>RSVP Terbaru</strong></div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead><tr><th>Nama</th><th>Status</th><th>Jumlah</th></tr></thead>
                    <tbody>
                    <?php foreach ($latest_rsvps as $row): ?>
                        <tr>
                            <td><?= html_escape($row->guest_name); ?></td>
                            <td><?= html_escape($row->attendance_status); ?></td>
                            <td><?= (int) $row->guest_total; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($latest_rsvps)): ?><tr><td colspan="3" class="text-center text-muted">Belum ada data.</td></tr><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card table-card">
            <div class="card-header bg-white"><strong>Ucapan Terbaru</strong></div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead><tr><th>Nama</th><th>Pesan</th></tr></thead>
                    <tbody>
                    <?php foreach ($latest_wishes as $row): ?>
                        <tr>
                            <td><?= html_escape($row->guest_name); ?></td>
                            <td><?= character_limiter(html_escape($row->message), 60); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($latest_wishes)): ?><tr><td colspan="2" class="text-center text-muted">Belum ada data.</td></tr><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
