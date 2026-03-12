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
        .template-preview { height:220px; background-size:cover; background-position:center; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= site_url(); ?>">InviteBiz</a>
        <div class="ms-auto">
            <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20order%20undangan%20digital" class="btn btn-dark">Order via WhatsApp</a>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold">Jasa Undangan Digital & Greeting Card</h1>
                <p class="lead mt-3">Flow bisnis sederhana: customer chat WA, Anda input ke admin panel, publish, lalu kirim link jadi.</p>
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
            <p class="text-muted">Contoh pricing yang bisa langsung Anda pakai di front-end.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card price-card h-100">
                    <div class="card-body p-4">
                        <h4>Basic</h4>
                        <h2 class="fw-bold">Rp79.000</h2>
                        <ul>
                            <li>1 halaman undangan / kartu</li>
                            <li>1 template</li>
                            <li>Revisi minor 1x</li>
                            <li>Link share</li>
                        </ul>
                        <a class="btn btn-dark w-100" href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20order%20paket%20Basic">Pilih Paket</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card price-card h-100 border border-dark">
                    <div class="card-body p-4">
                        <h4>Premium</h4>
                        <h2 class="fw-bold">Rp129.000</h2>
                        <ul>
                            <li>Wedding / greeting card</li>
                            <li>3 template pilihan</li>
                            <li>RSVP & ucapan</li>
                            <li>Revisi 2x</li>
                        </ul>
                        <a class="btn btn-dark w-100" href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20order%20paket%20Premium">Pilih Paket</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card price-card h-100">
                    <div class="card-body p-4">
                        <h4>Exclusive</h4>
                        <h2 class="fw-bold">Rp199.000</h2>
                        <ul>
                            <li>Tampilan lebih premium</li>
                            <li>Gift info</li>
                            <li>RSVP & ucapan</li>
                            <li>Prioritas pengerjaan</li>
                        </ul>
                        <a class="btn btn-dark w-100" href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20order%20paket%20Exclusive">Pilih Paket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="template" class="section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Contoh Template</h2>
            <p class="text-muted">Starter ini membawa 3 template public minimum.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card template-card">
                    <div class="template-preview" style="background-image:url('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=900&q=80')"></div>
                    <div class="card-body">
                        <h5>Romantic Wedding</h5>
                        <p class="text-muted">Tampilan clean dan elegan untuk wedding invitation.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card template-card">
                    <div class="template-preview" style="background-image:url('https://images.unsplash.com/photo-1525258946800-98cfd641d0de?auto=format&fit=crop&w=900&q=80')"></div>
                    <div class="card-body">
                        <h5>Floral Wedding</h5>
                        <p class="text-muted">Warna lembut dengan kartu info acara dan RSVP.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card template-card">
                    <div class="template-preview" style="background-image:url('https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=900&q=80')"></div>
                    <div class="card-body">
                        <h5>Greeting Card</h5>
                        <p class="text-muted">Cocok untuk birthday, anniversary, atau ucapan spesial.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container text-center">
        <h2 class="fw-bold">Siap dipakai untuk bisnis</h2>
        <p class="text-muted">Anda tinggal ganti nomor WA, domain, template, dan harga paket.</p>
        <a href="<?= site_url('admin/login'); ?>" class="btn btn-outline-dark me-2">Masuk Admin</a>
        <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20bertanya%20tentang%20undangan%20digital" class="btn btn-dark">Chat WhatsApp</a>
    </div>
</section>
</body>
</html>
