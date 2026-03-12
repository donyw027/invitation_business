<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-body">
        <form method="post" action="<?= isset($order) ? site_url('admin/orders/update/'.$order->id) : site_url('admin/orders/store'); ?>">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Customer</label>
                    <select name="customer_id" class="form-select" required>
                        <option value="">Pilih customer</option>
                        <?php foreach ($customers as $c): ?>
                            <option value="<?= $c->id; ?>" <?= isset($order) && $order->customer_id == $c->id ? 'selected' : ''; ?>><?= html_escape($c->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Product Type</label>
                    <?php $pv = isset($order) ? $order->product_type : 'wedding'; ?>
                    <select name="product_type" class="form-select">
                        <option value="wedding" <?= $pv == 'wedding' ? 'selected' : ''; ?>>Wedding Invitation</option>
                        <option value="greeting_card" <?= $pv == 'greeting_card' ? 'selected' : ''; ?>>Greeting Card</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Package</label>
                    <input type="text" name="package_name" class="form-control" value="<?= isset($order) ? html_escape($order->package_name) : 'Premium'; ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Template</label>
                    <select name="template_id" class="form-select">
                        <option value="">Pilih template</option>
                        <?php foreach ($templates as $t): ?>
                            <option value="<?= $t->id; ?>" <?= isset($order) && $order->template_id == $t->id ? 'selected' : ''; ?>><?= html_escape($t->name . ' (' . $t->product_type . ')'); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Payment Status</label>
                    <?php $pay = isset($order) ? $order->payment_status : 'paid'; ?>
                    <select name="payment_status" class="form-select">
                        <option value="unpaid" <?= $pay == 'unpaid' ? 'selected' : ''; ?>>Unpaid</option>
                        <option value="dp" <?= $pay == 'dp' ? 'selected' : ''; ?>>DP</option>
                        <option value="paid" <?= $pay == 'paid' ? 'selected' : ''; ?>>Paid</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status Order</label>
                    <?php $st = isset($order) ? $order->status : 'new'; ?>
                    <select name="status" class="form-select">
                        <option value="new" <?= $st == 'new' ? 'selected' : ''; ?>>New</option>
                        <option value="in_progress" <?= $st == 'in_progress' ? 'selected' : ''; ?>>In Progress</option>
                        <option value="completed" <?= $st == 'completed' ? 'selected' : ''; ?>>Completed</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Catatan</label>
                    <textarea name="notes" class="form-control" rows="4"><?= isset($order) ? html_escape($order->notes) : ''; ?></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-dark">Simpan</button>
                    <a href="<?= site_url('admin/orders'); ?>" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
