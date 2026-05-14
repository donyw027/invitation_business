<?php $this->load->view('admin/layout/header'); ?>
<?php $status_options = $status_options ?? array('draft', 'waiting_content', 'designing', 'revision', 'approved', 'published', 'archived'); ?>
<style>
.quick-step-wrap{max-width:1100px;margin:0 auto}.quick-steps{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:18px}.quick-step{flex:1;min-width:160px;border:1px solid #e5e7eb;background:#fff;border-radius:16px;padding:12px 14px;color:#6b7280}.quick-step.active{border-color:#111827;color:#111827;box-shadow:0 10px 28px rgba(15,23,42,.08)}.quick-step.done{color:#111827}.quick-step .num{width:26px;height:26px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:#f3f4f6;margin-right:8px;font-weight:700}.quick-step.active .num{background:#111827;color:#fff}.quick-step.done .num{background:#dcfce7;color:#166534}.wizard-card{border:1px solid #edf0f5;border-radius:20px;box-shadow:0 10px 28px rgba(15,23,42,.05);overflow:hidden}.quick-muted{font-size:13px;color:#6b7280}.info-pill{border:1px solid #e5e7eb;background:#f9fafb;border-radius:16px;padding:12px 14px}.field-group{border:1px solid #ebedf2;border-radius:18px;overflow:hidden;margin-bottom:18px;background:#fff}.field-group-header{padding:14px 18px;background:#f9fafb;border-bottom:1px solid #edf0f5}.field-group-header h5{font-size:17px;margin:0;font-weight:700}.field-group-body{padding:18px}.sticky-save-bar{position:sticky;bottom:12px;z-index:20;background:rgba(255,255,255,.95);backdrop-filter:blur(8px);border:1px solid #e5e7eb;border-radius:16px;padding:12px 14px;box-shadow:0 10px 30px rgba(15,23,42,.08)}
</style>

<div class="quick-step-wrap">
    <div class="quick-steps">
        <div class="quick-step done"><span class="num">✓</span> Customer</div>
        <div class="quick-step done"><span class="num">✓</span> Order</div>
        <div class="quick-step active"><span class="num">3</span> Project</div>
    </div>

    <div class="card wizard-card">
        <div class="card-body p-4">
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
                <div>
                    <h4 class="mb-1">Quick Create - Project</h4>
                    <div class="quick-muted">Project akan terhubung ke order yang baru dibuat. Setelah simpan, kamu diarahkan ke edit project untuk publish/gallery/timeline.</div>
                </div>
                <a href="<?= site_url('admin/quick-create/order'); ?>" class="btn btn-outline-secondary btn-sm">Kembali ke Order</a>
            </div>

            <?php if (!empty($order)): ?>
                <div class="info-pill mb-4">
                    <strong><?= html_escape($order->order_no ?: ('Order #' . $order->id)); ?></strong>
                    <div class="quick-muted">
                        <?= html_escape($order->customer_name ?? '-'); ?> · <?= html_escape($order->product_type ?? '-'); ?> · <?= html_escape($order->template_name ?? 'Template belum dipilih'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data" action="<?= site_url('admin/quick-create/project'); ?>">
                <div class="field-group">
                    <div class="field-group-header"><h5>Data Utama Project</h5></div>
                    <div class="field-group-body">
                        <div class="row g-3">
                            <div class="col-md-4"><label class="form-label">Order</label><input class="form-control" value="<?= html_escape($order->order_no ?? ''); ?>" readonly></div>
                            <div class="col-md-4"><label class="form-label">Product Type</label><?php $pv = $order->product_type ?? 'invitation'; ?><select name="product_type" id="productTypeSelect" class="form-select"><?php foreach (($product_types ?? array()) as $pt): ?><option value="<?= html_escape($pt->code); ?>" <?= $pv == $pt->code ? 'selected' : ''; ?>><?= html_escape($pt->name); ?></option><?php endforeach; ?></select></div>
                            <div class="col-md-4"><label class="form-label">PIC / Assigned User</label><?php $au = $order->assigned_user_id ?? ''; ?><select name="assigned_user_id" class="form-select"><option value="">-</option><?php foreach (($users ?? array()) as $u): ?><option value="<?= $u->id; ?>" <?= $au == $u->id ? 'selected' : ''; ?>><?= html_escape($u->name); ?></option><?php endforeach; ?></select></div>
                            <div class="col-md-4"><label class="form-label">Template</label><?php $tid = $order->template_id ?? ''; ?><select name="template_id" id="templateSelect" class="form-select" required><?php foreach (($templates ?? array()) as $t): ?><option value="<?= $t->id; ?>" data-product-type="<?= html_escape($t->product_type); ?>" <?= $tid == $t->id ? 'selected' : ''; ?>><?= html_escape($t->name . ' [' . $t->folder . ']'); ?></option><?php endforeach; ?></select></div>
                            <div class="col-md-5"><label class="form-label">Judul Project</label><input type="text" name="title" class="form-control" value="<?= html_escape(($order->product_type ?? '') === 'greeting_card' ? 'Greeting Card - ' . ($order->customer_name ?? '') : 'Invitation - ' . ($order->customer_name ?? '')); ?>" required></div>
                            <div class="col-md-3"><label class="form-label">Slug URL</label><input type="text" name="slug" class="form-control" placeholder="auto jika kosong"></div>
                            <div class="col-md-3"><label class="form-label">Deadline</label><input type="date" name="deadline_date" class="form-control" value="<?= html_escape($order->deadline_date ?? ''); ?>"></div>
                            <div class="col-md-3"><label class="form-label">Status Project</label><select name="status" class="form-select"><?php foreach ($status_options as $opt): ?><option value="<?= $opt; ?>" <?= $opt === 'draft' ? 'selected' : ''; ?>><?= html_escape(function_exists('status_label') ? status_label($opt) : $opt); ?></option><?php endforeach; ?></select></div>
                        </div>
                    </div>
                </div>

                <div class="field-group">
                    <div class="field-group-header"><h5>Konten Utama</h5></div>
                    <div class="field-group-body">
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label">Subtitle</label><input type="text" name="subtitle" class="form-control" value="The Wedding Celebration"></div>
                            <div class="col-md-6"><label class="form-label">Cover Text</label><input type="text" name="cover_text" class="form-control" value="Kepada Yth. Bapak/Ibu/Saudara/i"></div>
                            <div class="col-md-6"><label class="form-label">Upload Hero Image</label><input type="file" name="hero_image_file" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif"></div>
                            <div class="col-md-6"><label class="form-label">Hero Image URL / Path Cadangan</label><input type="text" name="hero_image" class="form-control"></div>
                            <div class="col-12"><label class="form-label">Deskripsi / Story</label><textarea name="description" class="form-control" rows="3"></textarea></div>
                            <div class="col-md-6"><label class="form-label">Sender Name</label><input type="text" name="sender_name" class="form-control"></div>
                            <div class="col-md-6"><label class="form-label">Receiver Name</label><input type="text" name="receiver_name" class="form-control"></div>
                            <div class="col-md-6"><label class="form-label">Message Title</label><input type="text" name="message_title" class="form-control" value="A Special Greeting"></div>
                            <div class="col-md-6"><label class="form-label">Music URL</label><input type="text" name="music_url" class="form-control"></div>
                            <div class="col-12"><label class="form-label">Message Body / Ucapan</label><textarea name="message_body" class="form-control" rows="5"></textarea></div>
                        </div>
                    </div>
                </div>

                <div class="field-group" id="invitationFields">
                    <div class="field-group-header"><h5>Detail Invitation</h5></div>
                    <div class="field-group-body">
                        <div class="row g-3">
                            <div class="col-md-4"><label class="form-label">Event Date</label><input type="date" name="event_date" class="form-control"></div>
                            <div class="col-md-4"><label class="form-label">Event Time</label><input type="text" name="event_time" class="form-control" placeholder="10:00 WIB - selesai"></div>
                            <div class="col-md-4"><label class="form-label">Location Name</label><input type="text" name="location_name" class="form-control"></div>
                            <div class="col-12"><label class="form-label">Alamat Lokasi</label><textarea name="location_address" class="form-control" rows="2"></textarea></div>
                            <div class="col-12"><label class="form-label">Map Embed URL / iframe</label><textarea name="map_embed" class="form-control" rows="3"></textarea></div>
                            <div class="col-md-4"><label class="form-label">RSVP Enabled</label><select name="rsvp_enabled" class="form-select"><option value="1" selected>Ya</option><option value="0">Tidak</option></select></div>
                            <div class="col-md-4"><label class="form-label">Wish Enabled</label><select name="wish_enabled" class="form-select"><option value="1" selected>Ya</option><option value="0">Tidak</option></select></div>
                            <div class="col-md-4"><label class="form-label">Gift Enabled</label><select name="gift_enabled" class="form-select"><option value="0" selected>Tidak</option><option value="1">Ya</option></select></div>
                            <div class="col-12"><label class="form-label">Gift Info</label><textarea name="gift_info" class="form-control" rows="3"></textarea></div>
                        </div>
                    </div>
                </div>

                <div class="field-group">
                    <div class="field-group-header"><h5>Catatan Internal</h5></div>
                    <div class="field-group-body"><label class="form-label">Revision Notes</label><textarea name="revision_notes" class="form-control" rows="3"></textarea></div>
                </div>

                <div class="sticky-save-bar d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <div class="quick-muted">Simpan project dulu. Publish bisa lanjut dari halaman edit project.</div>
                    <div class="d-flex gap-2">
                        <a href="<?= site_url('admin/quick-create/order'); ?>" class="btn btn-outline-secondary">Back</a>
                        <button class="btn btn-dark">Finish: Simpan Project</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function filterTemplate(){
    var product = document.getElementById('productTypeSelect').value;
    var select = document.getElementById('templateSelect');
    Array.prototype.forEach.call(select.options, function(opt){
        var type = opt.getAttribute('data-product-type');
        opt.hidden = type && type !== product;
    });
    if (select.selectedOptions.length && select.selectedOptions[0].hidden) {
        for (var i=0;i<select.options.length;i++){ if(!select.options[i].hidden){ select.value = select.options[i].value; break; } }
    }
    document.getElementById('invitationFields').style.display = product === 'greeting_card' ? 'none' : 'block';
}
document.getElementById('productTypeSelect').addEventListener('change', filterTemplate);
filterTemplate();
</script>

<?php $this->load->view('admin/layout/footer'); ?>
