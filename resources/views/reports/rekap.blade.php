<h2 style="margin-bottom: 5px;">Rekap Laporan Keamanan Makanan MBG</h2>
<a href="{{ route('reports.index') }}">Kembali ke Daftar Laporan</a>
<br><br>

<form action="{{ route('reports.rekap') }}" method="GET" style="margin-bottom: 20px;">
    <select name="sekolah_id">
        <option value="">-- Semua Sekolah --</option>
        @foreach($schools as $school)
            <option value="{{ $school->id }}" {{ request('sekolah_id') == $school->id ? 'selected' : '' }}>
                {{ $school->nama_sekolah }}
            </option>
        @endforeach
    </select>
    <button type="submit">Filter Data</button>
    <a href="{{ route('reports.rekap') }}"><button type="button">Reset</button></a>
</form>

<div style="display: flex; gap: 15px; margin-bottom: 20px; font-weight: bold;">
    <div style="border: 1px solid black; padding: 15px;">Total Laporan: {{ $totalLaporan }}</div>
    <div style="border: 1px solid orange; padding: 15px;">Masih Diproses: {{ $totalDiproses }}</div>
    <div style="border: 1px solid green; padding: 15px;">Sudah Selesai: {{ $totalSelesai }}</div>
</div>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <th>ID Laporan</th>
        <th>ID Sekolah</th>
        <th>ID Distribusi</th>
        <th>Status Akhir</th>
    </tr>
    @foreach($reports as $report)
    <tr>
        <td>{{ $report->id }}</td>
        <td>{{ $report->sekolah_id }}</td>
        <td>{{ $report->distribusi_id }}</td>
        <td>{{ $report->status }}</td>
    </tr>
    @endforeach
</table>