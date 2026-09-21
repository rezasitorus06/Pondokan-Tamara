<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="pageTitle">Pondokan Tamara I | Pilih kamar nyaman di Balige</title>
    <meta name="description" content="Lihat ketersediaan kamar Pondokan Tamara di Balige dan temukan kamar yang cocok untukmu.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="site-header">
        <a class="brand" href="#top" aria-label="Pondokan Tamara">
            <span class="brand-mark" aria-hidden="true"></span>
            <span><strong>Pondokan</strong><small id="brandLocation">Tamara I</small></span>
        </a>
        <div class="location-switcher" aria-label="Pilih lokasi pondokan">
            @foreach($locations as $key => $location)
                <button class="location-option {{ $loop->first ? 'active' : '' }}" data-location="{{ $key }}">{{ $location['shortName'] }}</button>
            @endforeach
        </div>
        <nav class="nav-links" aria-label="Navigasi utama">
            <a href="#kamar">Kamar</a>
            <a href="#tentang">Tentang</a>
            <a href="#lokasi">Lokasi</a>
            @auth<a href="{{ route('admin.rooms.index') }}">Admin</a>@else<a href="{{ route('login') }}">Login</a>@endauth
            <a class="nav-cta" id="navWhatsapp" href="https://wa.me/6285270556636" target="_blank" rel="noreferrer">Tanya kamar <span>↗</span></a>
        </nav>
    </header>

    <main id="top">
        <section class="hero page-shell">
            <div class="hero-copy">
                <p class="eyebrow"><span></span> Hunian tenang di jantung Balige</p>
                <h1>Temukan ruang yang terasa <em>seperti rumah.</em></h1>
                <p class="hero-intro">Kamar nyaman, lingkungan tertata, dan akses mudah ke keseharianmu di Balige. Cek kamar yang masih tersedia sekarang.</p>
                <div class="hero-actions">
                    <a class="button button-dark" href="#kamar">Lihat ketersediaan <span>↓</span></a>
                    <a class="text-link" id="heroMapLink" href="https://maps.app.goo.gl/fYPNS2xivRLqCrL86" target="_blank" rel="noreferrer">Buka di Google Maps <span>↗</span></a>
                </div>
                <div class="hero-proof"><strong id="heroRating">4,8</strong><span class="stars">★★★★★</span><span>rating Google Maps<br><small id="heroMapCode">83H3+F9, Balige</small></span></div>
            </div>
            <div class="hero-visual">
                <div class="hero-image"></div>
                <div class="image-note"><span class="note-dot"></span><span><strong>Suasana yang sederhana.</strong><br>Rapi, hangat, dan siap dihuni.</span></div>
                <div class="hero-stamp">TAMARA<br><span>EST. 2007</span></div>
            </div>
        </section>

        <section class="availability-band" id="kamar">
            <div class="page-shell availability-inner">
                <div><p class="eyebrow">Ketersediaan saat ini</p><h2>Pilih kamarmu.</h2></div>
                <div class="availability-summary"><strong id="availableCount">0</strong><span>kamar<br>tersedia</span><i></i><strong id="totalCount">0</strong><span>total<br>kamar</span></div>
            </div>
        </section>

        <section class="rooms-section page-shell">
            <div class="section-heading"><div><p class="eyebrow">Cari kamar</p><h2>Denah kamar</h2><div class="floor-switcher" id="floorSwitcher"><button class="floor-option active" data-floor="Lantai 1">Lantai 1</button><button class="floor-option" data-floor="Lantai 2">Lantai 2</button></div></div><div class="legend"><span><i class="available"></i> Tersedia</span><span><i class="occupied"></i> Terisi</span><span><i class="reserved"></i> Dipesan</span></div></div>
            <div class="room-layout">
                <div class="map-panel">
                    <div class="map-toolbar"><span>Sketsa penempatan kamar</span><span class="north">N ↑</span></div>
                    <div class="room-map layout-tamara-1" id="roomMap">
                        <div class="layout-label label-kitchen">DAPUR</div>
                        <div class="layout-label label-laundry">JEMURAN</div>
                        <div class="layout-label label-bathroom">KAMAR MANDI</div>
                        <div class="layout-label label-bathroom-mid">KAMAR MANDI</div>
                        <div class="layout-label label-parking">PARKIRAN</div>
                        <div class="layout-label label-lounging">NONGKRONG</div>
                        <div class="layout-label label-bathroom-laundry">KAMAR MANDI &amp; JEMURAN</div>
                        <div class="layout-label label-owner">RUMAH PEMILIK KOS</div>
                        @php($displayPositions = ['Lantai 1' => [1 => 23, 2 => 22, 3 => 14, 4 => 1, 5 => 21, 6 => 20, 7 => 15, 8 => 2, 9 => 16, 10 => 3, 12 => 4, 13 => 5, 14 => 6], 'Lantai 2' => [1 => 27, 2 => 26, 3 => 17, 4 => 7, 5 => 25, 6 => 24, 7 => 18, 8 => 8, 9 => 19, 10 => 9, 12 => 10, 13 => 11, 14 => 12]])
                        @foreach($rooms as $room)
                            @if((int) $room['position'] == 11 && $room['floor'] === 'Lantai 1')
                                <div class="room-tile special-position-tile position-11-label" data-location="{{ $room['location_key'] }}" data-floor="{{ $room['floor'] }}" data-position="11"><span>RUMAH PENJAGA KOS</span></div>
                            @else
                                <button class="room-tile {{ $room['status'] }}" style="--room-slot: {{ $room['position'] }}" data-location="{{ $room['location_key'] }}" data-floor="{{ $room['floor'] }}" data-position="{{ $room['position'] }}" data-status="{{ $room['status'] }}" data-room="{{ $room['code'] }}" aria-label="Nomor kamar {{ $room['code'] }} - {{ $room['status'] === 'available' ? 'tersedia' : ($room['status'] === 'reserved' ? 'dipesan' : 'terisi') }}">
                                    <span>{{ ((int) $room['position'] === 11 && $room['floor'] === 'Lantai 2') ? 'VIP' : ($displayPositions[$room['floor']][$room['position']] ?? $room['position']) }}</span>
                                </button>
                            @endif
                        @endforeach
                        <div class="map-label map-common">AREA BERSAMA</div>
                    </div>
                    <p class="map-help">Klik kamar untuk melihat detailnya.</p>
                </div>
                <aside class="room-detail" id="roomDetail">
                    <div class="detail-kicker">Kamar pilihanmu</div><div class="detail-status"><span class="status-dot"></span><span id="detailStatus">Tersedia untuk disewa</span></div>
                    <h3 id="detailCode">A-01</h3><p class="detail-type" id="detailType">Standard · Lantai 1</p>
                    <div class="detail-price"><span>Mulai dari</span><strong id="detailPrice">Rp 950.000</strong><small>/ bulan</small></div>
                    <div class="detail-meta"><span>⌗ <b id="detailSize">3 x 3 m</b><small>ukuran</small></span></div>
                    <div class="detail-features"><span>Fasilitas kamar</span><ul id="detailFeatures"><li>Menyiapkan informasi fasilitas...</li></ul></div>
                    <a class="button button-dark full-button" id="detailWhatsapp" href="https://wa.me/6285270556636" target="_blank" rel="noreferrer">Tanyakan kamar ini <span>↗</span></a>
                    <p class="detail-footnote">Harga dan status dapat berubah. Konfirmasi langsung kepada pengelola.</p>
                </aside>
            </div>
            <div class="room-filters"><button class="filter active" data-filter="all">Semua kamar <b id="allFilterCount">14</b></button><button class="filter" data-filter="available">Tersedia <b id="availableFilterCount">8</b></button><button class="filter" data-filter="reserved">Dipesan <b id="reservedFilterCount">3</b></button></div>
        </section>

        <section class="about-section page-shell" id="tentang">
            <div class="about-image"></div><div class="about-copy"><p class="eyebrow">Tentang Tamara</p><h2>Tempat pulang yang tidak berlebihan.</h2><p id="aboutText">Pondokan Tamara hadir untuk kamu yang mencari tempat tinggal praktis, tenang, dan dekat dengan aktivitas Balige. Kami menjaga area tetap rapi agar kamu bisa fokus pada hari-harimu.</p><div class="feature-list"><span><b>01</b> Akses mudah</span><span><b>02</b> Lingkungan tenang</span><span><b>03</b> Kamar siap huni</span></div></div>
        </section>

        <section class="reviews-section page-shell" id="ulasan"><div class="reviews-intro"><p class="eyebrow">Ulasan Pondokan Tamara</p><h2>Yang orang lihat<br><em>tentang Tamara.</em></h2><p>Ulasan pengunjung yang dikumpulkan dari Google Maps dan ditampilkan satu per satu.</p></div><div class="reviews-grid"><article class="review-card review-card-rotating" id="reviewCard"><div class="review-card-top"><span class="review-source" id="reviewSource">Google Maps</span><strong id="reviewRating">★★★★★</strong></div><div class="review-author"><span class="review-avatar" id="reviewAvatar">TS</span><span><b id="reviewAuthor">Theresia Sitorus</b><small id="reviewMeta">3 tahun lalu · 3 ulasan · 9 foto</small></span></div><h3 id="reviewTitle">Bersih, nyaman dan sejukkk..</h3><p id="reviewText">Parkirannya juga luas dan pemiliknya ramah 🥰<br>Dan ternyata pondokan ini bisa sewa harian, mingguan bahkan bulanan.</p><a id="reviewLink" href="https://maps.app.goo.gl/fYPNS2xivRLqCrL86" target="_blank" rel="noreferrer">Baca ulasan <span>↗</span></a><div class="review-dots" id="reviewDots"></div></article></div></section>

        <section class="location-section" id="lokasi"><div class="page-shell location-inner"><div><p class="eyebrow">Datang dan lihat sendiri</p><h2>Di Balige,<br>inganan mulak ni <em>halak batak.</em></h2></div><div class="location-info"><p id="locationAddress">Jl. Tarutung Soposurung No., Sangkar Nihuta<br>Kec. Balige, Kabupaten Toba<br>Sumatera Utara 22312</p><a class="text-link" id="locationMapLink" href="https://maps.app.goo.gl/fYPNS2xivRLqCrL86" target="_blank" rel="noreferrer">Dapatkan arah <span>↗</span></a></div></div></section>
    </main>
    <footer class="site-footer page-shell"><span>© {{ date('Y') }} Pondokan Tamara</span><span>Balige, Sumatera Utara</span><a id="footerWhatsapp" href="https://wa.me/6285270556636" target="_blank" rel="noreferrer">WhatsApp 0852 7055 6636</a></footer>

    <script>
        const rooms = @json($rooms);
        const locations = @json($locations);
        const publicReviews = @json($reviews);
        let activeReview = 0;
        let activeLocation = 'tamara-1';
        let activeFilter = 'all';
        let activeFloor = 'Lantai 1';
        const money = new Intl.NumberFormat('id-ID');
        const tiles = document.querySelectorAll('.room-tile:not(.special-position-tile)');
        const filters = document.querySelectorAll('.filter');
        const reviewDots = document.querySelector('#reviewDots');
        const buildReviewDots = () => {
            reviewDots.innerHTML = '';
            publicReviews.forEach((_, index) => {
                const dot = document.createElement('i');
                dot.setAttribute('aria-label', `Ulasan ${index + 1}`);
                dot.classList.toggle('active', index === activeReview);
                reviewDots.appendChild(dot);
            });
        };
        const renderReview = () => {
            const review = publicReviews[activeReview];
            const card = document.querySelector('#reviewCard');
            card.classList.remove('review-visible');
            window.setTimeout(() => {
                document.querySelector('#reviewSource').textContent = review.source;
                document.querySelector('#reviewRating').textContent = review.rating;
                document.querySelector('#reviewAuthor').textContent = review.author;
                document.querySelector('#reviewMeta').textContent = review.meta;
                document.querySelector('#reviewAvatar').textContent = review.avatar;
                document.querySelector('#reviewTitle').textContent = review.title;
                document.querySelector('#reviewText').innerHTML = review.text;
                document.querySelector('#reviewLink').href = review.link;
                buildReviewDots();
                card.classList.add('review-visible');
            }, 180);
        };
        if (publicReviews.length) {
            buildReviewDots();
            window.setInterval(() => { activeReview = (activeReview + 1) % publicReviews.length; renderReview(); }, 3000);
            renderReview();
        }
        const displayNumber = (room) => {
            const numbers = {
                'Lantai 1': {1: 23, 2: 22, 3: 14, 4: 1, 5: 21, 6: 20, 7: 15, 8: 2, 9: 16, 10: 3, 12: 4, 13: 5, 14: 6},
                'Lantai 2': {1: 27, 2: 26, 3: 17, 4: 7, 5: 25, 6: 24, 7: 18, 8: 8, 9: 19, 10: 9, 12: 10, 13: 11, 14: 12},
            };
            if (room.code === 'Rumah penjaga kos' || room.code === 'VIP') return room.code;
            return numbers[room.floor]?.[room.position] ?? room.code;
        };
        const greeting = () => {
            const hour = new Date().getHours();
            return hour < 11 ? 'pagi' : hour < 15 ? 'siang' : hour < 18 ? 'sore' : 'malam';
        };
        const generalWhatsappMessage = () => `https://wa.me/6285270556636?text=${encodeURIComponent(`Selamat ${greeting()}. Saya ingin menanyakan soal kamar di Pondokan Tamara`)}`;
        const whatsappMessage = (room) => {
            const number = displayNumber(room);
            const message = room.status === 'available'
                ? `Selamat ${greeting()}. Saya ingin menanyakan kamar nomor ${number}.`
                : room.status === 'occupied'
                    ? `Selamat ${greeting()}. Apakah kamar nomor ${number} masih terisi?`
                    : `Selamat ${greeting()}. Apakah kamar nomor ${number} masih direservasi?`;
            return `https://wa.me/6285270556636?text=${encodeURIComponent(message)}`;
        };
        let selectedRoom = null;
        const detail = (room) => {
            selectedRoom = room;
            document.querySelector('#detailCode').textContent = displayNumber(room);
            document.querySelector('#detailType').textContent = `${room.type} · ${room.floor}`;
            document.querySelector('#detailPrice').textContent = `Rp ${money.format(room.price)}`;
            document.querySelector('#detailSize').textContent = room.size;
            const featureList = document.querySelector('#detailFeatures');
            const features = Array.isArray(room.features) ? room.features : [];
            featureList.innerHTML = '';
            if (features.length) {
                features.forEach((feature) => {
                    const item = document.createElement('li');
                    item.textContent = feature;
                    featureList.appendChild(item);
                });
            } else {
                featureList.innerHTML = '<li>Belum ada informasi fasilitas.</li>';
            }
            document.querySelector('#detailStatus').textContent = room.status === 'available' ? 'Tersedia untuk disewa' : room.status === 'reserved' ? 'Sedang dipesan' : 'Kamar sudah terisi';
            document.querySelector('.room-detail').dataset.status = room.status;
            document.querySelector('#detailWhatsapp').href = whatsappMessage(room);
        };
        const updateLocation = (locationKey, animate = false) => {
            activeLocation = locationKey;
            const location = locations[locationKey];
            const locationRooms = rooms.filter((room) => room.location_key === locationKey && (locationKey !== 'tamara-1' || room.floor === activeFloor));
            const selectableRooms = locationRooms.filter((room) => !(room.location_key === 'tamara-1' && room.floor === 'Lantai 1' && Number(room.position) === 11));
            const countableRooms = rooms.filter((room) => room.location_key === locationKey && (locationKey !== 'tamara-1' || Number(room.position) !== 11));
            const available = selectableRooms.filter((room) => room.status === 'available').length;
            const totalAvailable = countableRooms.filter((room) => room.status === 'available').length;
            const reserved = selectableRooms.filter((room) => room.status === 'reserved').length;
            const animatedSections = [document.querySelector('.hero-copy'), document.querySelector('.hero-visual'), document.querySelector('.availability-inner'), document.querySelector('.rooms-section'), document.querySelector('.location-section')];
            document.querySelector('#roomMap').className = `room-map layout-${locationKey} floor-${activeFloor === 'Lantai 2' ? 'two' : 'one'}`;
            document.querySelector('#floorSwitcher').hidden = locationKey !== 'tamara-1';
            if (animate) {
                animatedSections.forEach((section) => section?.classList.add('location-leaving'));
                window.setTimeout(() => animatedSections.forEach((section) => section?.classList.remove('location-leaving')), 180);
            }
            document.querySelector('#brandLocation').textContent = location.shortName;
            document.querySelector('#pageTitle').textContent = `${location.name} | Pilih kamar nyaman di Balige`;
            document.querySelector('#heroMapLink').href = location.mapUrl;
            document.querySelector('#locationMapLink').href = location.mapUrl;
            document.querySelector('#heroRating').textContent = location.rating;
            document.querySelector('#heroMapCode').textContent = location.mapCode;
            document.querySelector('#locationAddress').innerHTML = location.address.replaceAll('\n', '<br>');
            document.querySelector('#availableCount').textContent = totalAvailable;
            document.querySelector('#totalCount').textContent = countableRooms.length;
            document.querySelector('#allFilterCount').textContent = selectableRooms.length;
            document.querySelector('#availableFilterCount').textContent = available;
            document.querySelector('#reservedFilterCount').textContent = reserved;
            tiles.forEach((tile) => { tile.hidden = tile.dataset.location !== locationKey || (locationKey === 'tamara-1' && tile.dataset.floor !== activeFloor) || (activeFilter !== 'all' && tile.dataset.status !== activeFilter); });
            const firstRoom = selectableRooms.find((room) => room.status === 'available') || selectableRooms[0];
            if (firstRoom) detail(firstRoom);
            if (animate) {
                window.requestAnimationFrame(() => {
                    animatedSections.forEach((section, index) => {
                        section?.classList.remove('location-entering');
                        window.setTimeout(() => section?.classList.add('location-entering'), index * 35);
                    });
                });
            }
        };
        tiles.forEach((tile) => tile.addEventListener('click', () => detail(rooms.find((room) => room.code === tile.dataset.room))));
        document.querySelector('#navWhatsapp').addEventListener('click', (event) => {
            event.currentTarget.href = generalWhatsappMessage();
        });
        document.querySelector('#footerWhatsapp').href = generalWhatsappMessage();
        filters.forEach((filter) => filter.addEventListener('click', () => {
            activeFilter = filter.dataset.filter;
            filters.forEach((item) => item.classList.remove('active')); filter.classList.add('active');
            updateLocation(activeLocation);
        }));
        document.querySelectorAll('.location-option').forEach((option) => option.addEventListener('click', () => {
            document.querySelectorAll('.location-option').forEach((item) => item.classList.remove('active'));
            option.classList.add('active'); updateLocation(option.dataset.location, true);
        }));
        document.querySelectorAll('.floor-option').forEach((option) => option.addEventListener('click', () => {
            activeFloor = option.dataset.floor;
            document.querySelectorAll('.floor-option').forEach((item) => item.classList.remove('active'));
            option.classList.add('active');
            document.querySelector('.rooms-section').classList.add('location-leaving');
            window.setTimeout(() => { updateLocation(activeLocation, true); document.querySelector('.rooms-section').classList.remove('location-leaving'); }, 180);
        }));
        updateLocation(activeLocation);
    </script>
</body>
</html>