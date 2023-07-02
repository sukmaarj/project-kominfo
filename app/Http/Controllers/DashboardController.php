<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $masuk = Data::where('tipe', 'Surat Masuk')->get()->count();
        $datapengajuan = Data::get()->count();
        $datadinas = User::get()->count();

        return view('dashboard.index')->with([
            // 'masuk' => $masuk,
            'datapengajuan' => $datapengajuan,
            'datadinas' => $datadinas,
        ]);
    }
}
