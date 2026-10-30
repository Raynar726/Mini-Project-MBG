<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\School;
use App\Models\Distribution;

class ReportController extends Controller
{
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
        ]);;

        $validated['pelapor_id'] = 1;
        $validated['status'] = 'menunggu';

        Report::create($validated);

        return redirect()->back()->with('success', 'Laporan kejadian berhasil dikirim.');
    }
}