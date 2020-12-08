@extends('layouts.app')

@section('title', 'Add New Mahasiswa')

@section('content')
    <div id="show-all-mahasiswa">
        <div class="title text-center my-2">
            <h1 class="font-weight-bold">Add New Mahasiswa</h1>
        </div>
        <div class="content mt-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('mahasiswa.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="nimMahasiswa" class="col-sm-3 col-form-label">NIM Mahasiswa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nimMahasiswa"
                               name="nimMahasiswa" placeholder="NIM Mahasiswa" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaMahasiswa" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="namaMahasiswa"
                               name="namaMahasiswa" placeholder="Nama Mahasiswa" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenisKelaminMahasiswa" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="jenisKelaminMahasiswa" >
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="usiaMahasiswa" class="col-sm-3 col-form-label">Usia</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="usiaMahasiswa"
                               name="usiaMahasiswa" placeholder="Usia Mahasiswa" min="0" >
                    </div>
                </div>
                <div class="form-group row justify-content-between">
                    <a href="{{ route('mahasiswa.index') }}" type="button" class="col-5 btn btn-secondary">Back</a>
                    <input type="submit" name="submit" id="submit" value="Add New Mahasiswa" class="col-5 offset-2 btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
