<footer class="footer">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <strong>MySimpleGift & Services</strong>
                <p class="mb-0 mt-2">Dari buket dan kado spesial, jastip kebutuhan favorit, hingga spreadsheet dan website untuk bisnismu. Pilih yang kamu butuhkan, kami bantu dengan senang hati.</p>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <strong>Layanan Kami</strong>
                <div class="d-grid gap-2 mt-2 small">
                    <a href="<?= site_url('mysimplegift'); ?>">MySimpleGift</a>
                    <a href="<?= site_url('jastipindahaja'); ?>">Jastip Indah Aja</a>
                    <a href="<?= site_url('spreadsheet'); ?>">Spreadsheet & Template</a>
                    <a href="<?= site_url('web-development'); ?>">Jasa Website & Sistem</a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <strong>Jelajahi</strong>
                <div class="d-grid gap-2 mt-2 small">
                    <a href="<?= site_url('review'); ?>">Galeri</a>
                    <a href="<?= site_url('cara_order'); ?>">Cara Order</a>
                    <a href="<?= site_url('kontak'); ?>">Kontak</a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-12">
                <strong>Ikuti Kami</strong>
                <div class="d-grid gap-2 mt-2 small">
                    <a href="https://instagram.com/mysimple.gift" target="_blank" rel="noopener noreferrer">@mysimple.gift</a>
                    <a href="https://instagram.com/jastip.indahaja_" target="_blank" rel="noopener noreferrer">@jastip.indahaja_</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between gap-2 mt-4 pt-4 border-top">
            <small>© <?= date('Y'); ?> MySimpleGift & Services. All rights reserved.</small>
            <small>Made with care, for your everyday needs.</small>
        </div>
    </div>
</footer>
<?php $msgWaFooter = preg_replace('/[^0-9]/', '', (string)$wa_number); ?>
<a class="sticky-wa" href="https://wa.me/<?= html_escape($msgWaFooter); ?>?text=<?= rawurlencode('Halo kak, aku mau tanya layanan dari website.'); ?>" target="_blank" rel="noopener noreferrer">💬 Chat Yuk!</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
