<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hariini = date('Y-m-d');
        $bulanini = date("m") * 1; // 1-12
        $tahunini = date("Y"); // 4 digit
        $nik = Auth::guard('karyawan')->user()->nik;
        $presensihariini = DB::table('presensi')->where('nik', $nik)->where('tgl_absensi', $hariini)->first();
        $historibulanini = DB::table('presensi')
            ->where('nik', $nik)
            ->whereRaw('MONTH(tgl_absensi)="' . $bulanini . '"')
            ->whereRaw('YEAR(tgl_absensi)="' . $tahunini . '"')
            ->orderBy('tgl_absensi')
            ->get();


        $rekapabsensi = DB::table('presensi')
            ->selectRaw('COUNT(nik) as jmlhadir, SUM(IF(jam_in > "08:00:00", 1, 0)) as jmlterlambat, SUM(IF(jam_out < "17:00:00", 1, 0)) as jmlpulangcepat')
            ->where('nik', $nik)
            ->whereRaw('MONTH(tgl_absensi)="' . $bulanini . '"')
            ->whereRaw('YEAR(tgl_absensi)="' . $tahunini . '"')
            ->first();

        $leaderboard = DB::table('presensi')
            ->join('karyawan', 'presensi.nik', '=', 'karyawan.nik')
            ->where('tgl_absensi', $hariini)
            ->orderBy('jam_in')
            ->get();
        $namabulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $namabulanini = $namabulan[$bulanini]; // Get the month name

        return view('dashboard.dashboard', compact('presensihariini', 'historibulanini', 'namabulan', 'bulanini', 'tahunini', 'namabulanini', 'rekapabsensi', 'leaderboard'));
    }
}
