<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewMahasiswaRequest;
use App\Models\Mahasiswa;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.main.index', ['mahasiswas' => Mahasiswa::all()]);
    }

    public function create()
    {
        return view('mahasiswa.main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewMahasiswaRequest $newMahasiswaRequest
     * @return Application|RedirectResponse|Redirector
     */
    public function store(NewMahasiswaRequest $newMahasiswaRequest)
    {
        $newMahasiswaRequest = $newMahasiswaRequest->validated();

        $newMahasiswa = new Mahasiswa();
        $newMahasiswa->nim = $newMahasiswaRequest['nimMahasiswa'];
        $newMahasiswa->nama = $newMahasiswaRequest['namaMahasiswa'];
        $newMahasiswa->jenis_kelamin = $newMahasiswaRequest['jenisKelaminMahasiswa'];
        $newMahasiswa->usia = $newMahasiswaRequest['usiaMahasiswa'];
        $newMahasiswa->save();

        return redirect('mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
