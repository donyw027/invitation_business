<footer class="footer">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <strong><?= html_escape($brand_name); ?></strong>
                <p class="mb-0 mt-2">Cute local service untuk jastip Malang, jastip Trawas, gift, bouquet, undangan digital, greeting card, dan spreadsheet template.</p>
            </div>
            <div class="col-lg-3 col-6">
                <strong>Area</strong><br>
                <small>Malang • Batu • Trawas<br>Surabaya & luar kota by request</small>
            </div>
            <div class="col-lg-2 col-6">
                <strong>Links</strong><br>
                <small><a href="<?= site_url('review'); ?>">Review</a><br><a href="<?= site_url('cara_order'); ?>">Cara Order</a><br><a href="<?= site_url('kontak'); ?>">Kontak</a></small>
            </div>
            <div class="col-lg-2">
                <strong>Social</strong><br>
                <small><a href="https://instagram.com/mysimple.gift" target="_blank">@mysimple.gift</a><br><a href="https://instagram.com/jastip.indahaja_" target="_blank">@jastip.indahaja_</a></small>
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between gap-2 mt-4 pt-4 border-top">
            <small>© <?= date('Y'); ?> <?= html_escape($brand_name); ?>. Made with love.</small>
            <small>Jastip & Bouquet • Titip makanan • Gift • Digital card</small>
        </div>
    </div>
</footer>

<a class="sticky-wa" href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku mau titip/order dari website.'); ?>">💬 Titip Sekarang</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>