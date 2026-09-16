<?php
// ========================================
// Wedding Data Configuration
// ========================================

$weddingInfo = [
    'brideName'           => 'Lady Evelyn Blackwood',
    'groomName'           => 'Lord Damian Alexander',
    'brideTitle'          => 'The Enchantress of Shadows',
    'groomTitle'          => 'The Guardian of the Midnight Gates',
    'tagline'             => 'Till Death Do Us Part',
    'taglineSinhala'      => 'මරණය දක්වා අපගේ සදාකාලික බැඳීම',
    'weddingDate'         => '2025-10-31',
    'weddingTime'         => '5:30 PM',
    'receptionTime'       => '7:30 PM',
    'venueName'           => 'The Ravenhurst Grand Manor & Crypt Ballroom',
    'venueAddress'        => '13 Ravenhurst Way, Misty Hills Valley',
    'venueCity'           => 'Shadowvale, Highland Kingdom',
    'venueMapUrl'         => 'https://maps.google.com/?q=Ravenhurst+Castle',
    'dressCode'           => 'Gothic Glamour / Victorian Romance / Black Tie Masquerade',
    'dressCodeDescription'=> 'Adorn yourselves in deep velvets, rich burgundy, midnight obsidian, antique gold, or regal violet. Capes, antique brooches, and masquerade masks are enthusiastically welcomed!',
    'rsvpDeadline'        => '2025-10-10',
    'contactEmail'        => 'weddings@ravenhurst-coven.com',
    'contactPhone'        => '+1 (800) 666-LOVE',
    'storyParchment'      => 'Two wanderers met beneath the crimson autumn foliage, where whispered poetry and moonlit walks intertwined their destinies. By candlelight in the castle crypt, a vow was whispered: to love, cherish, and haunt together throughout this lifetime and the next.',
];

$scheduleEvents = [
    ['id'=>'gathering',  'time'=>'05:00 PM','title'=>'The Gathering of Souls',        'titleSi'=>'සන්ධ්‍යා පිළිගැනීම','description'=>'Welcome elixirs, smoking pumpkin punch, and harp melodies as shadows lengthen across the manor lawn.','icon'=>'✦','location'=>'The Misty Courtyard & Rose Pergola','highlight'=>false],
    ['id'=>'vows',       'time'=>'06:00 PM','title'=>'The Eternal Vows of the Blood Moon','titleSi'=>'සදාකාලික දිවුරුම්','description'=>'Under an arch of black velvet roses and a thousand flickering candles, two souls seal their eternal bond.','icon'=>'💍','location'=>'The Starlit Gothic Chapel','highlight'=>true],
    ['id'=>'elixir',     'time'=>'07:00 PM','title'=>'Witches\' Elixir & Potion Hour', 'titleSi'=>'රසවත් පාන සහ ඡායාරූප','description'=>'Cocktails infused with smoke, blackberry nectar, dark truffles, and eerie hors d\'œuvres under the lanterns.','icon'=>'🍷','location'=>'The Crypt Gallery & Terrace','highlight'=>false],
    ['id'=>'feast',      'time'=>'08:00 PM','title'=>'The Feast of Shadows Banquet',  'titleSi'=>'මහා රාත්‍රී භෝජන','description'=>'A lavish four-course gothic feast featuring roasted delicacies, pumpkin bisque, and spiced mulled wine.','icon'=>'🍽️','location'=>'The Grand Candelabra Hall','highlight'=>true],
    ['id'=>'danse',      'time'=>'09:30 PM','title'=>'The Danse Macabre & First Waltz','titleSi'=>'ප්‍රථම නර්තනය','description'=>'The newlyweds dance their first waltz amidst floating fog, followed by an intoxicating monster ball.','icon'=>'🎵','location'=>'The Moonlit Ballroom','highlight'=>true],
    ['id'=>'cake',       'time'=>'11:00 PM','title'=>'Midnight Cake Cutting & Toast', 'titleSi'=>'කේක් කැපීම','description'=>'Four-tiered black velvet and gold leaf cake carved with an antique silver dagger under sparklers.','icon'=>'🎂','location'=>'The Grand Ballroom Hearth','highlight'=>false],
    ['id'=>'farewell',   'time'=>'11:45 PM','title'=>'The Lantern & Mist Send-off',   'titleSi'=>'පහන් දල්වා සමුගැනීම','description'=>'Guests illuminate the pathway with vintage lanterns as the couple departs into the autumn mist.','icon'=>'🕯️','location'=>'The Carriage Gates','highlight'=>false],
];

