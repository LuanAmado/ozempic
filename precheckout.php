<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Oferta Local — Pequenos Artistas</title>

<!-- Tipografia moderna -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&family=Outfit:wght@600;800;900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  :root{
    --bg:#fffdf9;         /* fundo quente e claro */
    --surface:#ffffff;    /* cards */
    --ink:#24211e;        /* texto principal */
    --muted:#6b645f;      /* texto secundário */
    --brand:#ed6527;      /* laranja destaque */
    --green:#22c55e;      /* CTA */
    --green-2:#16a34a;
    --outline:#efe3d6;    /* borda suave */
    --radius:18px;
    --maxw:660px;
    --shadow:0 10px 30px rgba(0,0,0,.06);
  }

  *{box-sizing:border-box}
  html,body{margin:0}
  body{
    background:
      radial-gradient(1200px 600px at 80% -10%, #fff4ea 0%, transparent 60%),
      radial-gradient(1200px 700px at -10% 100%, #eaffe5 0%, transparent 60%),
      var(--bg);
    color:var(--ink);
    font-family:Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Helvetica Neue", sans-serif;
    padding-top:56px; /* compensa barra fixa */
  }

  /* Barra fixa super minimal com timer */
  .topbar{
    position:fixed; inset:0 0 auto 0; height:56px; z-index:10;
    display:flex; align-items:center; justify-content:center; gap:12px;
    background:linear-gradient(90deg,#ff7b3f,var(--brand));
    color:#fff; font-weight:900; letter-spacing:.2px; text-transform:uppercase;
    box-shadow:0 6px 20px rgba(0,0,0,.12);
  }
  .topbar .tag{opacity:.9; font-weight:800}
  .topbar .timer{
    font-family:Outfit, Inter, system-ui;
    font-variant-numeric:tabular-nums; letter-spacing:.5px;
    background:#0f172a; color:#7CFA8E;
    padding:8px 12px; border-radius:12px; min-width:120px; text-align:center;
    box-shadow:inset 0 0 0 2px #111827;
  }

  /* Container */
  .wrap{max-width:var(--maxw); margin:0 auto; padding:22px}

  /* Card principal */
  .card{
    background:var(--surface);
    border:1.5px solid var(--outline);
    border-radius:var(--radius);
    padding:22px;
    box-shadow:var(--shadow);
  }

  .title{
    text-align:center; font-weight:900; letter-spacing:-.2px;
    font-size:clamp(1.15rem,1rem + 1.6vw,1.8rem); line-height:1.2; margin:0 0 6px;
  }
  .city{
    color:var(--muted); text-align:center; margin:0 0 16px; font-weight:700;
  }

  /* Bloco de preços lado a lado */
  .prices{
    display:grid; grid-template-columns:1fr 1fr; gap:14px; align-items:stretch;
  }
  @media (max-width:520px){ .prices{grid-template-columns:1fr} }

  .price-box{
    background:linear-gradient(180deg, #fff, #fffefb);
    border:1.5px solid var(--outline);
    border-radius:16px; padding:16px;
    display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center;
  }
  .label{
    font-size:.82rem; color:#746b65; font-weight:800; text-transform:uppercase; letter-spacing:.3px;
  }
  .value-old{
    margin-top:6px; color:#6f6863; text-decoration:line-through;
    font-weight:800; font-size:1.28rem;
  }
  .value-now{
    margin-top:6px; color:var(--green-2);
    font-weight:900; font-size:clamp(1.8rem,1.4rem + 2.2vw,2.4rem);
    font-family:Outfit, Inter, system-ui; letter-spacing:.2px;
  }

  .saving{
    text-align:center; margin:14px 0 8px; font-weight:800; color:#2a2622;
    font-size:clamp(1rem,.95rem + .4vw,1.1rem);
text-decoration:underline;  
}
  .until{
    color:#3d352e; font-weight:700; text-align:center; margin:2px 0 14px;
  }

  .cta{
    display:block; width:100%; text-align:center; text-decoration:none; color:#fff;
    background:linear-gradient(180deg,var(--green),var(--green-2));
    padding:16px 18px; border-radius:999px; font-weight:900; letter-spacing:.2px;
    box-shadow:0 14px 28px rgba(34,197,94,.28); margin-top:6px;
    transition:transform .08s ease, filter .15s ease;
  }
  .cta:active{ transform:scale(.98) }
  .cta.disabled{ filter:grayscale(1); pointer-events:none }

  .foot{
    color:#6a5c52; text-align:center; font-weight:700; margin:14px 0 0; font-size:.98rem;
  }

  /* Divisor sutil caso queira inserir algo depois */
  .hr{
    height:1px; background:linear-gradient(90deg,transparent,#eadacc,transparent);
    margin:18px 0;
  }
</style>
</head>
<body>
  <!-- Topo fixo com timer -->
<div class="topbar p-4">
  <span id="regionTop" class="tag">Oferta para sua região termina em</span>
  <span id="topTimer" class="timer">--:--</span>
</div>

  <main class="wrap">
    <section class="card" role="region" aria-label="Oferta local">
      <h1 class="title">Condição especial na sua região</h1>
      <p id="cityLine" class="city">Detectando sua cidade…</p>

      <div class="prices" aria-live="polite">
        <div class="price-box" aria-label="Preço normal">
          <div class="label">Preço normal</div>
          <div id="priceOld" class="value-old">R$ 1.450,00</div>
        </div>
        <div class="price-box" aria-label="Preço hoje">
          <div class="label" style="color:#0e7c31">Hoje</div>
          <div id="priceNow" class="value-now">R$ 39,40</div>
        </div>
      </div>

      <p id="saving" class="saving">Você economiza R$ 1.410,60</p>
      <p id="until" class="until">Válido até às --:-- de hoje</p>

      <a class="cta" id="cta" href="https://app.monetizze.com.br/checkout/DMJ361156" target="_blank" rel="noopener">
        Garantir por R$ 39,40
      </a>

      <p id="proof" class="foot">48 mulheres compraram hoje perto de você.</p>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* ========= Utils ========= */
const BRL = v => v.toLocaleString('pt-BR',{style:'currency',currency:'BRL'});
const two = n => String(n).padStart(2,'0');
function getCookie(name){
  const v = `; ${document.cookie}`.split(`; ${name}=`);
  if (v.length === 2) return decodeURIComponent(v.pop().split(';').shift());
}
function setCookie(name,val,days){
  const d=new Date(); d.setTime(d.getTime()+days*864e5);
  document.cookie = `${name}=${encodeURIComponent(val)}; expires=${d.toUTCString()}; path=/; SameSite=Lax`;
}
async function withTimeout(promise, ms=2200){
  let t; const timeout = new Promise((_,rej)=> t=setTimeout(()=>rej(new Error('timeout')), ms));
  try{ return await Promise.race([promise, timeout]); } finally{ clearTimeout(t); }
}

/* ========= Preços & economia ========= */
const OLD = 1450.00, NOW = 39.40;
document.getElementById('priceOld').textContent = BRL(OLD);
document.getElementById('priceNow').textContent = BRL(NOW);
document.getElementById('saving').textContent = `Você economiza ${BRL(OLD-NOW)}`;

/* ========= Timer 17 min (persistente) ========= */
(function initTimer(){
  const KEY='deal_deadline_ts';
  let deadline = parseInt(localStorage.getItem(KEY),10);
  const now = Date.now();
  if(!(deadline && deadline>now)){
    deadline = now + 17*60*1000; // 17 min
    localStorage.setItem(KEY, String(deadline));
  }

  function updateUntil(){
    const d=new Date(deadline);
    document.getElementById('until').textContent = `Válido até às ${two(d.getHours())}:${two(d.getMinutes())} de hoje`;
  }
  updateUntil();

  const $topTimer = document.getElementById('topTimer');
  const $cta = document.getElementById('cta');

  function tick(){
    const t = deadline - Date.now();
    if(t<=0){
      $topTimer.textContent='00:00';
      $cta.textContent='Oferta encerrada';
      $cta.classList.add('disabled');
      return clearInterval(iv);
    }
    const m=Math.floor(t/60000), s=Math.floor((t%60000)/1000);
    $topTimer.textContent = `${two(m)}:${two(s)}`;
  }
  tick(); const iv=setInterval(tick,1000);
})();

/* ========= Cidade (ordem: ?cidade → cookie → GeoJS → ipapi → ipwho) ========= */
(async function resolveCity(){
  const qs = new URLSearchParams(location.search);
  let city = (qs.get('cidade') || getCookie('cidade') || '').trim();
  const $city   = document.getElementById('cityLine');
  const $proof  = document.getElementById('proof');
  const $regionTop = document.getElementById('regionTop');

  async function withTimeout(promise, ms=2200){
    let t; const timeout = new Promise((_,rej)=> t=setTimeout(()=>rej(new Error('timeout')), ms));
    try{ return await Promise.race([promise, timeout]); } finally{ clearTimeout(t); }
  }
  async function tryGeoJS(){
    const r = await withTimeout(fetch('https://get.geojs.io/v1/ip/geo.json',{headers:{'Accept':'application/json'}}), 2500);
    if(!r.ok) throw new Error('geojs bad');
    const j = await r.json();
    return j.city || j.region;
  }
  async function tryIpapi(){
    const r = await withTimeout(fetch('https://ipapi.co/json/',{headers:{'Accept':'application/json'}}), 2500);
    if(!r.ok) throw new Error('ipapi bad');
    const j = await r.json();
    return j.city || j.region;
  }
  async function tryIpwho(){
    const r = await withTimeout(fetch('https://ipwho.is/?fields=success,city,region',{headers:{'Accept':'application/json'}}), 2500);
    if(!r.ok) throw new Error('ipwho bad');
    const j = await r.json();
    if(!j.success) throw new Error('ipwho fail');
    return j.city || j.region;
  }

  if(!city){ try{ city = await tryGeoJS(); }catch{} }
  if(!city){ try{ city = await tryIpapi(); }catch{} }
  if(!city){ try{ city = await tryIpwho(); }catch{} }

  if(city){
    setCookie('cidade', city, 15);
    // Topo + mensagens com cidade
    if($regionTop) $regionTop.textContent = `Oferta para ${city} e região termina em`;
    if($city)      $city.textContent      = `Oferta válida em ${city} e região`;
    if($proof)     $proof.textContent     = `48 mulheres compraram hoje em ${city} e região.`;
  }else{
    // Fallback consistente: "sua região"
    if($regionTop) $regionTop.textContent = 'Oferta para sua região termina em';
    if($city)      $city.textContent      = 'Oferta válida para sua região';
    if($proof)     $proof.textContent     = '48 mulheres compraram hoje na sua região.';
  }
})();
</script>
</body>
</html>
