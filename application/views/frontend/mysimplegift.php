<?php
/* MySimpleGift brand page. Works with existing Public_page::mysimplegift() and shared layout. */
if (!function_exists('msg_gift_image')) {
    function msg_gift_image($name) {
        foreach (array('jpg','jpeg','png','webp') as $ext) {
            $path = 'assets/img/' . $name . '.' . $ext;
            if (is_file(FCPATH . $path)) return base_url($path);
        }
        return '';
    }
}
$giftWa = preg_replace('/\D+/', '', (string)(isset($wa_number) ? $wa_number : ''));
$giftOrder = 'https://wa.me/' . $giftWa . '?text=' . rawurlencode('Halo kak, aku mau tanya bouquet MySimpleGift.');
$giftInvitation = 'https://wa.me/' . $giftWa . '?text=' . rawurlencode('Halo kak, aku mau tanya undangan digital MySimpleGift.');
$giftOther = array(
    array('name'=>'Sweet Little Surprise', 'copy'=>'Pilihan buket manis yang bisa di-custom sesuai warna, gaya, dan budget favoritmu.', 'file'=>'buket5'),
    array('name'=>'Made for Your Moment', 'copy'=>'Untuk siapa pun dan acara apa pun, kami bantu sesuaikan detailnya dengan kebutuhanmu.', 'file'=>'buket6')
);
$giftFresh = array(
    array('title'=>'A Little Something Special','copy'=>'Pilihan manis untuk memberi kejutan kecil yang penuh makna.','file'=>'buket7'),
    array('title'=>'Pick Your Favorite','copy'=>'Suka modelnya? Yuk, konsultasikan warna dan detail yang kamu mau.','file'=>'buket8'),
    array('title'=>'Thoughtful & Lovely','copy'=>'Hadiah personal yang bisa disesuaikan dengan kebutuhan dan budget.','file'=>'buket9')
);
$giftGraduation = array(
    array('title'=>'Simply Lovely','file'=>'buket2'),
    array('title'=>'Your Color, Your Style','file'=>'buket3'),
    array('title'=>'Little Gift, Big Smile','file'=>'buket4')
);
?>
<style>
.msg-gift{overflow:hidden;color:#3f2e24}
.msg-gift .mg-hero{padding:96px 0 90px;background:linear-gradient(115deg,#fff8ec,#fffdf9 57%,#f8ead2)}
.msg-gift .mg-kicker{font-weight:800;text-transform:uppercase;font-size:12px;letter-spacing:.15em;color:#91643c}
.msg-gift .mg-h1,.msg-gift .mg-heading{font-family:'Cormorant Garamond',Georgia,serif;color:#3f2e24;font-weight:700;line-height:1.05;letter-spacing:-.02em}
.msg-gift .mg-h1{font-size:clamp(3.2rem,6.4vw,5.9rem);margin:18px 0 24px}
.msg-gift .mg-h1 em{font-weight:600;color:#a87348}
.msg-gift .mg-heading{font-size:clamp(2.4rem,4vw,3.7rem);margin:14px 0 17px}
.msg-gift .mg-lead{font-size:1.04rem;line-height:1.9;color:#806b59;max-width:590px}
.msg-gift .mg-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border-radius:999px;padding:13px 24px;text-decoration:none;font-weight:800;transition:transform .2s,background .2s}
.msg-gift .mg-btn:hover{transform:translateY(-2px)}
.msg-gift .mg-primary{background:#8b5e34;color:#fff!important}
.msg-gift .mg-primary:hover{background:#6e4726}
.msg-gift .mg-secondary{border:1px solid #cbb194;color:#654528;background:#fffaf2}
.msg-gift .mg-secondary:hover{background:#f8ead2;color:#654528}
.msg-gift .mg-feature-image{height:460px;position:relative;border-radius:34px;overflow:hidden;background:linear-gradient(135deg,#e9d5bf,#f7e8cf);box-shadow:0 25px 65px rgba(63,46,36,.12)}
.msg-gift .mg-feature-image img,.msg-gift .mg-image img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .45s}
.msg-gift .mg-feature-image:hover img,.msg-gift .mg-card:hover img{transform:scale(1.035)}
.msg-gift .mg-img-empty{height:100%;display:flex;justify-content:center;align-items:center;font-size:15px;color:#8b5e34;font-weight:700;background:linear-gradient(135deg,#f7e7b7,#efe0c8)}
.msg-gift .mg-image-tag{position:absolute;bottom:18px;left:18px;background:#fffdf8ed;border-radius:999px;padding:10px 17px;font-size:12px;font-weight:800;color:#79512f;backdrop-filter:blur(8px)}
.msg-gift .mg-section{padding:89px 0}
.msg-gift .mg-soft{background:#fff9f0}
.msg-gift .mg-text{color:#826f5f;line-height:1.85}
.msg-gift .mg-card{background:#fff;border:1px solid rgba(91,65,41,.09);border-radius:25px;overflow:hidden;box-shadow:0 14px 34px rgba(63,46,36,.06);height:100%}
.msg-gift .mg-image{height:305px;overflow:hidden;position:relative;background:#f5e6d1}
.msg-gift .mg-card-body{padding:23px 25px}
.msg-gift .mg-card h3{font-size:20px;font-weight:800;color:#3f2e24;margin:0 0 8px}
.msg-gift .mg-card p{color:#826f5f;margin:0;line-height:1.75;font-size:14px}
.msg-gift .mg-occasion{padding:24px;border-radius:22px;background:#fff;box-shadow:0 12px 32px rgba(63,46,36,.05);border:1px solid #f0e1cf;height:100%}
.msg-gift .mg-occasion-icon{font-size:29px;margin-bottom:10px}
.msg-gift .mg-occasion h3{font-weight:800;font-size:18px;margin:0 0 7px}
.msg-gift .mg-occasion p{color:#826f5f;line-height:1.7;margin:0;font-size:14px}
.msg-gift .mg-local{border-radius:30px;background:linear-gradient(115deg,#f5e6d1,#fff9ed);padding:36px 42px}
.msg-gift .mg-digital{background:linear-gradient(120deg,#3f2e24,#795333);border-radius:30px;padding:48px;color:#fffaf2}
.msg-gift .mg-digital h2{font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(2.4rem,4vw,3.5rem);line-height:1.12}
.msg-gift .mg-digital p{color:#f0dfcf;line-height:1.85}
.msg-gift .mg-digital .mg-secondary{background:#fff9f0;border-color:#fff9f0}
.msg-gift .mg-mini-steps{counter-reset:steps}
.msg-gift .mg-mini-step{padding:22px;border:1px solid #efe0cb;border-radius:18px;background:#fff;height:100%}
.msg-gift .mg-mini-step span{font-size:13px;color:#ac7d4f;font-weight:900}
.msg-gift .mg-mini-step strong{display:block;margin-top:8px;margin-bottom:5px}
@media(max-width:991.98px){.msg-gift .mg-hero{padding:85px 0 65px}.msg-gift .mg-feature-image{height:410px}.msg-gift .mg-section{padding:65px 0}}
@media(max-width:575.98px){.msg-gift .mg-hero{padding:75px 0 52px}.msg-gift .mg-feature-image{height:340px;border-radius:24px}.msg-gift .mg-image{height:255px}.msg-gift .mg-local,.msg-gift .mg-digital{padding:27px 23px;border-radius:23px}.msg-gift .mg-section{padding:55px 0}.msg-gift .mg-btn{width:100%}}
</style>
<main class="msg-gift">
  <section class="mg-hero">
    <div class="container"><div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span class="mg-kicker">MySimpleGift · Bouquet & meaningful gifts</span>
        <h1 class="mg-h1">Buat setiap momen jadi <em>lebih berkesan.</em></h1>
        <p class="mg-lead">Mau cari buket cantik tanpa bikin kantong berat? Di MySimpleGift, kamu bisa custom warna, isi, dan gaya sesuai budget. Buat wisuda, ulang tahun, Hari Ibu, anniversary, atau sekadar bikin seseorang tersenyum—semua bisa!</p>
        <div class="d-flex flex-wrap gap-3 mt-4">
          <a class="mg-btn mg-primary" href="<?= html_escape($giftOrder); ?>" target="_blank" rel="noopener noreferrer">Pesan Buket Yuk! ↗</a>
          <a class="mg-btn mg-secondary" href="#koleksi-buket">Lihat Koleksi</a>
        </div>
        <p class="mg-text small mt-4 mb-0">Buket custom ramah di kantong • Pesanan berbagai acara • Area Kota Malang</p>
      </div>
      <div class="col-lg-6">
        <div class="mg-feature-image">
          <?php $heroImg=msg_gift_image('buket1'); if($heroImg): ?><img src="<?= html_escape($heroImg); ?>" alt="Koleksi buket MySimpleGift untuk wisuda dan berbagai momen" loading="eager" fetchpriority="high"><?php else: ?><div class="mg-img-empty">MySimpleGift Bouquet</div><?php endif; ?>
          <span class="mg-image-tag">Handmade gifts, made with care ♡</span>
        </div>
      </div>
    </div></div>
  </section>

  <section class="mg-section" id="koleksi-buket">
    <div class="container">
      <div class="row align-items-end g-3 mb-4"><div class="col-lg-8">
        <span class="mg-kicker">Our bouquet collection</span>
        <h2 class="mg-heading">Buket cantik, <em>sesuai ceritamu.</em></h2>
        <p class="mg-text mb-0">Nggak perlu terpaku satu tema. Semua buket bisa jadi inspirasi untuk berbagai momen—tinggal pilih warna, ukuran, dan detail yang kamu suka. Budget kecil pun boleh banget konsultasi dulu!</p>
      </div><div class="col-lg-4 text-lg-end"><a class="mg-btn mg-secondary" href="<?= html_escape($giftOrder); ?>" target="_blank" rel="noopener noreferrer">Tanya Custom Buket ↗</a></div></div>
      <div class="row g-4">
        <?php foreach($giftGraduation as $b): $src=msg_gift_image($b['file']); ?>
          <div class="col-md-4"><article class="mg-card"><div class="mg-image">
            <?php if($src): ?><img loading="lazy" src="<?= html_escape($src); ?>" alt="<?= html_escape($b['title']); ?> - buket MySimpleGift"><?php else: ?><div class="mg-img-empty">MySimpleGift Bouquet</div><?php endif; ?>
          </div><div class="mg-card-body"><h3><?= html_escape($b['title']); ?></h3><p>Bisa custom warna, isi, dan ukuran sesuai selera serta budget kamu.</p></div></article></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="mg-section mg-soft">
    <div class="container">
      <div class="text-center mx-auto mb-5" style="max-width:680px"><span class="mg-kicker">More reasons to celebrate</span><h2 class="mg-heading">Nggak harus nunggu wisuda.</h2><p class="mg-text">Buat wisuda, ulang tahun, Hari Ibu, anniversary, ucapan terima kasih, atau kejutan spontan. Buketnya fleksibel, tinggal sesuaikan dengan momen dan budgetmu.</p></div>
      <div class="row g-4 align-items-stretch">
        <?php foreach($giftOther as $b): $src=msg_gift_image($b['file']); ?>
          <div class="col-md-6"><article class="mg-card"><div class="mg-image" style="height:330px">
            <?php if($src): ?><img loading="lazy" src="<?= html_escape($src); ?>" alt="<?= html_escape($b['name']); ?> dari MySimpleGift"><?php else: ?><div class="mg-img-empty">MySimpleGift Bouquet</div><?php endif; ?>
          </div><div class="mg-card-body"><h3><?= html_escape($b['name']); ?></h3><p><?= html_escape($b['copy']); ?></p></div></article></div>
        <?php endforeach; ?>
      </div>
      <div class="row g-3 mt-4">
        <div class="col-md-4"><div class="mg-occasion"><div class="mg-occasion-icon">🎓</div><h3>Wisuda & Sidang</h3><p>Hadiah kecil untuk perjuangan yang besar.</p></div></div>
        <div class="col-md-4"><div class="mg-occasion"><div class="mg-occasion-icon">🎂</div><h3>Ulang Tahun</h3><p>Surprise manis buat orang paling spesial.</p></div></div>
        <div class="col-md-4"><div class="mg-occasion"><div class="mg-occasion-icon">💐</div><h3>Hari Ibu & Hari Spesial</h3><p>Untuk bilang terima kasih, sayang, atau sekadar aku ingat kamu.</p></div></div>
      </div>
    </div>
  </section>

  <section class="mg-section" id="inspirasi-buket"><div class="container">
    <div class="row align-items-end g-3 mb-4">
      <div class="col-lg-8">
        <span class="mg-kicker">A little more inspiration</span>
        <h2 class="mg-heading">Pilih yang kamu suka, <em>custom sesukamu.</em></h2>
        <p class="mg-text mb-0">Masih cari inspirasi? Intip pilihan buket lainnya. Semua foto bisa jadi referensi, dan detail pesanan bisa kita diskusikan sesuai selera serta budget kamu.</p>
      </div>
      <div class="col-lg-4 text-lg-end"><a class="mg-btn mg-secondary" href="<?= html_escape($giftOrder); ?>" target="_blank" rel="noopener noreferrer">Request Buket Yuk! ↗</a></div>
    </div>
    <div class="row g-4">
      <?php foreach ($giftFresh as $b): $src = msg_gift_image($b['file']); ?>
        <div class="col-md-4"><article class="mg-card"><div class="mg-image">
          <?php if ($src): ?><img loading="lazy" src="<?= html_escape($src); ?>" alt="<?= html_escape($b['title']); ?> - koleksi buket MySimpleGift"><?php else: ?><div class="mg-img-empty">MySimpleGift Bouquet</div><?php endif; ?>
        </div><div class="mg-card-body"><h3><?= html_escape($b['title']); ?></h3><p><?= html_escape($b['copy']); ?></p></div></article></div>
      <?php endforeach; ?>
    </div>
  </div></section>

  <section class="mg-section"><div class="container">
    <div class="mg-local"><div class="row align-items-center g-4"><div class="col-lg-8">
      <span class="mg-kicker">Made with love in Malang</span>
      <h2 class="mg-heading mb-2">Buket manis, harga bersahabat. ♡</h2>
      <p class="mg-text mb-0">Cari buket yang cantik, bisa custom, dan tetap sesuai isi dompet? Yuk, ceritakan budgetmu—kami bantu pilihkan yang pas untuk berbagai acara. Berbasis di Malang, dekat area UNIKAMA, kami siap bantu buat buket untuk siapa saja dan momen apa saja—mulai dari hadiah sederhana sampai kejutan spesial. Bisa custom sesuai budget, dengan pengiriman area Kota Malang sesuai jadwal dan lokasi yang disepakati.</p>
    </div><div class="col-lg-4 text-lg-end"><a class="mg-btn mg-primary" href="<?= html_escape($giftOrder); ?>" target="_blank" rel="noopener noreferrer">Cek Pesanan & Pengiriman ↗</a></div></div></div>
  </div></section>

  <section class="mg-section mg-soft"><div class="container">
    <div class="mg-digital"><div class="row align-items-center g-4"><div class="col-lg-8">
      <span class="mg-kicker" style="color:#f2d8b7">More from MySimpleGift</span>
      <h2 class="mt-3">Ada undangan digital & greeting card juga, lho!</h2>
      <p class="mt-3 mb-0">Selain buket dan hadiah, kamu juga bisa bikin undangan digital untuk acara spesial atau greeting card dengan pesan personal. Praktis untuk dibagikan, tetap berkesan.</p>
    </div><div class="col-lg-4 d-flex flex-column gap-2 align-items-stretch">
      <a class="mg-btn mg-secondary" href="<?= site_url('review'); ?>#template-preview">Lihat Template Undangan ↗</a>
      <a class="mg-btn mg-secondary" href="<?= html_escape($giftInvitation); ?>" target="_blank" rel="noopener noreferrer">Tanya Undangan Digital ↗</a>
    </div></div></div>
  </div></section>

  <section class="mg-section"><div class="container">
    <div class="text-center mb-4"><span class="mg-kicker">How to order</span><h2 class="mg-heading">Ordernya simpel, kok.</h2></div>
    <div class="row g-3 mg-mini-steps">
      <div class="col-md-4"><div class="mg-mini-step"><span>01</span><strong>Ceritakan keperluanmu</strong><p class="mg-text mb-0 small">Mau untuk acara apa pun, kirim inspirasi dan budget kamu ya.</p></div></div>
      <div class="col-md-4"><div class="mg-mini-step"><span>02</span><strong>Pilih & konfirmasi</strong><p class="mg-text mb-0 small">Kami bantu cek pilihan, detail pesanan, estimasi, dan jadwalnya.</p></div></div>
      <div class="col-md-4"><div class="mg-mini-step"><span>03</span><strong>Gift siap dikirim</strong><p class="mg-text mb-0 small">Pesanan disiapkan dengan rapi, lalu diambil atau dikirim sesuai kesepakatan.</p></div></div>
    </div>
    <div class="text-center mt-5"><a class="mg-btn mg-primary" href="<?= html_escape($giftOrder); ?>" target="_blank" rel="noopener noreferrer">Yuk, Bikin Hadiah Spesial ↗</a></div>
  </div></section>
</main>
