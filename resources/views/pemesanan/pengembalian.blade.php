@extends('adminlte::page')

@section('title', 'Pengembalian')

@section('content_header')
    <h1 class="m-0 text-dark">Pengembalian</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pemesanan.updatePengembalian', $pemesanan->kode_pemesanan) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="tanggalKembali">Tanggal Kembali</label>
                            <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" id="tanggalKembali" name="tanggal_kembali" value="{{ old('tanggal_kembali', $pemesanan->tanggal_kembali) }}">
                            @error('tanggal_kembali')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pemesanan.indexPengembalian') }}" class="btn btn-default">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
