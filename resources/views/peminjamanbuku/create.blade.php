
<!-- resources/views/pustakawan/create.blade.php -->

@extends('layouts.app') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Tambah Pustakawan Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peminjamanbuku.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="id_buku">id buku:</label>
                <input type="text" class="form-control" id="id_buku" name="id_buku" value="{{ old('id_buku') }}">
            </div>

            <div class="form-group">
                <label for="nama_peminjam">nama_peminjam:</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="{{ old('nama_peminjam') }}">
            </div>

            <div class="form-group">
                <label for="tanggal_pinjam">tanggal_pinjam:</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}">
            </div>

            <div class="form-group">
                <label for="tanggal_kembali">tanggal_kembali:</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
            </div>

            <button type="submit" class="btn btn-primary">Tambah Pustakawan</button>
        </form>
    </div>
@endsection
