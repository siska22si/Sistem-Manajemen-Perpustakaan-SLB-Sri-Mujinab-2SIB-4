@extends('layouts.app') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Edit buku</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buku.update', $buku->id_buku) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Username:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}">
            </div>

            <div class="form-group">
                <label for="ISBN">ISBN:</label>
                <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ $buku->ISBN }}">
            </div>

            <div class="form-group">
                <label for="penerbit">penerbit:</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}">
            </div>
            <div class="form-group">
                <label for="kategori">kategori:</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $buku->kategori }}">
            </div>
            <div class="form-group">
                <label for="jumlah">jumlah:</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $buku->jumlah }}">
            </div>
            <div class="form-group">
                <label for="tahun">tahun:</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $buku->tahun }}">
            </div>
            <div class="form-group">
                <label for="status">status:</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ $buku->status }}">
            </div>


            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection