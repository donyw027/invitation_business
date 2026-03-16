<?php $this->load->view('admin/layout/header'); ?>
<div class="d-flex gap-2 mb-3 flex-wrap">
    <a href="<?= site_url('admin/reports/export-orders'); ?>" class="btn btn-success btn-sm">Export Orders CSV</a>
    <a href="<?= site_url('admin/reports/export-orders-xlsx'); ?>" class="btn btn-outline-success btn-sm">Export Orders XLSX</a>
    <a href="<?= site_url('admin/reports/export-projects'); ?>" class="btn btn-primary btn-sm">Export Projects CSV</a>
    <a href="<?= site_url('admin/reports/export-projects-xlsx'); ?>" class="btn btn-outline-primary btn-sm">Export Projects XLSX</a>
</div>
<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="alert alert-light border mb-0">Total Guest: <strong><?= (int)$guest_total; ?></strong></div></div>
    <div class="col-md-3"><div class="alert alert-light border mb-0">Guest Opened: <strong><?= (int)$guest_opened; ?></strong></div></div>
    <div class="col-md-3"><div class="alert alert-light border mb-0">RSVP: <strong><?= (int)$rsvp_total; ?></strong></div></div>
    <div class="col-md-3"><div class="alert alert-warning mb-0">Wish Pending: <strong><?= (int)$wish_pending; ?></strong></div></div>
</div>
<div class="card table-card mb-4"><div class="card-header bg-white"><strong>Order Ringkas</strong></div><div class="table-responsive"><table class="table mb-0"><thead><tr><th>No</th><th>Customer</th><th>Status</th><th>Payment</th><th>Total</th><th>Paid</th></tr></thead><tbody>
<?php foreach($orders as $row): ?><tr><td><?= html_escape($row->order_no); ?></td><td><?= html_escape($row->customer_name); ?></td><td><?= html_escape(status_label($row->status)); ?></td><td><?= html_escape(strtoupper($row->payment_status)); ?></td><td><?= rupiah($row->final_price); ?></td><td><?= rupiah($row->paid_amount); ?></td></tr><?php endforeach; ?>
</tbody></table></div></div>
<div class="card table-card"><div class="card-header bg-white"><strong>Project Ringkas</strong></div><div class="table-responsive"><table class="table mb-0"><thead><tr><th>Title</th><th>Customer</th><th>Status</th><th>Event</th><th>Deadline</th></tr></thead><tbody>
<?php foreach($projects as $row): ?><tr><td><?= html_escape($row->title); ?></td><td><?= html_escape($row->customer_name); ?></td><td><?= html_escape(status_label($row->status)); ?></td><td><?= html_escape($row->event_date); ?></td><td><?= html_escape($row->deadline_date); ?></td></tr><?php endforeach; ?>
</tbody></table></div></div>
<?php $this->load->view('admin/layout/footer'); ?>
