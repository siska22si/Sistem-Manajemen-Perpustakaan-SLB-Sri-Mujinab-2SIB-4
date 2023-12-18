<!-- resources/views/pengembalianbuku/create.blade.php -->

@extends('layouts.app') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Tambah pengembalianbuku Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengembalianbuku.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="id_pinjam">id_pinjam:</label>
                <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="{{ old('id_pinjam') }}">
            </div>

            <div class="form-group">
                <label for="tanggal_pengembalian">tanggal_pengembalian</label>
                <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian') }}">
            </div>

            <button type="submit" class="btn btn-primary">Tambah pengembalianbuku</button>
        </form>
    </div>
@endsection
