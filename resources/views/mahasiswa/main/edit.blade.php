@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
    <div id="show-all-mahasiswa">
        <div class="title text-center my-2">
            <h1 class="font-weight-bold">Edit Mahasiswa {{ $mahasiswa->nim }}</h1>
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
            <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->nim) }}">
                {{ method_field('PATCH') }}
                @csrf
                <div class="form-group row">
                    <label for="nimMahasiswa" class="col-sm-3 col-form-label">NIM Mahasiswa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nimMahasiswa"
                               name="nimMahasiswa" placeholder="NIM Mahasiswa"
                               value="{{ $mahasiswa->nim }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaMahasiswa" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="namaMahasiswa"
                               name="namaMahasiswa" placeholder="Nama Mahasiswa"
                               value="{{ $mahasiswa->nama }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenisKelaminMahasiswa" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="jenisKelaminMahasiswa" >
                            <option id="opt-laki-laki" value="laki-laki">Laki-laki</option>
                            <option id="opt-perempuan" value="perempuan">Perempuan</option>
                            <option id="opt-lainnya" value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="usiaMahasiswa" class="col-sm-3 col-form-label">Usia</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="usiaMahasiswa"
                               name="usiaMahasiswa" placeholder="Usia Mahasiswa" min="0"
                               value="{{ $mahasiswa->usia }}">
                    </div>
                </div>
                <div class="form-group row justify-content-between">
                    <a href="{{ route('mahasiswa.index') }}" type="button" class="col-5 btn btn-secondary">Back</a>
                    <input type="submit" name="submit" id="submit" value="Edit Mahasiswa" class="col-5 offset-2 btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">
        let optionJenisKelamin = document.getElementById('opt-{{ $mahasiswa->jenis_kelamin }}')
        optionJenisKelamin.setAttribute("selected", "")
    </script>
@endsection
