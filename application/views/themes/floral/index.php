<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background:#fdf9fb; color:#4b3550; }
        .hero { padding:100px 0 80px; background:linear-gradient(135deg,#f8d7e5,#f3eff8); }
        .hero-box,.block { border-radius:28px; background:#fff; box-shadow:0 15px 40px rgba(99,102,241,.08); }
        .section { padding:60px 0; }
    </style>
</head>
<body>
<section class="hero">
    <div class="container">
        <?php if ($is_preview): ?><div class="alert alert-warning">Preview mode</div><?php endif; ?>
        <div class="hero-box p-4 p-lg-5 text-center">
            <div class="text-uppercase small mb-2">Wedding Invitation</div>
            <h1 class="display-4 fw-bold"><?= html_escape($project->title); ?></h1>
            <p class="lead mb-0"><?= html_escape($project->subtitle); ?></p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <img src="<?= html_escape($project->hero_image); ?>" class="img-fluid rounded-5 shadow-sm">
            </div>
            <div class="col-lg-6">
                <div class="block p-4">
                    <h3>Informasi Acara</h3>
                    <p class="mb-1"><?= !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '-'; ?></p>
                    <p class="mb-1"><?= html_escape($project->event_time); ?></p>
                    <p class="mb-3"><?= html_escape($project->location_name); ?></p>
                    <p class="mb-0"><?= nl2br(html_escape($project->location_address)); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($project->wish_enabled): ?>
<section class="section bg-light">
    <div class="container">
        <div class="block p-4">
            <h3 class="mb-3">Kirim Ucapan</h3>
            <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">
                <div class="col-md-4"><input name="guest_name" class="form-control" value="<?= html_escape($guest_name); ?>" placeholder="Nama" required></div>
                <div class="col-md-8"><input name="message" class="form-control" placeholder="Tulis ucapan terbaik" required></div>
                <div class="col-12"><button class="btn btn-dark">Kirim</button></div>
            </form>
            <hr class="my-4">
            <div class="row g-3">
                <?php foreach ($wishes as $wish): ?>
                    <div class="col-md-6"><div class="border rounded-4 p-3 bg-white h-100">
                        <strong><?= html_escape($wish->guest_name); ?></strong>
                        <div class="mt-2"><?= nl2br(html_escape($wish->message)); ?></div>
                    </div></div>
                <?php endforeach; ?>
                <?php if (empty($wishes)): ?><div class="text-muted">Belum ada ucapan.</div><?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
</body>
</html>
