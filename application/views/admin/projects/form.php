<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="<?= isset($project) ? site_url('admin/projects/update/' . $project->id) : site_url('admin/projects/store'); ?>">
            <div class="row g-3">
                <div class="col-md-4"><label class="form-label">Order</label><select name="order_id" class="form-select" required>
                        <option value="">Pilih order</option><?php foreach ($orders as $o): ?><option value="<?= $o->id; ?>" <?= isset($project) && $project->order_id == $o->id ? 'selected' : ''; ?>><?= html_escape($o->order_no ?: ('#' . $o->id)); ?> - <?= html_escape($o->customer_name ?? ('Customer ' . $o->customer_id)); ?></option><?php endforeach; ?>
                    </select></div>
                <div class="col-md-4"><label class="form-label">Product Type</label><?php $pv = isset($project) ? $project->product_type : 'wedding'; ?><select name="product_type" id="productTypeSelect" class="form-select"><?php foreach ($product_types as $pt): ?><option value="<?= html_escape($pt->code); ?>" <?= $pv == $pt->code ? 'selected' : ''; ?>><?= html_escape($pt->name); ?></option><?php endforeach; ?></select>
                    <div class="form-text">Pilih Greeting Card untuk kartu ucapan simple maupun animasi.</div>
                </div>
                <div class="col-md-4"><label class="form-label">PIC / Assigned User</label><select name="assigned_user_id" class="form-select">
                        <option value="">-</option><?php foreach ($users as $u): ?><option value="<?= $u->id; ?>" <?= isset($project) && $project->assigned_user_id == $u->id ? 'selected' : ''; ?>><?= html_escape($u->name); ?></option><?php endforeach; ?>
                    </select></div>
                <div class="col-md-4"><label class="form-label">Template</label><select name="template_id" id="templateSelect" class="form-select" required><?php foreach ($templates as $t): ?><option value="<?= $t->id; ?>" data-product-type="<?= html_escape($t->product_type); ?>" <?= isset($project) && $project->template_id == $t->id ? 'selected' : ''; ?>><?= html_escape($t->name . ' [' . $t->folder . ']'); ?></option><?php endforeach; ?></select>
                    <div class="form-text" id="templateHelp">Template akan otomatis difilter sesuai product type.</div>
                </div>
                <div class="col-md-8"><label class="form-label">Judul Project</label><input type="text" name="title" class="form-control" value="<?= isset($project) ? html_escape($project->title) : ''; ?>" required></div>
                <div class="col-md-4"><label class="form-label">Slug URL</label><input type="text" name="slug" class="form-control" value="<?= isset($project) ? html_escape($project->slug) : ''; ?>"></div>
                <div class="col-md-6"><label class="form-label">Subtitle</label><input type="text" name="subtitle" class="form-control" value="<?= isset($project) ? html_escape($project->subtitle) : 'The Wedding Celebration'; ?>"></div>
                <div class="col-md-6"><label class="form-label">Cover Text</label><input type="text" name="cover_text" class="form-control" value="<?= isset($project) ? html_escape($project->cover_text) : 'Kepada Yth. Bapak/Ibu/Saudara/i'; ?>"></div>
                <div class="col-md-6"><label class="form-label">Upload Hero Image</label><input type="file" name="hero_image_file" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif"></div>
                <div class="col-md-6"><label class="form-label">Hero Image URL / Path Cadangan</label><input type="text" name="hero_image" class="form-control" value="<?= isset($project) ? html_escape($project->hero_image) : ''; ?>"></div>
                <?php if (isset($project) && !empty($project->hero_image)): ?><div class="col-md-3"><img src="<?= asset_or_url($project->hero_image); ?>" class="img-fluid rounded border" alt="hero"></div><?php endif; ?>
                <div class="col-md-4 greeting-field"><label class="form-label">Music URL</label><input type="text" name="music_url" class="form-control" value="<?= isset($project) ? html_escape($project->music_url) : ''; ?>">
                    <div class="form-text">Opsional. Isi URL MP3 untuk tema animasi greeting card.</div>
                </div>
                <div class="col-md-4 wedding-field"><label class="form-label">Tanggal Acara</label><input type="date" name="event_date" class="form-control" value="<?= isset($project) ? html_escape($project->event_date) : ''; ?>"></div>
                <div class="col-md-4 wedding-field"><label class="form-label">Jam Acara</label><input type="text" name="event_time" class="form-control" value="<?= isset($project) ? html_escape($project->event_time) : '10:00 WIB'; ?>"></div>
                <div class="col-md-6 wedding-field"><label class="form-label">Lokasi</label><input type="text" name="location_name" class="form-control" value="<?= isset($project) ? html_escape($project->location_name) : ''; ?>"></div>
                <div class="col-md-3"><label class="form-label">Deadline</label><input type="date" name="deadline_date" class="form-control" value="<?= isset($project) ? html_escape($project->deadline_date) : ''; ?>"></div>
                <div class="col-md-3"><label class="form-label">Status Project</label><?php $st = isset($project) ? $project->status : 'draft'; ?><select name="status" class="form-select"><?php foreach ($status_options as $opt): ?><option value="<?= $opt; ?>" <?= $st == $opt ? 'selected' : ''; ?>><?= html_escape(status_label($opt)); ?></option><?php endforeach; ?></select></div>
                <div class="col-12 wedding-field"><label class="form-label">Alamat Lokasi</label><textarea name="location_address" class="form-control" rows="2"><?= isset($project) ? html_escape($project->location_address) : ''; ?></textarea></div>
                <div class="col-12 wedding-field"><label class="form-label">Map Embed URL / iframe</label><textarea name="map_embed" class="form-control" rows="3"><?= isset($project) ? html_escape($project->map_embed) : ''; ?></textarea></div>
                <div class="col-12"><label class="form-label">Deskripsi / Story</label><textarea name="description" class="form-control" rows="4"><?= isset($project) ? html_escape($project->description) : ''; ?></textarea></div>
                <div class="col-md-6"><label class="form-label">Sender Name</label><input type="text" name="sender_name" class="form-control" value="<?= isset($project) ? html_escape($project->sender_name) : ''; ?>"></div>
                <div class="col-md-6"><label class="form-label">Receiver Name</label><input type="text" name="receiver_name" class="form-control" value="<?= isset($project) ? html_escape($project->receiver_name) : ''; ?>"></div>
                <div class="col-md-6"><label class="form-label">Message Title</label><input type="text" name="message_title" class="form-control" value="<?= isset($project) ? html_escape($project->message_title) : 'A Special Greeting'; ?>"></div>
                <div class="col-12"><label class="form-label">Message Body / Ucapan</label><textarea name="message_body" class="form-control" rows="4"><?= isset($project) ? html_escape($project->message_body) : ''; ?></textarea></div>
                <div class="col-12 greeting-field">
                    <div class="alert alert-info mb-0"><strong>Tips Greeting Card Animation:</strong> isi Receiver Name, Sender Name, Message Title, Message Body, Cover Text, Hero Image, dan Music URL. Setelah publish, customer bisa buka link <code>/card/slug-project</code>.</div>
                </div>
                <div class="col-md-4 wedding-field"><label class="form-label">RSVP Enabled</label><?php $v = isset($project) ? (int)$project->rsvp_enabled : 1; ?><select name="rsvp_enabled" class="form-select">
                        <option value="1" <?= $v === 1 ? 'selected' : ''; ?>>Ya</option>
                        <option value="0" <?= $v === 0 ? 'selected' : ''; ?>>Tidak</option>
                    </select></div>
                <div class="col-md-4 greeting-field wedding-field"><label class="form-label">Wish Enabled</label><?php $v2 = isset($project) ? (int)$project->wish_enabled : 1; ?><select name="wish_enabled" class="form-select">
                        <option value="1" <?= $v2 === 1 ? 'selected' : ''; ?>>Ya</option>
                        <option value="0" <?= $v2 === 0 ? 'selected' : ''; ?>>Tidak</option>
                    </select></div>
                <div class="col-md-4 wedding-field"><label class="form-label">Gift Enabled</label><?php $v3 = isset($project) ? (int)$project->gift_enabled : 0; ?><select name="gift_enabled" class="form-select">
                        <option value="1" <?= $v3 === 1 ? 'selected' : ''; ?>>Ya</option>
                        <option value="0" <?= $v3 === 0 ? 'selected' : ''; ?>>Tidak</option>
                    </select></div>
                <div class="col-12 wedding-field"><label class="form-label">Gift Info</label><textarea name="gift_info" class="form-control" rows="3"><?= isset($project) ? html_escape($project->gift_info) : ''; ?></textarea></div>
                <div class="col-12"><label class="form-label">Revision Notes</label><textarea name="revision_notes" class="form-control" rows="3"><?= isset($project) ? html_escape($project->revision_notes) : ''; ?></textarea></div>
                <div class="col-12"><button class="btn btn-dark">Simpan Project</button> <a href="<?= site_url('admin/projects'); ?>" class="btn btn-outline-secondary">Kembali</a></div>
            </div>
        </form>
    </div>
