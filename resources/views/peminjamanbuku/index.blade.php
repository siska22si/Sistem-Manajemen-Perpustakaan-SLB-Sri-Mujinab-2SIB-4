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
                <th>id_pinjam</th>
                <th>id_buku</th>
                <th>nama_peminjam</th>
                <th>tanggal_pinjam</th>
                <th>tanggal_kembali</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjamanbuku as $peminjamanbuku)
                <tr>
                    <td>{{ $peminjamanbuku->id_pinjam }}</td>
                    <td>{{ $peminjamanbuku->id_buku }}</td>
                    <td>{{ $peminjamanbuku->nama_peminjam }}</td>
                    <td>{{ $peminjamanbuku->tanggal_pinjam }}</td>
                    <td>{{ $peminjamanbuku->tanggal_kembali }}</td>
                    <td>
                        <a href="{{ route('peminjamanbuku.edit', $peminjamanbuku->id_pinjam) }}">Edit</a>
                        <form method="post" action="{{ route('peminjamanbuku.destroy', $peminjamanbuku->id_pinjam) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah anda ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>