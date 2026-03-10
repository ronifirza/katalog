<!DOCTYPE html>
<html>
<head>
    <title>Unggah Produk Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #ffffff; color: #1a1a1a; }
        .create-container { max-width: 900px; margin-top: 5rem; }
        .form-control { border-radius: 8px; padding: 0.75rem; border: 1px solid #e0e0e0; }
        .form-control:focus { box-shadow: none; border-color: #000; }
        .upload-placeholder {
            border: 2px dashed #e0e0e0;
            border-radius: 12px;
            height: 350px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            color: #adb5bd;
        }
    </style>
</head>
<body>

<div class="container create-container">
    <div class="mb-5">
        <h2 class="fw-bold">TAMBAH PRODUK</h2>
        <p class="text-muted">Masukkan detail produk baru ke dalam katalog galeri Anda.</p>
    </div>

    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-5">
            <div class="col-md-5">
                <label class="form-label fw-bold mb-3">Preview Slot</label>
                <div class="upload-placeholder mb-3">
                    <img src="https://raw.githubusercontent.com/Tarikul-Islam-Anik/Animated-Fluent-Emojis/master/Emojis/Objects/Camera.png" width="60" class="mb-2" />
                    <span class="small">Pilih file untuk melihat preview</span>
                </div>
                <div class="alert alert-dark border-0 small">
                    Pastikan file gambar memiliki resolusi yang baik untuk hasil maksimal di dashboard.
                </div>
            </div>

            <div class="col-md-7">
                <div class="mb-3">
                    <label class="form-label small fw-bold">NAMA PRODUK</label>
                    <input type="text" name="judul" class="form-control" placeholder="Contoh: Kamera Analog Retro" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">UNGGUH FILE FOTO</label>
                    <input type="file" name="image_path" class="form-control" required>
                    <div class="form-text" style="font-size: 0.75rem;">Mendukung format JPG, PNG, atau JPEG.</div>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-bold">DESKRIPSI LENGKAP</label>
                    <textarea name="deskripsi" class="form-control" rows="5" placeholder="Ceritakan detail menarik tentang produk ini..." required></textarea>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-dark px-5 py-2 rounded-pill fw-bold" style="font-size: 0.85rem;">SIMPAN PRODUK</button>
                    <a href="{{ route('photos.index') }}" class="text-decoration-none text-muted small">Batal</a>
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