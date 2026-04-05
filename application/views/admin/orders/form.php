<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="<?= isset($order) ? site_url('admin/orders/update/' . $order->id) : site_url('admin/orders/store'); ?>">
            <div class="row g-3">
                <div class="col-md-3"><label class="form-label">Order No</label><input name="order_no" class="form-control" value="<?= isset($order) ? html_escape($order->order_no) : html_escape($next_order_no); ?>" required></div>
                <div class="col-md-5"><label class="form-label">Customer</label><select name="customer_id" class="form-select" required>
                        <option value="">Pilih customer</option><?php foreach ($customers as $c): ?><option value="<?= $c->id; ?>" <?= isset($order) && $order->customer_id == $c->id ? 'selected' : ''; ?>><?= html_escape($c->name); ?></option><?php endforeach; ?>
                    </select></div>
                <div class="col-md-4"><label class="form-label">PIC / Assigned User</label><select name="assigned_user_id" class="form-select">
                        <option value="">-</option><?php foreach ($users as $u): ?><option value="<?= $u->id; ?>" <?= isset($order) && $order->assigned_user_id == $u->id ? 'selected' : ''; ?>><?= html_escape($u->name); ?></option><?php endforeach; ?>
                    </select></div>
                <div class="col-md-4"><label class="form-label">Product Type</label><?php $pv = isset($order) ? $order->product_type : 'invitation'; ?><select name="product_type" class="form-select"><?php foreach ($product_types as $pt): ?><option value="<?= html_escape($pt->code); ?>" <?= $pv == $pt->code ? 'selected' : ''; ?>><?= html_escape($pt->name); ?></option><?php endforeach; ?></select></div>
                <div class="col-md-4"><label class="form-label">Package</label><input type="text" name="package_name" class="form-control" value="<?= isset($order) ? html_escape($order->package_name) : 'Premium'; ?>"></div>
                <div class="col-md-4"><label class="form-label">Template</label><select name="template_id" class="form-select">
                        <option value="">Pilih template</option><?php foreach ($templates as $t): ?><option value="<?= $t->id; ?>" <?= isset($order) && $order->template_id == $t->id ? 'selected' : ''; ?>><?= html_escape($t->name . ' (' . $t->product_type . ')'); ?></option><?php endforeach; ?>
                    </select></div>
                <div class="col-md-3"><label class="form-label">Price</label><input type="number" name="price" class="form-control" value="<?= isset($order) ? (int)$order->price : 0; ?>"></div>
                <div class="col-md-3"><label class="form-label">Discount</label><input type="number" name="discount" class="form-control" value="<?= isset($order) ? (int)$order->discount : 0; ?>"></div>
                <div class="col-md-3"><label class="form-label">Final Price</label><input type="number" name="final_price" class="form-control" value="<?= isset($order) ? (int)$order->final_price : 0; ?>"></div>
                <div class="col-md-3"><label class="form-label">DP Amount</label><input type="number" name="dp_amount" class="form-control" value="<?= isset($order) ? (int)$order->dp_amount : 0; ?>"></div>
                <div class="col-md-3"><label class="form-label">Paid Amount</label><input type="number" name="paid_amount" class="form-control" value="<?= isset($order) ? (int)$order->paid_amount : 0; ?>"></div>
                <div class="col-md-3"><label class="form-label">Payment Status</label><?php $pay = isset($order) ? $order->payment_status : 'unpaid'; ?><select name="payment_status" class="form-select"><?php foreach ($payment_options as $opt): ?><option value="<?= $opt; ?>" <?= $pay == $opt ? 'selected' : ''; ?>><?= strtoupper($opt); ?></option><?php endforeach; ?></select></div>
                <div class="col-md-3"><label class="form-label">Payment Method</label><?php $pm = isset($order) ? $order->payment_method : 'bank_transfer'; ?><select name="payment_method" class="form-select"><?php foreach ($payment_methods as $opt): ?><option value="<?= $opt; ?>" <?= $pm == $opt ? 'selected' : ''; ?>><?= html_escape(status_label($opt)); ?></option><?php endforeach; ?></select></div>
                <div class="col-md-3"><label class="form-label">Payment Date</label><input type="date" name="payment_date" class="form-control" value="<?= isset($order) ? html_escape($order->payment_date) : ''; ?>"></div>
                <div class="col-md-4"><label class="form-label">Status Order</label><?php $st = isset($order) ? $order->status : 'new'; ?><select name="status" class="form-select"><?php foreach ($status_options as $opt): ?><option value="<?= $opt; ?>" <?= $st == $opt ? 'selected' : ''; ?>><?= html_escape(status_label($opt)); ?></option><?php endforeach; ?></select></div>
                <div class="col-md-4"><label class="form-label">Deadline</label><input type="date" name="deadline_date" class="form-control" value="<?= isset($order) ? html_escape($order->deadline_date) : ''; ?>"></div>
                <div class="col-md-4"><label class="form-label">Upload Bukti Pembayaran</label><input type="file" name="payment_proof_file" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif,.pdf"></div>
                <div class="col-md-8"><label class="form-label">Bukti Pembayaran URL / Path Cadangan</label><input type="text" name="payment_proof" class="form-control" value="<?= isset($order) ? html_escape($order->payment_proof ?? '') : ''; ?>"></div>
                <?php if (isset($order) && !empty($order->payment_proof)): ?><div class="col-md-4">
                        <div class="border rounded p-2"><?php if (preg_match('/\.pdf$/i', $order->payment_proof)): ?><a href="<?= asset_or_url($order->payment_proof); ?>" target="_blank">Lihat PDF bukti pembayaran</a><?php else: ?><img src="<?= asset_or_url($order->payment_proof); ?>" class="img-fluid rounded border" alt="proof"><?php endif; ?></div>
                    </div><?php endif; ?>
                <div class="col-12"><label class="form-label">Catatan</label><textarea name="notes" class="form-control" rows="4"><?= isset($order) ? html_escape($order->notes) : ''; ?></textarea></div>
                <div class="col-12"><button class="btn btn-dark">Simpan</button> <a href="<?= site_url('admin/orders'); ?>" class="btn btn-outline-secondary">Kembali</a></div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>