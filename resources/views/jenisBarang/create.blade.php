@extends('adminlte::page')

@section('title', 'Tambah Jenis Barang')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Jenis Barang</h1>
@stop

@section('content')
    <form action="{{route('jenisBarang.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Nama Jenis Barang</label>
                            <input type="text" class="form-control @error('nama JenisBarang') is-invalid @enderror" id="exampleInputName" placeholder="Nama JenisBarang" name="nama_jenis_barang" value="{{old('nama_jenis_barang')}}">
                            @error('nama_jenis_barang') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('jenisBarang.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop
