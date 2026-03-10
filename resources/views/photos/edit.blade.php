<!DOCTYPE html>
<html>
<head>
    <title>Edit - {{ $photo->judul }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #ffffff; color: #1a1a1a; }
        .edit-container { max-width: 900px; margin-top: 5rem; }
        .form-control { border-radius: 8px; padding: 0.75rem; border: 1px solid #e0e0e0; }
        .form-control:focus { box-shadow: none; border-color: #000; }
        .img-preview { 
            width: 100%; 
            border-radius: 12px; 
            object-fit: cover; 
            height: 350px; 
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<div class="container edit-container">
    <div class="mb-5">
        <h2 class="fw-bold">EDIT PRODUK</h2>
        <p class="text-muted">Perbarui informasi katalog produk Anda.</p>
    </div>

    <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-5">
            <div class="col-md-5">
                <label class="form-label fw-bold mb-3">Foto Saat Ini</label>
                <img src="{{ asset('storage/' . $photo->image_path) }}" class="img-preview shadow-sm mb-3">
                <div class="alert alert-light border-0 small text-muted">
                    <img src="https://raw.githubusercontent.com/Tarikul-Islam-Anik/Animated-Fluent-Emojis/master/Emojis/Objects/Light%20Bulb.png" width="20" /> 
                    Tips: Gunakan foto dengan pencahayaan terang agar katalog terlihat menarik.
                </div>
            </div>

            <div class="col-md-7">
                <div class="mb-3">
                    <label class="form-label small fw-bold">NAMA PRODUK</label>
                    <input type="text" name="judul" class="form-control" value="{{ $photo->judul }}" required placeholder="Masukkan judul produk">
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">GANTI FOTO (OPSIONAL)</label>
                    <input type="file" name="image_path" class="form-control">
                    <div class="form-text" style="font-size: 0.75rem;">Format: JPG, PNG, JPEG. Biarkan kosong jika tidak ingin mengganti.</div>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-bold">DESKRIPSI PRODUK</label>
                    <textarea name="deskripsi" class="form-control" rows="5" required placeholder="Jelaskan detail produk kamu...">{{ $photo->deskripsi }}</textarea>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-dark px-5 py-2 rounded-pill fw-bold" style="font-size: 0.85rem;">UPDATE DATA</button>
                    <a href="{{ route('photos.index') }}" class="text-decoration-none text-muted small">Batal & Kembali</a>
                </div>
            </div>
        </div>
    </form>
</div>

<footer class="mt-5 py-5 text-center">
    <p class="text-muted small">&copy; 2026 Roni Firza - RPL SMKN 11 Malang</p>
</footer>

</body>
</html>