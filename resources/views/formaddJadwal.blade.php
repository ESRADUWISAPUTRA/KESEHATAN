@extends('layouts.main')
@section('title', 'Form Add Jadwal')
@section('artikel')
<div class="card">
    <div class="card-header">Add Health Schedule</div>
    <div class="card-body">
        <form action="/savejadwal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="0">-- Jenis Obat --</option>
                    <option value="Antibiotik">Antibiotik</option>
                    <option value="Analgesik">Analgesik</option>
                    <option value="Antihistamin">Antihistamin</option>
                    <option value="Suplemen">Suplemen</option>
                    <option value="Herbal">Herbal</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Dosis</label>
                <input type="text" name="dosis" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jadwal Minum</label>
                <input type="text" name="jadwal_minum" class="form-control" required>
            </div>            
            </div>            
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" accept="image/*" name="gambar" class="form-control-file">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
