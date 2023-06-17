@extends('adminlte::page')

@section('title', 'Edit jenisBarang')

@section('content_header')
    <h1 class="m-0 text-dark">Edit jenisBarang</h1>
@stop

@section('content')
    <form action="{{route('jenisBarang.update', $jenisBarang)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Nama jenisBarang</label>
                            <input type="text" class="form-control @error('nama jenisBarang') is-invalid @enderror" id="exampleInputName" placeholder="Nama jenisBarang" name="nama_jenis_barang" value="{{$jenisBarang->nama_jenis_barang ?? old('nama_jenis_barang')}}">
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
