<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Katalog Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #ffffff; 
            height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }
        .register-card { 
            width: 100%; 
            max-width: 400px; 
            padding: 2rem; 
        }
        .form-control { 
            border-radius: 8px; 
            padding: 0.75rem 1rem; 
            border: 1px solid #e0e0e0; 
            background-color: #fcfcfc;
        }
        .form-control:focus { 
            box-shadow: none; 
            border-color: #000; 
            background-color: #fff;
        }
        .btn-dark { 
            border-radius: 8px; 
            padding: 0.75rem; 
            font-weight: 600; 
            letter-spacing: 1px; 
        }
        .brand-logo {
            font-weight: 900;
            letter-spacing: -1px;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>

<div class="register-card">
    <div class="text-center mb-5">
        <div class="brand-logo text-dark">GABUNG.</div>
        <p class="text-muted small">Buat akun untuk mulai menjelajahi katalog</p>
    </div>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label small fw-bold text-secondary">NAMA LENGKAP</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama Anda" required autofocus>
        </div>

        <div class="mb-3">
            <label class="form-label small fw-bold text-secondary">ALAMAT EMAIL</label>
            <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label small fw-bold text-secondary">KATA SANDI</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>

        <div class="mb-4">
            <label class="form-label small fw-bold text-secondary">KONFIRMASI SANDI</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn btn-dark w-100 shadow-sm">DAFTAR SEKARANG</button>
    </form>

    <div class="text-center mt-5">
        <p class="text-muted small">
            Sudah memiliki akun? 
            <a href="{{ route('login') }}" class="text-dark fw-bold text-decoration-none border-bottom border-dark">Masuk Disini</a>
        </p>
    </div>
    
    <div class="text-center mt-4">
        <small class="text-muted" style="font-size: 0.7rem;">&copy; 2026 Roni Firza • SMKN 11 MALANG</small>
    </div>
</div>

</body>
</html>