</div>

<?php if (isset($project)): ?>
    <div class="card table-card mt-4">
        <div class="card-header bg-white"><strong>Project Gallery</strong></div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="<?= site_url('admin/projects/add-gallery/' . $project->id); ?>" class="row g-3 mb-4">
                <div class="col-md-5"><input type="file" name="gallery_image" class="form-control" accept=".jpg,.jpeg,.png,.webp,.gif" required></div>
                <div class="col-md-5"><input type="text" name="caption" class="form-control" placeholder="Caption image"></div>
                <div class="col-md-2"><input type="number" name="sort_order" class="form-control" placeholder="Sort" value="0"></div>
                <div class="col-12"><button class="btn btn-outline-dark btn-sm">Tambah Gallery</button></div>
            </form>
            <div class="row g-3">
                <?php foreach (($galleries ?? array()) as $g): ?><div class="col-md-3">
                        <div class="border rounded p-2 h-100"><img src="<?= asset_or_url($g->image_path); ?>" class="img-fluid rounded mb-2">
                            <div class="small fw-semibold"><?= html_escape($g->caption); ?></div>
                            <div class="text-muted small">Sort: <?= (int)$g->sort_order; ?></div><a href="<?= site_url('admin/projects/delete-gallery/' . $g->id); ?>" class="btn btn-sm btn-outline-danger mt-2" onclick="return confirm('Hapus gallery ini?')">Hapus</a>
                        </div>
                    </div><?php endforeach; ?>
                <?php if (empty($galleries)): ?><div class="text-muted">Belum ada gallery untuk project ini.</div><?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php $this->load->view('admin/layout/footer'); ?>
