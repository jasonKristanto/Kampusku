<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaRequest;
use App\Models\Mahasiswa;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\IMahasiswaRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class MahasiswaController extends Controller
{
    private $msMahasiswa;

    public function __construct()
    {
        $this->msMahasiswa = app(IMahasiswaRepository::class);
    }

    public function index()
    {
        return view('mahasiswa.main.index', ['mahasiswas' => $this->msMahasiswa->all()]);
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

        $newMahasiswa = [
            "nim" => $newMahasiswaRequest['nimMahasiswa'],
            "nama" => $newMahasiswaRequest['namaMahasiswa'],
            "jenis_kelamin" => $newMahasiswaRequest['jenisKelaminMahasiswa'],
            "usia" => $newMahasiswaRequest['usiaMahasiswa']
        ];

        $this->msMahasiswa->create($newMahasiswa);

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
        return view('mahasiswa.main.show', ['mahasiswa' => $this->msMahasiswa->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        return view('mahasiswa.main.edit', ['mahasiswa' => $this->msMahasiswa->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param MahasiswaRequest $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(MahasiswaRequest $request, $id)
    {
        $updatedMahasiswaRequest = $request->validated();

        $updatedMahasiswa = [
            "nama" => $updatedMahasiswaRequest['namaMahasiswa'],
            "jenis_kelamin" => $updatedMahasiswaRequest['jenisKelaminMahasiswa'],
            "usia" => $updatedMahasiswaRequest['usiaMahasiswa']
        ];

        $this->msMahasiswa->update($id, $updatedMahasiswa);

        return redirect('mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        $this->msMahasiswa->delete($id);

        return redirect('mahasiswa');
    }
}
