<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookstore | index</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #76b5c5">
    <!-- DataTales Example -->
    <div class="container">
        <div class="card mt-3">
            <div class="card-header py-3">
                <div class="h3">Daftar Stok Buku</div>
                <a href="{{ route('input-form') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Input buku</a>
            </div>
            
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Cover Buku</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @php
                            $i = 1
                        @endphp
                        @foreach ($books as $book)
                        <tbody>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    @if($book->image)
                                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->judul }}" class="rounded mx-auto d-block top" style="width: 5cm">
                                    @endif
                                </td>
                                <td>{{ $book->judul }}</td>
                                <td>{{ $book->penulis }}</td>
                                <td>{{ $book->harga }}</td>
                                <td>
                                    <a href="{{ route('show-detail', $book->id) }}" class="badge badge-info">detail</a>
                                </td>
                            </tr>
                        </tbody>
                        @php
                            $i += 1
                        @endphp
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>