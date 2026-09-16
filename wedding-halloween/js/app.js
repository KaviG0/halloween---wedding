/* ============================================
   HALLOWEEN GOTHIC WEDDING - Main JavaScript
   ============================================ */

// ============================================
// SPOOKY AUDIO ENGINE (Web Audio API)
// ============================================
const spookyAudio = (() => {
    let ctx = null, masterGain = null, musicGain = null, sfxGain = null;
    let isMusicPlaying = false, musicInterval = null, currentStep = 0;
    const MELODY = [
        293.66,349.23,440.00,523.25,587.33,523.25,440.00,349.23,
        233.08,293.66,349.23,466.16,523.25,466.16,349.23,293.66,
        220.00,277.18,329.63,440.00,554.37,440.00,329.63,277.18,
        293.66,369.99,440.00,587.33,659.25,587.33,440.00,293.66,
        587.33,659.25,698.46,880.00,783.99,698.46,659.25,587.33,
        466.16,587.33,698.46,932.33,880.00,698.46,587.33,466.16,
        440.00,554.37,659.25,880.00,783.99,659.25,554.37,440.00,
        293.66,440.00,587.33,880.00,1174.66,880.00,587.33,293.66
    ];
    const BASS = [
        146.83,146.83,146.83,146.83,116.54,116.54,116.54,116.54,
        110.00,110.00,110.00,110.00,146.83,146.83,146.83,146.83,
        146.83,146.83,146.83,146.83,116.54,116.54,116.54,116.54,
        110.00,110.00,110.00,110.00,146.83,146.83,146.83,146.83
    ];

    function init() {
        if (!ctx) {
            const AC = window.AudioContext || window.webkitAudioContext;
            ctx = new AC();
            masterGain = ctx.createGain(); masterGain.gain.value = 0.5; masterGain.connect(ctx.destination);
            musicGain = ctx.createGain(); musicGain.gain.value = 0.35; musicGain.connect(masterGain);
            sfxGain = ctx.createGain(); sfxGain.gain.value = 0.5; sfxGain.connect(masterGain);
        }
        if (ctx.state === 'suspended') ctx.resume();
    }
    function playSynth(freq, start, dur, type = 'triangle', vol = 0.25) {
        try {
            const osc = ctx.createOscillator(), g = ctx.createGain(), f = ctx.createBiquadFilter();
            osc.type = type; osc.frequency.setValueAtTime(freq, start);
            f.type = 'lowpass'; f.frequency.setValueAtTime(1400, start); f.Q.setValueAtTime(3, start);
            g.gain.setValueAtTime(0, start); g.gain.linearRampToValueAtTime(vol, start + .02); g.gain.exponentialRampToValueAtTime(.001, start + dur);
            osc.connect(f); f.connect(g); g.connect(musicGain);
            osc.start(start); osc.stop(start + dur + .05);
        } catch(e) {}
    }
    function playBass(freq, start, dur) {
        try {
            const osc = ctx.createOscillator(), g = ctx.createGain(), f = ctx.createBiquadFilter();
            osc.type = 'sawtooth'; osc.frequency.setValueAtTime(freq, start);
            f.type = 'lowpass'; f.frequency.setValueAtTime(350, start);
            g.gain.setValueAtTime(0, start); g.gain.linearRampToValueAtTime(.18, start + .03); g.gain.exponentialRampToValueAtTime(.001, start + dur);
            osc.connect(f); f.connect(g); g.connect(musicGain);
            osc.start(start); osc.stop(start + dur + .05);
        } catch(e) {}
    }
    return {
        start() {
            init();
            if (isMusicPlaying) return;
            isMusicPlaying = true; currentStep = 0;
            musicInterval = setInterval(() => {
                if (!isMusicPlaying) return;
                const now = ctx.currentTime;
                const note = MELODY[currentStep % MELODY.length];
                const bass = BASS[Math.floor(currentStep / 2) % BASS.length];
                playSynth(note, now, .45, 'triangle', .25);
                playSynth(note * 2, now, .3, 'sine', .08);
                if (currentStep % 2 === 0) playBass(bass, now, .6);
                currentStep = (currentStep + 1) % MELODY.length;
            }, 280);
        },
        stop() { isMusicPlaying = false; clearInterval(musicInterval); musicInterval = null; },
        toggle() { if (isMusicPlaying) { this.stop(); return false; } else { this.start(); return true; } },
        isPlaying() { return isMusicPlaying; },
        chime(freq = 659.25, vol = 0.3) {
            init();
            try {
                const osc = ctx.createOscillator(), g = ctx.createGain();
                const now = ctx.currentTime;
                osc.type = 'sine'; osc.frequency.setValueAtTime(freq, now);
                g.gain.setValueAtTime(vol, now); g.gain.exponentialRampToValueAtTime(.001, now + 1.2);
                osc.connect(g); g.connect(sfxGain); osc.start(now); osc.stop(now + 1.25);
            } catch(e) {}
        },
        waxCrack() {
            init();
            try {
                const now = ctx.currentTime;
                const bufSize = ctx.sampleRate * .18;
                const buf = ctx.createBuffer(1, bufSize, ctx.sampleRate);
                const data = buf.getChannelData(0);
                for (let i = 0; i < bufSize; i++) data[i] = (Math.random() * 2 - 1) * Math.exp(-i / (bufSize * .3));
                const noise = ctx.createBufferSource(); noise.buffer = buf;
                const f = ctx.createBiquadFilter(); f.type = 'bandpass'; f.frequency.setValueAtTime(800, now); f.Q.setValueAtTime(1.5, now);
                const g = ctx.createGain(); g.gain.setValueAtTime(.7, now); g.gain.exponentialRampToValueAtTime(.01, now + .18);
                noise.connect(f); f.connect(g); g.connect(sfxGain); noise.start(now);
            } catch(e) {}
            this.chime(523.25, .4);
        },
        thunder() {
            init();
            try {
                const now = ctx.currentTime, dur = 2.5;
                const bufSize = Math.floor(ctx.sampleRate * dur);
                const buf = ctx.createBuffer(1, bufSize, ctx.sampleRate);
                const data = buf.getChannelData(0); let last = 0;
                for (let i = 0; i < bufSize; i++) {
                    const w = Math.random() * 2 - 1;
                    last = (last + .02 * w) / 1.02;
                    data[i] = last * 3.5 * Math.sin((i / bufSize) * Math.PI);
                }
                const noise = ctx.createBufferSource(); noise.buffer = buf;
                const f = ctx.createBiquadFilter(); f.type = 'lowpass'; f.frequency.setValueAtTime(120, now); f.frequency.linearRampToValueAtTime(70, now + dur);
                const g = ctx.createGain(); g.gain.setValueAtTime(.8, now); g.gain.exponentialRampToValueAtTime(.01, now + dur);
                noise.connect(f); f.connect(g); g.connect(sfxGain); noise.start(now);
            } catch(e) {}
        },
        potionBubble() {
            init();
            for (let i = 0; i < 4; i++) {
                try {
                    const now = ctx.currentTime + i * .08;
                    const osc = ctx.createOscillator(), g = ctx.createGain();
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(300 + Math.random() * 200, now);
                    osc.frequency.exponentialRampToValueAtTime(600 + Math.random() * 300, now + .07);
                    g.gain.setValueAtTime(.2, now); g.gain.exponentialRampToValueAtTime(.001, now + .07);
                    osc.connect(g); g.connect(sfxGain); osc.start(now); osc.stop(now + .08);
                } catch(e) {}
            }
        },
        cardFlip() {
            init();
            try {
                const now = ctx.currentTime;
                const osc = ctx.createOscillator(), g = ctx.createGain();
                osc.type = 'triangle'; osc.frequency.setValueAtTime(180, now); osc.frequency.linearRampToValueAtTime(450, now + .08);
                g.gain.setValueAtTime(.25, now); g.gain.exponentialRampToValueAtTime(.001, now + .09);
                osc.connect(g); g.connect(sfxGain); osc.start(now); osc.stop(now + .1);
            } catch(e) {}
        }
    };
})();

