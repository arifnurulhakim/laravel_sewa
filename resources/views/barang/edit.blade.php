@extends('adminlte::page')

@section('title', 'Edit Barang')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Barang</h1>
@stop

@section('content')
    <form action="{{route('barang.update', $barang)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" placeholder="Kode Barang" name="kode_barang" value="{{$barang->kode_barang ?? old('kode_barang')}}">
                            @error('kode_barang') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis_barang">Jenis Barang</label>
                            <select class="form-control @error('jenis_barang') is-invalid @enderror" id="jenis_barang" name="jenis_barang">
                                <option value="">Pilih Jenis Barang</option>
                                @foreach($jenis_barang as $jenis)
                                    <option value="{{$jenis->id}}" {{($barang->jenis_barang_id == $jenis->id) ? 'selected' : ''}}>{{$jenis->nama_jenis_barang}}</option>
                                @endforeach
                            </select>
                            @error('jenis_barang') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Barang" name="nama" value="{{$barang->nama ?? old('nama')}}">
                            @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Stok" name="stok" value="{{$barang->stok ?? old('stok')}}">
                            @error('stok') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga_sewa">Harga Sewa</label>
                            <input type="number" class="form-control @error('harga_sewa') is-invalid @enderror" id="harga_sewa" placeholder="Harga" name="harga_sewa" value="{{$barang->harga_sewa ?? old('harga_sewa')}}">
                            @error('harga_sewa') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Harga" name="harga_jual" value="{{$barang->harga_jual ?? old('harga_jual')}}">
                            @error('harga_jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                            @error('gambar') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi">{{$barang->deskripsi ?? old('deskripsi')}}</textarea>
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
    </form>
@stop
