<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;
use Str;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = siswa::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('siswa.index', compact('siswa', 'mapel', 'kelas'));
    }

    public function data(){
        $siswa = siswa::orderBy('id', 'asc')->get();

        return datatables()
        ->of($siswa)
        ->addIndexColumn()
        ->editColumn('nama', function($siswa){
            return '
            <a href="/profile/'.$siswa->id.'">'.$siswa->nama.'</a>
            ';
        })
    
    ->addColumn('mapel_id', function($siswa){
        return !empty($siswa->mapel->nama) ? $siswa->mapel->nama : 'BELUM DI ISI';

        })
        ->addColumn('aksi', function($siswa){
            return
            '
            <div class="btn-group">
            <button onclick="editData(`'.route('siswa.update', $siswa->id).'`)" class="btn btn-flat btn-xs btn-warning"><i class="fa fa-edit"></i></button>
            <button onclick="deleteData(`'.route('siswa.destroy', $siswa->id).'`)" class="btn btn-flat btn-xs btn-danger"><i class="fa fa-trash"></i></button>
            </div>
            ';
        })
        ->rawColumns(['aksi', 'mapel_id', 'kelas_id'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel_id = Mapel::all();
        $kelas_id = Kelas::all();
        return view('siswa.form', compact('mapel_id', 'kelas_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {$user= new User;
       $user->role = 'siswa';
       $user->name = $request->nama;
       $user->email = $request->email;
       $user->password = bcrypt('rahasia');
       $user->remember_token = Str::random(20);
       $user->save();

       $request->request->add(['user_id'=> $user->id]);
       $siswa = Siswa::create($request->all());

       return response()->json([
        'success' => true,
        'massage' => 'Data berhasil disimpan',
        'data' => $siswa
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return response()->json($siswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->alamat = $request->alamat;
        $siswa->mapel_id = $request->mapel_id;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->update();
        
        return response()->json('Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return response()->json(null, 204);
    }
}