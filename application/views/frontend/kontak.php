<section class="page-hero page-hero-modern text-center">
    <div class="container">
        <div class="page-hero-shell">
            <span class="section-kicker">contact us</span>
            <h1>Mau tanya atau langsung order? Langsung saja.</h1>
            <p>
                <!-- Halaman kontak dibuat lebih modern dan lebih engaging,
                tapi tetap fokus ke aksi utama: chat dan lihat social proof. -->
            </p>
        </div>
    </div>
</section>

<section class="section kontak-modern-wrap">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-7">
                <div class="contact-main-card h-100">
                    <div class="contact-badge">fast response 💬</div>
                    <h3>WhatsApp jadi pintu utama buat order dan tanya-tanya</h3>
                    <p>
                        Cocok untuk tanya, diskusi request, spill budget, atau langsung order.
                        Biar lebih cepat, lebih jelas, dan lebih nyaman.
                    </p>

                    <div class="contact-pills">
                        <span>gift</span>
                        <span>jastip</span>
                        <span>digital card</span>
                        <span>spreadsheet</span>
                    </div>

                    <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo saya ingin bertanya tentang layanan kami'); ?>" class="btn btn-main btn-lg mt-3">
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="social-stack h-100">
                    <div class="social-card-modern">
                        <div class="social-icon">📸</div>
                        <div>
                            <h5>@mysimple.gift</h5>
                            <p>Lihat portfolio gift, bouquet.</p>
                        </div>
                        <a href="https://instagram.com/mysimple.gift" target="_blank" class="btn btn-soft w-100">Buka Instagram</a>
                    </div>

                    <div class="social-card-modern highlight">
                        <div class="social-icon">🛍️</div>
                        <div>
                            <h5>@jastip.indahaja_</h5>
                            <p>Lihat update jastip, produk titipan, dan referensi item.</p>
                        </div>
                        <a href="https://instagram.com/jastip.indahaja_" target="_blank" class="btn btn-soft w-100">Buka Instagram</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .contact-main-card,
    .social-card-modern {
        background: rgba(255, 255, 255, .92);
        border: 1px solid var(--line);
        border-radius: 30px;
        padding: 26px;
        box-shadow: 0 18px 44px rgba(77, 131, 246, .08);
        height: 100%;
    }

    .contact-main-card {
        background: linear-gradient(135deg, #edf4ff 0%, #fff2f9 62%, #fff8dc 100%);
        border: 1px solid rgba(255, 255, 255, .85);
        box-shadow: 0 22px 52px rgba(77, 131, 246, .12);
    }

    .contact-badge {
        display: inline-flex;
        align-items: center;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .8);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--pink-600);
    }

    .contact-main-card h3,
    .social-card-modern h5 {
        font-weight: 800;
        color: var(--text-dark);
        margin: 16px 0 12px;
    }

    .contact-main-card p,
    .social-card-modern p {
        color: var(--muted);
        line-height: 1.85;
        margin-bottom: 0;
    }

    .contact-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 18px;
    }

    .contact-pills span {
        display: inline-flex;
        align-items: center;
        padding: 9px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .72);
        border: 1px solid rgba(255, 255, 255, .88);
        font-size: 13px;
        font-weight: 700;
        color: var(--blue-700);
    }

    .social-stack {
        display: grid;
        gap: 18px;
        height: 100%;
    }

    .social-card-modern {
        display: grid;
        gap: 12px;
        align-content: start;
    }

    .social-card-modern.highlight {
        background: linear-gradient(135deg, #fff8fc 0%, #fffdf4 100%);
    }

    .social-icon {
        width: 58px;
        height: 58px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        background: linear-gradient(135deg, rgba(77, 131, 246, .12), rgba(236, 72, 153, .12), rgba(245, 158, 11, .12));
    }
</style>