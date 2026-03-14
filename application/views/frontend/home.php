<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jasa undangan digital dan greeting card.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { color:#0f172a; }
        .hero { background:linear-gradient(135deg,#111827,#334155); color:#fff; padding:90px 0; }
        .section { padding:70px 0; }
        .price-card,.template-card { border:0; border-radius:22px; box-shadow:0 15px 45px rgba(15,23,42,.08); overflow:hidden; }
        .template-preview { height:220px; background-size:cover; background-position:center; background-color:#e5e7eb; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= site_url(); ?>"><?= html_escape($brand_name); ?></a>
        <div class="ms-auto">
            <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20order%20undangan%20digital" class="btn btn-dark">Order via WhatsApp</a>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold">Jasa Undangan Digital & Greeting Card</h1>
                <p class="lead mt-3">Versi V3: paket dan template pada frontend langsung membaca dari backend.</p>
                <a href="#harga" class="btn btn-light btn-lg me-2">Lihat Paket</a>
                <a href="#template" class="btn btn-outline-light btn-lg">Lihat Template</a>
            </div>
            <div class="col-lg-5">
                <div class="bg-white text-dark p-4 rounded-4 shadow-lg">
                    <h5 class="fw-bold">Flow order</h5>
                    <ol class="mb-0">
                        <li>Customer WA</li>
                        <li>Pilih paket & template</li>
                        <li>Anda input ke sistem</li>
                        <li>Preview & publish</li>
                        <li>Kirim link ke customer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="harga" class="section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Paket Harga</h2>
            <p class="text-muted">Semua paket di bawah ini muncul dari backend.</p>
        </div>
        <?php foreach ($product_types as $type): ?>
            <?php $items = isset($package_groups[$type->code]) ? $package_groups[$type->code] : array(); ?>
            <?php if (!empty($items)): ?>
                <div class="mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h3 class="fw-bold mb-0"><?= html_escape($type->name); ?></h3>
                            <small class="text-muted"><?= html_escape($type->description); ?></small>
                        </div>
                    </div>
                    <div class="row g-4">
                        <?php foreach ($items as $p): ?>
                            <div class="col-lg-4">
                                <div class="card price-card h-100 <?= $p->is_featured ? 'border border-dark' : ''; ?>">
                                    <div class="card-body p-4">
                                        <?php if ($p->is_featured): ?><div class="badge text-bg-dark mb-3">Featured</div><?php endif; ?>
                                        <h4><?= html_escape($p->name); ?></h4>
                                        <h2 class="fw-bold">Rp<?= number_format((float)$p->price,0,',','.'); ?></h2>
                                        <?php if (!empty($p->old_price)): ?><div class="text-decoration-line-through text-muted">Rp<?= number_format((float)$p->old_price,0,',','.'); ?></div><?php endif; ?>
                                        <p class="mt-3"><?= nl2br(html_escape($p->description)); ?></p>
                                        <ul>
                                            <?php foreach (preg_split('/
||
/', trim((string)$p->features)) as $f): ?>
                                                <?php if (trim($f) !== ''): ?><li><?= html_escape(trim($f)); ?></li><?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                        <a class="btn btn-dark w-100" href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo saya ingin order paket ' . $p->name); ?>"><?= html_escape($p->button_text ?: 'Pilih Paket'); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<section id="template" class="section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Template</h2>
            <p class="text-muted">Semua template aktif diambil dari backend.</p>
        </div>
        <?php foreach ($product_types as $type): ?>
            <?php $items = isset($template_groups[$type->code]) ? $template_groups[$type->code] : array(); ?>
            <?php if (!empty($items)): ?>
                <div class="mb-5">
                    <h3 class="fw-bold mb-3"><?= html_escape($type->name); ?></h3>
                    <div class="row g-4">
                        <?php foreach ($items as $t): ?>
                            <div class="col-lg-4">
                                <div class="card template-card">
                                    <div class="template-preview" style="background-image:url('<?= html_escape($t->thumbnail); ?>')"></div>
                                    <div class="card-body">
                                        <h5><?= html_escape($t->name); ?></h5>
                                        <p class="text-muted"><?= html_escape($t->description); ?></p>
                                        <div class="d-flex gap-2">
                                            <?php if (!empty($t->demo_url)): ?><a href="<?= html_escape($t->demo_url); ?>" target="_blank" class="btn btn-outline-dark btn-sm">Preview</a><?php endif; ?>
                                            <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo saya ingin order template ' . $t->name); ?>" class="btn btn-dark btn-sm">Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<section class="section">
    <div class="container text-center">
        <h2 class="fw-bold">Siap dipakai untuk bisnis</h2>
        <p class="text-muted">Product type, paket, template, dan nomor WA diatur dari backend.</p>
        <a href="<?= site_url('admin/login'); ?>" class="btn btn-outline-dark me-2">Masuk Admin</a>
        <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20bertanya%20tentang%20undangan%20digital" class="btn btn-dark">Chat WhatsApp</a>
    </div>
</section>
</body>
</html>
