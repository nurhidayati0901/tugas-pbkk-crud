<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookstore | edit-buku</title>
 
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body style="background-color: #76b5c5">
    <div class="container">
        <div class="justify-content-center mt-4 card">
            <div class="card-body">
                <div class="h3">Edit Data Buku</div>
                    <form action="{{ route('update-data', $book->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row mt-3">
                            <label for="image" class="col-sm-2 col-form-label">Pilih Gambar</label>
                            <div class="col-sm-3">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                  <div id="imageFeedback" class="invalid-feedback">Hanya dapat mengunggah berkas dengan format jpeg,jpg,png ukuran maksimum 2 MB</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label @error('judul') is-invalid @enderror">Judul Buku</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $book->judul }}">
                                @error('judul')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">Field judul harus diisi</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penulis" class="col-sm-2 col-form-label  @error('penulis') is-invalid @enderror">Penulis</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $book->penulis }}">
                                @error('penulis')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">Field penulis harus diisi</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penerbit" class="col-sm-2 col-form-label @error('penerbit') is-invalid @enderror">Penerbit</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $book->penerbit }}">
                                @error('penerbit')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">Field penerbit harus diisi</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tahun" class="col-sm-2 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-2">
                                <select class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit">
                                    <option value="">-Tahun-</option>
                                    <?php
                                        $tahun = date("Y");
                                        $tahun2 = $book->tahun_terbit;
                                        for ($i=$tahun-20; $i <= $tahun; $i++) {
                                            if ($i == $tahun2) {
                                                echo "<option value='$i' selected>$i</option>";
                                            }
                                            else {
                                                echo "<option value='$i'>$i</option>";
                                            }
                                        }
                                    ?>
                                </select>
                                @error('tahun_terbit')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">Field tahun terbit harus diisi</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" value="{{ $book->isbn }}">
                                @error('isbn')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">Field ISBN harus diisi</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ $book->harga }}">
                                @error('harga')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">Field harga harus diisi</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-warning float-right">Update</button>
                            <a href="{{ route('show-detail', $book->id) }}" class="btn btn-secondary float-right mr-3">Kembali</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>