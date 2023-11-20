<!-- resources/views/rak/create.blade.php -->

@extends('layouts.app') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Tambah rak Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rak.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="username">Nomor Rak:</label>
                <input type="text" class="form-control" id="nomor_rak" name="nomor_rak" value="{{ old('nomor_rak') }}">
            </div>

            <button type="submit" class="btn btn-primary">Tambah Rak</button>
        </form>
    </div>
@endsection
