<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Laporan MBG</title>
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ccc; padding-bottom: 10px; margin-bottom: 20px;">
        <h2 style="margin: 0;">Form Pelaporan Kejadian MBG</h2>
        
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('reports.index') }}">
                <button type="button">Lihat Daftar Laporan</button>
            </a>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
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

        <label>Unggah Bukti Pendukung (JPG, PNG, PDF max 2MB):</label><br>
        <input type="file" name="file_bukti" accept=".jpg,.jpeg,.png,.pdf"><br><br>

        <button type="submit">Kirim Laporan</button>
    </form>
</body>
</html>