<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background:#fffaf7; color:#3f2d2d; }
        .hero { min-height:85vh; display:flex; align-items:center; background:linear-gradient(rgba(72,45,45,.45), rgba(72,45,45,.45)), url('<?= asset_or_url($project->hero_image); ?>') center/cover; color:#fff; }
        .section { padding:70px 0; }
        .glass { background:rgba(255,255,255,.15); backdrop-filter: blur(6px); border-radius:22px; }
        .card-soft { border:0; border-radius:22px; box-shadow:0 12px 30px rgba(31,41,55,.08); }
    </style>
</head>
<body>
<section class="hero text-center">
    <div class="container">
        <?php if ($is_preview): ?><div class="alert alert-warning">Preview mode</div><?php endif; ?>
        <div class="glass p-4 p-lg-5">
            <div class="small text-uppercase mb-3"><?= html_escape($project->cover_text); ?> <?php if(!empty($guest_name)): ?><br><span style="font-weight:700;color:#111827;"><?= html_escape($guest_name); ?></span><?php endif; ?></div>
            <h1 class="display-3 fw-bold"><?= html_escape($project->title); ?></h1>
            <p class="lead"><?= html_escape($project->subtitle); ?></p>
            <?php if (!empty($project->event_date)): ?><p><?= date('d F Y', strtotime($project->event_date)); ?> • <?= html_escape($project->event_time); ?></p><?php endif; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card card-soft h-100"><div class="card-body p-4">
                    <h3>Detail Acara</h3>
                    <p class="mb-1"><strong>Lokasi:</strong> <?= html_escape($project->location_name); ?></p>
                    <p><?= nl2br(html_escape($project->location_address)); ?></p>
                    <p><?= nl2br(html_escape($project->description)); ?></p>
                </div></div>
            </div>
            <div class="col-lg-6">
                <div class="card card-soft h-100"><div class="card-body p-4">
                    <h3>Share Link</h3>
                    <p>Link undangan ini sudah siap dibagikan.</p>
                    <input type="text" class="form-control" value="<?= current_url(); ?>" readonly>
                    <?php if ($project->gift_enabled): ?>
                        <hr>
                        <h5>Gift Info</h5>
                        <p class="mb-0"><?= nl2br(html_escape($project->gift_info)); ?></p>
                    <?php endif; ?>
                </div></div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($galleries)): ?>
<section class="section bg-white">
    <div class="container">
        <h3 class="mb-4">Gallery</h3>
        <div class="row g-3">
            <?php foreach($galleries as $g): ?><div class="col-md-4"><div class="card card-soft"><img src="<?= asset_or_url($g->image_path); ?>" class="img-fluid rounded-top"><?php if(!empty($g->caption)): ?><div class="card-body"><small><?= html_escape($g->caption); ?></small></div><?php endif; ?></div></div><?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($project->rsvp_enabled): ?>
<section class="section bg-white">
    <div class="container">
        <?php if ($this->session->flashdata('success')): ?><div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div><?php endif; ?>
        <div class="card card-soft"><div class="card-body p-4">
            <h3>Konfirmasi Kehadiran</h3>
            <form method="post" action="<?= site_url('rsvp/store'); ?>" class="row g-3">
                <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">
                <div class="col-md-4"><input name="guest_name" class="form-control" value="<?= html_escape($guest_name); ?>" placeholder="Nama" required></div>
                <div class="col-md-3">
                    <select name="attendance_status" class="form-select">
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                    </select>
                </div>
                <div class="col-md-2"><input type="number" name="guest_total" class="form-control" value="1" min="1"></div>
                <div class="col-md-3"><input name="note" class="form-control" placeholder="Catatan"></div>
                <div class="col-12"><button class="btn btn-dark">Kirim RSVP</button></div>
            </form>
        </div></div>
    </div>
</section>
<?php endif; ?>

<?php if ($project->wish_enabled): ?>
<section class="section">
    <div class="container">
        <div class="card card-soft"><div class="card-body p-4">
            <h3>Ucapan</h3>
            <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3 mb-4">
                <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">
                <div class="col-md-4"><input name="guest_name" class="form-control" value="<?= html_escape($guest_name); ?>" placeholder="Nama" required></div>
                <div class="col-md-8"><input name="message" class="form-control" placeholder="Tulis ucapan" required></div>
                <div class="col-12"><button class="btn btn-outline-dark">Kirim Ucapan</button></div>
            </form>
            <div class="row g-3">
                <?php foreach ($wishes as $wish): ?>
                    <div class="col-md-6"><div class="border rounded-4 p-3 h-100">
                        <strong><?= html_escape($wish->guest_name); ?></strong>
                        <p class="mb-0 mt-2"><?= nl2br(html_escape($wish->message)); ?></p>
                    </div></div>
                <?php endforeach; ?>
                <?php if (empty($wishes)): ?><p class="text-muted">Belum ada ucapan.</p><?php endif; ?>
            </div>
        </div></div>
    </div>
</section>
<?php endif; ?>
</body>
</html>
