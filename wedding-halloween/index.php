<?php
require_once 'includes/data.php';

$bride = $weddingInfo['brideName'];
$groom = $weddingInfo['groomName'];
$brideInit = mb_substr($bride, 0, 1);
$groomInit = mb_substr($groom, 0, 1);
$weddingDateFormatted = date('l, F j, Y', strtotime($weddingInfo['weddingDate']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($weddingInfo['tagline']) ?> — <?= htmlspecialchars($bride) ?> & <?= htmlspecialchars($groom) ?></title>
<meta name="description" content="You are cordially summoned to the Halloween Gothic Wedding of <?= htmlspecialchars($bride) ?> & <?= htmlspecialchars($groom) ?>. <?= htmlspecialchars($weddingInfo['tagline']) ?>.">
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🦇</text></svg>">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- ============================================
     SPOOKY BACKGROUND EFFECTS
     ============================================ -->
<div id="spooky-bg" aria-hidden="true">
  <div class="bg-vignette"></div>
  <div class="bg-glow-top"></div>
  <div class="bg-glow-left"></div>
  <div class="bg-glow-right"></div>
  <div class="bat bat-1">🦇</div>
  <div class="bat bat-2">🦇</div>
  <div class="bat bat-3">🦇</div>
  <div class="mist"></div>
</div>

<!-- ============================================
     ENVELOPE / INTRO SCREEN
     ============================================ -->
<div id="envelope-screen" role="dialog" aria-label="Wedding Invitation">
  <div class="env-bg-glow"></div>
  <div class="env-moon"></div>

  <button class="sound-toggle" id="sound-toggle" data-sound="on">
    🔊 Audio Enchantment On
  </button>

  <div class="env-card">
    <span class="env-corner tl">✠</span>
    <span class="env-corner tr">✠</span>
    <span class="env-corner bl">✠</span>
    <span class="env-corner br">✠</span>

    <div class="env-badge">🌙 By Royal Summons of Darkness ✨</div>

    <h1 class="env-title"><?= htmlspecialchars($weddingInfo['tagline']) ?></h1>
    <p class="env-sinhala"><?= htmlspecialchars($weddingInfo['taglineSinhala']) ?></p>
    <span class="env-divider"></span>

    <p class="env-invite">You are cordially summoned to witness the eternal union of</p>

    <div style="margin:1rem 0">
      <p class="env-bride font-cinzel-dec"><?= htmlspecialchars($bride) ?></p>
      <span class="env-and">&amp;</span>
      <p class="env-bride font-cinzel-dec"><?= htmlspecialchars($groom) ?></p>
    </div>

    <p class="env-date"><?= htmlspecialchars($weddingDateFormatted) ?> • <?= htmlspecialchars($weddingInfo['weddingTime']) ?></p>

    <!-- Wax Seal Button -->
    <button id="wax-seal-btn" class="wax-seal-btn" title="Click to break the wax seal">
      <div class="wax-ring"></div>
      <div class="wax-disc">
        <div class="wax-disc-inner">
          <span style="font-size:1.5rem">🦇</span>
          <span>Break Seal</span>
          <span><?= $brideInit ?> &amp; <?= $groomInit ?></span>
        </div>
      </div>
    </button>
    <div class="wax-ribbon"><span></span><span></span></div>

    <p class="seal-hint">🕯️ Click the wax seal to unveil your haunted invitation 🕯️</p>

    <p class="env-quote">"Love is immortal, and together we dance beyond the grave."</p>
  </div>
</div>

<!-- ============================================
     NAVBAR
     ============================================ -->
<header id="navbar">
  <div class="nav-inner">
    <a href="#hero" class="nav-brand">
      <div class="nav-mono"><?= $brideInit ?> &amp; <?= $groomInit ?></div>
      <div>
        <div class="nav-title">TILL DEATH DO US PART</div>
        <div class="nav-sub" data-en="Halloween Wedding" data-si="හැලොවීන් මංගල ආරාධනාව">Halloween Wedding</div>
      </div>
    </a>

    <nav class="nav-links">
      <a href="#story"     data-en="Our Story"       data-si="අපේ කතාව">Our Story</a>
      <a href="#schedule"  data-en="Rituals"          data-si="චාරිත්‍ර">Rituals</a>
      <a href="#venue"     data-en="The Castle"       data-si="ශාලාව">The Castle</a>
      <a href="#dress-code" data-en="Dress Code"      data-si="ඇඳුම් විලාසිතා">Dress Code</a>
      <a href="#rsvp"      data-en="RSVP"             data-si="RSVP කරන්න">RSVP</a>
      <a href="#guestbook" data-en="Guestbook"        data-si="ආශිර්වාද">Guestbook</a>
      <a href="#gallery"   data-en="Gallery"          data-si="ඡායාරූප">Gallery</a>
      <a href="#potions"   data-en="Potions &amp; Tarot" data-si="මැජික් ක්‍රීඩා">Potions &amp; Tarot</a>
    </nav>

    <div class="nav-actions">
      <button id="music-btn">
        <span class="music-icon">🔇</span>
        <span class="music-label">Play Waltz</span>
      </button>
      <button id="lang-btn">සිංහල</button>
      <a href="#rsvp" class="btn btn-rose" style="display:none" id="nav-rsvp-btn">♥ RSVP</a>
      <button id="hamburger" aria-label="Open menu">☰</button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu">
    <div class="mobile-links">
      <a href="#story"      data-en="Our Story"       data-si="අපේ කතාව">Our Story</a>
      <a href="#schedule"   data-en="Rituals"          data-si="චාරිත්‍ර">Rituals</a>
      <a href="#venue"      data-en="The Castle"       data-si="ශාලාව">The Castle</a>
      <a href="#dress-code" data-en="Dress Code"       data-si="ඇඳුම් විලාසිතා">Dress Code</a>
      <a href="#rsvp"       data-en="RSVP"             data-si="RSVP කරන්න">RSVP</a>
      <a href="#guestbook"  data-en="Guestbook"        data-si="ආශිර්වාද">Guestbook</a>
      <a href="#gallery"    data-en="Gallery"          data-si="ඡායාරූප">Gallery</a>
      <a href="#potions"    data-en="Potions &amp; Tarot" data-si="මැජික් ක්‍රීඩා">Potions &amp; Tarot</a>
    </div>
    <div class="mobile-rsvp">
      <a href="#rsvp" class="btn btn-rose" style="width:100%;justify-content:center">RSVP Now 🖤</a>
    </div>
  </div>
</header>

<!-- ============================================
     MAIN CONTENT
     ============================================ -->
<div id="main-content" class="hidden">

<!-- ===== HERO ===== -->
<section id="hero">
  <div class="hero-bg">
    <img src="images/hero-gothic-wedding.jpg" alt="Gothic Halloween Wedding">
    <div class="hero-overlay-1"></div>
    <div class="hero-overlay-2"></div>
  </div>
  <div class="hero-moon"></div>

  <div class="hero-content">
    <div class="hero-badge">🌑 Halloween Night • Oct 31 • Blood Moon Rising ✨</div>

    <div style="margin-bottom:1rem">
      <p class="hero-invite" data-en="Cordially Inviting You to the Wedding of" data-si="ඔබ සැමට අපගේ මංගල්‍යයට ආරාධනා!">Cordially Inviting You to the Wedding of</p>
      <h1 class="hero-name">
        <?= htmlspecialchars($bride) ?>
        <span class="hero-and">&amp;</span>
        <?= htmlspecialchars($groom) ?>
      </h1>
      <p class="hero-tagline">"<?= htmlspecialchars($weddingInfo['tagline']) ?>"</p>
      <p class="hero-sinhala font-sinhala"><?= htmlspecialchars($weddingInfo['taglineSinhala']) ?></p>
    </div>

    <div class="hero-info-bar">
      <span>🦇 <?= htmlspecialchars($weddingDateFormatted) ?></span>
      <span class="hero-info-sep">|</span>
      <span>⏳ <?= htmlspecialchars($weddingInfo['weddingTime']) ?> Under the Stars</span>
      <span class="hero-info-sep">|</span>
      <span>📍 <?= htmlspecialchars($weddingInfo['venueName']) ?></span>
    </div>

    <!-- Countdown -->
    <div class="countdown-wrap">
      <p class="countdown-label">
        <span class="animate-spin-slow" style="display:inline-block">🕐</span>
        <span data-en="Counting Down To The Witching Hour" data-si="මංගල්‍යයට ඉතිරි කාලය">Counting Down To The Witching Hour</span>
      </p>
      <div class="countdown-grid">
        <?php foreach ([['Days','දින'],['Hours','පැය'],['Minutes','මිනිත්තු'],['Seconds','තත්පර']] as $u): ?>
        <div class="cd-card">
          <div class="cd-num">00</div>
          <div class="cd-label" data-en="<?= $u[0] ?>" data-si="<?= $u[1] ?>"><?= $u[0] ?></div>
          <span class="cd-accent"></span>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="cal-actions">
        <button id="btn-gcal" class="btn btn-amber">📅 <span data-en="Add to Google Calendar" data-si="Google Calendar එකට එකතු කරන්න">Add to Google Calendar</span></button>
        <button id="btn-ics"  class="btn btn-ghost">⬇️ <span data-en="Download iCal (.ics)" data-si="Apple iCal බාගත කරන්න">Download iCal (.ics)</span></button>
      </div>
    </div>

    <div class="hero-actions">
      <a href="#rsvp" class="btn btn-rose" style="padding:.85rem 2rem;font-size:.85rem">
        ♥ <span data-en="Accept Your Summon (RSVP)" data-si="පැමිණීම තහවුරු කරන්න (RSVP)">Accept Your Summon (RSVP)</span>
      </a>
      <a href="#schedule" class="btn btn-amber" style="padding:.85rem 1.5rem;font-size:.85rem">
        🧭 <span data-en="Night Rituals &amp; Schedule" data-si="චාරිත්‍ර කාලසටහන">Night Rituals &amp; Schedule</span>
      </a>
      <button id="thunder-btn" class="btn btn-ghost" style="padding:.85rem" title="Summon Thunder">⚡</button>
    </div>

    <p class="hero-quote">"Join us where the shadows dance, goblets overflow with enchanted wine, and two immortal souls become one for eternity."</p>
  </div>

  <!-- Scroll Indicator -->
  <div style="position:relative;z-index:10;margin-top:3rem;text-align:center">
    <span style="font-family:'Cinzel',serif;font-size:.6rem;letter-spacing:.18em;color:#78716c;text-transform:uppercase;display:block;margin-bottom:.35rem">Scroll to explore the coven</span>
    <div style="width:1.25rem;height:2rem;border-radius:999px;border:2px solid #57534e;margin:0 auto;display:flex;align-items:flex-start;justify-content:center;padding:.25rem">
      <div class="animate-bounce" style="width:.25rem;height:.5rem;background:#fbbf24;border-radius:999px"></div>
    </div>
  </div>
</section>

<!-- ===== LOVE STORY ===== -->
<section id="story" class="section">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">📖 <span data-en="Chronicles of Eternal Devotion" data-si="අපගේ ආදර කතාව">Chronicles of Eternal Devotion</span></div>
      <h2 class="section-heading text-glow-gold" data-en="Our Haunting Romance" data-si="අපගේ ආදර වෘත්තාන්තය">Our Haunting Romance</h2>
      <p class="section-sub">"<?= htmlspecialchars($weddingInfo['storyParchment']) ?>"</p>
      <span class="section-divider"></span>
    </div>

    <div class="story-grid">
      <!-- Photo -->
      <div>
        <div class="story-photo-wrap">
          <div class="story-photo-frame">
            <img src="images/couple-portrait.jpg" alt="<?= htmlspecialchars($bride) ?> &amp; <?= htmlspecialchars($groom) ?>">
            <span class="photo-corner tl">✠</span><span class="photo-corner tr">✠</span>
            <span class="photo-corner bl">✠</span><span class="photo-corner br">✠</span>
            <div class="photo-caption">
              <p class="font-cinzel-dec" style="font-size:1.1rem;color:#fce7f3"><?= htmlspecialchars($bride) ?> &amp; <?= htmlspecialchars($groom) ?></p>
              <p style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.75rem;color:rgba(253,230,138,.8);margin-top:.25rem">"Two souls bound not by time, but by eternity."</p>
            </div>
          </div>
        </div>
        <div style="text-align:center">
          <button id="love-counter-btn" class="love-counter-btn">
            ♥ <span class="love-label">Send Dark Blessings to the Couple</span>
            <span class="love-count" style="padding:.15rem .5rem;border-radius:999px;background:rgba(0,0,0,.6);font-family:'Courier New',monospace;font-size:.75rem;color:#fbbf24">666</span>
          </button>
        </div>
      </div>

      <!-- Chapters -->
      <div class="story-chapters">
        <?php
        $chapters = [
            ['titleEn'=>'Chapter I: The Twilight Encounter','titleSi'=>'පළමු හමුවීම: අන්ධකාරයේ සුන්දරත්වය','date'=>'Autumn Equinox 2021','icon'=>'🕯️',
             'descEn'=>'They met in an ancient antiquities library amidst towering shelves of leather-bound grimoires and autumn rain. A shared cup of dark roast espresso and a debate over gothic literature ignited a spark that would never fade.',
             'descSi'=>'පැරණි පුස්තකාලයකදී පොත්පත් සහ කෝපි සුවඳ මැද ඔවුන්ගේ දෙනෙත් හමු විය. එතැන් පටන් දෙහදක බැඳීම ඇරඹුණි.'],
            ['titleEn'=>'Chapter II: Adventures in the Shadows','titleSi'=>'දෙවන පරිච්ඡේදය: සොඳුරු මතකයන්','date'=>'Halloween 2023','icon'=>'🦇',
             'descEn'=>'From moonlit walks in misty woodlands to exploring medieval castle ruins across the highlands, every journey proved they were two parts of the same eternal mystery.',
             'descSi'=>'මීදුමෙන් වැසුණු කඳුකරයේ සහ මාලිගා නටබුන් අතර එක්ව ගත කළ සුන්දර චාරිකා ඔවුන් වඩාත් සමීප කළේය.'],
            ['titleEn'=>'Chapter III: The Crypt Proposal','titleSi'=>'තුන්වන පරිච්ඡේදය: සදාකාලික පොරොන්දුව','date'=>'Midnight, October 31, 2024','icon'=>'💍',
             'descEn'=>'Beneath a blood-red harvest moon on the candlelit terrace of Ravenhurst Manor, Damian dropped to one knee and presented a ring set with obsidian and midnight diamonds. Evelyn whispered "Forever and beyond."',
             'descSi'=>'පසුගිය හැලොවීන් මධ්‍යම රාත්‍රියේ රතු සඳ එළිය යටදී, සදාකාලිකව එක්ව සිටීමට ඔහු විවාහ යෝජනාව ගෙන ආවේය.'],
        ];
        foreach ($chapters as $ch): ?>
        <div class="chapter-card">
          <div class="chapter-inner">
            <div class="chapter-icon"><?= $ch['icon'] ?></div>
            <div style="flex:1">
              <div style="display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:.5rem;margin-bottom:.5rem">
                <h3 class="font-cinzel" style="font-size:1rem;font-weight:700;color:#f5f5f4" data-en="<?= htmlspecialchars($ch['titleEn']) ?>" data-si="<?= htmlspecialchars($ch['titleSi']) ?>"><?= htmlspecialchars($ch['titleEn']) ?></h3>
                <span class="chapter-badge"><?= htmlspecialchars($ch['date']) ?></span>
              </div>
              <p class="font-cormorant" style="font-size:1rem;color:#d6d3d1;line-height:1.7" data-en="<?= htmlspecialchars($ch['descEn']) ?>" data-si="<?= htmlspecialchars($ch['descSi']) ?>"><?= htmlspecialchars($ch['descEn']) ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

        <div class="story-quote">
          <p style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.9rem;color:rgba(253,230,138,.9)">🔥 "I would find you in any lifetime, across any graveyard, through any storm." 🌙</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== CEREMONY SCHEDULE ===== -->
<section id="schedule" class="section" style="background:#06040a">
  <div class="container">
    <div class="section-header">
      <div class="section-badge amber">🕐 <span data-en="Timeline of Supernatural Festivities" data-si="කාලසටහන">Timeline of Supernatural Festivities</span></div>
      <h2 class="section-heading text-glow-gold" data-en="Rituals of the Night" data-si="මංගල රාත්‍රී චාරිත්‍ර">Rituals of the Night</h2>
      <p class="section-sub">From the dusk gathering to midnight sparks, every hour holds a haunting enchantment.</p>
      <span class="section-divider"></span>
    </div>

    <div class="altar-banner">
      <img src="images/ceremony-altar.jpg" alt="Candlelit Altar">
      <div class="altar-overlay">
        <span class="font-cinzel" style="font-size:.65rem;color:#fbbf24;letter-spacing:.18em;text-transform:uppercase">The Sacred Altar of Shadows</span>
        <h3 class="font-cinzel" style="font-size:1.3rem;font-weight:700;color:#fce7f3">The Starlit Gothic Chapel Ceremony</h3>
        <p class="font-cormorant" style="font-style:italic;font-size:.9rem;color:#d6d3d1">"Surrounded by dripping black tapers, red rose petals, and the sacred chime of cathedral bells."</p>
      </div>
    </div>

    <div class="timeline">
      <?php foreach ($scheduleEvents as $ev): ?>
      <div class="timeline-item">
        <div class="tl-node <?= $ev['highlight'] ? 'highlight' : '' ?>"><?= $ev['icon'] ?></div>
        <div class="tl-time"><?= htmlspecialchars($ev['time']) ?></div>
        <div class="tl-card <?= $ev['highlight'] ? 'highlight' : '' ?>">
          <div class="tl-header">
            <div>
              <h3 class="font-cinzel" style="font-size:1rem;font-weight:700;color:#f5f5f4;margin-bottom:.25rem" data-en="<?= htmlspecialchars($ev['title']) ?>" data-si="<?= htmlspecialchars($ev['titleSi']) ?>"><?= htmlspecialchars($ev['title']) ?></h3>
              <span style="font-family:'Cinzel',serif;font-size:.65rem;color:#f43f5e;display:flex;align-items:center;gap:.25rem">📍 <?= htmlspecialchars($ev['location']) ?></span>
            </div>
            <button class="remind-btn" data-event="<?= htmlspecialchars($ev['title']) ?>">🔔 <span data-en="Set Alert" data-si="දැනුම් දෙන්න">Set Alert</span></button>
          </div>
          <p class="font-cormorant" style="font-size:1rem;color:#d6d3d1;line-height:1.7;margin-top:.5rem"><?= htmlspecialchars($ev['description']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== VENUE ===== -->
<section id="venue" class="section" style="background:#08050e">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">📍 <span data-en="Sanctuary of the Eternal Vow" data-si="ස්ථානය සහ විස්තර">Sanctuary of the Eternal Vow</span></div>
      <h2 class="section-heading text-glow-gold"><?= htmlspecialchars($weddingInfo['venueName']) ?></h2>
      <p class="section-sub"><?= htmlspecialchars($weddingInfo['venueAddress']) ?>, <?= htmlspecialchars($weddingInfo['venueCity']) ?></p>
      <span class="section-divider"></span>
    </div>

    <div class="venue-grid">
      <div class="venue-img-wrap">
        <img src="images/gothic-castle.jpg" alt="Ravenhurst Castle">
        <div class="venue-img-overlay">
          <span class="font-cinzel" style="font-size:.65rem;color:#fbbf24;letter-spacing:.15em;text-transform:uppercase">Shadowvale Highland Estate</span>
          <h3 class="font-cinzel" style="font-size:1.2rem;font-weight:700;color:#f5f5f4">A 19th Century Gothic Masterpiece</h3>
          <p style="font-family:'Cormorant Garamond',serif;font-size:.9rem;color:#d6d3d1;margin-top:.25rem">Surrounded by towering weeping willows, candlelit stone stairs, and ancient iron gates.</p>
        </div>
      </div>

      <div class="card venue-card">
        <div class="venue-tabs">
          <button class="tab-btn active" data-tab="details" data-en="Location Guide" data-si="ස්ථාන මාර්ගෝපදේශය">Location Guide</button>
          <button class="tab-btn" data-tab="travel" data-en="Arrival &amp; Parking" data-si="ගමන් &amp; වාහන">Arrival &amp; Parking</button>
          <button class="tab-btn" data-tab="weather" data-en="Blood Moon Forecast" data-si="කාලගුණ">Blood Moon Forecast</button>
        </div>

        <div id="panel-details" class="tab-panel active">
          <div class="venue-address-box">
            <span class="font-cinzel" style="font-size:.65rem;color:#fca5a5;letter-spacing:.1em;text-transform:uppercase;display:block;margin-bottom:.35rem">GPS Destination Address</span>
            <p class="font-cormorant" style="font-size:1.05rem;color:#f5f5f4;font-weight:600"><?= htmlspecialchars($weddingInfo['venueName']) ?>, <?= htmlspecialchars($weddingInfo['venueAddress']) ?>, <?= htmlspecialchars($weddingInfo['venueCity']) ?></p>
          </div>
          <p style="font-family:'Cormorant Garamond',serif;font-size:.95rem;color:#d6d3d1;margin-bottom:1rem">Located 25 minutes north of the city center. Follow the candlelit torches at Gate #3 to the Grand Crypt Ballroom.</p>
          <div style="display:flex;gap:.5rem;flex-wrap:wrap">
            <button class="copy-addr-btn" id="copy-addr-btn" data-addr="<?= htmlspecialchars($weddingInfo['venueName'].', '.$weddingInfo['venueAddress'].', '.$weddingInfo['venueCity']) ?>">📋 Copy Address</button>
            <a href="<?= htmlspecialchars($weddingInfo['venueMapUrl']) ?>" target="_blank" rel="noopener noreferrer" class="maps-link">🗺️ Google Maps ↗</a>
          </div>
        </div>

        <div id="panel-travel" class="tab-panel">
          <div class="travel-row">
            <span class="icon">🚗</span>
            <div>
              <h4 class="font-cinzel" style="font-size:.7rem;font-weight:700;color:#f5f5f4;text-transform:uppercase;margin-bottom:.25rem">Valet Carriage Parking</h4>
              <p style="font-family:'Cormorant Garamond',serif;font-size:.95rem;color:#d6d3d1">Complimentary valet parking available at the main gate. Attendants with lanterns will direct your vehicle.</p>
            </div>
          </div>
          <div class="travel-row">
            <span class="icon">🛡️</span>
            <div>
              <h4 class="font-cinzel" style="font-size:.7rem;font-weight:700;color:#f5f5f4;text-transform:uppercase;margin-bottom:.25rem">Rideshare Drop-off</h4>
              <p style="font-family:'Cormorant Garamond',serif;font-size:.95rem;color:#d6d3d1">Uber / Taxi drop-off point is directly in front of the Manor Courtyard fountain.</p>
            </div>
          </div>
        </div>

        <div id="panel-weather" class="tab-panel">
          <div class="weather-box">
            <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:.75rem">
              <span style="font-size:1.75rem">🌙</span>
              <div>
                <p class="font-cinzel" style="font-size:.65rem;color:#fbbf24;text-transform:uppercase">Oct 31 • Halloween Twilight</p>
                <p style="font-family:'Cormorant Garamond',serif;font-size:1.1rem;color:#f5f5f4;font-weight:600">18°C (64°F) • Misty &amp; Starlit</p>
              </div>
              <span style="font-size:1.5rem;margin-left:auto">🎃</span>
            </div>
            <p style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.9rem;color:#d6d3d1">"A gentle autumn chill with theatrical fog rolling across the crypt gardens. Velvet capes and cozy shawls are warmly recommended!"</p>
          </div>
        </div>

        <div class="venue-footer">
          <span class="font-cinzel" style="font-size:.65rem;color:rgba(245,158,11,.8);letter-spacing:.15em;text-transform:uppercase">Doors open at 04:30 PM for potion tasting</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== DRESS CODE ===== -->
<section id="dress-code" class="section" style="background:#07040c">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">🎨 <span data-en="Aesthetic &amp; Attire Guidelines" data-si="ඇඳුම් විලාසිතා">Aesthetic &amp; Attire Guidelines</span></div>
      <h2 class="section-heading text-glow-gold" data-en="Gothic Glamour &amp; Dark Romance" data-si="ගොතික් හැලොවීන් ඇඳුම් විලාසිතාව">Gothic Glamour &amp; Dark Romance</h2>
      <p class="section-sub"><?= htmlspecialchars($weddingInfo['dressCodeDescription']) ?></p>
      <span class="section-divider"></span>
    </div>

    <p class="font-cinzel" style="font-size:.7rem;text-align:center;color:#fbbf24;letter-spacing:.15em;text-transform:uppercase;margin-bottom:1.5rem">Recommended Evening Coven Palette (Click a color to preview details)</p>
    <div class="color-swatches">
      <?php
      $swatches = [
        ['name'=>'Obsidian Velvet','hex'=>'#0a0812','border'=>'#475569','desc'=>'Classic midnight black, charcoal silk, dark lace'],
        ['name'=>'Blood Crimson', 'hex'=>'#881337','border'=>'#e11d48','desc'=>'Rich wine, dark burgundy velvet, blood rose tones'],
        ['name'=>'Emerald Shadow','hex'=>'#064e3b','border'=>'#10b981','desc'=>'Deep forest green, dark emerald satin'],
        ['name'=>'Antique Gold',  'hex'=>'#b45309','border'=>'#f59e0b','desc'=>'Burnished bronze, vintage bullion, gold lace accents'],
        ['name'=>'Royal Amethyst','hex'=>'#581c87','border'=>'#a855f7','desc'=>'Deep purple velvet, midnight violet, plum silk'],
      ];
      foreach ($swatches as $sw): ?>
      <div class="swatch-btn">
        <div class="swatch-circle" style="background:<?= $sw['hex'] ?>;border-color:<?= $sw['border'] ?>"></div>
        <h4 class="font-cinzel" style="font-size:.7rem;font-weight:700;color:#e7e5e4"><?= htmlspecialchars($sw['name']) ?></h4>
        <p class="font-cormorant" style="font-size:.75rem;color:#78716c;margin-top:.2rem"><?= htmlspecialchars($sw['desc']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="attire-grid">
      <div class="attire-card">
        <div class="attire-head">
          <div class="attire-icon">👑</div>
          <div>
            <h3 class="font-cinzel" style="font-size:1rem;font-weight:700;color:#f5f5f4">For Enchantresses &amp; Gowns</h3>
            <span style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.8rem;color:#fca5a5">Dark Romantic Elegance</span>
          </div>
        </div>
        <ul class="attire-list">
          <li>Floor-length velvet gowns, corset bodices, or romantic lace dresses.</li>
          <li>Dramatic black lace veils, feathered fascinators, or Victorian chokers.</li>
          <li>Dark lipsticks (plum, ruby, blackberry) and smoky eye artistry.</li>
        </ul>
      </div>
      <div class="attire-card gents">
        <div class="attire-head">
          <div class="attire-icon" style="background:rgba(76,29,149,.5);border-color:rgba(91,33,182,.5)">🧥</div>
          <div>
            <h3 class="font-cinzel" style="font-size:1rem;font-weight:700;color:#f5f5f4">For Gents &amp; Gentry</h3>
            <span style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.8rem;color:#c4b5fd">Gothic Black Tie &amp; Tailcoats</span>
          </div>
        </div>
        <ul class="attire-list">
          <li>Black, charcoal, or deep burgundy tailored suits, tuxedos, or frock coats.</li>
          <li>Embroidered vests, velvet lapels, ruffled cravats, or silver pocket watches.</li>
          <li>Polished boots or dress shoes; vintage walking canes with antique crests.</li>
        </ul>
      </div>
    </div>

    <div class="dos-donts">
      <div class="dos-donts-grid">
        <div>
          <h4 class="dos-head yes">✓ Enthusiastically Welcomed</h4>
          <ul class="dos-list">
            <li>✓ Masquerade masks &amp; velvet capes</li>
            <li>✓ Victorian &amp; Steampunk gothic elements</li>
            <li>✓ Warm wraps / coats for outdoor crypt gardens</li>
          </ul>
        </div>
        <div>
          <h4 class="dos-head no">✗ Kindly Avoid</h4>
          <ul class="dos-list">
            <li>✗ Traditional all-white wedding gowns (reserved for bride)</li>
            <li>✗ Neon colors, sportswear, or casual flip-flops</li>
            <li>✗ Gory / fake blood props during the sacred chapel ceremony</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== RSVP ===== -->
<section id="rsvp" class="section" style="background:#090510">
  <div class="container" style="max-width:56rem">
    <div class="section-header">
      <div class="section-badge amber">♥ <span data-en="Confirm Your Presence" data-si="පැමිණීම තහවුරු කිරීම">Confirm Your Presence</span></div>
      <h2 class="section-heading text-glow-gold" data-en="RSVP Before The Witching Hour" data-si="මංගල පැමිණීම සටහන් කරන්න">RSVP Before The Witching Hour</h2>
      <p class="section-sub font-cormorant" style="font-style:italic">Kindly respond by <strong class="font-cinzel" style="color:#fbbf24"><?= htmlspecialchars($weddingInfo['rsvpDeadline']) ?></strong> so our coven chef may brew sufficient potions.</p>
      <div style="margin-top:.75rem">
        <span style="display:inline-flex;align-items:center;gap:.4rem;padding:.35rem 1rem;border-radius:999px;background:rgba(0,0,0,.6);border:1px solid rgba(136,19,55,.5);font-family:'Cinzel',serif;font-size:.7rem;color:#fca5a5">🔥 74 Mortal Souls Confirmed</span>
      </div>
    </div>

    <!-- Confirmed Banner (hidden by default) -->
    <div id="rsvp-confirmed-banner" style="display:none" class="rsvp-confirmed">
      <div style="display:flex;align-items:center;gap:.75rem">
        <div style="padding:.6rem;border-radius:50%;background:rgba(6,78,59,.5);border:1px solid rgba(16,185,129,.4)">✅</div>
        <div>
          <h4 class="font-cinzel" style="font-size:.85rem;font-weight:700;color:#f5f5f4">Attendance Confirmed for <span id="rsvp-confirmed-name"></span></h4>
          <p style="font-family:'Cormorant Garamond',serif;font-size:.85rem;color:#d6d3d1"><span id="confirmed-count">1</span> guest(s) • <span id="confirmed-dietary"></span></p>
        </div>
      </div>
      <button id="view-pass-btn" class="btn" style="background:#d97706;color:#1c1917;font-weight:700">🎫 View VIP Pass</button>
    </div>

    <div class="rsvp-wrap">
      <span class="rsvp-corner tl">✦</span><span class="rsvp-corner tr">✦</span>
      <span class="rsvp-corner bl">✦</span><span class="rsvp-corner br">✦</span>

      <form id="rsvp-form">
        <input type="hidden" name="attendance" id="attendance-val" value="attending">

        <!-- Attendance Choice -->
        <div style="margin-bottom:1.5rem">
          <label class="form-label">Will you be gracing our coven banquet? *</label>
          <div class="attendance-grid">
            <?php
            $opts = [
              ['val'=>'attending',    'label'=>'Accept with Ecstasy 🖤',   'desc'=>'Ready to celebrate & dance!'],
              ['val'=>'declining',    'label'=>'Regretfully Decline 🥀',   'desc'=>'Sending spirits from afar'],
              ['val'=>'haunting_afar','label'=>'Haunt from Afar 👻',       'desc'=>'Joining via livestream'],
            ];
            foreach ($opts as $opt): ?>
            <button type="button" class="attendance-opt <?= $opt['val']==='attending'?'selected':'' ?>" data-val="<?= $opt['val'] ?>">
              <span class="font-cinzel" style="font-size:.75rem;font-weight:700;color:#e7e5e4;display:block"><?= htmlspecialchars($opt['label']) ?></span>
              <span style="font-family:'Cormorant Garamond',serif;font-size:.85rem;color:#78716c;display:block;margin-top:.2rem"><?= htmlspecialchars($opt['desc']) ?></span>
            </button>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Name & Email -->
        <div class="form-grid-2" style="margin-bottom:1.25rem">
          <div>
            <label class="form-label" for="full_name">Your Full Mortal / Spirit Name *</label>
            <div class="form-group">
              <span class="input-icon">👤</span>
              <input type="text" id="full_name" name="full_name" class="form-input with-icon" placeholder="e.g. Lord Alexander Thorne" required>
            </div>
          </div>
          <div>
            <label class="form-label" for="email">Raven / Email Address *</label>
            <div class="form-group">
              <span class="input-icon">✉️</span>
              <input type="email" id="email" name="email" class="form-input with-icon" placeholder="alexander@shadows.com" required>
            </div>
          </div>
        </div>

        <!-- Phone & Count -->
        <div class="form-grid-2" style="margin-bottom:1.25rem">
          <div>
            <label class="form-label" for="phone">Phone / WhatsApp Number</label>
            <div class="form-group">
              <span class="input-icon">📞</span>
              <input type="tel" id="phone" name="phone" class="form-input with-icon" placeholder="+94 77 123 4567">
            </div>
          </div>
          <div>
            <label class="form-label" for="guest-count">Number of Attendees (including you)</label>
            <select id="guest-count" name="guest_count" class="form-input">
              <option value="1">1 Mortal Soul (Just me)</option>
              <option value="2">2 Souls (Me + Plus One)</option>
              <option value="3">3 Souls (A small coven)</option>
              <option value="4">4 Souls (Full dark fellowship)</option>
            </select>
          </div>
        </div>

        <!-- Plus One Names -->
        <div id="plus-one-row" style="display:none;margin-bottom:1.25rem">
          <label class="form-label" for="guest_names">Name(s) of Your Plus One / Companions</label>
          <input type="text" id="guest_names" name="guest_names" class="form-input" placeholder="e.g. Lady Genevieve &amp; Count Marcus">
        </div>

        <!-- Dietary -->
        <div style="margin-bottom:1.25rem">
          <label class="form-label" for="dietary">🍷 Select Your Banquet Potion &amp; Feast Preference</label>
          <select id="dietary" name="dietary" class="form-input">
            <option>Vampire Carnivore (Prime Beef &amp; Port Wine)</option>
            <option>Enchanted Vegan / Herbology Feast</option>
            <option>Gluten Cursed / Allergy-Safe Elixir</option>
            <option>Witches' Potluck (Chef Special)</option>
          </select>
        </div>

        <!-- Song & Blessing -->
        <div class="form-grid-2" style="margin-bottom:1.5rem">
          <div>
            <label class="form-label" for="song_request">🎵 Danse Macabre Song Request</label>
            <input type="text" id="song_request" name="song_request" class="form-input" placeholder="e.g. Moonlight Sonata (Dark Waltz Remix)">
          </div>
          <div>
            <label class="form-label" for="blessing">✨ Gothic Blessing for the Couple</label>
            <input type="text" id="blessing" name="blessing" class="form-input" placeholder="e.g. May your love burn forever in the shadows! 🖤">
          </div>
        </div>

        <div style="text-align:center;padding-top:.5rem">
          <button type="submit" class="btn btn-rose" style="padding:1rem 2.5rem;font-size:.9rem;width:100%;max-width:28rem;justify-content:center">
            ♥ Seal My Summon &amp; Generate VIP Pass ✨
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- ===== INTERACTIVE LOUNGE ===== -->
<section id="potions" class="section" style="background:#07040c">
  <div class="container">
    <div class="section-header">
      <div class="section-badge purple">🔥 <span data-en="The Midnight Parlour &amp; Games" data-si="විනෝදාත්මක මැජික් අංග">The Midnight Parlour &amp; Games</span></div>
      <h2 class="section-heading text-glow-gold" data-en="Enchantments &amp; Interactive Delights" data-si="මැජික් පෙරුම් සහ ටැරට් පේන">Enchantments &amp; Interactive Delights</h2>
      <p class="section-sub">Brew secret elixirs, gaze into tarot fortunes, and style your bespoke gothic portrait.</p>
      <span class="section-divider"></span>
    </div>

    <div class="lounge-tabs">
      <button class="lounge-tab active purple" data-panel="potion">🍷 Love Potion Brewery</button>
      <button class="lounge-tab rose"           data-panel="tarot">🌙 Tarot Fortune Teller</button>
      <button class="lounge-tab amber"           data-panel="photobooth">📷 Gothic Photobooth</button>
    </div>

    <!-- POTION GAME -->
    <div id="panel-potion" class="lounge-panel active">
      <div class="card" style="padding:1.75rem">
        <div class="section-header" style="margin-bottom:1.25rem">
          <div class="section-badge purple">✨ Interactive Cauldron Mini-Game</div>
          <h3 class="font-cinzel" style="font-size:1.25rem;font-weight:700;color:#f5f5f4;margin:.35rem 0">The Coven's Love Potion Brewery</h3>
          <p class="font-cormorant" style="font-style:italic;font-size:.95rem;color:#d6d3d1">Choose 3 secret ingredients to brew an enchanted wedding toast elixir for Evelyn &amp; Damian.</p>
        </div>
        <div class="cauldron-display" id="cauldron-display">
          <div style="font-size:2.5rem;margin-bottom:.5rem">🧪 🎃 ⚗️</div>
          <p class="font-cinzel" style="font-size:.75rem;color:#78716c">Selected Ingredients: <span id="brew-count">0</span> / 3</p>
        </div>
        <div class="ingredients-grid">
          <?php foreach ($potionIngredients as $ing): ?>
          <button class="ingredient-btn" data-id="<?= htmlspecialchars($ing['id']) ?>">
            <span class="ing-icon"><?= $ing['icon'] ?></span>
            <div>
              <p class="font-cinzel" style="font-size:.7rem;font-weight:700;color:#e7e5e4"><?= htmlspecialchars($ing['name']) ?></p>
              <p style="font-family:'Cormorant Garamond',serif;font-size:.75rem;color:rgba(253,164,175,.8)"><?= htmlspecialchars($ing['effect']) ?></p>
            </div>
          </button>
          <?php endforeach; ?>
        </div>
        <div style="text-align:center">
          <button id="brew-btn" class="btn btn-rose" style="padding:.75rem 2rem" disabled>🔥 Brew Spell in Cauldron (<span id="brew-count2">0</span>/3)</button>
        </div>
      </div>
    </div>

    <!-- TAROT -->
    <div id="panel-tarot" class="lounge-panel">
      <div class="card" style="padding:1.75rem">
        <div class="section-header" style="margin-bottom:1.25rem">
          <div class="section-badge" style="border-color:rgba(225,29,72,.4);background:rgba(225,29,72,.2);color:#fca5a5">🌙 Haunted Wedding Tarot</div>
          <h3 class="font-cinzel" style="font-size:1.25rem;font-weight:700;color:#f5f5f4;margin:.35rem 0">Draw Your Blood Moon Destiny</h3>
          <p class="font-cormorant" style="font-style:italic;font-size:.95rem;color:#d6d3d1">Tap a mystical card from the crypt deck to unveil your fortune for the wedding evening.</p>
        </div>
        <div id="tarot-display">
          <div class="tarot-deck" id="tarot-deck-inner">
            <?php for ($i=0; $i<5; $i++): ?>
            <button class="tarot-card-back" data-idx="<?= $i ?>">
              <div style="font-family:'Cinzel',serif;font-size:.6rem;color:rgba(245,158,11,.6)">✦ #<?= $i+1 ?></div>
              <div style="width:3rem;height:3rem;border-radius:50%;border:1px dashed rgba(225,29,72,.4);background:rgba(0,0,0,.5);display:flex;align-items:center;justify-content:center;font-size:1.25rem;transition:transform .3s">🦇</div>
              <span class="font-cinzel" style="font-size:.6rem;color:#fca5a5;letter-spacing:.1em;text-transform:uppercase">Tap to Reveal</span>
            </button>
            <?php endfor; ?>
          </div>
        </div>
        <!-- Template for tarot deck (used by JS reset) -->
        <template id="tarot-deck-template">
          <?php for ($i=0; $i<5; $i++): ?>
          <button class="tarot-card-back" data-idx="<?= $i ?>">
            <div style="font-family:'Cinzel',serif;font-size:.6rem;color:rgba(245,158,11,.6)">✦ #<?= $i+1 ?></div>
            <div style="width:3rem;height:3rem;border-radius:50%;border:1px dashed rgba(225,29,72,.4);background:rgba(0,0,0,.5);display:flex;align-items:center;justify-content:center;font-size:1.25rem">🦇</div>
            <span class="font-cinzel" style="font-size:.6rem;color:#fca5a5;letter-spacing:.1em;text-transform:uppercase">Tap to Reveal</span>
          </button>
          <?php endfor; ?>
        </template>
      </div>
    </div>

    <!-- PHOTOBOOTH -->
    <div id="panel-photobooth" class="lounge-panel">
      <div class="card" style="padding:1.75rem">
        <div class="section-header" style="margin-bottom:1.25rem">
          <div class="section-badge amber">📷 <span data-en="Virtual Gothic Photobooth" data-si="ගොතික් ඡායාරූප මැදිරිය">Virtual Gothic Photobooth</span></div>
          <h3 class="font-cinzel" style="font-size:1.25rem;font-weight:700;color:#f5f5f4;margin:.35rem 0">Create Your Haunted Souvenir Photo</h3>
          <p class="font-cormorant" style="font-style:italic;font-size:.95rem;color:#d6d3d1">Upload a photo or choose an avatar, select a gothic frame and stickers, and download your keepsake card!</p>
        </div>
        <div style="display:grid;grid-template-columns:1fr;gap:2rem">
          <div id="booth-preview" class="photo-preview-wrap frame-rose">
            <!-- JS renders this -->
          </div>
          <div style="display:flex;flex-direction:column;gap:1.25rem">
            <!-- Avatars -->
            <div>
              <span class="font-cinzel" style="font-size:.7rem;color:#fbbf24;text-transform:uppercase;letter-spacing:.1em;display:block;margin-bottom:.5rem">1. Choose Photo / Upload Selfie</span>
              <div class="avatar-row">
                <?php
                $avatars = [
                  ['src'=>'images/couple-portrait.jpg',     'name'=>'Gothic Enchantress'],
                  ['src'=>'images/gothic-castle.jpg',       'name'=>'Manor Twilight'],
                  ['src'=>'images/hero-gothic-wedding.jpg', 'name'=>'Blood Moon Couple'],
                  ['src'=>'images/gothic-banquet.jpg',      'name'=>'Feast of Shadows'],
                ];
                foreach ($avatars as $av): ?>
                <button class="avatar-thumb <?= $av['src']==='images/couple-portrait.jpg'?'selected':'' ?>" data-src="<?= htmlspecialchars($av['src']) ?>" title="<?= htmlspecialchars($av['name']) ?>">
                  <img src="<?= htmlspecialchars($av['src']) ?>" alt="<?= htmlspecialchars($av['name']) ?>">
                </button>
                <?php endforeach; ?>
                <label style="height:3rem;padding:.4rem .75rem;border-radius:.5rem;border:1px dashed rgba(225,29,72,.5);background:rgba(136,19,55,.25);color:#fca5a5;font-family:'Cinzel',serif;font-size:.65rem;cursor:pointer;display:flex;align-items:center;gap:.35rem">
                  📤 Upload
                  <input type="file" id="booth-file" accept="image/*" style="display:none">
                </label>
              </div>
            </div>
            <!-- Frame -->
            <div>
              <span class="font-cinzel" style="font-size:.7rem;color:#fbbf24;text-transform:uppercase;letter-spacing:.1em;display:block;margin-bottom:.5rem">2. Select Gothic Frame</span>
              <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:.5rem">
                <button class="frame-btn rose selected" data-frame="rose">Blood Crimson</button>
                <button class="frame-btn gold" data-frame="gold">Antique Gold</button>
                <button class="frame-btn violet" data-frame="violet">Shadow Violet</button>
              </div>
            </div>
            <!-- Stickers -->
            <div>
              <span class="font-cinzel" style="font-size:.7rem;color:#fbbf24;text-transform:uppercase;letter-spacing:.1em;display:block;margin-bottom:.5rem">3. Pick a Spooky Sticker</span>
              <div class="sticker-row">
                <?php foreach (['🦇','🌹','👑','🎃','🩸','🕸️','🕯️','🍷'] as $stk): ?>
                <button class="sticker-btn <?= $stk==='🦇'?'selected':'' ?>"><?= $stk ?></button>
                <?php endforeach; ?>
              </div>
            </div>
            <!-- Caption -->
            <div>
              <span class="font-cinzel" style="font-size:.7rem;color:#d6d3d1;text-transform:uppercase;letter-spacing:.1em;display:block;margin-bottom:.35rem">4. Custom Photo Caption</span>
              <input type="text" id="booth-caption-input" class="form-input" value="Dancing under the Blood Moon 🖤">
            </div>
            <button id="booth-download" class="btn btn-rose">⬇️ Download Souvenir Photo</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== GALLERY ===== -->
<section id="gallery" class="section" style="background:#06040a">
  <div class="container">
    <div class="section-header">
      <div class="section-badge amber">📷 <span data-en="Visual Grimoire" data-si="ඡායාරූප ගැලරිය">Visual Grimoire</span></div>
      <h2 class="section-heading text-glow-gold" data-en="The Hall of Shadows &amp; Light" data-si="මංගල ඡායාරූප එකතුව">The Hall of Shadows &amp; Light</h2>
      <p class="section-sub">Glimpses from our pre-wedding masquerade and the ancient halls of Ravenhurst.</p>
      <span class="section-divider"></span>
    </div>

    <div class="gallery-tabs">
      <?php
      $cats = [['all','All Artifacts'],['portraits','Couple Portraits'],['castle','The Castle'],['ceremony','Ceremony Altar'],['details','Banquet &amp; Cake']];
      foreach ($cats as [$catId,$catLabel]): ?>
      <button class="gallery-tab <?= $catId==='all'?'active':'' ?>" data-cat="<?= $catId ?>"><?= $catLabel ?></button>
      <?php endforeach; ?>
    </div>

    <div class="gallery-grid">
      <?php foreach ($galleryPhotos as $photo): ?>
      <div class="gallery-item" data-cat="<?= htmlspecialchars($photo['category']) ?>" data-url="<?= htmlspecialchars($photo['url']) ?>" data-title="<?= htmlspecialchars($photo['title']) ?>" data-caption="<?= htmlspecialchars($photo['caption']) ?>">
        <img src="<?= htmlspecialchars($photo['url']) ?>" alt="<?= htmlspecialchars($photo['title']) ?>" loading="lazy">
        <div class="gallery-overlay">
          <div>
            <h3 class="font-cinzel" style="font-size:.85rem;font-weight:700;color:#f5f5f4"><?= htmlspecialchars($photo['title']) ?></h3>
            <p style="font-family:'Cormorant Garamond',serif;font-size:.8rem;color:#d6d3d1;font-style:italic;margin-top:.15rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:16rem"><?= htmlspecialchars($photo['caption']) ?></p>
          </div>
          <button class="like-btn" data-id="<?= htmlspecialchars($photo['id']) ?>">♥ <span class="like-count"><?= $photo['likes'] ?></span></button>
        </div>
        <div style="position:absolute;top:.75rem;right:.75rem;padding:.35rem;border-radius:50%;background:rgba(0,0,0,.6);border:1px solid #292524;color:#78716c;opacity:0;transition:opacity .3s">⤢</div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Lightbox -->
<div id="lightbox" class="hidden">
  <div class="lightbox-inner">
    <button class="lightbox-close" id="lightbox-close">✕</button>
    <img id="lightbox-img" src="" alt="Gallery photo">
    <div class="lightbox-footer">
      <div>
        <h3 class="font-cinzel" id="lightbox-title" style="font-size:1rem;font-weight:700;color:#fde68a"></h3>
        <p id="lightbox-caption" style="font-family:'Cormorant Garamond',serif;font-size:.9rem;color:#d6d3d1"></p>
      </div>
    </div>
  </div>
</div>

<!-- ===== BRIDAL COURT ===== -->
<section id="court" class="section" style="background:#06040a">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">👑 <span data-en="Guardians of the Veil" data-si="මනමාල සහ මනමාලියන්">Guardians of the Veil</span></div>
      <h2 class="section-heading text-glow-gold" data-en="The Dark Court &amp; Retinue" data-si="අපගේ මංගල පිරිවර">The Dark Court &amp; Retinue</h2>
      <p class="section-sub">Our most trusted confidantes, sworn to keep the torches burning throughout the night.</p>
      <span class="section-divider"></span>
    </div>

    <div class="court-grid">
      <?php foreach ($bridalCourt as $member): ?>
      <div class="court-card">
        <div class="court-avatar"><?= $member['emoji'] ?></div>
        <h3 class="font-cinzel" style="font-size:.9rem;font-weight:700;color:#f5f5f4"><?= htmlspecialchars($member['name']) ?></h3>
        <p class="font-cinzel" style="font-size:.65rem;color:#f43f5e;font-weight:600;letter-spacing:.08em;text-transform:uppercase;margin-top:.25rem"><?= htmlspecialchars($member['role']) ?></p>
        <span style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.8rem;color:#78716c;display:block;margin-top:.15rem"><?= htmlspecialchars($member['relation']) ?></span>
        <span class="court-divider"></span>
        <p class="court-desc">"<?= htmlspecialchars($member['description']) ?>"</p>
      </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align:center;margin-top:3rem">
      <p style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.85rem;color:#57534e">🔥 "Bound by ancient oaths and moonlit laughter."</p>
    </div>
  </div>
</section>

<!-- ===== REGISTRY ===== -->
<section id="registry" class="section" style="background:#090510">
  <div class="container">
    <div class="section-header">
      <div class="section-badge amber">🎁 <span data-en="Tributes to the Coven" data-si="මංගල තෑගි සහ ආශිර්වාද">Tributes to the Coven</span></div>
      <h2 class="section-heading text-glow-gold" data-en="Honeymoon Fund &amp; Wishing Well" data-si="හඳපාන චාරිකාව සහ සුභපැතුම්">Honeymoon Fund &amp; Wishing Well</h2>
      <p class="section-sub">Your presence at our unholy matrimony is the greatest treasure. Should you wish to bless us further, tributes may be sent to our honeymoon escapade.</p>
      <span class="section-divider"></span>
    </div>

    <div class="registry-grid">
      <?php foreach ($registryItems as $item):
        $pct = min(100, round($item['current']/$item['target']*100)); ?>
      <div class="registry-card">
        <div class="registry-head">
          <div class="registry-icon"><?= $item['icon'] ?></div>
          <div>
            <h3 class="font-cinzel" style="font-size:.9rem;font-weight:700;color:#f5f5f4"><?= htmlspecialchars($item['title']) ?></h3>
            <p style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.8rem;color:#78716c"><?= htmlspecialchars($item['description']) ?></p>
          </div>
        </div>
        <div style="margin-top:.75rem">
          <div style="display:flex;justify-content:space-between;font-family:'Cinzel',serif;font-size:.7rem;margin-bottom:.4rem">
            <span style="color:#fbbf24;font-weight:700" class="registry-current">$<?= number_format($item['current']) ?></span>
            <span style="color:#78716c">Target: $<?= number_format($item['target']) ?> (<?= $pct ?>%)</span>
          </div>
          <div class="progress-bar-track">
            <div class="progress-bar-fill" data-id="<?= htmlspecialchars($item['id']) ?>" data-current="<?= $item['current'] ?>" data-max="<?= $item['target'] ?>" style="width:<?= $pct ?>%"></div>
          </div>
        </div>
        <div style="display:flex;justify-content:flex-end;margin-top:.75rem">
          <button class="contribute-btn" data-id="<?= htmlspecialchars($item['id']) ?>">💰 Contribute +$50 Tribute</button>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="wishing-well">
      <p class="font-cinzel" style="font-size:.85rem;font-weight:700;color:#fbbf24;margin-bottom:.75rem">✈️ Direct Wishing Well Vault Details</p>
      <p style="font-family:'Cormorant Garamond',serif;color:#d6d3d1;margin-bottom:1rem">For online banking transfers, crypto tributes, or digital shagun:</p>
      <div class="bank-info">
        <span>Bank: Shadowvale Royal Vault</span><span>•</span>
        <span>Acc: 7890-1234-5678-0031</span><span>•</span>
        <span>Swift: SHDWUS33</span>
      </div>
      <div style="margin-top:1rem">
        <button class="copy-bank-btn" id="copy-bank-btn">📋 Copy Vault Info</button>
      </div>
    </div>
  </div>
</section>

<!-- ===== GUESTBOOK ===== -->
<section id="guestbook" class="section" style="background:#08050e">
  <div class="container">
    <div class="section-header">
      <div class="section-badge purple">📖 <span data-en="The Eternal Book of Shadows" data-si="ආශිර්වාද පොත">The Eternal Book of Shadows</span></div>
      <h2 class="section-heading text-glow-gold" data-en="Guestbook &amp; Dark Blessings" data-si="ආදරණීය සුභපැතුම්">Guestbook &amp; Dark Blessings</h2>
      <p class="section-sub">Inscribe your heartfelt blessing, spooky verse, or well-wishes into our eternal tome.</p>
      <span class="section-divider"></span>
    </div>

    <div class="guestbook-form">
      <h3 class="font-cinzel" style="font-size:1rem;font-weight:700;color:#fde68a;margin-bottom:1rem">✉️ Inscribe a New Dark Blessing</h3>
      <form id="guestbook-form">
        <div class="form-grid-2" style="margin-bottom:1rem">
          <div>
            <input type="text" id="gb-name" class="form-input" placeholder="Your Name / Coven Title" required>
          </div>
          <div>
            <div style="display:flex;align-items:center;gap:.5rem">
              <span class="font-cinzel" style="font-size:.7rem;color:#78716c;white-space:nowrap">Seal with:</span>
              <div class="emoji-row">
                <?php foreach (['🖤','🎃','🦇','🕯️','👻','🔮','🍷','💍'] as $em): ?>
                <button type="button" class="emoji-btn <?= $em==='🖤'?'selected':'' ?>"><?= $em ?></button>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <textarea id="gb-message" class="form-input" rows="3" placeholder="Write your wishes to the couple... (e.g. May your love burn brighter than a thousand crypt fires! 🖤)" required style="resize:none;margin-bottom:1rem"></textarea>
        <div style="display:flex;justify-content:flex-end">
          <button type="submit" class="btn btn-rose">♥ Cast Blessing into the Book</button>
        </div>
      </form>
    </div>

    <div class="filter-row">
      <span class="font-cinzel" style="font-size:.7rem;color:#78716c;letter-spacing:.1em;text-transform:uppercase"><span id="gb-count">4</span> Inscribed Blessings</span>
      <div style="display:flex;gap:.5rem">
        <button class="filter-btn active" data-filter="all">Latest First</button>
        <button class="filter-btn" data-filter="popular">Most Loved 🔥</button>
      </div>
    </div>

    <div class="gb-grid" id="gb-grid"><!-- JS renders --></div>
  </div>
</section>

<!-- ===== FAQ ===== -->
<section id="faq" class="section" style="background:#08050e">
  <div class="container" style="max-width:52rem">
    <div class="section-header">
      <div class="section-badge">❓ <span data-en="Curiosities &amp; Answers" data-si="නිතර අසන ප්‍රශ්න">Curiosities &amp; Answers</span></div>
      <h2 class="section-heading text-glow-gold" data-en="Mysteries &amp; FAQs" data-si="නිතර අසන ප්‍රශ්න සහ පිළිතුරු">Mysteries &amp; FAQs</h2>
      <p class="section-sub">Everything you need to know before entering the enchanted manor gates.</p>
      <span class="section-divider"></span>
    </div>

    <?php foreach ($weddingFaqs as $faq): ?>
    <div class="faq-item">
      <button class="faq-btn">
        <span class="faq-q"><?= htmlspecialchars($faq['q']) ?></span>
        <span class="faq-chevron">▼</span>
      </button>
      <div class="faq-ans"><?= htmlspecialchars($faq['a']) ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer>
  <div class="footer-glow"></div>
  <div style="position:relative;z-index:10">
    <div class="footer-mono"><?= $brideInit ?> &amp; <?= $groomInit ?></div>

    <div style="margin-bottom:1.25rem">
      <h3 class="footer-names"><?= htmlspecialchars($bride) ?> &amp; <?= htmlspecialchars($groom) ?></h3>
      <p class="footer-tagline">"<?= htmlspecialchars($weddingInfo['tagline']) ?>"</p>
      <p class="footer-sinhala font-sinhala"><?= htmlspecialchars($weddingInfo['taglineSinhala']) ?></p>
    </div>

    <div class="footer-share">
      <button id="share-whatsapp" class="btn btn-emerald">📲 Share on WhatsApp</button>
      <button id="share-copy" class="btn btn-amber">✨ Copy Invitation Link</button>
      <button id="reseal-btn" class="btn btn-ghost" data-reseal>✉️ Re-seal Wax Envelope</button>
    </div>

    <span class="footer-divider"></span>

    <div class="footer-bar">
      <p><?= date('Y') ?> • Crafted with eternal dark devotion for our Halloween Wedding.</p>
      <button id="scroll-top-btn" class="scroll-top-btn">Ascend to the Stars ↑</button>
    </div>

    <p class="footer-quote">♥ "Till Death Do Us Part — and even then, we will haunt the dance floor together."</p>
  </div>
</footer>

</div><!-- /#main-content -->

<!-- ===== VIP PASS MODAL ===== -->
<div id="pass-modal" class="hidden">
  <div style="position:relative;max-width:28rem;width:100%;margin:.5rem auto">
    <button class="pass-modal-close" id="pass-modal-close">✕</button>

    <div class="pass-ticket">
      <div class="pass-watermark">🦇</div>

      <div style="text-align:center;padding-bottom:1rem;border-bottom:1px solid rgba(136,19,55,.4);margin-bottom:1.25rem">
        <div style="display:inline-flex;align-items:center;gap:.35rem;padding:.2rem .75rem;border-radius:999px;border:1px solid rgba(245,158,11,.4);background:rgba(0,0,0,.6);font-family:'Cinzel',serif;font-size:.6rem;color:#fde68a;text-transform:uppercase;letter-spacing:.12em;margin-bottom:.5rem">✨ Official Coven Admission Pass</div>
        <h3 class="font-cinzel" style="font-size:1.1rem;font-weight:700;background:linear-gradient(to right,#fef3c7,#fecaca,#fef3c7);-webkit-background-clip:text;-webkit-text-fill-color:transparent"><?= htmlspecialchars($weddingInfo['tagline']) ?></h3>
        <p style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.85rem;color:#d6d3d1">The Halloween Wedding of <?= htmlspecialchars($bride) ?> &amp; <?= htmlspecialchars($groom) ?></p>
      </div>

      <div style="display:flex;flex-direction:column;gap:.75rem;margin-bottom:1rem">
        <?php
        $rows = [
          ['Honored Guest:','pass-name'],
          ['Status:','pass-status'],
          ['Party Size:','pass-count'],
          ['Potion / Feast:','pass-dietary'],
          ['Date &amp; Time:','pass-datetime'],
        ];
        foreach ($rows as [$label,$id]): ?>
        <div style="display:flex;justify-content:space-between;align-items:center;font-family:'Cinzel',serif;font-size:.7rem">
          <span style="color:#78716c;text-transform:uppercase"><?= $label ?></span>
          <span id="<?= $id ?>" style="color:#fde68a;font-weight:700;font-size:.8rem"><?= $id==='pass-datetime'?htmlspecialchars($weddingDateFormatted.' • '.$weddingInfo['weddingTime']):'' ?></span>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="pass-divider"></div>

      <div style="display:flex;align-items:center;justify-content:space-between;gap:1rem;margin-top:1rem">
        <div style="display:flex;flex-direction:column;align-items:center;gap:.25rem">
          <div class="qr-box">🦇</div>
          <span class="font-cinzel" id="pass-id" style="font-size:.6rem;color:#78716c"></span>
        </div>
        <div style="text-align:right">
          <div style="display:flex;align-items:center;gap:.35rem;color:#34d399;font-family:'Cinzel',serif;font-size:.7rem;margin-bottom:.25rem">✅ Verified RSVP</div>
          <p class="font-cinzel" style="font-size:.65rem;color:#fbbf24">Show at Gate Lantern Post</p>
          <p style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.75rem;color:#78716c">Valid for admission on October 31st</p>
        </div>
      </div>
    </div>

    <div class="pass-actions">
      <button id="pass-print-btn" class="btn btn-ghost">⬇️ Save / Print Ticket</button>
      <button id="pass-share-btn" class="btn btn-rose">📤 Share Invitation</button>
    </div>
  </div>
</div>

<script src="js/app.js"></script>
<!-- Fix brew-count sync -->
<script>
  // Sync second brew count display
  const origBrewCount = document.getElementById('brew-count');
  const brewCount2 = document.getElementById('brew-count2');
  if (origBrewCount && brewCount2) {
    const obs = new MutationObserver(() => { brewCount2.textContent = origBrewCount.textContent; });
    obs.observe(origBrewCount, {childList:true, characterData:true, subtree:true});
  }
  // Show nav RSVP on scroll
  window.addEventListener('scroll', () => {
    const btn = document.getElementById('nav-rsvp-btn');
    if (btn) btn.style.display = window.scrollY > 400 ? 'inline-flex' : 'none';
  });
</script>
</body>
</html>