// ============================================
// CONFETTI (simple canvas version)
// ============================================
function launchConfetti(colors = ['#e11d48','#f59e0b','#881337','#a855f7']) {
    const canvas = document.createElement('canvas');
    canvas.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:9999;';
    document.body.appendChild(canvas);
    const ctx2 = canvas.getContext('2d');
    canvas.width = window.innerWidth; canvas.height = window.innerHeight;
    const particles = Array.from({length:90}, () => ({
        x: canvas.width * .5 + (Math.random() - .5) * 200,
        y: canvas.height * .6,
        vx: (Math.random() - .5) * 12,
        vy: -(Math.random() * 14 + 4),
        color: colors[Math.floor(Math.random() * colors.length)],
        size: 6 + Math.random() * 6, alpha: 1, gravity: .4
    }));
    function draw() {
        ctx2.clearRect(0, 0, canvas.width, canvas.height);
        let alive = false;
        for (const p of particles) {
            p.x += p.vx; p.y += p.vy; p.vy += p.gravity; p.alpha -= .012; p.vx *= .98;
            if (p.alpha > 0) {
                alive = true;
                ctx2.save(); ctx2.globalAlpha = Math.max(0, p.alpha);
                ctx2.fillStyle = p.color; ctx2.fillRect(p.x, p.y, p.size, p.size * .5);
                ctx2.restore();
            }
        }
        if (alive) requestAnimationFrame(draw); else canvas.remove();
    }
    draw();
}

// ============================================
// LANGUAGE STATE
// ============================================
let currentLang = 'en';
function toggleLang() {
    currentLang = currentLang === 'en' ? 'si' : 'en';
    document.querySelectorAll('[data-en]').forEach(el => {
        el.textContent = currentLang === 'en' ? el.dataset.en : el.dataset.si;
    });
    document.getElementById('lang-btn').textContent = currentLang === 'en' ? 'සිංහල' : 'English';
}

