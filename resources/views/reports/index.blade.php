<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Laporan MBG</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
    </style>
</head>
<body>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Daftar Laporan Kejadian MBG</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <a href="{{ route('reports.create') }}">
        <button>+ Buat Laporan Baru</button>
    </a>
    <br><br>
    <form action="{{ route('reports.index') }}" method="GET" style="margin-bottom: 20px; display: flex; gap: 10px; align-items: center;">
        <input type="text" name="search" placeholder="Cari deskripsi..." value="{{ request('search') }}">
        
        <select name="status">
            <option value="">-- Semua Status --</option>
            <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
        
        <button type="submit">Cari / Filter</button>
        <a href="{{ route('reports.index') }}"><button type="button">Reset</button></a>
    </form>
    @if(session('success'))
    <div style="color: green; padding: 10px; border: 1px solid green; background-color: #f0fff0; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Sekolah</th>
                <th>ID Distribusi</th>
                <th>ID Pelapor</th>
                <th>Deskripsi Kejadian</th>
                <th>Status</th>
                <th>Bukti</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->sekolah_id }}</td>
                <td>{{ $report->distribusi_id }}</td>
                <td>{{ $report->pelapor_id }}</td>
                <td>{{ $report->deskripsi_kejadian }}</td>
                <td>
                    @if(Auth::user()->role === 'pelapor')
                        {{ ucfirst($report->status) }}
                    @else
                        <form action="{{ route('reports.updateStatus', $report->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()">
                                <option value="menunggu" {{ $report->status === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="diproses" {{ $report->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $report->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    @endif
                </td>
                <td>
                    @if($report->file_bukti)
                        <a href="{{ asset('storage/' . $report->file_bukti) }}" target="_blank">Lihat File</a>
                    @else
                        Tidak ada
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">Belum ada data laporan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 15px;">
        {{ $reports->links() }}
    </div>
</body>
</html>