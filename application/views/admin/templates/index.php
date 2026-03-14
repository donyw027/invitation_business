<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>Templates</strong>
        <a href="<?= site_url('admin/templates/create'); ?>" class="btn btn-dark btn-sm">Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th>#</th><th>Name</th><th>Folder</th><th>Product</th><th>Sort</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
            <?php foreach ($templates as $i => $row): ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= html_escape($row->name); ?></td>
                    <td><?= html_escape($row->folder); ?></td>
                    <td><?= html_escape($row->product_type); ?></td>
                    <td><?= (int)$row->sort_order; ?></td>
                    <td><?= $row->is_active ? 'Active' : 'Inactive'; ?></td>
                    <td><a href="<?= site_url('admin/templates/edit/'.$row->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a> <a href="<?= site_url('admin/templates/delete/'.$row->id); ?>" onclick="return confirm('Hapus data?')" class="btn btn-sm btn-outline-danger">Hapus</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
