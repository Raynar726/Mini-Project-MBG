<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\School;
use App\Models\Distribution;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'pelapor') {
            $reports = Report::where('pelapor_id', $user->id)->get();
        } else {
            $reports = Report::all();
        }

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
}