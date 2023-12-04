<!-- resources/views/pustakawan/create.blade.php -->

@extends('layouts.app') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Tambah kategori buku Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kategoribuku.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_kategori">nama_kategori:</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
            </div>



            <button type="submit" class="btn btn-primary">Tambah kategori buku</button>
        </form>
    </div>
@endsection