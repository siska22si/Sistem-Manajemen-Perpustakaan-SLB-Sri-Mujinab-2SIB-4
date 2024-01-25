<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstr
ap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.c
ss">
</head>

@extends('layouts.template')
@section('content')

<body style="background: lightgray">
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <a href="{{ route('buku.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BUKU</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <thead>
                                <tr>
                                    <th scope="col">SAMPUL</th>
                                    <th scope="col">JUDUL</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">KATEGORI</th>
                                    <th scope="col">JUMLAH</th>
                                    <th scope="col">TAHUN</th>
                                    <th scope="col">PENERBIT</th>
                                    <th scope="col">NOMOR RAK</th>
                                    <th scope="col">DESKRIPSI</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                  <tbody>
                  @forelse ($data as $bukus)
                                    <tr>
                                    <td><img src="{{asset('storage/cover/'.$bukus->cover)}}" width="100px" alt="" srcset=""></td>

                                        <td>{{ $bukus->judul }}</td>

                                        <td>{{ $bukus->status }}</td>

                                        <td>{!! $bukus->isbn !!}</td>

                                        <td>{!! $bukus->nama_kategori !!}</td>

                                        <td>{!! $bukus->jumlah !!}</td>

                                        <td>{!! $bukus->tahun !!}</td>

                                        <td>{!! $bukus->penerbit !!}</td>

                                        <td>{!! $bukus->nomor_rak !!}</td>

                                        <td>{!! $bukus->deskripsi !!}</td>

                                        <td class="text-center">
                                            <form onsubmit="return

confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('buku.destroy', $bukus->id_buku) }}" method="post">
                                                <a href="{{ route('buku.edit', $bukus->id_buku) }}"
                                                    class="btn

btn-sm btn-primary">EDIT</a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data buku belum Tersedia.
                                    </div>
                                @endforelse
                                
                  </tbody>
                </table>
              </div>
              <div class="d-flex justify-content-center">
    {{ $data->links() }}
</div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.
    js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap
    .min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js
    "></script>
    <script>
        //message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
</body>

</html>
@endsection