<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar kategori buku</title>
</head>
<body>
    <h1>kategori buku</h1>

    <a href="{{ route('kategoribuku.create') }}">Tambah kategori buku</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
            <th>ID</th>
            <th>nama_kategori</th>
            <th>aksi</th>
            
            
            </tr>
        </thead>
        <tbody>
            @forelse($kategoribuku as $kategoribuku)
                <tr>
                    
                <td>{{ $kategoribuku->id_kategori }}</td>
                <td>{{ $kategoribuku->nama_kategori }}</td>
                <td>
                        <a href="{{ route('kategoribuku.edit', $kategoribuku->id_kategori) }}">Edit</a>
                        <form method="post" action="{{ route('kategoribuku.destroy', $kategoribuku->id_kategori )}}" style="display:inline;">
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