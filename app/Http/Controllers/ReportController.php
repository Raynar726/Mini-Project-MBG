<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\School;
use App\Models\Distribution;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Report::query();

        if ($user->role === 'pelapor') {
            $query->where('pelapor_id', $user->id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('deskripsi_kejadian', 'like', '%' . $request->search . '%');
        }

        $reports = $query->paginate(5)->withQueryString();

        return view ('reports.index', compact('reports'));
    }

    public function create()
    {
        $schools = School::all();
        $distributions = Distribution::all();

        return view('reports.create', compact('schools', 'distributions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sekolah_id' => 'required|exists:schools,id',
            'distribusi_id' => 'required|exists:distributions,id',
            'deskripsi_kejadian' => 'required|string',
            'file_bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('file_bukti')) {
            $path = $request->file('file_bukti')->store('evidences', 'public');
            $validated['file_bukti'] = $path;
        }

        $validated['pelapor_id'] = Auth::id();
        $validated['status'] = 'menunggu';

        Report::create($validated);

        return redirect()->back()->with('success', 'Laporan kejadian berhasil dikirim.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai'
        ]);

        $report = Report::findOrFail($id);
        $report->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }

    public function getDistribusi($sekolah_id)
    {
        $distribusi = \App\Models\Distribution::where('sekolah_id', $sekolah_id)->get();

        return response()->json($distribusi);
    }

    public function rekap(Request $request)
    {
        $query = \App\Models\Report::query();

        if ($request->filled('sekolah_id')) {
            $query->where('sekolah_id', $request->sekolah_id);;
        }

        $totalLaporan = (clone $query)->count();
        $totalDiproses = (clone $query)->where('status', 'diproses')->count();
        $totalSelesai = (clone $query)->where('status', 'selesai')->count();

        $reports = $query->get();
        $schools = \App\Models\School::all();

        return view('reports.rekap', compact('totalLaporan', 'totalDiproses', 'totalSelesai', 'reports', 'schools'));
    }
}