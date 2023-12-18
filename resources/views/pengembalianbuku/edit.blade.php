<!-- resources/views/pengembalianbuku/edit.blade.php -->

@extends('layouts.app') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Edit pengembalianbuku</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengembalianbuku.update', $pengembalianbuku->id_pinjam) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_pinjam">Username:</label>
                <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="{{ $pengembalianbuku->id_pinjam }}">
            </div>

            <div class="form-group">
                <label for="tanggal_pengembalian">Password:</label>
                <input type="text" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ $pengembalianbuku->tanggal_pengembalian }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
