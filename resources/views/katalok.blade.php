@extends('layouts.main')
@section('title', 'katalok')
@section('artikel')
    <div class="card-header">
        <a href="/katalok/add-form" class="btn btn-primary"><i class="bi bi-plus-square-fill"></i> katalok</a> 
    </div>
    <div class="card-body">
        @if(session('alert'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('alert') }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mv as $idx => $m)
                    <tr>
                        <td>{{ $idx + 1 }}</td>
                        <td>{{ $m->produk }}</td>
                        <td>{{ $m->kategori }}</td>
                        <td>{{ $m->stok }}</td>
                        <td>
                            <img src="{{ asset('/storage/'.$m->gambar) }}" 
                            alt="{{ $m->gambar }}" height="80" width="80">
                        </td>
                        <td>
                            <a href="/katalok/edit-form/{{ $m->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            <a href="/delete/{{ $m->id }}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
