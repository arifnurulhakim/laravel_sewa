@extends('adminlte::page')

@section('title', 'Tambah Pemesanan')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Pemesanan</h1>
@stop

@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<form action="{{ route('pemesanan.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
    <label for="tanggal_mulai">Tanggal Mulai</label>
    <input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $tanggal_mulai }}" disabled>
    <input type="hidden" name="tanggal_mulai" value="{{ $tanggal_mulai }}">
</div>

<div class="form-group">
    <label for="tanggal_selesai">Tanggal Selesai</label>
    <input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $tanggal_selesai }}" disabled>
    <input type="hidden" name="tanggal_selesai" value="{{ $tanggal_selesai }}">
</div>
<div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $alamat }}" disabled>
    <input type="hidden" name="alamat" value="{{ $alamat }}">
</div>

<div class="form-group">
    <label for="total_bayar">Total Bayar</label>
    <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="{{ $total_bayar }}" disabled>
    <input type="hidden" name="total_bayar" value="{{ $total_bayar }}">
</div>


<div class="form-group">
    <label for="bukti_pembayaran">Bukti transfer</label>
    <input type="file" class="form-control-file @error('bukti_pembayaran') is-invalid @enderror" id="bukti_pembayaran" name="bukti_pembayaran" require>
    @error('bukti_pembayaran') <span class="text-danger">{{$message}}</span> @enderror
    <label for="bukti_pembayaran">Transfer ke Rekening BCA : 123123123 </label>
    <br>
    <label for="bukti_pembayaran">Atas Nama : john </label>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('pemesanan.indexUser') }}" class="btn btn-default">Batal</a>
</div>
</form> 
</div>
</div>
</div>
</div>
@stop
