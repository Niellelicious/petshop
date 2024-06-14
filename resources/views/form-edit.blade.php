@extends('layouts.main')
@section('title','Form Add, Katalok')
@section('artikel')
    <div class="card">
        <div class=card-header></div>
        <div class="card-body">
            <form action="/update/{{ $mv->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Produk</label>
                    <input type="text" name="produk" class="form-control" value="{{ $mv->produk }}" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="0">----Pilih Kategori----</option>
                        <option value="Aksesoris"{{ ($mv->kategori == "Aksesoris") ? "selected" : "" }}>Aksesoris</option>
                        <option value="Food"{{ ($mv->kategori == "Food") ? "selected" : "" }}>Food</option>
                        <option value="Toy"{{ ($mv->kategori == "Toy") ? "selected" : "" }}>Toy</option>
                    </select>
                </div>                
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ $mv->stok }}" required>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control-file">
                </div>
                <div class="form-group">
                    <img src="{{ asset('/storage/'.$mv->gambar) }}" alt="{{ $mv->gambar }}" height="80" width="80">
                </div>
                <div class="form-group">
                    <button type="submit"class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection