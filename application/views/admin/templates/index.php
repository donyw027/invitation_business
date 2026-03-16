<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center"><strong>Templates</strong><a href="<?= site_url('admin/templates/create'); ?>" class="btn btn-dark btn-sm">Tambah Template</a></div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Thumb</th>
                    <th>Nama</th>
                    <th>Folder</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($templates as $row): ?><tr>
                        <td style="width:110px"><?php if (!empty($row->thumbnail)): ?><img src="<?= asset_or_url($row->thumbnail); ?>" class="img-fluid rounded border"><?php endif; ?></td>
                        <td><strong><?= html_escape($row->name); ?></strong><br><small class="text-muted"><?= html_escape($row->description); ?></small></td>
                        <td><?= html_escape($row->folder); ?></td>
                        <td><?= html_escape(status_label($row->product_type)); ?></td>
                        <td><?= $row->is_active ? 'Active' : 'Inactive'; ?></td>
                        <td><a href="<?= site_url('admin/templates/edit/' . $row->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a> <a href="<?= site_url('admin/templates/clone/' . $row->id); ?>" class="btn btn-sm btn-outline-dark" onclick="return confirm('Clone template ini?')">Clone</a> <a href="<?= site_url('admin/templates/delete/' . $row->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus template ini?')">Hapus</a></td>
                    </tr><?php endforeach; ?>
                <?php if (empty($templates)): ?><tr>
                        <td colspan="6" class="text-center text-muted">Belum ada template.</td>
                    </tr><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>