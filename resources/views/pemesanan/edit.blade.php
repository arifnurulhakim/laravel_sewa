@extends('adminlte::page')

@section('title', 'Edit Pemesanan')

@section('content_header')
<h1 class="m-0 text-dark">Edit Pemesanan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('pemesanan.update', ['kode_pemesanan' => $pemesanan->kode_pemesanan]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

                    <div class="form-group">
                        <label for="tanggalMulai">Tanggal Mulai</label>
                        <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggalMulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $pemesanan->tanggal_mulai) }}">
                        @error('tanggal_mulai')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggalSelesai">Tanggal Selesai</label>
                        <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggalSelesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $pemesanan->tanggal_selesai) }}">
                        @error('tanggal_selesai')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pemesanan.index') }}" class="btn btn-default">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
