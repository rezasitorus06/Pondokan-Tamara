<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk sebagai admin | Pondokan Tamara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-page">
    <main class="login-shell">
        <a class="brand" href="{{ route('home') }}"><span class="brand-mark" aria-hidden="true"></span><span><strong>Pondokan</strong><small>Tamara admin</small></span></a>
        <section class="login-card">
            <p class="eyebrow">Panel pengelola</p>
            <h1>Kelola kamar.</h1>
            <p class="admin-muted">Masuk untuk memperbarui status, harga, dan detail kamar.</p>
            @if($errors->any())<div class="form-error">{{ $errors->first() }}</div>@endif
            <form method="POST" action="{{ route('login.store') }}" class="admin-form">
                @csrf
                <label>Email<input type="email" name="email" value="{{ old('email') }}" required autofocus></label>
                <label>Password<input type="password" name="password" required></label>
                <label class="check-row"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
                <button class="button button-dark admin-submit" type="submit">Masuk <span>↗</span></button>
            </form>
        </section>
    </main>
</body>
</html>