// ============================================
// ENVELOPE / INTRO
// ============================================
function openEnvelope(withSound = true) {
    const screen = document.getElementById('envelope-screen');
    if (withSound) { spookyAudio.waxCrack(); setTimeout(() => spookyAudio.start(), 500); }
    launchConfetti();
    screen.classList.add('hidden');
    document.getElementById('main-content').classList.remove('hidden');
}

// ============================================
// NAVBAR
// ============================================
function initNavbar() {
    const nav = document.getElementById('navbar');
    window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 50));

    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');
    hamburger.addEventListener('click', () => mobileMenu.classList.toggle('open'));

    // Smooth scroll nav links
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) { e.preventDefault(); mobileMenu.classList.remove('open'); target.scrollIntoView({behavior:'smooth'}); spookyAudio.chime(440, .15); }
        });
    });

    // Music toggle
    const musicBtn = document.getElementById('music-btn');
    musicBtn.addEventListener('click', () => {
        const playing = spookyAudio.toggle();
        musicBtn.classList.toggle('playing', playing);
        musicBtn.querySelector('.music-label').textContent = playing ? 'Waltz On' : 'Play Waltz';
        musicBtn.querySelector('.music-icon').textContent = playing ? '🔊' : '🔇';
    });

    // Lang
    document.getElementById('lang-btn').addEventListener('click', toggleLang);
    document.getElementById('mobile-lang-btn')?.addEventListener('click', toggleLang);
}

// ============================================
// COUNTDOWN TIMER
// ============================================
function initCountdown() {
    const wedding = new Date('2025-10-31T17:30:00').getTime();
    function tick() {
        const now = Date.now(), diff = wedding - now;
        if (diff <= 0) { document.querySelectorAll('.cd-num').forEach(el => el.textContent = '00'); return; }
        const vals = [Math.floor(diff/86400000), Math.floor(diff/3600000)%24, Math.floor(diff/60000)%60, Math.floor(diff/1000)%60];
        document.querySelectorAll('.cd-num').forEach((el, i) => el.textContent = String(vals[i]).padStart(2,'0'));
    }
    tick(); setInterval(tick, 1000);

    // Calendar buttons
    document.getElementById('btn-gcal')?.addEventListener('click', () => {
        const d = '20251031';
        const url = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=Halloween+Wedding%3A+Evelyn+%26+Damian&dates=${d}T173000Z/${d}T235900Z&details=Till+Death+Do+Us+Part!&location=Ravenhurst+Manor`;
        window.open(url, '_blank');
    });
    document.getElementById('btn-ics')?.addEventListener('click', () => {
        const ics = ['BEGIN:VCALENDAR','VERSION:2.0','PRODID:-//Gothic Wedding//EN','BEGIN:VEVENT','SUMMARY:Halloween Wedding: Lady Evelyn & Lord Damian','LOCATION:Ravenhurst Grand Manor','DTSTART:20251031T173000','DTEND:20251031T235900','STATUS:CONFIRMED','END:VEVENT','END:VCALENDAR'].join('\r\n');
        const blob = new Blob([ics],{type:'text/calendar'});
        const a = document.createElement('a'); a.href = URL.createObjectURL(blob); a.download = 'Halloween-Wedding.ics'; a.click();
        spookyAudio.chime(659.25, .35);
    });
}

// ============================================
// LOVE COUNTER
// ============================================
let loveCount = 666, hasLiked = false;
function initLoveCounter() {
    const btn = document.getElementById('love-counter-btn');
    if (!btn) return;
    btn.querySelector('.love-count').textContent = loveCount;
    btn.addEventListener('click', () => {
        if (hasLiked) return;
        hasLiked = true; loveCount++;
        btn.querySelector('.love-count').textContent = loveCount;
        btn.classList.add('liked');
        btn.querySelector('.love-label').textContent = 'Blessing Sent to the Crypt! 🖤';
        spookyAudio.chime(587.33, .3);
    });
}

// ============================================
// TIMELINE REMIND BUTTONS
// ============================================
function initTimeline() {
    document.querySelectorAll('.remind-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            spookyAudio.chime(659.25, .4);
            btn.classList.add('set');
            btn.textContent = '✓ Alert Set';
            alert(`🦇 Reminder set for: "${btn.dataset.event}". Be ready for the witching hour ritual!`);
        });
    });
}

// ============================================
// VENUE TABS
// ============================================
function initVenueTabs() {
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const parent = btn.closest('.venue-card');
            parent.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            parent.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            parent.querySelector(`#panel-${btn.dataset.tab}`).classList.add('active');
        });
    });
    document.getElementById('copy-addr-btn')?.addEventListener('click', function() {
        navigator.clipboard.writeText(this.dataset.addr || '').then(() => {
            this.textContent = '✓ Address Copied!'; spookyAudio.chime(659.25,.25);
            setTimeout(() => this.textContent = '📋 Copy Address', 2500);
        });
    });
}

// ============================================
// DRESS CODE COLOR SWATCHES
// ============================================
function initDressCode() {
    document.querySelectorAll('.swatch-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.swatch-btn').forEach(b => b.classList.remove('selected'));
            btn.classList.toggle('selected');
        });
    });
}

