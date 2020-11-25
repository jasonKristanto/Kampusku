<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaRequest;
use App\Models\Mahasiswa;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * @param MahasiswaRequest $newMahasiswaRequest
     * @return Application|RedirectResponse|Redirector
     */
    public function store(MahasiswaRequest $newMahasiswaRequest)
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
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        return view('mahasiswa.main.show', ['mahasiswa' => Mahasiswa::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        return view('mahasiswa.main.edit', ['mahasiswa' => Mahasiswa::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param MahasiswaRequest $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(MahasiswaRequest $request, $id)
    {
        $request = $request->validated();

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $request['namaMahasiswa'];
        $mahasiswa->jenis_kelamin = $request['jenisKelaminMahasiswa'];
        $mahasiswa->usia = $request['usiaMahasiswa'];
        $mahasiswa->save();

        return redirect('mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect('mahasiswa');
    }
}
