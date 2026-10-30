<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Laporan MBG</title>
</head>
<body>
    <h2>Form Pelaporan Kejadian MBG</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('reports.store') }}" method="POST">
        @csrf
        
        <label>Pilih Sekolah:</label><br>
        <select name="sekolah_id" required>
            <option value="">-- Pilih Sekolah --</option>
            @foreach($schools as $school)
                <option value="{{ $school->id }}">{{ $school->nama_sekolah }}</option>
            @endforeach
        </select><br><br>

        <label>Pilih Distribusi:</label><br>
        <select name="distribusi_id" required>
            <option value="">-- Pilih Tanggal Distribusi --</option>
            @foreach($distributions as $dist)
                <option value="{{ $dist->id }}">ID Sekolah: {{ $dist->sekolah_id }} - Tanggal: {{ $dist->tanggal_distribusi }}</option>
            @endforeach
        </select><br><br>

        <label>Deskripsi Kejadian:</label><br>
        <textarea name="deskripsi_kejadian" rows="5" cols="40" required></textarea><br><br>

        <button type="submit">Kirim Laporan</button>
    </form>
</body>
</html>