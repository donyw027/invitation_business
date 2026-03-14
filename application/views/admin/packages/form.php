<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card"><div class="card-body">
<form method="post" action="<?= isset($row) ? site_url('admin/packages/update/'.$row->id) : site_url('admin/packages/store'); ?>">
    <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Product Type</label><select name="product_type" class="form-select" required><?php foreach($product_types as $pt): ?><option value="<?= html_escape($pt->code); ?>" <?= isset($row) && $row->product_type==$pt->code ? 'selected':''; ?>><?= html_escape($pt->name); ?></option><?php endforeach; ?></select></div>
        <div class="col-md-4"><label class="form-label">Name</label><input name="name" class="form-control" value="<?= isset($row)?html_escape($row->name):''; ?>" required></div>
        <div class="col-md-2"><label class="form-label">Price</label><input type="number" name="price" class="form-control" value="<?= isset($row)?(int)$row->price:0; ?>"></div>
        <div class="col-md-2"><label class="form-label">Old Price</label><input type="number" name="old_price" class="form-control" value="<?= isset($row)?(int)$row->old_price:0; ?>"></div>
        <div class="col-md-12"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3"><?= isset($row)?html_escape($row->description):''; ?></textarea></div>
        <div class="col-md-12"><label class="form-label">Features (1 baris = 1 fitur)</label><textarea name="features" class="form-control" rows="6"><?= isset($row)?html_escape($row->features):''; ?></textarea></div>
        <div class="col-md-4"><label class="form-label">Button Text</label><input name="button_text" class="form-control" value="<?= isset($row)?html_escape($row->button_text):'Pilih Paket'; ?>"></div>
        <div class="col-md-2"><label class="form-label">Sort</label><input type="number" name="sort_order" class="form-control" value="<?= isset($row)?(int)$row->sort_order:0; ?>"></div>
        <div class="col-md-2"><label class="form-label">Featured</label><select name="is_featured" class="form-select"><option value="1" <?= isset($row) && $row->is_featured ? 'selected':''; ?>>Yes</option><option value="0" <?= !isset($row) || !$row->is_featured ? 'selected':''; ?>>No</option></select></div>
        <div class="col-md-2"><label class="form-label">Active</label><select name="is_active" class="form-select"><option value="1" <?= !isset($row) || $row->is_active ? 'selected':''; ?>>Yes</option><option value="0" <?= isset($row) && !$row->is_active ? 'selected':''; ?>>No</option></select></div>
        <div class="col-12"><button class="btn btn-dark">Simpan</button> <a href="<?= site_url('admin/packages'); ?>" class="btn btn-outline-secondary">Kembali</a></div>
    </div>
</form>
</div></div>
<?php $this->load->view('admin/layout/footer'); ?>
