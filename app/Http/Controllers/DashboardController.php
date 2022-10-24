<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index(){
        $guru = Guru::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $siswa = Siswa::all();

        $id_siswa = auth()->user()->id;

        $find_siswa = Siswa::where('user_id');
        return view ('dashboard.index', compact('guru','kelas','mapel','siswa'));
    }
}