<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-header bg-white"><strong>Template Bawaan</strong></div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th>#</th><th>Name</th><th>Folder</th><th>Product</th><th>Status</th></tr></thead>
            <tbody>
            <?php foreach ($templates as $i => $row): ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= html_escape($row->name); ?></td>
                    <td><?= html_escape($row->folder); ?></td>
                    <td><?= html_escape($row->product_type); ?></td>
                    <td><?= $row->is_active ? 'Active' : 'Inactive'; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
