<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pustakawan List</title>
</head>
<body>
    <h1>Peminjaman Buku</h1>

    <a href="{{ route('peminjamanbuku.create') }}">Tambah Peminjam</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>id_buku</th>
                <th>nama_peminjam</th>
                <th>tanggal_pinjam</th>
                <th>tanggal_kembali</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjamanbuku as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->id_buku }}</td>
                    <td>{{ $peminjaman->nama_peminjam }}</td>
                    <td>{{ $peminjaman->tanggal_pinjam }}</td>
                    <td>{{ $peminjaman->tanggal_kembali }}</td>
                    <td>
                        <a href="{{ route('peminjamanbuku.edit', $peminjaman->id_buku) }}">Edit</a>
                        <form method="post" action="{{ route('peminjamanbuku.destroy', $peminjaman->id_buku) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah anda ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
