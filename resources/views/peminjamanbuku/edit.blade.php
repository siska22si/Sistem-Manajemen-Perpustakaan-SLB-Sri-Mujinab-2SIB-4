<!-- resources/views/pustakawan/edit.blade.php -->

@extends('layouts.app') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Edit Pustakawan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peminjamanbuku.update', $peminjamanbuku->id_pinjam) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_buku">id_buku:</label>
                <input type="text" class="form-control" id="id_buku" name="id_buku" value="{{ $peminjamanbuku->id_buku }}">
            </div>

            <div class="form-group">
                <label for="nama_peminjam">Password:</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="{{ $peminjamanbuku->nama_peminjam }}">
            </div>

            <div class="form-group">
                <label for="tanggal_pinjam">tanggal_pinjam:</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ $peminjamanbuku->tanggal_pinjam }}">
            </div>

            <div class="form-group">
                <label for="tanggal_kembali">Password:</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ $peminjamanbuku->tanggal_kembali }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection