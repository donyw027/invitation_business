<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>Data Projects</strong>
        <a href="<?= site_url('admin/projects/create'); ?>" class="btn btn-dark btn-sm">Tambah Project</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th>#</th><th>Title</th><th>Customer</th><th>Product</th><th>Template</th><th>Status</th><th>Link</th><th>Aksi</th></tr></thead>
            <tbody>
            <?php foreach ($projects as $i => $row): ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= html_escape($row->title); ?></td>
                    <td><?= html_escape($row->customer_name); ?></td>
                    <td><?= html_escape($row->product_type); ?></td>
                    <td><?= html_escape($row->template_name); ?></td>
                    <td><span class="badge text-bg-<?= badge_status($row->status); ?>"><?= html_escape($row->status); ?></span></td>
                    <td>
                        <a href="<?= project_url($row); ?>" target="_blank">Public</a><br>
                        <a href="<?= site_url('preview/'.$row->slug); ?>" target="_blank">Preview</a>
                    </td>
                    <td>
                        <a href="<?= site_url('admin/projects/edit/'.$row->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                        <a href="<?= site_url('admin/guests/index/'.$row->id); ?>" class="btn btn-sm btn-outline-dark">Guests</a>
                        <?php if ($row->status === 'published'): ?>
                            <a href="<?= site_url('admin/projects/unpublish/'.$row->id); ?>" class="btn btn-sm btn-outline-warning">Draft</a>
                        <?php else: ?>
                            <a href="<?= site_url('admin/projects/publish/'.$row->id); ?>" class="btn btn-sm btn-outline-success">Publish</a>
                        <?php endif; ?>
                        <a href="<?= site_url('admin/projects/delete/'.$row->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus project ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($projects)): ?><tr><td colspan="8" class="text-center text-muted">Belum ada project.</td></tr><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
