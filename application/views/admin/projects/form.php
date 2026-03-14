<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card">
    <div class="card-body">
        <form method="post" action="<?= isset($project) ? site_url('admin/projects/update/'.$project->id) : site_url('admin/projects/store'); ?>">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <select name="order_id" class="form-select" required>
                        <option value="">Pilih order</option>
                        <?php foreach ($orders as $o): ?>
                            <option value="<?= $o->id; ?>" <?= isset($project) && $project->order_id == $o->id ? 'selected' : ''; ?>>
                                #<?= $o->id; ?> - <?= html_escape($o->customer_name ?? ('Customer '.$o->customer_id)); ?> - <?= html_escape($o->product_type); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Product Type</label>
                    <?php $pv = isset($project) ? $project->product_type : 'wedding'; ?>
                    <select name="product_type" class="form-select">
                        <?php foreach($product_types as $pt): ?>
                            <option value="<?= html_escape($pt->code); ?>" <?= $pv == $pt->code ? 'selected' : ''; ?>><?= html_escape($pt->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Template</label>
                    <select name="template_id" class="form-select" required>
                        <?php foreach ($templates as $t): ?>
                            <option value="<?= $t->id; ?>" <?= isset($project) && $project->template_id == $t->id ? 'selected' : ''; ?>><?= html_escape($t->name . ' [' . $t->folder . ']'); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-8"><label class="form-label">Judul Project</label><input type="text" name="title" class="form-control" value="<?= isset($project) ? html_escape($project->title) : ''; ?>" placeholder="Contoh: Amel & Budi" required></div>
                <div class="col-md-4"><label class="form-label">Slug URL</label><input type="text" name="slug" class="form-control" value="<?= isset($project) ? html_escape($project->slug) : ''; ?>" placeholder="amel-budi"></div>
                <div class="col-md-6"><label class="form-label">Subtitle</label><input type="text" name="subtitle" class="form-control" value="<?= isset($project) ? html_escape($project->subtitle) : 'The Wedding Celebration'; ?>"></div>
                <div class="col-md-6"><label class="form-label">Cover Text</label><input type="text" name="cover_text" class="form-control" value="<?= isset($project) ? html_escape($project->cover_text) : 'Kepada Yth. Bapak/Ibu/Saudara/i'; ?>"></div>
                <div class="col-md-6"><label class="form-label">Hero Image URL / Path</label><input type="text" name="hero_image" class="form-control" value="<?= isset($project) ? html_escape($project->hero_image) : 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1400&q=80'; ?>"></div>
                <div class="col-md-6"><label class="form-label">Music URL</label><input type="text" name="music_url" class="form-control" value="<?= isset($project) ? html_escape($project->music_url) : ''; ?>" placeholder="Opsional mp3 URL"></div>
                <div class="col-md-4"><label class="form-label">Tanggal Acara</label><input type="date" name="event_date" class="form-control" value="<?= isset($project) ? html_escape($project->event_date) : ''; ?>"></div>
                <div class="col-md-4"><label class="form-label">Jam Acara</label><input type="text" name="event_time" class="form-control" value="<?= isset($project) ? html_escape($project->event_time) : '10:00 WIB'; ?>"></div>
                <div class="col-md-4"><label class="form-label">Lokasi</label><input type="text" name="location_name" class="form-control" value="<?= isset($project) ? html_escape($project->location_name) : ''; ?>"></div>
                <div class="col-12"><label class="form-label">Alamat Lokasi</label><textarea name="location_address" class="form-control" rows="2"><?= isset($project) ? html_escape($project->location_address) : ''; ?></textarea></div>
                <div class="col-12"><label class="form-label">Map Embed URL / iframe</label><textarea name="map_embed" class="form-control" rows="3"><?= isset($project) ? html_escape($project->map_embed) : ''; ?></textarea></div>
                <div class="col-12"><label class="form-label">Deskripsi / Story</label><textarea name="description" class="form-control" rows="4"><?= isset($project) ? html_escape($project->description) : ''; ?></textarea></div>
                <div class="col-md-6"><label class="form-label">Sender Name (Greeting)</label><input type="text" name="sender_name" class="form-control" value="<?= isset($project) ? html_escape($project->sender_name) : ''; ?>" placeholder="Dari siapa"></div>
                <div class="col-md-6"><label class="form-label">Receiver Name (Greeting)</label><input type="text" name="receiver_name" class="form-control" value="<?= isset($project) ? html_escape($project->receiver_name) : ''; ?>" placeholder="Untuk siapa"></div>
                <div class="col-md-6"><label class="form-label">Message Title</label><input type="text" name="message_title" class="form-control" value="<?= isset($project) ? html_escape($project->message_title) : 'A Special Greeting'; ?>"></div>
                <div class="col-md-6"><label class="form-label">Status Project</label><?php $st = isset($project) ? $project->status : 'draft'; ?><select name="status" class="form-select"><option value="draft" <?= $st == 'draft' ? 'selected' : ''; ?>>Draft</option><option value="published" <?= $st == 'published' ? 'selected' : ''; ?>>Published</option></select></div>
                <div class="col-12"><label class="form-label">Message Body / Ucapan</label><textarea name="message_body" class="form-control" rows="4"><?= isset($project) ? html_escape($project->message_body) : ''; ?></textarea></div>
                <div class="col-md-4"><label class="form-label">RSVP Enabled</label><?php $v = isset($project) ? (int)$project->rsvp_enabled : 1; ?><select name="rsvp_enabled" class="form-select"><option value="1" <?= $v === 1 ? 'selected' : ''; ?>>Ya</option><option value="0" <?= $v === 0 ? 'selected' : ''; ?>>Tidak</option></select></div>
                <div class="col-md-4"><label class="form-label">Wish Enabled</label><?php $v2 = isset($project) ? (int)$project->wish_enabled : 1; ?><select name="wish_enabled" class="form-select"><option value="1" <?= $v2 === 1 ? 'selected' : ''; ?>>Ya</option><option value="0" <?= $v2 === 0 ? 'selected' : ''; ?>>Tidak</option></select></div>
                <div class="col-md-4"><label class="form-label">Gift Enabled</label><?php $v3 = isset($project) ? (int)$project->gift_enabled : 0; ?><select name="gift_enabled" class="form-select"><option value="1" <?= $v3 === 1 ? 'selected' : ''; ?>>Ya</option><option value="0" <?= $v3 === 0 ? 'selected' : ''; ?>>Tidak</option></select></div>
                <div class="col-12"><label class="form-label">Gift Info</label><textarea name="gift_info" class="form-control" rows="3"><?= isset($project) ? html_escape($project->gift_info) : ''; ?></textarea></div>
                <div class="col-12"><button class="btn btn-dark">Simpan Project</button> <a href="<?= site_url('admin/projects'); ?>" class="btn btn-outline-secondary">Kembali</a></div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('admin/layout/footer'); ?>
