@extends('layouts.main')
@section('title','Form Add, Katalok')
@section('artikel')
    <div class="card">
        <div class=card-header></div>
        <div class="card-body">
            <form action="/save" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Produk</label>
                    <input type="text" name="produk" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="0">----Pilih Kategori----</option>
                        <option value="Aksesoris">Aksesoris</option>
                        <option value="Food">Food</option>
                        <option value="Toy">Toy</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control-file">
                </div>
                <div class="form-group">
                    <button type="submit"class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection