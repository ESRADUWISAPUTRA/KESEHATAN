@extends('layouts.main')
@section('title', 'Jadwal')
@section('artikel')
<div class="card">
    <div class="card-header">
        <a href="/jadwal/form-add" class="btn btn-primary">
            <i class="bi bi-plus-square"></i> Tambah Data
        </a>
    </div>
    @if(session('alert'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('alert') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card-body">
        <h1>Data Jadwal</h1>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Dosis</th>
                    <th>Jadwal_Minum</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $idx => $j) 
                <tr>
                    <td>{{ $idx + 1 }}</td>
                    <td>{{ $j->nama }}</td>
                    <td>{{ $j->deskripsi }}</td>
                    <td>{{ $j->dosis }}</td>
                    <td>{{ $j->jadwal_minum }}</td>
                    <td>{{ $j->kategori }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $j->gambar) }}" alt="{{ $j->gambar }}" height="80" width="80">
                    </td>
                    <td>
                        <a href="/form-edit/{{ $j->id }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        <a href="/delete/{{ $j->id}}" class="btn btn-danger"><i class="bi bi-trash3"></i></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
