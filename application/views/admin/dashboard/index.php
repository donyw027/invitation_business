<?php $this->load->view('admin/layout/header'); ?>
<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="card card-stat"><div class="card-body"><div class="text-muted">Orders</div><h3><?= (int)$order_count; ?></h3><small class="text-muted">Waiting payment: <?= (int)$waiting_payment; ?></small></div></div></div>
    <div class="col-md-3"><div class="card card-stat"><div class="card-body"><div class="text-muted">Projects</div><h3><?= (int)$project_count; ?></h3><small class="text-muted">Published: <?= (int)$published_count; ?></small></div></div></div>
    <div class="col-md-3"><div class="card card-stat"><div class="card-body"><div class="text-muted">Revenue</div><h5><?= rupiah($paid_revenue); ?></h5><small class="text-muted">Paid collected: <?= rupiah($paid_amount); ?></small></div></div></div>
    <div class="col-md-3"><div class="card card-stat"><div class="card-body"><div class="text-muted">Guests / RSVP</div><h3><?= (int)$guest_total; ?> / <?= (int)$rsvp_count; ?></h3><small class="text-muted">Attendees: <?= (int)$total_attendees; ?></small></div></div></div>
</div>
<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="alert alert-light border mb-0">Customers: <strong><?= (int)$customer_count; ?></strong></div></div>
    <div class="col-md-3"><div class="alert alert-light border mb-0">Guest Opened: <strong><?= (int)$guest_opened; ?></strong></div></div>
    <div class="col-md-3"><div class="alert alert-warning mb-0">Pending Wishes: <strong><?= (int)$pending_wishes; ?></strong></div></div>
    <div class="col-md-3"><div class="alert alert-info mb-0">Order In Progress: <strong><?= (int)$in_progress; ?></strong></div></div>
</div>
<div class="row g-4">
    <div class="col-lg-6">
        <div class="card table-card"><div class="card-header bg-white"><strong>RSVP Terbaru</strong></div>
            <div class="table-responsive"><table class="table mb-0"><thead><tr><th>Nama</th><th>Project</th><th>Status</th><th>Jumlah</th></tr></thead><tbody>
                <?php foreach ($latest_rsvps as $row): ?><tr><td><?= html_escape($row->guest_name); ?></td><td><?= html_escape($row->project_title); ?></td><td><?= html_escape($row->attendance_status); ?></td><td><?= (int)$row->guest_total; ?></td></tr><?php endforeach; ?>
                <?php if (empty($latest_rsvps)): ?><tr><td colspan="4" class="text-center text-muted">Belum ada data.</td></tr><?php endif; ?>
            </tbody></table></div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card table-card"><div class="card-header bg-white d-flex justify-content-between"><strong>Ucapan Terbaru</strong><a href="<?= site_url('admin/wishes'); ?>" class="btn btn-sm btn-outline-dark">Moderasi</a></div>
            <div class="table-responsive"><table class="table mb-0"><thead><tr><th>Nama</th><th>Project</th><th>Status</th></tr></thead><tbody>
                <?php foreach ($latest_wishes as $row): ?><tr><td><?= html_escape($row->guest_name); ?></td><td><?= html_escape($row->project_title); ?></td><td><span class="badge text-bg-<?= badge_status($row->status); ?>"><?= html_escape(status_label($row->status)); ?></span></td></tr><?php endforeach; ?>
                <?php if (empty($latest_wishes)): ?><tr><td colspan="3" class="text-center text-muted">Belum ada data.</td></tr><?php endif; ?>
            </tbody></table></div>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <div class="col-lg-6">
        <div class="card table-card"><div class="card-header bg-white"><strong>Ringkasan Order 6 Bulan</strong></div><div class="card-body">
            <div class="table-responsive"><table class="table table-sm mb-0"><thead><tr><th>Periode</th><th>Total Order</th><th>Revenue</th></tr></thead><tbody>
            <?php foreach(($monthly_orders ?? array()) as $row): ?><tr><td><?= html_escape($row->period); ?></td><td><?= (int)$row->total_orders; ?></td><td><?= rupiah($row->total_revenue); ?></td></tr><?php endforeach; ?>
            <?php if (empty($monthly_orders)): ?><tr><td colspan="3" class="text-center text-muted">Belum ada data.</td></tr><?php endif; ?>
            </tbody></table></div>
        </div></div>
    </div>
    <div class="col-lg-6">
        <div class="card table-card"><div class="card-header bg-white"><strong>Status Project</strong></div><div class="card-body">
            <?php $maxProject = 1; foreach(($project_status_summary ?? array()) as $s){ if((int)$s->total > $maxProject) $maxProject=(int)$s->total; } ?>
            <?php foreach(($project_status_summary ?? array()) as $s): ?>
                <div class="mb-2">
                    <div class="d-flex justify-content-between"><span><?= html_escape(status_label($s->status)); ?></span><strong><?= (int)$s->total; ?></strong></div>
                    <div class="progress" style="height:10px;"><div class="progress-bar" role="progressbar" style="width: <?= ((int)$s->total / $maxProject) * 100; ?>%"></div></div>
                </div>
            <?php endforeach; ?>
            <?php if (empty($project_status_summary)): ?><div class="text-muted">Belum ada data status project.</div><?php endif; ?>
        </div></div>
    </div>
</div>
<div class="row mt-4"><div class="col-lg-12"><div class="card table-card"><div class="card-body">
    <h5 class="mb-3">Aktivitas Terbaru</h5>
    <div class="table-responsive"><table class="table align-middle"><thead><tr><th>Waktu</th><th>User</th><th>Module</th><th>Action</th><th>Description</th></tr></thead><tbody>
        <?php foreach(($latest_activities ?? array()) as $log): ?><tr><td><?= html_escape($log->created_at); ?></td><td><?= html_escape($log->actor_name); ?></td><td><?= html_escape($log->module); ?></td><td><span class="badge text-bg-dark"><?= html_escape($log->action); ?></span></td><td><?= html_escape($log->description); ?></td></tr><?php endforeach; ?>
    </tbody></table></div>
</div></div></div></div>
<?php $this->load->view('admin/layout/footer'); ?>
