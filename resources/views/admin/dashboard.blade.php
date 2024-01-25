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
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Jenis Buku</p>
                    <h5 class="font-weight-bolder">
                      {{$buku}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Buku</p>
                    <h5 class="font-weight-bolder">
                      {{$total_buku}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sedang Dipinjam</p>
                    <h5 class="font-weight-bolder">
                      {{$pinjam}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Tersedia</p>
                    <h5 class="font-weight-bolder">
                      {{$total_buku-$pinjam}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <!-- <div class="card-header pb-0">
              <a href="{{ route('buku.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BUKU</a>
            </div> -->
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
                                    <!-- <th scope="col">AKSI</th> -->
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

                                        <!-- <td class="text-center">
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
                                        </td> -->
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data buku belum Tersedia.
                                    </div>
                                @endforelse
                  </tbody>
                </table>
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
</div>

@endsection