// ============================================
// RSVP FORM
// ============================================
function initRsvp() {
    // Attendance radio
    document.querySelectorAll('.attendance-opt').forEach(opt => {
        opt.addEventListener('click', () => {
            document.querySelectorAll('.attendance-opt').forEach(o => o.classList.remove('selected'));
            opt.classList.add('selected');
            document.getElementById('attendance-val').value = opt.dataset.val;
            // Show/hide plus-one
            const pCount = parseInt(document.getElementById('guest-count').value);
            document.getElementById('plus-one-row').style.display = pCount > 1 ? 'block' : 'none';
        });
    });
    document.getElementById('guest-count')?.addEventListener('change', function() {
        document.getElementById('plus-one-row').style.display = parseInt(this.value) > 1 ? 'block' : 'none';
    });

    // Form submit
    document.getElementById('rsvp-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        const name = fd.get('full_name')?.trim();
        const email = fd.get('email')?.trim();
        if (!name || !email) { alert('Please provide your name and email.'); return; }

        const rsvp = {
            id: Date.now().toString(),
            fullName: name, email, phone: fd.get('phone'),
            attendance: fd.get('attendance') || 'attending',
            guestCount: parseInt(fd.get('guest_count')) || 1,
            guestNames: fd.get('guest_names'),
            dietaryChoice: fd.get('dietary'),
            songRequest: fd.get('song_request'),
            blessing: fd.get('blessing'),
            submittedAt: new Date().toISOString(),
            qrId: Math.random().toString(36).substring(2,10).toUpperCase()
        };

        try { localStorage.setItem('gothic_wedding_rsvp', JSON.stringify(rsvp)); } catch(e){}

        spookyAudio.waxCrack(); launchConfetti();
        showVipPass(rsvp);
        document.getElementById('rsvp-confirmed-banner').style.display = 'flex';
        document.getElementById('rsvp-confirmed-name').textContent = name;
        document.getElementById('confirmed-count').textContent = rsvp.guestCount;
        document.getElementById('confirmed-dietary').textContent = rsvp.dietaryChoice;
    });

    // Load existing RSVP
    try {
        const saved = JSON.parse(localStorage.getItem('gothic_wedding_rsvp') || 'null');
        if (saved) {
            document.getElementById('rsvp-confirmed-banner').style.display = 'flex';
            document.getElementById('rsvp-confirmed-name').textContent = saved.fullName;
            document.getElementById('confirmed-count').textContent = saved.guestCount;
            document.getElementById('confirmed-dietary').textContent = saved.dietaryChoice;
        }
    } catch(e){}
}

// ============================================
// VIP PASS MODAL
// ============================================
function showVipPass(rsvp) {
    document.getElementById('pass-name').textContent = rsvp.fullName;
    document.getElementById('pass-status').textContent = rsvp.attendance === 'attending' ? 'Confirmed Attending 🖤' : 'Summoned';
    document.getElementById('pass-count').textContent = `${rsvp.guestCount} Mortal Soul(s)`;
    document.getElementById('pass-dietary').textContent = rsvp.dietaryChoice;
    document.getElementById('pass-id').textContent = `PASS-ID: #${rsvp.qrId}`;
    document.getElementById('pass-modal').classList.remove('hidden');
}
function initPassModal() {
    document.getElementById('pass-modal-close')?.addEventListener('click', () => document.getElementById('pass-modal').classList.add('hidden'));
    document.getElementById('view-pass-btn')?.addEventListener('click', () => {
        try { const r = JSON.parse(localStorage.getItem('gothic_wedding_rsvp') || 'null'); if(r) showVipPass(r); } catch(e){}
    });
    document.getElementById('pass-print-btn')?.addEventListener('click', () => window.print());
    document.getElementById('pass-share-btn')?.addEventListener('click', () => {
        const msg = `I'm attending the Halloween Wedding of Lady Evelyn & Lord Damian! 🖤🎃`;
        if (navigator.share) { navigator.share({title:'VIP Pass',text:msg,url:location.href}).catch(()=>{}); }
        else { navigator.clipboard.writeText(location.href); alert('Link copied to clipboard! 🦇'); }
        spookyAudio.chime(523.25,.3);
    });
}

// ============================================
// GALLERY
// ============================================
let galleryLikes = {};
function initGallery() {
    // Category tabs
    document.querySelectorAll('.gallery-tab').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.gallery-tab').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const cat = btn.dataset.cat;
            document.querySelectorAll('.gallery-item').forEach(item => {
                item.style.display = (cat === 'all' || item.dataset.cat === cat) ? '' : 'none';
            });
        });
    });

    // Like buttons
    document.querySelectorAll('.like-btn').forEach(btn => {
        btn.addEventListener('click', e => {
            e.stopPropagation();
            const id = btn.dataset.id;
            if (!galleryLikes[id]) { galleryLikes[id] = true; btn.querySelector('.like-count').textContent = parseInt(btn.querySelector('.like-count').textContent) + 1; spookyAudio.chime(659.25,.25); }
        });
    });

    // Lightbox
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', () => {
            document.getElementById('lightbox-img').src = item.dataset.url;
            document.getElementById('lightbox-title').textContent = item.dataset.title;
            document.getElementById('lightbox-caption').textContent = item.dataset.caption;
            document.getElementById('lightbox').classList.remove('hidden');
        });
    });
    document.getElementById('lightbox-close')?.addEventListener('click', () => document.getElementById('lightbox').classList.add('hidden'));
    document.getElementById('lightbox')?.addEventListener('click', function(e) { if (e.target === this) this.classList.add('hidden'); });
}

