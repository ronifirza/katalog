<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $photo->judul }} - Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #ffffff; color: #1a1a1a; }
        .product-img {
            width: 100%;
            border-radius: 12px;
            object-fit: contain;
            background-color: #f8f9fa;
            max-height: 600px;
        }
        .comment-section {
            height: 350px; 
            overflow-y: auto; 
            scrollbar-width: thin;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #000;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <a href="{{ route('photos.index') }}" class="text-decoration-none text-dark mb-4 d-inline-block fw-bold">
        ← Kembali ke Katalog
    </a>

    <div class="row g-5">
        <div class="col-md-7">
            <img src="{{ asset('storage/' . $photo->image_path) }}" class="product-img shadow-sm" alt="{{ $photo->judul }}">
        </div>

        <div class="col-md-5">
            <div class="product-info mb-4">
                <h1 class="fw-bold mb-1">{{ $photo->judul }}</h1>
                <p class="text-muted small mb-4">Oleh: {{ $photo->user->name }}</p>
                
                <h6 class="fw-bold">Deskripsi Produk</h6>
                <p class="text-secondary" style="line-height: 1.6;">
                    {{ $photo->deskripsi }}
                </p>
            </div>

            <hr>

            <div class="mt-4">
                <h6 class="fw-bold mb-3">Komentar ({{ $photo->comments->count() }})</h6>
                
                <div class="comment-section pe-2">
                    @forelse($photo->comments as $comment)
                        <div class="mb-3 border-bottom pb-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="fw-bold small d-block">{{ $comment->user->name }}</span>
                                    <p class="mb-0 small text-secondary">{{ $comment->content }}</p>
                                </div>
                                @if(auth()->user()->role == 'admin' || auth()->id() == $comment->user_id)
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger p-0" style="font-size: 0.7rem;" onclick="return confirm('Hapus komentar?')">Hapus</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-muted small italic text-center py-4">Belum ada komentar untuk produk ini.</p>
                    @endforelse
                </div>

                <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                    <div class="input-group">
                        <textarea name="content" class="form-control" rows="1" placeholder="Tulis komentar..." required></textarea>
                        <button type="submit" class="btn btn-dark">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="mt-5 py-5 text-center">
    <p class="text-muted small">&copy; 2026 Roni Firza - RPL SMKN 11 Malang</p>
</footer>

</body>
</html>