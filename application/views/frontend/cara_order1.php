<?php
/** Public Cara Order, CodeIgniter 3 / PHP 7.2+. No database queries or JavaScript. */
$co_phone = preg_replace('/[^0-9]/', '', (string) (isset($wa_number) ? $wa_number : ''));
$co_wa = 'https://wa.me/' . $co_phone;
$co_ig_gift = 'https://ig.me/m/mysimple.gift';
$co_ig_jastip = 'https://ig.me/m/jastip.indahaja_';
$co_services = array(
    array('number' => '01', 'title' => 'MySimpleGift', 'tagline' => 'Buket, hadiah custom & undangan digital', 'description' => 'Pilih inspirasi atau ceritakan momen dan budget kamu. Kami bantu cari pilihan yang pas.', 'route' => 'mysimplegift', 'text' => 'Halo kak, aku mau tanya MySimpleGift (buket, gift, atau undangan digital).'),
    array('number' => '02', 'title' => 'Jastip Indah Aja', 'tagline' => 'Open jastip, event, promo & request pribadi', 'description' => 'Kirim wishlist, foto produk, link, atau info event. Bisa request walaupun tidak sedang open jastip.', 'route' => 'jastipindahaja', 'text' => 'Halo kak, aku mau tanya Jastip Indah Aja. Ada barang yang ingin aku titip.'),
    array('number' => '03', 'title' => 'Spreadsheet & Template', 'tagline' => 'Template siap pakai atau custom', 'description' => 'Ceritakan data yang ingin dicatat dan hasil yang kamu butuhkan. Boleh kirim contoh atau referensi.', 'route' => 'spreadsheet', 'text' => 'Halo kak, aku mau konsultasi spreadsheet atau template custom.'),
    array('number' => '04', 'title' => 'Website & Sistem', 'tagline' => 'Company profile & web-based system', 'description' => 'Spill ide website atau alur sistem yang ingin dibuat. Kita bahas kebutuhan dan ruang lingkupnya dulu.', 'route' => 'web-development', 'text' => 'Halo kak, aku mau konsultasi pembuatan website atau sistem berbasis web.'),
);
?>
<style>
.co-page{--co-ink:#473329;--co-muted:#806c5d;--co-line:#e8d7c5;color:var(--co-ink)}
.co-page .co-wrap{max-width:1130px;margin:auto;padding:0 20px}
.co-page .co-hero{padding:104px 0 85px;text-align:center;background:linear-gradient(140deg,#fff6e9,#f7e8d7 62%,#fffaf1)}
.co-page .co-kicker{display:block;color:#9b744e;font-size:12px;font-weight:800;text-transform:uppercase;letter-spacing:.16em}
.co-page h1,.co-page h2,.co-page h3{color:var(--co-ink)}
.co-page h1{font-size:clamp(36px,5vw,58px);line-height:1.15;margin:15px auto;max-width:780px;font-weight:750}
.co-page .co-intro{font-size:16px;line-height:1.9;max-width:650px;margin:0 auto;color:var(--co-muted)}
.co-page .co-section{padding:74px 0}
.co-page .co-section.co-soft{background:#fff8ef}
.co-page .co-head{text-align:center;margin-bottom:30px}
.co-page .co-head h2{font-size:clamp(27px,3.3vw,38px);margin:9px 0 12px}
.co-page .co-head p{color:var(--co-muted);line-height:1.75;max-width:650px;margin:auto}
.co-page .co-steps{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
.co-page .co-step{padding:25px;background:#fff;border:1px solid var(--co-line);border-radius:20px}
.co-page .co-num{font-size:13px;color:#9a704c;font-weight:800;letter-spacing:.08em}
.co-page .co-step h3{font-size:19px;margin:12px 0 9px}
.co-page .co-step p{font-size:14px;line-height:1.8;color:var(--co-muted);margin:0}
.co-page .co-cards{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}
.co-page .co-card{padding:28px;background:#fff;border:1px solid var(--co-line);border-radius:22px;display:flex;flex-direction:column;align-items:start}
.co-page .co-card h3{font-size:25px;margin:9px 0}
.co-page .co-tagline{color:#946d4e;font-size:13px;font-weight:700}
.co-page .co-card p{font-size:14px;line-height:1.8;color:var(--co-muted);margin:7px 0 20px}
.co-page .co-actions{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-top:auto}
.co-page .co-btn{display:inline-flex;align-items:center;justify-content:center;padding:12px 19px;text-align:center;text-decoration:none;border-radius:999px;background:#8b5e34;border:1px solid #8b5e34;color:#fff!important;font-size:14px;font-weight:750;transition:background .15s}
.co-page .co-btn:hover{background:#6f492a;border-color:#6f492a}
.co-page .co-btn.outline{background:#fff;color:#79512f!important;border-color:#d9b99a}
.co-page .co-btn.outline:hover{background:#fff2e1}
.co-page .co-btn.instagram{background:#fff4f5;color:#9b4760!important;border-color:#e8b7c6}
.co-page .co-btn.instagram:hover{background:#ffe7ed}
.co-page .co-more{margin-top:15px;font-size:13px;font-weight:700;color:#89684f;text-decoration:none}
.co-page .co-more:hover{text-decoration:underline}
.co-page .co-final{padding:47px 20px;text-align:center;background:linear-gradient(145deg,#f4e2cd,#fff9f1);border-radius:23px}
.co-page .co-final h2{font-size:clamp(28px,3.4vw,39px);margin:9px 0}
.co-page .co-final p{font-size:15px;line-height:1.8;max-width:570px;margin:0 auto 25px;color:var(--co-muted)}
.co-page .co-final .co-actions{justify-content:center}
@media(max-width:760px){.co-page .co-hero{padding:78px 0 67px}.co-page .co-section{padding:55px 0}.co-page .co-steps{grid-template-columns:1fr}.co-page .co-cards{grid-template-columns:1fr}.co-page .co-card{padding:23px}.co-page .co-actions{gap:9px}}
@media(prefers-reduced-motion:reduce){.co-page .co-btn{transition:none}}
</style>
<main class="co-page">
  <section class="co-hero"><div class="co-wrap">
    <span class="co-kicker">How to Order</span>
    <h1>Mau pesan sesuatu? Gampang banget! ♡</h1>
    <p class="co-intro">Dari buket dan undangan digital, jastip barang incaran, sampai spreadsheet dan website custom. Ceritain aja kebutuhanmu, nanti kita bantu arahin.</p>
  </div></section>

  <section class="co-section"><div class="co-wrap">
    <div class="co-head"><span class="co-kicker">Cuma 3 langkah</span><h2>Caranya simpel, nggak pakai ribet.</h2><p>Nggak perlu bingung mulai dari mana. Konsultasi dulu juga boleh banget!</p></div>
    <div class="co-steps">
      <article class="co-step"><span class="co-num">01 / PILIH</span><h3>Pilih layanan</h3><p>Lihat produk atau layanan yang kamu suka. Belum tahu yang cocok? Tanya admin aja.</p></article>
      <article class="co-step"><span class="co-num">02 / CHAT</span><h3>Spill kebutuhanmu</h3><p>Kirim referensi, detail pesanan, budget, atau target waktu. Admin bantu cek dan jelaskan pilihan serta biaya.</p></article>
      <article class="co-step"><span class="co-num">03 / DEAL</span><h3>Konfirmasi & proses</h3><p>Setelah detail dan biaya disepakati, pesanan dikerjakan atau dibelikan sesuai jadwal dan ketentuan layanan.</p></article>
    </div>
  </div></section>

  <section class="co-section co-soft"><div class="co-wrap">
    <div class="co-head"><span class="co-kicker">Pilih yang kamu butuhkan</span><h2>Mau pesan lewat mana?</h2><p>Bisa langsung WhatsApp atau DM Instagram untuk MySimpleGift dan Jastip Indah Aja.</p></div>
    <div class="co-cards">
      <?php foreach ($co_services as $item): ?>
      <article class="co-card">
        <span class="co-num"><?= html_escape($item['number']); ?> / LAYANAN</span>
        <h3><?= html_escape($item['title']); ?></h3>
        <span class="co-tagline"><?= html_escape($item['tagline']); ?></span>
        <p><?= html_escape($item['description']); ?></p>
        <div class="co-actions">
          <?php if ($co_phone !== ''): ?>
            <a class="co-btn" href="<?= html_escape($co_wa . '?text=' . rawurlencode($item['text'])); ?>" target="_blank" rel="noopener noreferrer">Chat WhatsApp</a>
          <?php endif; ?>
          <?php if ($item['route'] === 'mysimplegift'): ?>
            <a class="co-btn instagram" href="<?= html_escape($co_ig_gift); ?>" target="_blank" rel="noopener noreferrer">DM IG MySimpleGift ↗</a>
          <?php elseif ($item['route'] === 'jastipindahaja'): ?>
            <a class="co-btn instagram" href="<?= html_escape($co_ig_jastip); ?>" target="_blank" rel="noopener noreferrer">DM IG Jastip ↗</a>
          <?php endif; ?>
        </div>
        <a class="co-more" href="<?= site_url($item['route']); ?>">Lihat detail layanan ↗</a>
      </article>
      <?php endforeach; ?>
    </div>
  </div></section>

  <section class="co-section"><div class="co-wrap">
    <div class="co-final">
      <span class="co-kicker">Let's Chat!</span>
      <h2>Masih bingung? Tanya aja dulu. 💛</h2>
      <p>Admin siap bantu dengan ramah. Kamu bisa tanya pilihan produk, request custom, atau konsultasi budget sebelum memutuskan.</p>
      <div class="co-actions">
        <?php if ($co_phone !== ''): ?><a class="co-btn" href="<?= html_escape($co_wa . '?text=' . rawurlencode('Halo kak, aku mau tanya cara order.')); ?>" target="_blank" rel="noopener noreferrer">Chat via WhatsApp</a><?php endif; ?>
        <a class="co-btn instagram" href="<?= html_escape($co_ig_gift); ?>" target="_blank" rel="noopener noreferrer">DM MySimpleGift ↗</a>
        <a class="co-btn instagram" href="<?= html_escape($co_ig_jastip); ?>" target="_blank" rel="noopener noreferrer">DM Jastip ↗</a>
      </div>
    </div>
  </div></section>
</main>
