<section class="page-hero page-hero-modern text-center">
    <div class="container">
        <div class="page-hero-shell">
            <span class="section-kicker">how it works</span>
            <h1>Cara order yang simpel, cepat, dan nggak bikin bingung.</h1>
            <p>
                Flow-nya dibuat sesantai mungkin: pilih layanan, lihat opsi, lanjut chat,
                lalu pesanan diproses sesuai kebutuhanmu.
            </p>
        </div>
    </div>
</section>

<section class="section order-flow-modern">
    <div class="container">
        <div class="flow-line-wrap">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="flow-card-modern h-100">
                        <div class="step-badge">01</div>
                        <h5>Pilih layanan</h5>
                        <p>Mau gift, jastip, undangan digital, greeting card, atau template spreadsheet.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="flow-card-modern h-100">
                        <div class="step-badge">02</div>
                        <h5>Lihat opsi</h5>
                        <p>Cek paket, preview, atau gallery supaya lebih kebayang style dan hasilnya.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="flow-card-modern h-100">
                        <div class="step-badge">03</div>
                        <h5>Chat admin</h5>
                        <p>Tanya dulu boleh. Spill kebutuhan, request, atau Saran sesuai budget juga bisa.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="flow-card-modern h-100 accent">
                        <div class="step-badge">04</div>
                        <h5>Pesanan diproses</h5>
                        <p>Kalau sudah cocok, order akan segera diproses dan dihubungi kembali oleh admin saat sudah selesai.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-light faq-modern-wrap">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-kicker">frequently asked</span>
            <h2 class="section-title">FAQ yang paling sering ditanyain</h2>
            <p class="section-subtitle">
                <!-- Dibuat lebih clean dan lebih ringan dibaca, jadi customer cepat nemu jawaban sebelum chat. -->
            </p>
        </div>

        <div class="faq-grid-modern">
            <div class="faq-card-modern">
                <span class="faq-tag">Gift</span>
                <h5>Apakah gift bisa ditambah greeting card?</h5>
                <p>Bisa. Ini salah satu add-on favorit karena bikin hadiah terasa lebih personal.</p>
            </div>

            <div class="faq-card-modern">
                <span class="faq-tag">Jastip</span>
                <h5>Order jastip bisa pakai greeting card juga?</h5>
                <p>Bisa untuk order tertentu, terutama kalau pesanan ingin dijadikan hadiah.</p>
            </div>

            <div class="faq-card-modern">
                <span class="faq-tag">Spreadsheet</span>
                <h5>Spreadsheet regular sudah ada form input?</h5>
                <p>Ya, paket regular sudah termasuk form input dan template siap pakai.</p>
            </div>

            <div class="faq-card-modern">
                <span class="faq-tag">Premium</span>
                <h5>Paket premium bedanya apa?</h5>
                <p>Bisa request warna, tambahan fungsi, atau penyesuaian dashboard dan report sederhana.</p>
            </div>

            <div class="faq-card-modern">
                <span class="faq-tag">Order</span>
                <h5>Order lewat mana?</h5>
                <p>Langsung lewat WhatsApp supaya lebih cepat, enak konsultasi, dan jelas.</p>
            </div>

            <div class="faq-card-modern highlight">
                <span class="faq-tag">Consult</span>
                <h5>Bisa tanya dulu sebelum order?</h5>
                <p>Tentu bisa. Malah lebih enak supaya paket yang dipilih benar-benar pas.</p>
            </div>
        </div>
    </div>
</section>

<style>
    .page-hero-modern {
        padding-bottom: 34px;
        background: transparent;
    }

    .page-hero-shell {
        background: linear-gradient(135deg, #edf4ff 0%, #fff2f9 62%, #fff9dd 100%);
        border: 1px solid rgba(255, 255, 255, .88);
        border-radius: 34px;
        padding: 42px 28px;
        box-shadow: 0 22px 50px rgba(77, 131, 246, .12);
    }

    .page-hero-shell h1 {
        font-size: clamp(2rem, 4vw, 3.6rem);
        font-weight: 800;
        color: var(--text-dark);
        margin: 14px 0 12px;
    }

    .page-hero-shell p {
        max-width: 760px;
        margin: 0 auto;
    }

    .flow-line-wrap {
        position: relative;
    }

    .flow-line-wrap::before {
        content: "";
        position: absolute;
        top: 58px;
        left: 9%;
        right: 9%;
        height: 2px;
        background: linear-gradient(90deg, rgba(77, 131, 246, .28), rgba(236, 72, 153, .28), rgba(245, 158, 11, .28));
        z-index: 0;
    }

    .flow-card-modern,
    .faq-card-modern {
        position: relative;
        z-index: 1;
        background: rgba(255, 255, 255, .92);
        border: 1px solid var(--line);
        border-radius: 28px;
        padding: 24px;
        box-shadow: 0 18px 44px rgba(77, 131, 246, .08);
        backdrop-filter: blur(10px);
        height: 100%;
    }

    .flow-card-modern.accent,
    .faq-card-modern.highlight {
        background: linear-gradient(135deg, #fff8fc 0%, #fffdf4 100%);
    }

    .step-badge,
    .faq-tag {
        width: fit-content;
        min-width: 58px;
        height: 42px;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 16px;
        font-size: 13px;
        font-weight: 800;
        background: linear-gradient(135deg, rgba(77, 131, 246, .12), rgba(236, 72, 153, .12), rgba(245, 158, 11, .14));
        color: var(--text-dark);
        margin-bottom: 16px;
    }

    .flow-card-modern h5,
    .faq-card-modern h5 {
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 10px;
    }

    .flow-card-modern p,
    .faq-card-modern p {
        line-height: 1.85;
        color: var(--muted);
        margin-bottom: 0;
    }

    .faq-grid-modern {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    @media (max-width: 991.98px) {
        .flow-line-wrap::before {
            display: none;
        }
    }

    @media (max-width: 767.98px) {
        .page-hero-shell {
            padding: 28px 20px;
            border-radius: 24px;
        }

        .faq-grid-modern {
            grid-template-columns: 1fr;
        }
    }
</style>