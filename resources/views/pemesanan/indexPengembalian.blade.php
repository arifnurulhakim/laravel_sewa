@extends('adminlte::page')

@section('title', 'List Pemesanan')

@section('content_header')
    <h1 class="m-0 text-dark">List Pemesanan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Pemesanan</th>
                                <th>List Barang</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kode_pemesanan as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->kode_pemesanan}}</td>
                                    <td>
                                        @foreach($pemesanan as $barang)
                                            @if($barang->kode_pemesanan === $item->kode_pemesanan)
                                                <ul>
                                                    <li>
                                                        nama barang :{{$barang->nama}}
                                                        <br>
                                                        jumlah barang :{{$barang->jumlah_pesanan}}
                                                        <br>
                                                        total Bayar :{{$barang->total_bayar}}
                                                    </li>
                                                </ul>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$item->total_bayar}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        @if($item->status == 'disewakan')
                                        <a href="{{ route('pemesanan.pengembalian', $item->kode_pemesanan) }}" class="btn btn-success btn-xs">
                                                dikembalikan
                                            </a>
                                            <a href="{{ route('pemesanan.printpengembalian', $item->kode_pemesanan) }}" class="btn btn-primary btn-xs">
                                                Cetak PDF
                                            </a>
                                           
                                        @else
                                        <a href="{{ route('pemesanan.printpengembalian', $item->kode_pemesanan) }}" class="btn btn-primary btn-xs">
                                                Cetak PDF
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
