@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('content')
    <div id="show-all-mahasiswa">
        <div class="title text-center my-2">
            <h1 class="font-weight-bold">Show Mahasiswa {{ $mahasiswa->nim }}</h1>
        </div>
        <div class="content mt-5">
            <div class="my-2 text-right">
                <a href="{{ route('mahasiswa.index') }}" type="button"
                   class="btn btn-primary justify-content-center align-content-between">
                    <span>Kembali</span>
                </a>
                <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}" type="button"
                   class="btn btn-secondary justify-content-center align-content-between">
                    <span>Edit Mahasiswa</span>
                </a>
                <a href="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" type="button" class="btn btn-danger"
                   onclick="event.preventDefault(); document.getElementById('delete-mahasiswa').submit()">
                    Delete Mahasiswa
                </a>
                <form id="delete-mahasiswa" method="POST" action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}">
                    {{ method_field('DELETE') }}
                    @csrf
                </form>
            </div>
            <table class="table m-auto text-center">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>NIM</td>
                    <td>{{ $mahasiswa->nim }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $mahasiswa->nama }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Usia</td>
                    <td>{{ $mahasiswa->usia }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
