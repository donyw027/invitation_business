<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card"><div class="card-body">
<form method="post" enctype="multipart/form-data" action="<?= isset($row) ? site_url('admin/templates/update/'.$row->id) : site_url('admin/templates/store'); ?>">
    <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Name</label><input name="name" class="form-control" value="<?= isset($row)?html_escape($row->name):''; ?>" required></div>
        <div class="col-md-4"><label class="form-label">Folder</label><input name="folder" class="form-control" value="<?= isset($row)?html_escape($row->folder):''; ?>" placeholder="romantic" required></div>
        <div class="col-md-4"><label class="form-label">Product Type</label><select name="product_type" class="form-select" required><?php foreach($product_types as $pt): ?><option value="<?= html_escape($pt->code); ?>" <?= isset($row) && $row->product_type==$pt->code ? 'selected':''; ?>><?= html_escape($pt->name); ?></option><?php endforeach; ?></select></div>
        <div class="col-md-6"><label class="form-label">Upload Thumbnail</label><input type="file" name="thumbnail_file" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif"></div>
        <div class="col-md-6"><label class="form-label">Thumbnail URL / Path Cadangan</label><input name="thumbnail" class="form-control" value="<?= isset($row)?html_escape($row->thumbnail):''; ?>"></div>
        <?php if (isset($row) && !empty($row->thumbnail)): ?>
        <div class="col-md-3"><img src="<?= asset_or_url($row->thumbnail); ?>" class="img-fluid rounded border" alt="thumb"></div>
        <?php endif; ?>
        <?php if (isset($row) && !empty($row->preview_mobile)): ?><div class="col-md-3"><label class="form-label d-block">Preview Mobile</label><img src="<?= asset_or_url($row->preview_mobile); ?>" class="img-fluid rounded border" alt="mobile preview"></div><?php endif; ?>
        <?php if (isset($row) && !empty($row->preview_desktop)): ?><div class="col-md-3"><label class="form-label d-block">Preview Desktop</label><img src="<?= asset_or_url($row->preview_desktop); ?>" class="img-fluid rounded border" alt="desktop preview"></div><?php endif; ?>
        <div class="col-md-6"><label class="form-label">Demo URL</label><input name="demo_url" class="form-control" value="<?= isset($row)?html_escape($row->demo_url):''; ?>"></div>
        <div class="col-md-6"><label class="form-label">Preview Mobile Upload</label><input type="file" name="preview_mobile_file" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif"></div>
        <div class="col-md-6"><label class="form-label">Preview Mobile URL / Path</label><input name="preview_mobile" class="form-control" value="<?= isset($row)?html_escape($row->preview_mobile ?? ''):''; ?>"></div>
        <div class="col-md-6"><label class="form-label">Preview Desktop Upload</label><input type="file" name="preview_desktop_file" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif"></div>
        <div class="col-md-6"><label class="form-label">Preview Desktop URL / Path</label><input name="preview_desktop" class="form-control" value="<?= isset($row)?html_escape($row->preview_desktop ?? ''):''; ?>"></div>
        <div class="col-md-8"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3"><?= isset($row)?html_escape($row->description):''; ?></textarea></div>
        <div class="col-md-2"><label class="form-label">Sort</label><input type="number" name="sort_order" class="form-control" value="<?= isset($row)?(int)$row->sort_order:0; ?>"></div>
        <div class="col-md-2"><label class="form-label">Active</label><select name="is_active" class="form-select"><option value="1" <?= !isset($row) || $row->is_active ? 'selected':''; ?>>Yes</option><option value="0" <?= isset($row) && !$row->is_active ? 'selected':''; ?>>No</option></select></div>
        <div class="col-12"><button class="btn btn-dark">Simpan</button> <a href="<?= site_url('admin/templates'); ?>" class="btn btn-outline-secondary">Kembali</a></div>
    </div>
</form>
</div></div>
<?php $this->load->view('admin/layout/footer'); ?>
