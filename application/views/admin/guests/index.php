<?php $this->load->view('admin/layout/header'); ?>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>

<div class="card table-card mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <div>
            <strong>Guest Manager</strong><br>
            <small class="text-muted">Project: <?= html_escape($project->title); ?> (<?= html_escape($project->slug); ?>)</small>
        </div>
        <div>
            <a href="<?= site_url('admin/projects'); ?>" class="btn btn-outline-secondary btn-sm">Kembali ke Projects</a>
            <a href="<?= site_url('admin/guests/import_template/'.$project->id); ?>" class="btn btn-outline-dark btn-sm">Download Template CSV</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row g-4">
            <div class="col-lg-5">
                <h6>Tambah Manual</h6>
                <form method="post" action="<?= site_url('admin/guests/store/'.$project->id); ?>">
                    <div class="mb-2">
                        <label class="form-label">Nama Tamu</label>
                        <input type="text" name="guest_name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="62812xxxx">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="category" class="form-control" placeholder="Keluarga / VIP / Teman">
                    </div>
                    <button class="btn btn-dark btn-sm">Tambah Guest</button>
                </form>
            </div>
            <div class="col-lg-7">
                <h6>Import CSV / XLSX</h6>
                <form method="post" action="<?= site_url('admin/guests/import/'.$project->id); ?>" enctype="multipart/form-data">
                    <div class="mb-2">
                        <input type="file" name="import_file" class="form-control" accept=".csv,.xlsx" required>
                    </div>
                    <div class="form-text mb-3">Kolom yang dibaca: nama_tamu, phone, kategori. Bisa upload CSV atau XLSX sederhana dari sheet pertama.</div>
                    <button class="btn btn-primary btn-sm">Import Guests</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card table-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>Daftar Tamu</strong>
        <span class="badge text-bg-dark"><?= count($guests); ?> tamu</span>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Link Personal</th>
                    <th>WA</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($guests as $i => $row): ?>
                <?php $link = guest_project_url($project, $row); ?>
                <?php $waText = rawurlencode(wa_invitation_message($project, $row)); ?>
                <?php $waPhone = wa_phone($row->phone); ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td>
                        <strong><?= html_escape($row->guest_name); ?></strong><br>
                        <small class="text-muted"><?= html_escape($row->category); ?></small>
                    </td>
                    <td><?= html_escape($row->phone); ?></td>
                    <td>
                        <?php if (!empty($row->is_opened)): ?>
                            <span class="badge text-bg-success">Sudah dibuka</span><br>
                            <small><?= html_escape($row->opened_at); ?></small>
                        <?php else: ?>
                            <span class="badge text-bg-secondary">Belum dibuka</span>
                        <?php endif; ?>
                    </td>
                    <td style="min-width:260px;">
                        <input type="text" readonly class="form-control form-control-sm" value="<?= html_escape($link); ?>">
                    </td>
                    <td style="min-width:220px;">
                        <?php if ($waPhone): ?>
                            <a class="btn btn-success btn-sm" target="_blank" href="https://wa.me/<?= $waPhone; ?>?text=<?= $waText; ?>">Share WA</a>
                        <?php else: ?>
                            <span class="text-muted small">Isi phone agar bisa klik WA</span>
                        <?php endif; ?>
                        <details class="mt-2">
                            <summary class="small">Preview pesan</summary>
                            <div class="small mt-2" style="white-space:pre-line;"><?= html_escape(wa_invitation_message($project, $row)); ?></div>
                        </details>
                    </td>
                    <td>
                        <a href="<?= site_url('admin/guests/delete/'.$row->id); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus tamu ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($guests)): ?>
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada tamu. Tambah manual atau import file.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
