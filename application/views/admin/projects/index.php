<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center"><strong>Projects</strong><a href="<?= site_url('admin/projects/create'); ?>" class="btn btn-dark btn-sm">Tambah Project</a></div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Customer</th>
                    <th>PIC</th>
                    <th>Status</th>
                    <th>Event</th>
                    <th>Deadline</th>
                    <th>Tools</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $row): ?><tr>
                        <td><strong><?= html_escape($row->title); ?></strong><br><small class="text-muted">/<?= html_escape($row->slug); ?></small></td>
                        <td><?= html_escape($row->customer_name); ?><br><small class="text-muted"><?= html_escape($row->template_name); ?></small></td>
                        <td><?= html_escape($row->assigned_user_name); ?></td>
                        <td><span class="badge text-bg-<?= badge_status($row->status); ?>"><?= html_escape(status_label($row->status)); ?></span></td>
                        <td><?= html_escape($row->event_date); ?><br><small class="text-muted"><?= html_escape($row->event_time); ?></small></td>
                        <td><?= html_escape($row->deadline_date); ?></td>
                        <td><a href="<?= site_url('preview/' . $row->slug); ?>" target="_blank" class="btn btn-sm btn-outline-secondary">Preview</a> <a href="<?= site_url('admin/guests/index/' . $row->id); ?>" class="btn btn-sm btn-outline-dark">Guests</a></td>
                        <td><a href="<?= site_url('admin/projects/edit/' . $row->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a> <?php if ($row->status !== 'published'): ?><a href="<?= site_url('admin/projects/publish/' . $row->id); ?>" class="btn btn-sm btn-outline-success">Publish</a><?php else: ?><a href="<?= site_url('admin/projects/unpublish/' . $row->id); ?>" class="btn btn-sm btn-outline-warning">Unpublish</a><?php endif; ?> <a href="<?= site_url('admin/projects/delete/' . $row->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus project ini?')">Hapus</a></td>
                    </tr><?php endforeach; ?>
                <?php if (empty($projects)): ?><tr>
                        <td colspan="8" class="text-center text-muted">Belum ada project.</td>
                    </tr><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>