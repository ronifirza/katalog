<!DOCTYPE html>
<html>
<head>
    <title>Katalog Produk - Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #ffffff; color: #1a1a1a; }
        .navbar { border-bottom: 1px solid #f0f0f0; }
        
        /* Gaya Katalog */
        .product-card {
            border: none;
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .img-wrapper {
            overflow: hidden;
            border-radius: 12px;
            background-color: #f8f9fa;
        }
        .img-wrapper img {
            transition: scale 0.5s ease;
            height: 250px; 
            width: 100%; 
            object-fit: cover;
        }
        .product-card:hover img {
            scale: 1.1;
        }
        
        /* Tombol Custom */
        .btn-action {
            border-radius: 20px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
        <a class="navbar-brand fw-bold tracking-tighter" href="#">GALERI.</a>
        <div class="d-flex align-items-center gap-3">
            <div class="text-end d-none d-sm-block">
                <p class="mb-0 small fw-bold">{{ auth()->user()->name }}</p>
                <p class="mb-0 x-small text-muted" style="font-size: 0.7rem;">{{ strtoupper(auth()->user()->role) }}</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-dark btn-sm px-3 rounded-pill">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-end mb-5">
        <div>
            <h2 class="fw-bold mb-0">Semua Produk</h2>
            <p class="text-muted small">Menampilkan koleksi katalog terbaru</p>
        </div>
        @if(auth()->user()->role == 'admin')
            <a href="{{ route('photos.create') }}" class="btn btn-dark px-4 py-2 shadow-sm">+ Tambah Produk</a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-dark border-0 py-2 text-center mb-4" style="font-size: 0.9rem;">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        @foreach($photos as $photo)
            <div class="col-6 col-lg-3">
                <div class="product-card">
                    <a href="{{ route('photos.show', $photo->id) }}" class="text-decoration-none">
                        <div class="img-wrapper shadow-sm mb-3">
                            <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->judul }}">
                        </div>
                        <h6 class="text-dark fw-bold mb-1 text-truncate">{{ $photo->judul }}</h6>
                    </a>
                    <div class="d-flex gap-2">
                        <a href="{{ route('photos.show', $photo->id) }}" class="btn btn-dark btn-sm w-100 btn-action">Lihat</a>
                        
                        @if(auth()->user()->role == 'admin')
                            <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-outline-secondary btn-sm btn-action">Edit</a>
                            <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm btn-action">X</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<footer class="mt-5 py-5 text-center border-top">
    <p class="text-muted small">&copy; 2026 Roni Firza - SMKN 11 Malang</p>
</footer>

</body>
</html>