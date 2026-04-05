<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center"><strong>Data Customers</strong><a href="<?= site_url('admin/customers/create'); ?>" class="btn btn-dark btn-sm">Tambah Customer</a></div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Source</th>
                    <th>Alamat</th>
                    <!-- <th>Notes</th> -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $i => $row): ?><tr>
                        <td><?= $i + 1; ?></td>
                        <td><?= html_escape($row->name); ?></td>
                        <td><?= html_escape($row->phone); ?><br><small class="text-muted"><?= html_escape($row->email); ?></small></td>
                        <td><?= html_escape($row->source); ?></td>
                        <td><?= html_escape($row->address); ?></td>
                        <!-- <td><?= html_escape($row->notes); ?></td> -->
                        <td><a href="<?= site_url('admin/customers/edit/' . $row->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a> <a href="<?= site_url('admin/customers/delete/' . $row->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus customer ini?')">Hapus</a></td>
                    </tr><?php endforeach; ?>
                <?php if (empty($customers)): ?><tr>
                        <td colspan="7" class="text-center text-muted">Belum ada customer.</td>
                    </tr><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>