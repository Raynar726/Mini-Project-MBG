<?php

namespace App\Observers;

use App\Models\Report;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;;

class ReportObserver
{
    /**
     * Handle the Report "created" event.
     */
    public function created(Report $report): void
    {
        //
    }

    /**
     * Handle the Report "updated" event.
     */
    public function updated(Report $report): void
    {
        if ($report->wasChanged('status')) {
            $user = Auth::user();
            Log::info('Perubahan Status Laporan:', [
                'report_id' => $report->id,
                'status_sebelum' => $report->getOriginal('status'),
                'status_baru' => $report->status,
                'diubah_oleh_id' => $user ? $user->id : 'Sistem'
            ]);
        }
    }

    /**
     * Handle the Report "deleted" event.
     */
    public function deleted(Report $report): void
    {
        //
    }

    /**
     * Handle the Report "restored" event.
     */
    public function restored(Report $report): void
    {
        //
    }

    /**
     * Handle the Report "force deleted" event.
     */
    public function forceDeleted(Report $report): void
    {
        //
    }
}