// ============================================
// LOUNGE (Tabs)
// ============================================
function initLounge() {
    document.querySelectorAll('.lounge-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.lounge-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.lounge-panel').forEach(p => p.classList.remove('active'));
            tab.classList.add('active');
            document.getElementById(`panel-${tab.dataset.panel}`).classList.add('active');
            spookyAudio.cardFlip();
        });
    });
    initPotionGame();
    initTarot();
    initPhotobooth();
}

// ============================================
// POTION GAME
// ============================================
let selectedIngredients = [];
function initPotionGame() {
    document.querySelectorAll('.ingredient-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            if (selectedIngredients.includes(id)) {
                selectedIngredients = selectedIngredients.filter(i => i !== id);
                btn.classList.remove('selected');
                spookyAudio.cardFlip();
            } else {
                if (selectedIngredients.length >= 3) { alert('Select exactly 3 ingredients!'); return; }
                selectedIngredients.push(id);
                btn.classList.add('selected');
                spookyAudio.potionBubble();
            }
            document.getElementById('brew-count').textContent = selectedIngredients.length;
            document.getElementById('brew-btn').disabled = selectedIngredients.length !== 3;
        });
    });
    document.getElementById('brew-btn')?.addEventListener('click', brewPotion);
    document.getElementById('brew-reset')?.addEventListener('click', resetPotion);
}
const potionNames = ['Elixir of Eternal Midnight Passion','Philtre of Unbreakable Harmony','Essence of Celestial Starlight Vows','Nectar of Crypt Laughter & Joy'];
function brewPotion() {
    if (selectedIngredients.length !== 3) return;
    spookyAudio.potionBubble();
    const display = document.getElementById('cauldron-display');
    display.innerHTML = `<div class="animate-pulse" style="display:flex;flex-direction:column;align-items:center;gap:.75rem"><span style="font-size:3rem;animation:bounce 1s infinite">🧙‍♀️</span><p style="font-family:'Cinzel',serif;color:#fbbf24;font-size:.8rem">Stirring ancient cauldron flames...</p></div>`;
    setTimeout(() => {
        const name = potionNames[Math.floor(Math.random() * potionNames.length)];
        spookyAudio.waxCrack(); launchConfetti(['#a855f7','#ec4899','#f59e0b','#06b6d4']);
        display.innerHTML = `<div class="animate-fade-in" style="text-align:center"><span style="font-family:'Cinzel',serif;font-size:.7rem;color:#fbbf24;text-transform:uppercase;letter-spacing:.1em;display:block;margin-bottom:.5rem">✨ Potion Successfully Brewed! ✨</span><h4 style="font-family:'Cinzel',serif;font-size:1.1rem;color:#fca5a5;margin-bottom:.75rem">${name}</h4><p style="font-family:'Cormorant Garamond',serif;font-style:italic;color:#e7e5e4;font-size:.95rem">"May Evelyn and Damian drink of endless bliss, and may their union conquer every shadow for a hundred lifetimes!"</p><button onclick="resetPotion()" style="margin-top:1rem" class="btn btn-ghost">↺ Brew Another</button></div>`;
    }, 1500);
}
function resetPotion() {
    selectedIngredients = [];
    document.querySelectorAll('.ingredient-btn').forEach(b => b.classList.remove('selected'));
    document.getElementById('brew-count').textContent = '0';
    document.getElementById('brew-btn').disabled = true;
    document.getElementById('cauldron-display').innerHTML = `<div style="text-align:center"><div style="font-size:2.5rem;margin-bottom:.5rem">🧪 🎃 ⚗️</div><p style="font-family:'Cinzel',serif;font-size:.75rem;color:#78716c">Selected Ingredients: <span id="brew-count">0</span> / 3</p></div>`;
    spookyAudio.cardFlip();
}

