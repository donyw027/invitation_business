<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card"><div class="card-body">
<form method="post" enctype="multipart/form-data" action="<?= isset($row) ? site_url('admin/users/update/'.$row->id) : site_url('admin/users/store'); ?>">
    <div class="row g-3">
        <div class="col-md-6"><label class="form-label">Name</label><input name="name" class="form-control" value="<?= isset($row)?html_escape($row->name):''; ?>" required></div>
        <div class="col-md-6"><label class="form-label">Username</label><input name="username" class="form-control" value="<?= isset($row)?html_escape($row->username):''; ?>" required></div>
        <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="<?= isset($row)?html_escape($row->email):''; ?>"></div>
        <div class="col-md-3"><label class="form-label">Role</label><select name="role" class="form-select"><?php foreach($role_options as $k=>$label): ?><option value="<?= $k; ?>" <?= isset($row) && $row->role==$k ? 'selected':''; ?>><?= html_escape($label); ?></option><?php endforeach; ?></select></div>
        <div class="col-md-3"><label class="form-label">Active</label><select name="is_active" class="form-select"><option value="1" <?= !isset($row) || $row->is_active ? 'selected':''; ?>>Yes</option><option value="0" <?= isset($row) && !$row->is_active ? 'selected':''; ?>>No</option></select></div>
        <div class="col-md-6"><label class="form-label">Photo</label><input type="file" name="photo" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif"></div>
        <?php if(isset($row) && !empty($row->photo)): ?><div class="col-md-2"><img src="<?= asset_or_url($row->photo); ?>" class="img-fluid rounded border"></div><?php endif; ?>
        <div class="col-md-6"><label class="form-label">Password <?= isset($row)?'<small class="text-muted">(kosongkan jika tidak diubah)</small>':''; ?></label><input type="password" name="password" class="form-control" <?= isset($row)?'':'required'; ?>></div>
        <div class="col-12"><button class="btn btn-dark">Simpan</button> <a href="<?= site_url('admin/users'); ?>" class="btn btn-outline-secondary">Kembali</a></div>
    </div>
</form>
</div></div>
<?php $this->load->view('admin/layout/footer'); ?>
