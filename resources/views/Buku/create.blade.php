<!-- resources/views/pustakawan/create.blade.php -->

@extends('layouts.app') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Tambah buku Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buku.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="judul">judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
            </div>

            <div class="form-group">
                <label for="ISBN">ISBN:</label>
                <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ old('ISBN') }}">
            </div>
            <div class="form-group">
                <label for="penerbit">penerbit:</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
            </div>
            <div class="form-group">
                <label for="kategori">kategori:</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}">
            </div>
            <div class="form-group">
                <label for="jumlah">jumlah:</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">
            </div>
            <div class="form-group">
                <label for="tahun">tahun:</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ old('tahun') }}">
            </div>
            <div class="form-group">
                <label for="status">status:</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ old('status') }}">
            </div>


            <button type="submit" class="btn btn-primary">Tambah buku</button>
        </form>
    </div>
@endsection