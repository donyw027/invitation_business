<?php $this->load->view('admin/layout/header'); ?>
<?php
$status_options = $status_options ?? array('new', 'waiting_payment', 'paid', 'in_progress', 'completed', 'cancelled');
$payment_options = $payment_options ?? array('unpaid', 'dp', 'paid');
$payment_methods = $payment_methods ?? array('bank_transfer', 'cash', 'qris', 'ewallet');
?>
<style>
.quick-step-wrap{max-width:1100px;margin:0 auto}.quick-steps{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:18px}.quick-step{flex:1;min-width:160px;border:1px solid #e5e7eb;background:#fff;border-radius:16px;padding:12px 14px;color:#6b7280}.quick-step.active{border-color:#111827;color:#111827;box-shadow:0 10px 28px rgba(15,23,42,.08)}.quick-step.done{color:#111827}.quick-step .num{width:26px;height:26px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#f3f4f6;margin-right:8px;font-weight:700}.quick-step.active .num{background:#111827;color:#fff}.quick-step.done .num{background:#dcfce7;color:#166534}.wizard-card{border:1px solid #edf0f5;border-radius:20px;box-shadow:0 10px 28px rgba(15,23,42,.05);overflow:hidden}.quick-muted{font-size:13px;color:#6b7280}.customer-pill{border:1px solid #e5e7eb;background:#f9fafb;border-radius:16px;padding:12px 14px}
</style>

<div class="quick-step-wrap">
    <div class="quick-steps">
        <div class="quick-step done"><span class="num">✓</span> Customer</div>
        <div class="quick-step active"><span class="num">2</span> Order</div>
        <div class="quick-step"><span class="num">3</span> Project</div>
    </div>

    <div class="card wizard-card">
        <div class="card-body p-4">
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
                <div>
                    <h4 class="mb-1">Quick Create - Order</h4>
                    <div class="quick-muted">Order ini otomatis terhubung ke customer yang dipilih pada step pertama.</div>
                </div>
                <a href="<?= site_url('admin/quick-create/customer'); ?>" class="btn btn-outline-secondary btn-sm">Kembali ke Customer</a>
            </div>

            <?php if (!empty($customer)): ?>
                <div class="customer-pill mb-4">
                    <strong><?= html_escape($customer->name); ?></strong>
                    <div class="quick-muted"><?= html_escape($customer->phone ?? '-'); ?><?= !empty($customer->email) ? ' · ' . html_escape($customer->email) : ''; ?></div>
                </div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data" action="<?= site_url('admin/quick-create/order'); ?>">
                <div class="row g-3">
                    <div class="col-md-3"><label class="form-label">Order No</label><input name="order_no" class="form-control" value="<?= html_escape($next_order_no ?? ''); ?>" required></div>
                    <div class="col-md-5"><label class="form-label">Customer</label><input class="form-control" value="<?= html_escape($customer->name ?? ''); ?>" readonly></div>
                    <div class="col-md-4"><label class="form-label">PIC / Assigned User</label><select name="assigned_user_id" class="form-select"><option value="">-</option><?php foreach (($users ?? array()) as $u): ?><option value="<?= $u->id; ?>"><?= html_escape($u->name); ?></option><?php endforeach; ?></select></div>

                    <div class="col-md-4"><label class="form-label">Product Type</label><select name="product_type" class="form-select"><?php foreach (($product_types ?? array()) as $pt): ?><option value="<?= html_escape($pt->code); ?>"><?= html_escape($pt->name); ?></option><?php endforeach; ?></select></div>
                    <div class="col-md-4"><label class="form-label">Package</label><input type="text" name="package_name" class="form-control" value="Premium"></div>
                    <div class="col-md-4"><label class="form-label">Template</label><select name="template_id" class="form-select"><option value="">Pilih template</option><?php foreach (($templates ?? array()) as $t): ?><option value="<?= $t->id; ?>"><?= html_escape($t->name . ' (' . $t->product_type . ')'); ?></option><?php endforeach; ?></select></div>

                    <div class="col-md-3"><label class="form-label">Price</label><input type="number" name="price" class="form-control" value="0"></div>
                    <div class="col-md-3"><label class="form-label">Discount</label><input type="number" name="discount" class="form-control" value="0"></div>
                    <div class="col-md-3"><label class="form-label">Final Price</label><input type="number" name="final_price" class="form-control" value="0"></div>
                    <div class="col-md-3"><label class="form-label">DP Amount</label><input type="number" name="dp_amount" class="form-control" value="0"></div>
                    <div class="col-md-3"><label class="form-label">Paid Amount</label><input type="number" name="paid_amount" class="form-control" value="0"></div>
                    <div class="col-md-3"><label class="form-label">Payment Status</label><select name="payment_status" class="form-select"><?php foreach ($payment_options as $opt): ?><option value="<?= $opt; ?>"><?= strtoupper($opt); ?></option><?php endforeach; ?></select></div>
                    <div class="col-md-3"><label class="form-label">Payment Method</label><select name="payment_method" class="form-select"><?php foreach ($payment_methods as $opt): ?><option value="<?= $opt; ?>"><?= html_escape(function_exists('status_label') ? status_label($opt) : $opt); ?></option><?php endforeach; ?></select></div>
                    <div class="col-md-3"><label class="form-label">Payment Date</label><input type="date" name="payment_date" class="form-control"></div>
                    <div class="col-md-4"><label class="form-label">Status Order</label><select name="status" class="form-select"><?php foreach ($status_options as $opt): ?><option value="<?= $opt; ?>"><?= html_escape(function_exists('status_label') ? status_label($opt) : $opt); ?></option><?php endforeach; ?></select></div>
                    <div class="col-md-4"><label class="form-label">Deadline</label><input type="date" name="deadline_date" class="form-control"></div>
                    <div class="col-md-4"><label class="form-label">Upload Bukti Pembayaran</label><input type="file" name="payment_proof_file" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif,.pdf"></div>
                    <div class="col-md-8"><label class="form-label">Bukti Pembayaran URL / Path Cadangan</label><input type="text" name="payment_proof" class="form-control"></div>
                    <div class="col-12"><label class="form-label">Catatan</label><textarea name="notes" class="form-control" rows="4"></textarea></div>

                    <div class="col-12 d-flex justify-content-between gap-2 mt-4">
                        <a href="<?= site_url('admin/quick-create/customer'); ?>" class="btn btn-outline-secondary">Back</a>
                        <button class="btn btn-dark">Next: Buat Project</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
