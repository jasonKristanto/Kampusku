@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('content')
    <div id="show-all-mahasiswa">
        <div class="title text-center my-2">
            <h1 class="font-weight-bold">Show All Mahasiswa</h1>
        </div>
        <div class="content mt-5">
            <div class="my-2 text-right">
                <a href="{{ route('mahasiswa.create') }}" type="button"
                   class="btn btn-success justify-content-center align-content-between">
                    <span>Add New Mahasiswa</span>
                </a>
            </div>
            <table class="table m-auto text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->jenis_kelamin }}</td>
                        <td>{{ $mahasiswa->usia }}</td>
                        <td>
                            <a href="#" type="button" class="btn btn-primary btn-sm">
                                <i class="material-icons" aria-hidden="true">create</i>
                            </a>
                            <a href="#" type="button" class="btn btn-danger btn-sm">
                                <i class="material-icons" aria-hidden="true">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