// ============================================
// TAROT
// ============================================
const TAROT_CARDS = [
    {name:'The Lovers of the Crypt',title:'Card of Eternal Devotion',meaning:'Two distinct souls drawn by an ancient gravity. Your presence will spark electric romance and deep harmony tonight.',blessing:"You shall find a dance partner whose heartbeat matches your own rhythm.",icon:'❤️',bg:'#4a0820'},
    {name:'The Blood Moon Empress',title:'Card of Magic & Mystery',meaning:'The veil between worlds thins. Hidden joy and unforeseen serendipities will illuminate your evening.',blessing:"A secret wish whispered under tonight's moon will surely manifest before midnight.",icon:'🌕',bg:'#2d1b4e'},
    {name:'The Golden Chalice of Elixirs',title:'Card of Joy & Abundance',meaning:'Laughter echoing through stone corridors, overflowing goblets, and heartfelt toasts to everlasting union.',blessing:'Every sip you take tonight carries a potion of youth and sweet celebration.',icon:'🍷',bg:'#4a2e00'},
    {name:'The Midnight Waltz',title:'Card of Ecstasy & Movement',meaning:'Music that stirs the dormant spirit. Cast off your everyday worries and surrender to the ballroom melody.',blessing:'Your footwear shall feel weightless on the dance floor until the witching hour.',icon:'🎵',bg:'#003a2d'},
    {name:'The Immortal Flame',title:'Card of Everlasting Loyalty',meaning:'Candles that never gutter out despite the autumn wind. A testament to loyalty that transcends lifetimes.',blessing:'You are protected by warm spirits and cherished by all in attendance.',icon:'🔥',bg:'#3d1000'},
];
function initTarot() {
    document.querySelectorAll('.tarot-card-back').forEach((card, idx) => {
        card.addEventListener('click', () => {
            spookyAudio.cardFlip();
            setTimeout(() => {
                const tc = TAROT_CARDS[idx % TAROT_CARDS.length];
                spookyAudio.chime(587.33, .3);
                document.getElementById('tarot-display').innerHTML = `
                <div class="tarot-card-revealed animate-fade-in" style="background:linear-gradient(to bottom,${tc.bg},#050208)">
                    <div style="font-size:3rem;margin-bottom:1rem">${tc.icon}</div>
                    <p style="font-family:'Cinzel',serif;font-size:.65rem;color:#fbbf24;letter-spacing:.15em;text-transform:uppercase">${tc.title}</p>
                    <h4 style="font-family:'Cinzel',serif;font-size:1.3rem;font-weight:700;color:#fce7f3;margin:.4rem 0">${tc.name}</h4>
                    <div style="width:5rem;height:1px;background:rgba(245,158,11,.5);margin:.75rem auto"></div>
                    <p style="font-family:'Cormorant Garamond',serif;font-size:1rem;color:#d6d3d1;line-height:1.7;margin-bottom:1rem">${tc.meaning}</p>
                    <div style="border:1px dashed rgba(245,158,11,.4);border-radius:.75rem;background:rgba(0,0,0,.4);padding:.75rem">
                        <span style="font-family:'Cinzel',serif;font-size:.6rem;color:#fbbf24;text-transform:uppercase;display:block;margin-bottom:.25rem">Your Night Blessing:</span>
                        <p style="font-family:'Cormorant Garamond',serif;font-style:italic;color:#fca5a5;font-size:.9rem">"${tc.blessing}"</p>
                    </div>
                    <button onclick="resetTarot()" class="btn btn-ghost" style="margin-top:1.25rem">↺ Draw Another Card</button>
                </div>`;
            }, 400);
        });
    });
}
function resetTarot() { spookyAudio.cardFlip(); document.getElementById('tarot-display').innerHTML = document.getElementById('tarot-deck-template').innerHTML; initTarot(); }

