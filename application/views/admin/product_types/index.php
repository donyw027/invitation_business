<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>Product Types</strong>
        <a href="<?= site_url('admin/product-types/create'); ?>" class="btn btn-dark btn-sm">Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th>#</th><th>Name</th><th>Code</th><th>Active</th><th>Sort</th><th>Aksi</th></tr></thead>
            <tbody>
            <?php foreach ($rows as $i => $row): ?>
                <tr>
                    <td><?= $i+1; ?></td><td><?= html_escape($row->name); ?></td><td><?= html_escape($row->code); ?></td><td><?= $row->is_active ? 'Yes' : 'No'; ?></td><td><?= (int)$row->sort_order; ?></td>
                    <td><a href="<?= site_url('admin/product-types/edit/'.$row->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a> <a href="<?= site_url('admin/product-types/delete/'.$row->id); ?>" onclick="return confirm('Hapus data?')" class="btn btn-sm btn-outline-danger">Hapus</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
