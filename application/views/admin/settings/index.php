<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card"><div class="card-body">
<form method="post">
    <div class="row g-3">
        <div class="col-md-6"><label class="form-label">Brand Name</label><input name="brand_name" class="form-control" value="<?= html_escape($brand_name); ?>"></div>
        <div class="col-md-6"><label class="form-label">WhatsApp Number</label><input name="wa_number" class="form-control" value="<?= html_escape($wa_number); ?>" placeholder="6281234567890"></div>
        <div class="col-md-6"><label class="form-label">Auto Approve Wishes</label><select name="auto_approve_wishes" class="form-select"><option value="0" <?= $auto_approve_wishes === '0' ? 'selected' : ''; ?>>Tidak, masuk pending dulu</option><option value="1" <?= $auto_approve_wishes === '1' ? 'selected' : ''; ?>>Ya, langsung tampil</option></select></div>
        <div class="col-12"><button class="btn btn-dark">Simpan Settings</button></div>
    </div>
</form>
</div></div>
<?php $this->load->view('admin/layout/footer'); ?>
