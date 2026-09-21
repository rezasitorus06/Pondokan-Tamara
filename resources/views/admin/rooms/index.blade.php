<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih kamar | Pondokan Tamara</title>@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-page">
    <header class="admin-header"><a class="brand" href="{{ route('home') }}"><span class="brand-mark" aria-hidden="true"></span><span><strong>Pondokan</strong><small>Tamara admin</small></span></a><div class="admin-actions"><span>{{ auth()->user()->name }}</span><form method="POST" action="{{ route('logout') }}">@csrf<button class="text-button">Keluar</button></form></div></header>
    <main class="admin-content admin-room-picker">
        <div class="admin-title"><div><p class="eyebrow">Room management</p><h1>Pilih kamar.</h1><p class="admin-muted">Klik kamar pada denah untuk mengubah detail, status, harga, atau fasilitasnya.</p></div></div>
        @if(session('success'))<div class="success-message">{{ session('success') }}</div>@endif
        @php($groups = $rooms->groupBy(fn ($room) => $room->location_key.'|'.$room->floor))
        @foreach($groups as $groupKey => $groupRooms)
            @php([$locationKey, $floor] = explode('|', $groupKey))
            <section class="admin-plan-section">
                <div class="admin-plan-heading"><div><p class="eyebrow">{{ $locationKey === 'tamara-1' ? 'Pondokan Tamara I' : 'Pondokan Tamara II' }}</p><h2>{{ $floor }}</h2></div><span>{{ $groupRooms->count() }} kamar</span></div>
                <div class="room-map admin-select-map layout-{{ $locationKey }} {{ $floor === 'Lantai 2' ? 'floor-two' : 'floor-one' }}">
                    @if($locationKey === 'tamara-1')
                        <div class="layout-label label-kitchen">DAPUR</div><div class="layout-label label-laundry">JEMURAN</div><div class="layout-label label-bathroom">KAMAR MANDI</div><div class="layout-label label-bathroom-mid">KAMAR MANDI</div><div class="layout-label label-parking">{{ $floor === 'Lantai 1' ? 'PARKIRAN' : 'NONGKRONG' }}</div><div class="layout-label label-bathroom-laundry">KAMAR MANDI &amp; JEMURAN</div><div class="layout-label label-owner">RUMAH PEMILIK KOS</div>
                    @endif
                    @foreach($groupRooms as $room)
                        @if($room->code === 'Rumah penjaga kos')<div class="room-tile admin-room-tile special-position-tile position-11-label">Rumah penjaga kos</div>@else<a class="room-tile admin-room-tile {{ $room->status }}" data-position="{{ $room->position }}" data-room="{{ $room->code }}" href="{{ route('admin.rooms.edit', $room) }}" title="Edit {{ $room->code }}"><span>{{ $room->code === 'VIP' ? 'VIP' : $room->code }}</span><small>Posisi {{ $room->position }}</small></a>@endif
                    @endforeach
                </div>
            </section>
        @endforeach
    </main>
</body>
</html>
