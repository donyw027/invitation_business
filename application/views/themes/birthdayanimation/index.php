<?php
$pageTitle = !empty($page_title) ? $page_title : (!empty($project->title) ? $project->title : 'Birthday Greeting');
$title = !empty($project->title) ? $project->title : 'Happy Birthday';
$subtitle = !empty($project->subtitle) ? $project->subtitle : 'A little sweet surprise made with love.';
$coverText = !empty($project->cover_text) ? $project->cover_text : 'Ada surat kecil buat kamu';
$displayName = !empty($project->receiver_name) ? $project->receiver_name : $title;
$senderName = !empty($project->sender_name) ? $project->sender_name : 'Someone Special';
$messageTitle = !empty($project->message_title) ? $project->message_title : 'Happy Birthday, Love';
$messageBody = !empty($project->message_body) ? $project->message_body : 'Hari ini adalah hari spesial untuk seseorang yang sangat berarti. Semoga setiap langkahmu selalu dipenuhi bahagia, cinta, dan hal-hal baik yang datang tepat waktu.';
$description = !empty($project->description) ? $project->description : 'Sebuah ucapan kecil, tapi dibuat dengan hati yang besar.';
$heroImage = !empty($project->hero_image) ? asset_or_url($project->hero_image) : 'https://images.unsplash.com/photo-1518199266791-5375a83190b7?auto=format&fit=crop&w=1400&q=80';
$musicUrl = !empty($project->music_url) ? $project->music_url : '';
$eventDateRaw = !empty($project->event_date) ? $project->event_date : '';
$eventDateISO = !empty($eventDateRaw) ? date('Y-m-d', strtotime($eventDateRaw)) : '';
$eventDateFormatted = !empty($eventDateRaw) ? date('d F Y', strtotime($eventDateRaw)) : date('d F Y');
$eventTime = !empty($project->event_time) ? $project->event_time : '';
$locationName = !empty($project->location_name) ? $project->location_name : '';
$locationAddress = !empty($project->location_address) ? $project->location_address : '';
$mapEmbed = !empty($project->map_embed) ? $project->map_embed : '';
$galleryItems = !empty($galleries) ? $galleries : [];
$wishEnabled = !empty($project->wish_enabled);
$giftEnabled = !empty($project->gift_enabled) || !empty($project->gift_info);
$giftInfo = !empty($project->gift_info) ? $project->gift_info : '';
$guestName = !empty($guest_name) ? $guest_name : (!empty($guest->name) ? $guest->name : '');
$guestSlug = !empty($guest) && !empty($guest->slug) ? $guest->slug : '';
$mapsQuery = trim($locationName . ' ' . $locationAddress);
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title><?= html_escape($pageTitle); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#ff7aa8">
<link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root{--pink:#ff78a8;--pink2:#ffb4cb;--hot:#ec4f8d;--cream:#fff7e8;--sun:#ffd55c;--sun2:#ffb300;--text:#56334d;--muted:#936d88;--white:#fff;--glass:rgba(255,255,255,.72);--shadow:0 24px 70px rgba(236,79,141,.2)}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;font-family:'Nunito',sans-serif;color:var(--text);background:radial-gradient(circle at top left,#fff4a8 0,#fff8df 22%,#ffe0ea 55%,#fff 100%);overflow-x:hidden}.baloo{font-family:'Baloo 2',cursive}
.bg-orbs:before,.bg-orbs:after{content:"";position:fixed;z-index:-2;border-radius:999px;filter:blur(8px);opacity:.55}.bg-orbs:before{width:360px;height:360px;background:#ffc4d8;left:-110px;top:90px}.bg-orbs:after{width:280px;height:280px;background:#ffe16b;right:-90px;bottom:70px}.float-layer{position:fixed;inset:0;pointer-events:none;z-index:2;overflow:hidden}.float-item{position:absolute;animation:floatUp linear infinite;color:#ff5b9c;text-shadow:0 8px 22px rgba(255,92,156,.22)}@keyframes floatUp{from{transform:translateY(110vh) rotate(0);opacity:0}10%,80%{opacity:.86}to{transform:translateY(-15vh) rotate(360deg);opacity:0}}
.open-screen{position:fixed;inset:0;z-index:99;display:grid;place-items:center;padding:24px;background:linear-gradient(155deg,#fff8dc,#ffe0ea 55%,#ffd1e2);transition:.9s ease}.open-screen.hide{opacity:0;visibility:hidden;transform:scale(1.04)}.open-card{text-align:center;max-width:520px;width:100%}.mini-label{display:inline-flex;gap:8px;align-items:center;background:rgba(255,255,255,.8);border:1px solid rgba(255,255,255,.9);border-radius:999px;padding:9px 16px;box-shadow:var(--shadow);font-weight:900;color:var(--hot)}.envelope-wrap{height:310px;position:relative;display:grid;place-items:center;cursor:pointer;perspective:900px}.envelope{position:relative;width:min(330px,86vw);height:205px;filter:drop-shadow(0 25px 35px rgba(236,79,141,.25));animation:softBounce 2.6s ease-in-out infinite}.env-back,.env-front,.env-left,.env-right,.env-flap,.letter{position:absolute}.env-back{inset:0;background:linear-gradient(135deg,#ff8fb7,#ff6ba0);border-radius:18px}.env-left{left:0;bottom:0;border-left:165px solid #ff78a8;border-top:104px solid transparent;border-bottom:104px solid transparent;border-radius:0 0 0 18px}.env-right{right:0;bottom:0;border-right:165px solid #ff9bbc;border-top:104px solid transparent;border-bottom:104px solid transparent;border-radius:0 0 18px 0}.env-front{left:0;right:0;bottom:0;border-left:165px solid transparent;border-right:165px solid transparent;border-bottom:112px solid #ff5f99;border-radius:0 0 18px 18px}.env-flap{left:0;top:0;border-left:165px solid transparent;border-right:165px solid transparent;border-top:120px solid #ffa6c2;transform-origin:top;transition:.8s ease;z-index:3}.letter{width:82%;height:150px;background:#fffdf7;left:9%;bottom:24px;border-radius:16px;padding:24px 18px;box-shadow:0 18px 40px rgba(86,51,77,.16);transform:translateY(45px);transition:.9s ease;z-index:1}.letter h3{margin:0;font-family:'Baloo 2';font-size:1.45rem;color:var(--hot)}.letter p{margin:8px 0 0;font-weight:800;color:#856178}.envelope-wrap.open .env-flap{transform:rotateX(180deg);z-index:0}.envelope-wrap.open .letter{transform:translateY(-86px) rotate(-1deg)}@keyframes softBounce{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}.tap-btn{border:0;border-radius:999px;background:#fff;color:var(--hot);font-weight:900;padding:13px 24px;box-shadow:var(--shadow);animation:pulse 1.4s infinite}.tap-btn i{margin-right:8px}@keyframes pulse{50%{transform:scale(1.05)}}
.main{opacity:0;transform:translateY(30px);transition:.8s ease}.main.show{opacity:1;transform:none}.hero{min-height:100vh;display:grid;place-items:center;padding:42px 16px 24px;position:relative}.hero-card{width:min(1060px,100%);border-radius:34px;background:var(--glass);border:1px solid rgba(255,255,255,.82);box-shadow:var(--shadow);overflow:hidden;backdrop-filter:blur(16px)}.hero-img{min-height:520px;background:linear-gradient(rgba(255,105,160,.12),rgba(255,198,216,.45)),url('<?= html_escape($heroImage); ?>') center/cover no-repeat;position:relative}.hero-img:after{content:"";position:absolute;inset:auto 0 0;height:48%;background:linear-gradient(transparent,rgba(86,51,77,.5))}.hero-content{padding:clamp(28px,5vw,58px)}.for-you{font-weight:900;color:var(--hot);letter-spacing:.06em;text-transform:uppercase}.hero h1{font-family:'Baloo 2';font-size:clamp(3rem,9vw,6.8rem);line-height:.86;margin:10px 0;color:#fff;text-shadow:0 12px 32px rgba(86,51,77,.35)}.hero-name{font-family:'Baloo 2';font-size:clamp(2.6rem,8vw,6rem);line-height:.9;color:var(--hot);text-shadow:0 8px 0 #fff3}.lead{font-size:1.1rem;color:var(--muted);font-weight:800}.btn-love{display:inline-flex;align-items:center;gap:8px;border:0;border-radius:999px;background:linear-gradient(135deg,var(--hot),#ff8db5);color:#fff;text-decoration:none;font-weight:900;padding:14px 22px;box-shadow:0 18px 38px rgba(236,79,141,.28)}.btn-ghost{display:inline-flex;align-items:center;gap:8px;border-radius:999px;background:#fff;color:var(--hot);text-decoration:none;font-weight:900;padding:14px 22px;box-shadow:0 12px 28px rgba(236,79,141,.13)}
.section{padding:84px 16px}.wrap{max-width:1080px;margin:auto}.section-title{font-family:'Baloo 2';font-size:clamp(2.1rem,6vw,4.2rem);color:var(--hot);line-height:.95}.sticker{display:inline-flex;align-items:center;gap:8px;border-radius:999px;background:#fff7cf;color:#9b6900;font-weight:900;padding:9px 15px;box-shadow:0 12px 24px rgba(255,179,0,.16)}.love-card{background:rgba(255,255,255,.78);border:1px solid rgba(255,255,255,.92);border-radius:32px;padding:clamp(24px,4vw,44px);box-shadow:var(--shadow);backdrop-filter:blur(14px)}.message-text{font-size:1.18rem;line-height:1.9;color:#6d4b63;font-weight:800;white-space:pre-line}.sunflower{font-size:3rem;display:inline-block;animation:spinSun 8s linear infinite}@keyframes spinSun{to{transform:rotate(360deg)}}.photo-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:22px}.polaroid{background:#fff;border-radius:18px;padding:12px 12px 24px;box-shadow:0 18px 40px rgba(86,51,77,.12);transform:rotate(var(--r));transition:.35s ease}.polaroid:hover{transform:rotate(0) translateY(-8px)}.polaroid img{width:100%;height:260px;object-fit:cover;border-radius:12px}.polaroid p{font-family:'Baloo 2';font-size:1.1rem;text-align:center;margin:12px 0 0;color:var(--hot)}.info-pill{background:#fff;border-radius:24px;padding:22px;box-shadow:0 12px 32px rgba(86,51,77,.09);height:100%}.info-pill i{font-size:2rem;color:var(--hot)}.count-box{background:linear-gradient(180deg,#fff,#fff8e0);border-radius:22px;padding:18px;text-align:center;box-shadow:0 12px 28px rgba(255,179,0,.12)}.count-box b{display:block;font-family:'Baloo 2';font-size:2rem;color:var(--hot)}.mapbox iframe{width:100%;height:330px;border:0;border-radius:28px;box-shadow:var(--shadow)}.wish-item{border-radius:22px;background:#fff;padding:18px;margin-bottom:14px;box-shadow:0 12px 26px rgba(86,51,77,.08)}.form-control{border-radius:18px;border:1px solid #ffd0df;padding:13px 15px}.music{position:fixed;right:18px;bottom:18px;z-index:20;border:0;border-radius:999px;background:#fff;color:var(--hot);box-shadow:var(--shadow);padding:12px 16px;font-weight:900}.reveal{opacity:0;transform:translateY(26px);transition:.7s ease}.reveal.show{opacity:1;transform:none}.confetti{position:fixed;width:10px;height:16px;top:-20px;z-index:100;animation:fall 3s linear forwards}@keyframes fall{to{transform:translateY(110vh) rotate(720deg);opacity:.1}}@media(max-width:768px){.hero-img{min-height:360px}.hero h1{color:#fff}.section{padding:60px 16px}.envelope-wrap{height:280px}.letter{height:136px}.polaroid img{height:230px}}
</style>
</head>
<body class="bg-orbs">
<div class="float-layer" id="floatLayer"></div>

<div class="open-screen" id="openScreen">
  <div class="open-card">
    <span class="mini-label"><i class="bi bi-envelope-heart"></i><?= html_escape($coverText); ?></span>
    <div class="envelope-wrap" id="openEnvelope" role="button" tabindex="0" aria-label="Buka surat ulang tahun">
      <div class="envelope">
        <div class="env-back"></div>
        <div class="letter">
          <h3>For <?= html_escape($displayName); ?> 💕</h3>
          <p>klik lagi buat buka kejutannya</p>
        </div>
        <div class="env-flap"></div><div class="env-left"></div><div class="env-right"></div><div class="env-front"></div>
      </div>
    </div>
    <button class="tap-btn" id="tapOpen"><i class="bi bi-stars"></i>Tap to Open</button>
  </div>
</div>

<main class="main" id="mainContent">
<section class="hero">
  <div class="hero-card row g-0">
    <div class="col-lg-6 hero-img d-flex align-items-end">
      <div class="p-4 p-lg-5 position-relative" style="z-index:1">
        <div class="for-you text-white">Special day • <?= html_escape($eventDateFormatted); ?></div>
        <h1>Happy<br>Birthday</h1>
      </div>
    </div>
    <div class="col-lg-6 hero-content d-flex flex-column justify-content-center">
      <?php if (!empty($guestName)): ?><div class="sticker mb-3"><i class="bi bi-person-heart"></i>Hai, <?= html_escape($guestName); ?></div><?php endif; ?>
      <div class="sunflower mb-2">🌻</div>
      <div class="for-you">Untuk yang tersayang</div>
      <div class="hero-name"><?= html_escape($displayName); ?></div>
      <p class="lead mt-3"><?= html_escape($subtitle); ?></p>
      <div class="d-flex gap-2 flex-wrap mt-3">
        <a class="btn-love" href="#message"><i class="bi bi-heart-fill"></i>Baca Ucapan</a>
        <?php if (!empty($galleryItems)): ?><a class="btn-ghost" href="#gallery"><i class="bi bi-images"></i>Lihat Foto</a><?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="section reveal" id="message">
  <div class="wrap">
    <div class="love-card text-center">
      <span class="sticker mb-3"><i class="bi bi-flower1"></i>Little Letter</span>
      <h2 class="section-title"><?= html_escape($messageTitle); ?></h2>
      <p class="message-text mt-4"><?= nl2br(html_escape($messageBody)); ?></p>
      <p class="mt-4 fw-bold text-muted">— <?= html_escape($senderName); ?> 💕</p>
    </div>
  </div>
</section>

<section class="section reveal">
  <div class="wrap">
    <div class="row g-4">
      <div class="col-md-4"><div class="info-pill"><i class="bi bi-calendar-heart"></i><h4 class="baloo mt-3">Tanggal</h4><p class="fw-bold mb-0"><?= html_escape($eventDateFormatted); ?></p></div></div>
      <div class="col-md-4"><div class="info-pill"><i class="bi bi-clock-history"></i><h4 class="baloo mt-3">Waktu</h4><p class="fw-bold mb-0"><?= html_escape($eventTime ?: 'Hari ini'); ?></p></div></div>
      <div class="col-md-4"><div class="info-pill"><i class="bi bi-gift"></i><h4 class="baloo mt-3">Pesan</h4><p class="fw-bold mb-0"><?= html_escape($description); ?></p></div></div>
    </div>
    
  </div>
</section>

<?php if (!empty($galleryItems)): ?>
<section class="section reveal" id="gallery">
  <div class="wrap">
    <div class="text-center mb-5">
      <span class="sticker"><i class="bi bi-camera-heart"></i>Our Sweet Memories</span>
      <h2 class="section-title mt-3">Gallery Foto</h2>
      <p class="lead"></p>
    </div>
    <div class="photo-grid">
      <?php $galleryIndex = 0; foreach ($galleryItems as $g): $galleryIndex++; ?>
      <div class="polaroid" style="--r:<?= ($galleryIndex % 2 === 0 ? '2deg' : '-2deg'); ?>">
        <img src="<?= asset_or_url($g->image_path); ?>" alt="Gallery <?= $galleryIndex; ?>">
        <p><?= !empty($g->caption) ? html_escape($g->caption) : 'Memory #' . $galleryIndex; ?> 💗</p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($locationName) || !empty($locationAddress) || !empty($mapEmbed)): ?>

<?php endif; ?>

<?php if ($giftEnabled): ?>
<section class="section reveal" id="gift">
  <div class="wrap">
    <div class="love-card text-center">
      <span class="sticker"><i class="bi bi-gift-fill"></i>Message</span>
      <h2 class="section-title mt-3"></h2>
      <p class="message-text"><?= nl2br(html_escape($giftInfo)); ?></p>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ($wishEnabled): ?>
<section class="section reveal" id="wishes">
  <div class="wrap">
    <div class="text-center mb-4">
      <span class="sticker"><i class="bi bi-chat-heart"></i>Wish Corner</span>
      <h2 class="section-title mt-3">Tulis Ucapan</h2>
    </div>
    <div class="love-card mb-4">
      <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
        <input type="hidden" name="project_id" value="<?= html_escape($project->id ?? ''); ?>">
        <input type="hidden" name="guest_slug" value="<?= html_escape($guestSlug); ?>">
        <div class="col-md-5"><input class="form-control" name="guest_name" placeholder="Nama kamu" value="<?= html_escape($guestName); ?>"></div>
        <div class="col-md-7"><input class="form-control" name="message" placeholder="Tulis ucapan manis di sini..."></div>
        <div class="col-12 text-end"><button class="btn-love" type="submit"><i class="bi bi-send-heart"></i>Kirim Ucapan</button></div>
      </form>
    </div>
    <?php if (!empty($wishes)): foreach ($wishes as $wish): ?>
      <div class="wish-item"><b><?= html_escape($wish->guest_name ?? 'Guest'); ?></b><p class="mb-0"><?= html_escape($wish->message ?? ''); ?></p></div>
    <?php endforeach; endif; ?>
  </div>
</section>
<?php endif; ?>

<section class="section reveal" id="share">
  <div class="wrap text-center">
    <div class="love-card">
      <h2 class="section-title">Made with Love</h2>
      <p class="lead">Semoga halaman kecil ini bisa bikin senyum hari ini.</p>
      <button class="btn-love" onclick="navigator.share ? navigator.share({title:document.title,url:location.href}) : copyLink()"><i class="bi bi-share-heart"></i>Share</button>
    </div>
  </div>
</section>
</main>

<?php if (!empty($musicUrl)): ?>
<audio id="bgMusic" loop preload="auto"><source src="<?= html_escape($musicUrl); ?>"></audio>
<button class="music" id="musicToggle"><i class="bi bi-music-note-beamed"></i> <span id="musicLabel">Music</span></button>
<?php endif; ?>

<script>
const main=document.getElementById('mainContent'),openScreen=document.getElementById('openScreen'),env=document.getElementById('openEnvelope'),tap=document.getElementById('tapOpen');
let opened=false;
function confetti(){for(let i=0;i<80;i++){const c=document.createElement('div');c.className='confetti';c.style.left=Math.random()*100+'vw';c.style.background=['#ff78a8','#ffd55c','#fff','#ffb4cb','#ec4f8d'][Math.floor(Math.random()*5)];c.style.animationDelay=Math.random()*1.2+'s';document.body.appendChild(c);setTimeout(()=>c.remove(),4200)}}
function openGift(){if(opened)return; opened=true; env.classList.add('open'); tap.innerHTML='<i class="bi bi-heart-fill"></i>Opening...'; confetti(); setTimeout(()=>{openScreen.classList.add('hide');main.classList.add('show');tryPlay();},1200)}
env.addEventListener('click',openGift);tap.addEventListener('click',openGift);env.addEventListener('keydown',e=>{if(e.key==='Enter')openGift()});
const icons=['🌻','💕','💗','✨','💖','🌸'];const layer=document.getElementById('floatLayer');for(let i=0;i<22;i++){const s=document.createElement('span');s.className='float-item';s.textContent=icons[i%icons.length];s.style.left=Math.random()*100+'vw';s.style.fontSize=(18+Math.random()*24)+'px';s.style.animationDuration=(7+Math.random()*7)+'s';s.style.animationDelay=(-Math.random()*10)+'s';layer.appendChild(s)}
const obs=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)e.target.classList.add('show')}),{threshold:.14});document.querySelectorAll('.reveal').forEach(x=>obs.observe(x));
function copyLink(){navigator.clipboard&&navigator.clipboard.writeText(location.href);alert('Link berhasil disalin 💕')}
<?php if (!empty($eventDateISO)): ?>
const target=new Date('<?= html_escape($eventDateISO); ?>T00:00:00').getTime();function tick(){let d=target-Date.now();if(d<0)d=0;document.getElementById('cdDays').textContent=Math.floor(d/86400000);document.getElementById('cdHours').textContent=Math.floor(d%86400000/3600000);document.getElementById('cdMinutes').textContent=Math.floor(d%3600000/60000);document.getElementById('cdSeconds').textContent=Math.floor(d%60000/1000)}tick();setInterval(tick,1000);
<?php endif; ?>
<?php if (!empty($musicUrl)): ?>
const audio=document.getElementById('bgMusic'),mt=document.getElementById('musicToggle'),ml=document.getElementById('musicLabel');function tryPlay(){audio&&audio.play().then(()=>ml.textContent='Playing').catch(()=>ml.textContent='Tap Music')}mt&&mt.addEventListener('click',()=>{if(audio.paused){audio.play();ml.textContent='Playing'}else{audio.pause();ml.textContent='Paused'}})
<?php else: ?>
function tryPlay(){}
<?php endif; ?>
</script>
</body>
</html>
