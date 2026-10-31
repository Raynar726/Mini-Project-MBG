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
                <td>{{ ucfirst($report->status) }}</td>
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
</body>
</html>