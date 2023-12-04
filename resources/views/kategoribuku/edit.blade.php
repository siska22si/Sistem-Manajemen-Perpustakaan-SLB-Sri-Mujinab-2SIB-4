@extends('layouts.app') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Edit kategoribuku</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kategoribuku.update', $kategoribuku->id_kategori) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_kategori">Username:</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategoribuku->nama_kategori }}">
            </div>



            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection