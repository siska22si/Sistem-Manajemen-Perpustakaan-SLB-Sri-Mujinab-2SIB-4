<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
@extends('layouts.template')
@section('content')
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('buku.update', $data->id_buku) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                            <class="font-weight-bold">Sampul</label>
                                <input type="file" class="form-control @error('cover') is-invalid @enderror"
                                    name="cover" placeholder="Sampul">
                                <label class="font-weight-bold">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Judul" value="{{ $data->judul }}">
                                @error('judul')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Pilih Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="-" {{ $data->status == '-' ? 'selected' : '' }}>-</option>
                                    <option value="Tersedia" {{ $data->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="Dipinjam" {{ $data->status == 'Tidak_Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">ISBN</label>
                                <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" placeholder="ISBN" value="{{ $data->isbn }}">
                                @error('isbn')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach($nama_kategori as $kategori)
                                        <option value="{{ $kategori->id_kategori }}" {{ $data->kategori == $kategori->id_kategori ? 'selected' : '' }}>
                                            {{ $kategori->kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                                                        

                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" placeholder="Jumlah" value="{{ $data->jumlah }}">
                                @error('jumlah')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tahun</label>
                                <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" placeholder="Tahun" value="{{ $data->tahun }}">
                                @error('tahun')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pilih Penerbit</label>
                                <select class="form-control @error('penerbit') is-invalid @enderror" name="penerbit">
                                    <option value="" disabled selected>Pilih Penerbit</option>
                                    <option value="Erlangga" {{ $data->penerbit == 'Erlangga' ? 'selected' : '' }}>Erlangga</option>
                                    <option value="Gramedia" {{ $data->penerbit == 'Gramedia' ? 'selected' : '' }}>Gramedia</option>
                                    <option value="GagasMedia" {{ $data->penerbit == 'GagasMedia' ? 'selected' : '' }}>GagasMedia</option>
                                </select>
                                @error('penerbit')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                    <label class="font-weight-bold">NOMOR RAK</label>
                    <select class="form-control @error('nomor_rak') is-invalid @enderror" name="nomor_rak">
                        <option value="" disabled selected>Pilih Rak</option>
                        @foreach($raklist as $id => $rak)
                            <option value="{{ $id }}">{{ $rak }}</option>
                        @endforeach
                    </select>
                    @error('rak')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                                <label class="font-weight-bold">Deskripsi</label>
                                <input type="text-area" class="form-control @error('tahun') is-invalid @enderror" name="deskripsi" placeholder="Deskripsi" value="{{ $data->deskripsi }}">
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>

</html>
@endsection