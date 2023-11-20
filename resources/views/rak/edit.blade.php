<!-- resources/views/rak/edit.blade.php -->

@extends('layouts.app') <!-- Sesuaikan dengan layout yang Anda miliki -->

@section('content')
    <div class="container">
        <h2>Edit Rak</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rak.update', $rak->id_rak) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="username">Nomor Rak :</label>
                <input type="text" class="form-control" id="nomor_rak" name="nomor_rak" value="{{ $rak->nomor_rak }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