<?php if (isset($project)): ?>
    <div class="row g-4 mt-2">
        <div class="col-lg-5">
            <div class="card table-card">
                <div class="card-header bg-white"><strong>Tambah Timeline Project</strong></div>
                <div class="card-body">
                    <form method="post" action="<?= site_url('admin/projects/add-timeline/' . $project->id); ?>">
                        <div class="mb-2"><label class="form-label">Label Status</label><input type="text" name="status_label" class="form-control" placeholder="Revision / Follow Up / Approved"></div>
                        <div class="mb-3"><label class="form-label">Catatan</label><textarea name="note" class="form-control" rows="4" required></textarea></div>
                        <button class="btn btn-dark btn-sm">Tambah Timeline</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card table-card">
                <div class="card-header bg-white"><strong>Timeline Project</strong></div>
                <div class="card-body">
                    <?php if (!empty($timelines)): foreach ($timelines as $tl): ?>
                            <div class="border rounded p-3 mb-2">
                                <div class="d-flex justify-content-between align-items-start gap-2">
                                    <div>
                                        <div><span class="badge text-bg-dark"><?= html_escape($tl->status_label ?: 'Note'); ?></span> <?php $ap = $tl->approval_status ?? 'pending'; ?><span class="badge text-bg-<?= badge_status($ap); ?>">Approval: <?= html_escape(status_label($ap)); ?></span></div>
                                        <div class="small text-muted mt-1"><?= html_escape($tl->created_at); ?> · <?= html_escape($tl->user_name); ?></div>
                                        <?php if (!empty($tl->approved_at)): ?><div class="small text-muted">Approval oleh <?= html_escape($tl->approved_by_name ?: '-'); ?> pada <?= html_escape($tl->approved_at); ?></div><?php endif; ?>
                                        <div class="mt-2" style="white-space:pre-line;"><?= html_escape($tl->note); ?></div>
                                    </div>
                                    <div class="d-flex gap-1">
                                        <?php if (($tl->approval_status ?? 'pending') !== 'approved'): ?><a href="<?= site_url('admin/projects/approve-timeline/' . $tl->id); ?>" class="btn btn-outline-success btn-sm">Approve</a><?php endif; ?>
                                        <?php if (($tl->approval_status ?? 'pending') !== 'rejected'): ?><a href="<?= site_url('admin/projects/reject-timeline/' . $tl->id); ?>" class="btn btn-outline-warning btn-sm">Reject</a><?php endif; ?>
                                        <a href="<?= site_url('admin/projects/delete-timeline/' . $tl->id); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus timeline ini?')">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                    else: ?>
                        <div class="text-muted">Belum ada timeline project.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<script>
    (function() {
        const productTypeSelect = document.getElementById('productTypeSelect');
        const templateSelect = document.getElementById('templateSelect');
        const templateHelp = document.getElementById('templateHelp');
        const weddingFields = document.querySelectorAll('.wedding-field');
        const greetingFields = document.querySelectorAll('.greeting-field');

        if (!productTypeSelect || !templateSelect) return;

        function filterTemplates() {
            const productType = productTypeSelect.value;
            const options = Array.from(templateSelect.options);
            let firstVisible = null;
            let selectedVisible = false;

            options.forEach(opt => {
                const optType = opt.getAttribute('data-product-type') || 'all';
                const show = optType === 'all' || optType === productType;
                opt.hidden = !show;
                opt.disabled = !show;
                if (show && !firstVisible) firstVisible = opt;
                if (show && opt.selected) selectedVisible = true;
            });

            if (!selectedVisible && firstVisible) {
                templateSelect.value = firstVisible.value;
            }

            if (productType === 'greeting_card') {
                templateHelp.textContent = 'Pilih tema greeting card. Template animasi lucu juga muncul di sini.';
            } else {
                templateHelp.textContent = 'Pilih template undangan digital sesuai product type.';
            }
        }

        function toggleFields() {
            const isGreeting = productTypeSelect.value === 'greeting_card';
            weddingFields.forEach(el => el.style.display = isGreeting ? 'none' : '');
            greetingFields.forEach(el => el.style.display = '');

            if (isGreeting) {
                const subtitle = document.querySelector('input[name="subtitle"]');
                const coverText = document.querySelector('input[name="cover_text"]');
                const rsvp = document.querySelector('select[name="rsvp_enabled"]');
                const gift = document.querySelector('select[name="gift_enabled"]');
                if (subtitle && !subtitle.value.trim()) subtitle.value = 'A Sweet Animated Greeting';
                if (coverText && !coverText.value.trim()) coverText.value = 'A special card made just for you';
                if (rsvp) rsvp.value = '0';
                if (gift) gift.value = '0';
            }
        }

        productTypeSelect.addEventListener('change', function() {
            filterTemplates();
            toggleFields();
        });

        filterTemplates();
        toggleFields();
    })();
</script>