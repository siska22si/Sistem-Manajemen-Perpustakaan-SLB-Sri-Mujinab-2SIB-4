<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengembalianbuku List</title>
</head>
<body>
    <h1>pengembalianbuku List</h1>

    <a href="{{ route('pengembalianbuku.create') }}">Tambah pengembalianbuku</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengembalianbukus as $pengembalianbuku)
                <tr>
                    <td>{{ $pengembalianbuku->id_pengembalianbuku }}</td>
                    <td>{{ $pengembalianbuku->username }}</td>
                    <td>{{ $pengembalianbuku->password }}</td>
                    <td>
                        <a href="{{ route('pengembalianbuku.edit', $pengembalianbuku->id_pengembalianbuku) }}">Edit</a>
                        <form method="post" action="{{ route('pengembalianbuku.destroy', $pengembalianbuku->id_pengembalianbuku) }}" style="display:inline;">
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