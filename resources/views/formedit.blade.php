@extends('layouts.main')
@section('title', 'Form Edit Jadwal')
@section('artikel')
<div class="card">
    <div class="card-header">Edit Health Schedule</div>
    <div class="card-body">
        <form action="/update/{{ $jadwal->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="0">-- Jenis Obat --</option>
                    <option value="Antibiotik" {{ $jadwal->kategori == 'Antibiotik' ? 'selected' : '' }}>Antibiotik</option>
                    <option value="Analgesik" {{ $jadwal->kategori == 'Analgesik' ? 'selected' : '' }}>Analgesik</option>
                    <option value="Antihistamin" {{ $jadwal->kategori == 'Antihistamin' ? 'selected' : '' }}>Antihistamin</option>
                    <option value="Suplemen" {{ $jadwal->kategori == 'Suplemen' ? 'selected' : '' }}>Suplemen</option>
                    <option value="Herbal" {{ $jadwal->kategori == 'Herbal' ? 'selected' : '' }}>Herbal</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $jadwal->nama }}" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required>{{ $jadwal->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label>Dosis</label>
                <input type="text" name="dosis" class="form-control" value="{{ $jadwal->dosis }}" required>
            </div>
            <div class="form-group">
                <label>Jadwal Minum</label>
                <input type="text" name="jadwal_minum" class="form-control" value="{{ $jadwal->jadwal_minum }}" required>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" accept="image/*" name="gambar" class="form-control-file">
            </div>
            <div class="form-group">
                <img src="{{ asset('/storage/' . $jadwal->gambar) }}" alt="{{ $jadwal->gambar }}" height="80" width="170">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
