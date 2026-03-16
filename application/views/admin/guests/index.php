<?php $this->load->view('admin/layout/header'); ?>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>

<div class="card table-card mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <strong>Guest Manager</strong><br>
            <small class="text-muted">Project: <?= html_escape($project->title); ?> (<?= html_escape($project->slug); ?>)</small>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            <a href="<?= site_url('admin/projects'); ?>" class="btn btn-outline-secondary btn-sm">Kembali ke Projects</a>
            <?php if (!empty($can_do['guests_export'])): ?><a href="<?= site_url('admin/guests/import_template/'.$project->id); ?>" class="btn btn-outline-dark btn-sm">Template CSV</a><?php endif; ?>
            <?php if (!empty($can_do['guests_export'])): ?><a href="<?= site_url('admin/guests/export/'.$project->id); ?>" class="btn btn-success btn-sm">Export CSV</a><?php endif; ?>
            <?php if (!empty($can_do['guests_export'])): ?><a href="<?= site_url('admin/guests/export-xlsx/'.$project->id); ?>" class="btn btn-outline-success btn-sm">Export XLSX</a><?php endif; ?>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="copyAllLinks()">Copy Semua Link</button>
            <button type="button" class="btn btn-primary btn-sm" onclick="copyBulkWa()">Copy WA Blast</button>
        </div>
    </div>
    <div class="card-body">
        <div class="row g-4">
            <div class="col-lg-5">
                <h6>Tambah Manual</h6>
                <form method="post" action="<?= site_url('admin/guests/store/'.$project->id); ?>">
                    <div class="mb-2"><label class="form-label">Nama Tamu</label><input type="text" name="guest_name" class="form-control" required></div>
                    <div class="mb-2"><label class="form-label">Phone</label><input type="text" name="phone" class="form-control" placeholder="62812xxxx"></div>
                    <div class="mb-3"><label class="form-label">Kategori</label><input type="text" name="category" class="form-control" placeholder="Keluarga / VIP / Teman"></div>
                    <button class="btn btn-dark btn-sm">Tambah Guest</button>
                </form>
            </div>
            <div class="col-lg-7">
                <h6>Import CSV / XLSX</h6>
                <form method="post" action="<?= site_url('admin/guests/import/'.$project->id); ?>" enctype="multipart/form-data">
                    <div class="mb-2"><input type="file" name="import_file" class="form-control" accept=".csv,.xlsx" required></div>
                    <div class="form-text mb-3">Kolom yang dibaca: nama_tamu, phone, kategori. Bisa upload CSV atau XLSX sederhana dari sheet pertama.</div>
                    <?php if (!empty($can_do['guests_import'])): ?><button class="btn btn-primary btn-sm">Import Guests</button><?php else: ?><div class="text-muted small">Role Anda tidak punya akses import guest.</div><?php endif; ?>
                </form>
                <div class="mt-4">
                    <label class="form-label">Template WA Blast Helper</label>
                    <textarea id="wa-bulk-message" class="form-control" rows="6" readonly><?= html_escape($wa_bulk_message); ?></textarea>
                    <div class="form-text">Berisi daftar nama tamu + link personal. Cocok untuk dibagikan ke CS atau diproses manual di WhatsApp.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card table-card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center"><strong>Daftar Tamu</strong><span class="badge text-bg-dark"><?= count($guests); ?> tamu</span></div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead><tr><th>#</th><th>Nama</th><th>Phone</th><th>Status</th><th>Link Personal</th><th>WA</th><th>Aksi</th></tr></thead>
            <tbody>
            <?php foreach ($guests as $i => $row): ?>
                <?php $link = guest_project_url($project, $row); ?>
                <?php $waText = rawurlencode(wa_invitation_message($project, $row)); ?>
                <?php $waPhone = wa_phone($row->phone); ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><strong><?= html_escape($row->guest_name); ?></strong><br><small class="text-muted"><?= html_escape($row->category); ?></small></td>
                    <td><?= html_escape($row->phone); ?></td>
                    <td><?php if (!empty($row->is_opened)): ?><span class="badge text-bg-success">Sudah dibuka</span><br><small><?= html_escape($row->opened_at); ?></small><?php else: ?><span class="badge text-bg-secondary">Belum dibuka</span><?php endif; ?></td>
                    <td style="min-width:260px;"><div class="input-group input-group-sm"><input type="text" readonly class="form-control guest-link" value="<?= html_escape($link); ?>"><button type="button" class="btn btn-outline-secondary" onclick="copySingle(this)">Copy</button></div></td>
                    <td style="min-width:260px;">
                        <?php if ($waPhone): ?><a class="btn btn-success btn-sm" target="_blank" href="https://wa.me/<?= $waPhone; ?>?text=<?= $waText; ?>">Share WA</a><?php else: ?><span class="text-muted small">Isi phone agar bisa klik WA</span><?php endif; ?>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="copyWaMessage(this)" data-message="<?= html_escape(wa_invitation_message($project, $row)); ?>">Copy Pesan</button>
                        <details class="mt-2"><summary class="small">Preview pesan</summary><div class="small mt-2" style="white-space:pre-line;"><?= html_escape(wa_invitation_message($project, $row)); ?></div></details>
                    </td>
                    <td><?php if (!empty($can_do['guests_delete'])): ?><a href="<?= site_url('admin/guests/delete/'.$row->id); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus tamu ini?')">Hapus</a><?php endif; ?></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($guests)): ?><tr><td colspan="7" class="text-center text-muted py-4">Belum ada tamu. Tambah manual atau import file.</td></tr><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
function copyText(value){if(navigator.clipboard&&navigator.clipboard.writeText){navigator.clipboard.writeText(value).then(function(){alert('Berhasil di-copy');});}else{var ta=document.createElement('textarea');ta.value=value;document.body.appendChild(ta);ta.select();document.execCommand('copy');document.body.removeChild(ta);alert('Berhasil di-copy');}}
function copySingle(btn){copyText(btn.parentNode.querySelector('input').value);} 
function copyAllLinks(){var links=Array.from(document.querySelectorAll('.guest-link')).map(function(el){return el.value;}).join("
");copyText(links);} 
function copyWaMessage(btn){copyText(btn.getAttribute('data-message'));}
function copyBulkWa(){copyText(document.getElementById('wa-bulk-message').value);} 
</script>
<?php $this->load->view('admin/layout/footer'); ?>
