<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rak</title>
</head>
<body>
    <h1>Rak</h1>

    <a href="{{ route('rak.create') }}">Tambah rak</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>nomor_rak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rak as $rak)
                <tr>
                    <td>{{ $rak->id_rak }}</td>
                    <td>{{ $rak->nomor_rak }}</td>
                    <td>
                        <a href="{{ route('rak.edit', $rak->id_rak) }}">Edit</a>
                        <form method="post" action="{{ route('rak.destroy', $rak->id_rak) }}" style="display:inline;">
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
