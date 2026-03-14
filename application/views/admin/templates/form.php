<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card"><div class="card-body">
<form method="post" action="<?= isset($row) ? site_url('admin/templates/update/'.$row->id) : site_url('admin/templates/store'); ?>">
    <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Name</label><input name="name" class="form-control" value="<?= isset($row)?html_escape($row->name):''; ?>" required></div>
        <div class="col-md-4"><label class="form-label">Folder</label><input name="folder" class="form-control" value="<?= isset($row)?html_escape($row->folder):''; ?>" placeholder="romantic" required></div>
        <div class="col-md-4"><label class="form-label">Product Type</label><select name="product_type" class="form-select" required><?php foreach($product_types as $pt): ?><option value="<?= html_escape($pt->code); ?>" <?= isset($row) && $row->product_type==$pt->code ? 'selected':''; ?>><?= html_escape($pt->name); ?></option><?php endforeach; ?></select></div>
        <div class="col-md-6"><label class="form-label">Thumbnail URL</label><input name="thumbnail" class="form-control" value="<?= isset($row)?html_escape($row->thumbnail):''; ?>"></div>
        <div class="col-md-6"><label class="form-label">Demo URL</label><input name="demo_url" class="form-control" value="<?= isset($row)?html_escape($row->demo_url):''; ?>"></div>
        <div class="col-md-8"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3"><?= isset($row)?html_escape($row->description):''; ?></textarea></div>
        <div class="col-md-2"><label class="form-label">Sort</label><input type="number" name="sort_order" class="form-control" value="<?= isset($row)?(int)$row->sort_order:0; ?>"></div>
        <div class="col-md-2"><label class="form-label">Active</label><select name="is_active" class="form-select"><option value="1" <?= !isset($row) || $row->is_active ? 'selected':''; ?>>Yes</option><option value="0" <?= isset($row) && !$row->is_active ? 'selected':''; ?>>No</option></select></div>
        <div class="col-12"><button class="btn btn-dark">Simpan</button> <a href="<?= site_url('admin/templates'); ?>" class="btn btn-outline-secondary">Kembali</a></div>
    </div>
</form>
</div></div>
<?php $this->load->view('admin/layout/footer'); ?>