// ============================================
// PHOTOBOOTH
// ============================================
let boothFrame = 'rose', boothSticker = '🦇', boothImg = 'images/couple-portrait.jpg', boothCaption = 'Dancing under the Blood Moon 🖤';
function initPhotobooth() {
    updateBoothPreview();
    document.querySelectorAll('.frame-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.frame-btn').forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
            boothFrame = btn.dataset.frame; updateBoothPreview();
        });
    });
    document.querySelectorAll('.sticker-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.sticker-btn').forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
            boothSticker = btn.textContent; updateBoothPreview(); spookyAudio.chime(659.25,.2);
        });
    });
    document.querySelectorAll('.avatar-thumb').forEach(thumb => {
        thumb.addEventListener('click', () => {
            document.querySelectorAll('.avatar-thumb').forEach(t => t.classList.remove('selected'));
            thumb.classList.add('selected');
            boothImg = thumb.dataset.src; updateBoothPreview(); spookyAudio.cardFlip();
        });
    });
    document.getElementById('booth-caption-input')?.addEventListener('input', function() { boothCaption = this.value; updateBoothPreview(); });
    document.getElementById('booth-file')?.addEventListener('change', function() {
        const file = this.files[0]; if (!file) return;
        const reader = new FileReader(); reader.onload = e => { boothImg = e.target.result; updateBoothPreview(); spookyAudio.chime(659.25,.3); }; reader.readAsDataURL(file);
    });
    document.getElementById('booth-download')?.addEventListener('click', downloadBoothCard);
}
function updateBoothPreview() {
    const preview = document.getElementById('booth-preview');
    if (!preview) return;
    preview.className = `photo-preview-wrap frame-${boothFrame}`;
    preview.innerHTML = `<p style="font-family:'Cinzel',serif;font-size:.65rem;font-weight:700;color:#fbbf24;letter-spacing:.12em;text-transform:uppercase;margin-bottom:.35rem">✦ Till Death Do Us Part ✦</p><div style="position:relative;display:inline-block;width:100%"><img src="${boothImg}" style="width:100%;height:14rem;object-fit:cover;border-radius:.4rem" onerror="this.src='images/couple-portrait.jpg'"><div style="font-size:2.5rem;position:absolute;top:10%;left:${30+Math.floor(Math.random()*30)}%;filter:drop-shadow(0 2px 4px #000)">${boothSticker}</div></div><p style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:.9rem;color:#f5f5f4;margin:.5rem 0">"${boothCaption}"</p><p style="font-family:'Cinzel',serif;font-size:.6rem;color:rgba(253,164,175,.8);text-transform:uppercase">Damian & Evelyn • Oct 31, 2025</p>`;
}
function downloadBoothCard() {
    spookyAudio.waxCrack();
    const canvas = document.createElement('canvas'); canvas.width = 600; canvas.height = 800;
    const ctx2 = canvas.getContext('2d');
    ctx2.fillStyle = '#0a0610'; ctx2.fillRect(0,0,600,800);
    ctx2.strokeStyle = boothFrame==='rose'?'#881337':boothFrame==='gold'?'#d97706':'#7c3aed';
    ctx2.lineWidth = 12; ctx2.strokeRect(30,80,540,580);
    ctx2.fillStyle = '#f59e0b'; ctx2.font = 'bold 28px serif'; ctx2.textAlign = 'center';
    ctx2.fillText('TILL DEATH DO US PART', 300, 50);
    const img = new Image(); img.crossOrigin = 'anonymous';
    img.onload = () => {
        ctx2.drawImage(img, 40, 90, 520, 560);
        ctx2.fillStyle = '#fff'; ctx2.font = 'italic 22px serif'; ctx2.fillText(`"${boothCaption}"`, 300, 700);
        ctx2.font = '50px serif'; ctx2.fillText(boothSticker, 300, 200);
        ctx2.fillStyle = '#e11d48'; ctx2.font = '18px serif'; ctx2.fillText('The Halloween Wedding of Damian & Evelyn • Oct 31, 2025', 300, 750);
        const a = document.createElement('a'); a.download = `Gothic-Photobooth-${Date.now()}.png`; a.href = canvas.toDataURL(); a.click();
    };
    img.src = boothImg;
}

// ============================================
// GUESTBOOK
// ============================================
let guestbookEntries = [
    {id:'1',name:'Count Vlad & Elizabeth',message:'May your love outlive the stars and burn brighter than a thousand crypt fires! What an enchanting union. 🖤🦇',emoji:'🖤',date:'2 hours ago',likes:18,badge:'Best Ghoul'},
    {id:'2',name:'Morgana the Enchantress',message:'Brewed you both a cauldron of endless laughter, wild adventures, and eternal passion! Cannot wait to dance under the Blood Moon!',emoji:'🔮',date:'5 hours ago',likes:24,badge:'Maid of Magic'},
    {id:'3',name:'The Van Helsing Family',message:'Putting aside our monster-hunting swords for one night to celebrate true love! You two are undeniably made for each other.',emoji:'🕯️',date:'Yesterday',likes:12,badge:''},
    {id:'4',name:'Kasun & Dinithi (Sri Lanka)',message:'ඔබ දෙදෙනාගේ මේ අපූරු හැලොවීන් මංගල්‍යයට අපගේ හදපිරි සුභපැතුම්! 🎃❤️',emoji:'🎃',date:'2 days ago',likes:31,badge:'Honored Guest'},
];
let gbFilter = 'all', gbSelectedEmoji = '🖤';

function initGuestbook() {
    try { const s = JSON.parse(localStorage.getItem('gothic_wedding_guestbook') || 'null'); if (Array.isArray(s) && s.length) guestbookEntries = s; } catch(e){}
    renderGuestbook();
    document.querySelectorAll('.emoji-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.emoji-btn').forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
            gbSelectedEmoji = btn.textContent;
        });
    });
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            gbFilter = btn.dataset.filter;
            renderGuestbook();
        });
    });
    document.getElementById('guestbook-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = this.querySelector('#gb-name').value.trim();
        const message = this.querySelector('#gb-message').value.trim();
        if (!name || !message) return;
        const entry = {id:Date.now().toString(),name,message,emoji:gbSelectedEmoji,date:'Just now',likes:1,badge:'New Summoner'};
        guestbookEntries.unshift(entry);
        try { localStorage.setItem('gothic_wedding_guestbook', JSON.stringify(guestbookEntries)); } catch(e){}
        this.reset(); gbSelectedEmoji = '🖤';
        document.querySelectorAll('.emoji-btn').forEach(b => b.classList.remove('selected'));
        renderGuestbook(); spookyAudio.chime(659.25,.35);
    });
}

