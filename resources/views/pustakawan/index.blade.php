<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pustakawan</title>
</head>
<body>
    <h1>Pustakawan</h1>

    <a href="{{ route('pustakawan.create') }}">Tambah Pustakawan</a>

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
            @forelse($pustakawans as $pustakawan)
                <tr>
                    <td>{{ $pustakawan->id_pustakawan }}</td>
                    <td>{{ $pustakawan->username }}</td>
                    <td>{{ $pustakawan->password }}</td>
                    <td>
                        <a href="{{ route('pustakawan.edit', $pustakawan->id_pustakawan) }}">Edit</a>
                        <form method="post" action="{{ route('pustakawan.destroy', $pustakawan->id_pustakawan) }}" style="display:inline;">
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