$bridalCourt = [
    ['name'=>'Lady Selene Nightshade','role'=>'Maid of Horror (Maid of Honor)','relation'=>'Sister of the Bride & Potion Master','description'=>'Guarding the veil, arranging the black roses, and keeping the candles burning.','emoji'=>'👑'],
    ['name'=>'Lord Lucian Valerius',  'role'=>'Best Ghoul (Best Man)',          'relation'=>'Brother-in-Arms & Keeper of the Rings','description'=>'Tasked with safeguarding the obsidian wedding bands and delivering the midnight toast.','emoji'=>'🗡️'],
    ['name'=>'Rowena Frost & Clarice Vane','role'=>'Brides-Spirits (Bridesmaids)','relation'=>'Coven of Lifelong Friends','description'=>'Leading the ceremonial candlelit procession.','emoji'=>'🌹'],
    ['name'=>'Victor Vance & Alistair Drake','role'=>'Grooms-Demons (Groomsmen)','relation'=>'Fellow Knights of the Night','description'=>'Overseeing the Danse Macabre playlist and carriage arrivals.','emoji'=>'🦇'],
];

$galleryPhotos = [
    ['id'=>'1','title'=>'The Eternal Vow at Dusk',      'category'=>'portraits','url'=>'images/hero-gothic-wedding.jpg','caption'=>'Damian & Evelyn in their full gothic wedding finery beneath the rising full moon.','likes'=>142],
    ['id'=>'2','title'=>'Ravenhurst Castle at Twilight', 'category'=>'castle',   'url'=>'images/gothic-castle.jpg',      'caption'=>'The ancient stone manor illuminated by candlelight, awaiting our beloved souls.','likes'=>98],
    ['id'=>'3','title'=>'The Candlelit Altar of Shadows','category'=>'ceremony', 'url'=>'images/ceremony-altar.jpg',     'caption'=>'Hundreds of dripping pillar candles and dark burgundy blooms framing our vow sacred ground.','likes'=>115],
    ['id'=>'4','title'=>'Whispers in the Misty Woods',   'category'=>'portraits','url'=>'images/couple-portrait.jpg',    'caption'=>'A secret rendezvous amidst the autumn trees with an antique brass lantern.','likes'=>167],
    ['id'=>'5','title'=>'The Banquet of Candelabras',    'category'=>'details',  'url'=>'images/gothic-banquet.jpg',     'caption'=>'Vintage silver candelabras and ruby goblets set for a midnight banquet.','likes'=>89],
    ['id'=>'6','title'=>'The Midnight Velvet Masterpiece','category'=>'details', 'url'=>'images/gothic-cake.jpg',        'caption'=>'Four tiers of midnight black velvet cake laced with gold leaf and crimson sugar roses.','likes'=>134],
];

$weddingFaqs = [
    ['q'=>'Can we wear Halloween costumes or masks?',              'a'=>'Absolutely! We encourage Gothic Glamour, Victorian elegance, dark romantic costumes, dramatic capes, and masquerade masks. Just avoid white bridal gowns (the bride has dibs!).'],
    ['q'=>'Will there be vegetarian / vegan / gluten-free food?',  'a'=>'Yes, our coven chef has prepared decadent plant-based and allergy-friendly gourmet dishes. Please indicate your dietary preferences in the RSVP form.'],
    ['q'=>'Is parking available at Ravenhurst Manor?',             'a'=>'Valet carriage & automobile parking is available at the Front Iron Gate. Follow the candlelit pathway to the grand steps.'],
    ['q'=>'Are children allowed?',                                 'a'=>'While we love your little monsters, the evening reception after 8:00 PM will transition into a spooky monster ball. Mature young ghosts (12+) are welcome with parents.'],
    ['q'=>'Can we take photos during the ceremony?',               'a'=>'We are having an "Unplugged Ceremony" during the sacred blood moon vows. Once the reception begins, take as many photos as your heart desires!'],
];

$potionIngredients = [
    ['id'=>'blood-rose',     'name'=>'Black Velvet Rose Petals',  'icon'=>'🌹','effect'=>'Eternal Passion'],
    ['id'=>'moonlight',      'name'=>'Distilled Moonlight Drops', 'icon'=>'🌕','effect'=>'Enchanted Serenity'],
    ['id'=>'dragon-tear',    'name'=>'Dragon Fire Essence',       'icon'=>'🔥','effect'=>'Unbreakable Strength'],
    ['id'=>'pumpkin-dust',   'name'=>'Harvest Pumpkin Stardust',  'icon'=>'🎃','effect'=>'Joy & Prosperity'],
    ['id'=>'raven-feather',  'name'=>'Raven\'s Shadow Feather',   'icon'=>'🪶','effect'=>'Deep Wisdom & Mystery'],
    ['id'=>'amethyst-shimmer','name'=>'Crushed Amethyst Glow',    'icon'=>'💎','effect'=>'Noble Splendor'],
];

$tarotCards = [
    ['id'=>'lovers',       'name'=>'The Lovers of the Crypt',       'title'=>'Card of Eternal Devotion',  'meaning'=>'Two distinct souls drawn by an ancient gravity. Your presence will spark electric romance and deep harmony tonight.','blessing'=>'You shall find a dance partner whose heartbeat matches your own rhythm.','icon'=>'❤️','color'=>'#4a0820'],
    ['id'=>'blood-moon',   'name'=>'The Blood Moon Empress',        'title'=>'Card of Magic & Mystery',   'meaning'=>'The veil between worlds thins. Hidden joy and unforeseen serendipities will illuminate your evening.','blessing'=>'A secret wish whispered under tonight\'s moon will surely manifest before midnight.','icon'=>'🌕','color'=>'#2d1b4e'],
    ['id'=>'chalice',      'name'=>'The Golden Chalice of Elixirs', 'title'=>'Card of Joy & Abundance',   'meaning'=>'Laughter echoing through stone corridors, overflowing goblets, and heartfelt toasts to everlasting union.','blessing'=>'Every sip you take tonight carries a potion of youth and sweet celebration.','icon'=>'🍷','color'=>'#4a2e00'],
    ['id'=>'danse',        'name'=>'The Midnight Waltz',            'title'=>'Card of Ecstasy & Movement','meaning'=>'Music that stirs the dormant spirit. Cast off your everyday worries and surrender to the ballroom melody.','blessing'=>'Your footwear shall feel weightless on the dance floor until the witching hour.','icon'=>'🎵','color'=>'#003a2d'],
    ['id'=>'eternal-flame','name'=>'The Immortal Flame',            'title'=>'Card of Everlasting Loyalty','meaning'=>'Candles that never gutter out despite the autumn wind. A testament to loyalty that transcends lifetimes.','blessing'=>'You are protected by warm spirits and cherished by all in attendance.','icon'=>'🔥','color'=>'#3d1000'],
];

$registryItems = [
    ['id'=>'transylvania','title'=>'Transylvania & Gothic Castles Honeymoon','target'=>5000,'current'=>3850,'description'=>'Explore misty mountains, ancient Romanian castles, and moonlit village carriage rides.','icon'=>'🏰'],
    ['id'=>'candelabra',  'title'=>'Antique Candelabras & Manor Decor',       'target'=>1200,'current'=>1050,'description'=>'Restoring Victorian cast-iron candelabras for our haunted library.','icon'=>'🕯️'],
    ['id'=>'garden',      'title'=>'Enchanted Midnight Rose Garden',           'target'=>800, 'current'=>640, 'description'=>'Planting rare black baccara roses, weeping willows, and night-blooming jasmine.','icon'=>'🌹'],
    ['id'=>'wishing-well','title'=>'The Couple\'s Wishing Well Vault',        'target'=>3000,'current'=>2200,'description'=>'Direct blessing for the newlyweds\' new home and hearth.','icon'=>'💰'],
];