function renderGuestbook() {
    const grid = document.getElementById('gb-grid');
    if (!grid) return;
    const entries = gbFilter === 'popular' ? [...guestbookEntries].sort((a,b)=>b.likes-a.likes) : guestbookEntries;
    document.getElementById('gb-count').textContent = guestbookEntries.length;
    grid.innerHTML = entries.map(item => `
    <div class="gb-card" data-id="${item.id}">
        <div class="gb-head">
            <div style="display:flex;align-items:center;gap:.6rem">
                <div class="gb-emoji">${item.emoji}</div>
                <div>
                    <h4 class="font-cinzel" style="font-size:.85rem;font-weight:700;color:#f5f5f4">${item.name}</h4>
                    <span style="font-size:.75rem;color:#78716c">${item.date}${item.badge ? ` • ${item.badge}` : ''}</span>
                </div>
            </div>
            <button class="gb-like-btn" data-id="${item.id}">👍 <span class="like-count">${item.likes}</span></button>
        </div>
        <p class="gb-msg">"${item.message}"</p>
    </div>`).join('');

    grid.querySelectorAll('.gb-like-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            const entry = guestbookEntries.find(e => e.id === id);
            if (entry) { entry.likes++; btn.querySelector('.like-count').textContent = entry.likes; spookyAudio.chime(440,.2); try { localStorage.setItem('gothic_wedding_guestbook', JSON.stringify(guestbookEntries)); } catch(e){} }
        });
    });
}

// ============================================
// FAQ
// ============================================
function initFaq() {
    document.querySelectorAll('.faq-item').forEach((item, idx) => {
        if (idx === 0) item.classList.add('open');
        item.querySelector('.faq-btn').addEventListener('click', () => {
            const wasOpen = item.classList.contains('open');
            document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
            if (!wasOpen) { item.classList.add('open'); spookyAudio.cardFlip(); }
        });
    });
}

// ============================================
// FOOTER
// ============================================
function initFooter() {
    document.getElementById('scroll-top-btn')?.addEventListener('click', () => { spookyAudio.chime(659.25,.2); window.scrollTo({top:0,behavior:'smooth'}); });
    document.getElementById('share-whatsapp')?.addEventListener('click', () => {
        const txt = encodeURIComponent(`You're invited to the Halloween Wedding of Lady Evelyn & Lord Damian! 🖤🎃 Till Death Do Us Part! ${location.href}`);
        window.open(`https://api.whatsapp.com/send?text=${txt}`, '_blank'); spookyAudio.chime(523.25,.2);
    });
    document.getElementById('share-copy')?.addEventListener('click', () => {
        navigator.clipboard.writeText(location.href); alert('Invitation link copied to clipboard! 🦇'); spookyAudio.chime(523.25,.2);
    });
    document.getElementById('reseal-btn')?.addEventListener('click', () => {
        document.getElementById('main-content').classList.add('hidden');
        document.getElementById('envelope-screen').classList.remove('hidden');
        spookyAudio.stop();
    });
    document.querySelector('[data-reseal]')?.addEventListener('click', () => {
        document.getElementById('main-content').classList.add('hidden');
        document.getElementById('envelope-screen').classList.remove('hidden');
        spookyAudio.stop();
    });
}

// ============================================
// THUNDER EASTER EGG
// ============================================
function initThunder() {
    document.getElementById('thunder-btn')?.addEventListener('click', () => spookyAudio.thunder());
}

// ============================================
// REGISTRY
// ============================================
function initRegistry() {
    let bankCopied = false;
    document.getElementById('copy-bank-btn')?.addEventListener('click', function() {
        if (bankCopied) return;
        navigator.clipboard.writeText('Bank: Shadowvale Royal Vault | Acc: 7890-1234-5678-0031 | Swift: SHDWUS33');
        bankCopied = true; this.textContent = '✓ Vault Info Copied!'; spookyAudio.chime(659.25,.25);
        setTimeout(() => { bankCopied = false; this.textContent = '📋 Copy Vault Info'; }, 2500);
    });
    document.querySelectorAll('.contribute-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            spookyAudio.chime(587.33,.3);
            const bar = document.querySelector(`.progress-bar-fill[data-id="${btn.dataset.id}"]`);
            if (bar) {
                const cur = parseInt(bar.dataset.current) + 50;
                const max = parseInt(bar.dataset.max);
                const pct = Math.min(100, Math.round(cur/max*100));
                bar.style.width = pct+'%'; bar.dataset.current = cur;
                btn.closest('.registry-card').querySelector('.registry-current').textContent = '$'+cur.toLocaleString();
            }
            alert('Thank you for your generous dark tribute! Your blessing has been added to the coven vault. 🖤');
        });
    });
}

// ============================================
// INIT ALL
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    // Envelope
    document.getElementById('wax-seal-btn')?.addEventListener('click', () => openEnvelope(true));
    document.getElementById('skip-btn')?.addEventListener('click', () => openEnvelope(false));
    document.getElementById('sound-toggle')?.addEventListener('click', function() {
        const on = this.dataset.sound !== 'off';
        this.dataset.sound = on ? 'off' : 'on';
        this.textContent = on ? '🔇 Audio Muted' : '🔊 Audio Enchantment On';
    });

    initNavbar();
    initCountdown();
    initLoveCounter();
    initTimeline();
    initVenueTabs();
    initDressCode();
    initRsvp();
    initPassModal();
    initGallery();
    initLounge();
    initGuestbook();
    initFaq();
    initFooter();
    initThunder();
    initRegistry();
});
