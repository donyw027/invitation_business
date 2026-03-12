<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-body">
        <form method="post" action="<?= isset($customer) ? site_url('admin/customers/update/'.$customer->id) : site_url('admin/customers/store'); ?>">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Customer</label>
                    <input type="text" name="name" class="form-control" value="<?= isset($customer) ? html_escape($customer->name) : ''; ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">No. WhatsApp</label>
                    <input type="text" name="phone" class="form-control" value="<?= isset($customer) ? html_escape($customer->phone) : ''; ?>">
                </div>
                <div class="col-12">
                    <label class="form-label">Catatan</label>
                    <textarea name="notes" class="form-control" rows="4"><?= isset($customer) ? html_escape($customer->notes) : ''; ?></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-dark">Simpan</button>
                    <a href="<?= site_url('admin/customers'); ?>" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
