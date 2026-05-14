<?php $this->load->view('admin/layout/header'); ?>

<style>
.quick-step-wrap{max-width:1100px;margin:0 auto}.quick-steps{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:18px}.quick-step{flex:1;min-width:160px;border:1px solid #e5e7eb;background:#fff;border-radius:16px;padding:12px 14px;color:#6b7280}.quick-step.active{border-color:#111827;color:#111827;box-shadow:0 10px 28px rgba(15,23,42,.08)}.quick-step .num{width:26px;height:26px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#f3f4f6;margin-right:8px;font-weight:700}.quick-step.active .num{background:#111827;color:#fff}.wizard-card{border:1px solid #edf0f5;border-radius:20px;box-shadow:0 10px 28px rgba(15,23,42,.05);overflow:hidden}.mode-card{border:1px solid #e5e7eb;border-radius:18px;padding:16px;background:#fff;height:100%;cursor:pointer}.mode-card input{margin-right:8px}.quick-muted{font-size:13px;color:#6b7280}.hidden-box{display:none}
</style>

<div class="quick-step-wrap">
    <div class="quick-steps">
        <div class="quick-step active"><span class="num">1</span> Customer</div>
        <div class="quick-step"><span class="num">2</span> Order</div>
        <div class="quick-step"><span class="num">3</span> Project</div>
    </div>

    <div class="card wizard-card">
        <div class="card-body p-4">
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-4">
                <div>
                    <h4 class="mb-1">Quick Create - Customer</h4>
                    <div class="quick-muted">Pilih customer lama dari database, atau buat customer baru tanpa keluar dari wizard.</div>
                </div>
                <a href="<?= site_url('admin/quick-create/reset'); ?>" class="btn btn-outline-secondary btn-sm">Reset Flow</a>
            </div>

            <form method="post" action="<?= site_url('admin/quick-create/customer'); ?>">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="mode-card d-block">
                            <input type="radio" name="customer_mode" value="existing" checked> <strong>Existing Customer</strong>
                            <div class="quick-muted mt-1">Customer sudah pernah order, tinggal pilih dari database.</div>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label class="mode-card d-block">
                            <input type="radio" name="customer_mode" value="new"> <strong>New Customer</strong>
                            <div class="quick-muted mt-1">Input customer baru, lalu lanjut buat order.</div>
                        </label>
                    </div>
                </div>

                <div id="existingCustomerBox" class="border rounded-4 p-3 mb-3">
                    <label class="form-label">Pilih Customer</label>
                    <select name="customer_id" class="form-select">
                        <option value="">Pilih customer</option>
                        <?php foreach (($customers ?? array()) as $c): ?>
                            <option value="<?= $c->id; ?>"><?= html_escape($c->name); ?><?= !empty($c->phone) ? ' - ' . html_escape($c->phone) : ''; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="newCustomerBox" class="border rounded-4 p-3 mb-3 hidden-box">
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label">Nama Customer</label><input type="text" name="name" class="form-control"></div>
                        <div class="col-md-3"><label class="form-label">No. WhatsApp</label><input type="text" name="phone" class="form-control"></div>
                        <div class="col-md-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Source</label><input type="text" name="source" class="form-control" placeholder="Instagram / WhatsApp / Referral"></div>
                        <div class="col-md-8"><label class="form-label">Alamat</label><input type="text" name="address" class="form-control"></div>
                        <div class="col-12"><label class="form-label">Catatan</label><textarea name="notes" class="form-control" rows="3"></textarea></div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-outline-secondary">Batal</a>
                    <button class="btn btn-dark">Next: Buat Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('input[name="customer_mode"]').forEach(function(el){
    el.addEventListener('change', function(){
        document.getElementById('existingCustomerBox').style.display = this.value === 'existing' ? 'block' : 'none';
        document.getElementById('newCustomerBox').style.display = this.value === 'new' ? 'block' : 'none';
    });
});
</script>

<?php $this->load->view('admin/layout/footer'); ?>
