<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookstore | detail-buku</title>
 
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #76b5c5">
    <div class="container col-8">
        <div class="justify-content-center mt-4 card">
            <div class="card-body">
                <div class="h3">Detail Buku</div>
                <div class="form-group mt-3">
                    @if($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->judul }}" class="rounded mx-auto d-block top" style="width: 5cm">
                    @endif
                </div>
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-8">
                        <label class="col-form-label">:</label>
                        <label class="col-form-label">{{ $book->judul }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-5">
                        <label class="col-form-label">:</label>
                        <label class="col-form-label">{{ $book->penulis }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-5">
                        <label class="col-form-label">:</label>
                        <label class="col-form-label">{{ $book->penerbit }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-2">
                        <label class="col-form-label">:</label>
                        <label class="col-form-label">{{ $book->tahun_terbit }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                    <div class="col-sm-4">
                        <label class="col-form-label">:</label>
                        <label class="col-form-label">{{ $book->isbn }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-4">
                        <label class="col-form-label">:</label>
                        <label class="col-form-label">{{ $book->harga }}</label>
                    </div>
                </div>
                <div>
                    <form onsubmit="return confirm('Apakah Anda yakin akan menghapus data buku {{ $book->judul }} ?');" action="{{ route('delete-data', $book->id) }}" method="POST">
                        <a href="{{ route('edit-data', $book->id) }}" class="btn btn-sm btn-primary shadow mr-2"><i class="fa fa-edit"></i> Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger shadow"><i class="fa fa-trash"></i> Delete</button>
                    </form>  
                </div>
                <div class="mb-2">
                    <a href="{{ route('index') }}" class="btn btn-secondary float-right mr-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>