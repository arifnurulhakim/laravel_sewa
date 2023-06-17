@extends('adminlte::page')

@section('title', 'Tambah Barang')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Barang</h1>
@stop

@section('content')
    <form action="{{route('barang.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" placeholder="Kode Barang" name="kode_barang" value="{{old('kode_barang')}}">
                            @error('kode_barang') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis_barang_id">Jenis Barang</label>
                            <select class="form-control @error('jenis_barang_id') is-invalid @enderror" id="jenis_barang_id" name="jenis_barang_id">
                                <option value="">Pilih Jenis Barang</option>
                                @foreach($jenis_barang as $jenis)
                                    <option value="{{$jenis->id}}">{{$jenis->nama_jenis_barang}}</option>
                                @endforeach
                            </select>
                            @error('jenis_barang') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Barang" name="nama" value="{{old('nama')}}">
                            @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Stok" name="stok" value="{{old('stok')}}">
                            @error('stok') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Harga" name="harga" value="{{old('harga')}}">
                            @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="ganti_rusak">Biaya Ganti Barang Rusak</label>
                            <input type="number" class="form-control @error('ganti_rusak') is-invalid @enderror" id="ganti_rusak" placeholder="Biaya Ganti Barang Rusak" name="ganti_rusak" value="{{old('ganti_rusak')}}">
                            @error('ganti_rusak') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="ganti_hilang">Biaya Ganti Barang Hilang</label>
                            <input type="number" class="form-control @error('ganti_hilang') is-invalid @enderror" id="ganti_hilang" placeholder="Biaya Ganti Barang Hilang" name="ganti_hilang" value="{{old('ganti_hilang')}}">
                            @error('ganti_hilang') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                            @error('gambar') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi">{{old('deskripsi')}}</textarea>
                            @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('barang.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop
