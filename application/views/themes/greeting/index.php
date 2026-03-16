<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { min-height:100vh; background:radial-gradient(circle at top,#ffe7f0,#f8fafc 60%); color:#1f2937; display:flex; align-items:center; }
        .card-wrap { max-width:760px; margin:40px auto; border-radius:34px; border:0; box-shadow:0 24px 70px rgba(15,23,42,.12); overflow:hidden; }
        .cover { min-height:280px; background:url('<?= asset_or_url($project->hero_image); ?>') center/cover; }
    </style>
</head>
<body>
<div class="container">
    <?php if ($is_preview): ?><div class="alert alert-warning">Preview mode</div><?php endif; ?>
    <div class="card card-wrap">
        <div class="cover"></div>
        <div class="card-body p-4 p-lg-5 text-center">
            <div class="text-uppercase small text-muted"><?= html_escape($project->message_title); ?></div>
            <h1 class="display-5 fw-bold mt-2">Untuk <?= html_escape($guest_name ?: ($project->receiver_name ?: $project->title)); ?></h1>
            <p class="lead mt-3"><?= nl2br(html_escape($project->message_body ?: $project->description)); ?></p>
            <div class="mt-4">
                <strong>Dari:</strong> <?= html_escape($project->sender_name ?: 'Seseorang yang spesial'); ?>
            </div>
            <div class="mt-4">
                <a href="<?= site_url(); ?>" class="btn btn-outline-dark">Buat Kartu Juga</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
