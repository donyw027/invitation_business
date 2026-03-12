<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>Data Orders</strong>
        <a href="<?= site_url('admin/orders/create'); ?>" class="btn btn-dark btn-sm">Tambah Order</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th>#</th><th>Customer</th><th>Produk</th><th>Paket</th><th>Template</th><th>Status</th><th>Payment</th><th>Aksi</th></tr></thead>
            <tbody>
            <?php foreach ($orders as $i => $row): ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= html_escape($row->customer_name); ?></td>
                    <td><?= html_escape($row->product_type); ?></td>
                    <td><?= html_escape($row->package_name); ?></td>
                    <td><?= html_escape($row->template_name); ?></td>
                    <td><span class="badge text-bg-<?= badge_status($row->status); ?>"><?= html_escape($row->status); ?></span></td>
                    <td><?= html_escape($row->payment_status); ?></td>
                    <td>
                        <a href="<?= site_url('admin/orders/edit/'.$row->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                        <a href="<?= site_url('admin/orders/delete/'.$row->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus order ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($orders)): ?><tr><td colspan="8" class="text-center text-muted">Belum ada order.</td></tr><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
