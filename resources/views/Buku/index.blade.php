<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar buku</title>
</head>
<body>
    <h1>buku</h1>

    <a href="{{ route('buku.create') }}">Tambah buku</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
            <th>Judul</th>
                <th>Status</th>
                <th>ISBN</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($buku as $buku)
                <tr>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->status }}</td>
                <td>{{ $buku->ISBN }}</td>
                <td>{{ $buku->kategori }}</td>
                <td>{{ $buku->jumlah }}</td>
                <td>{{ $buku->tahun }}</td>
                <td>
                        <a href="{{ route('buku.edit', $buku->id_buku) }}">Edit</a>
                        <form method="post" action="{{ route('buku.destroy', $buku->id_buku) }}" style="display:inline;">
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