@extends('adminlte::page')

@section('title', 'List Keranjang')

@section('content_header')
    <h1 class="m-0 text-dark">List Keranjang</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="row">
    <div class="col">
        <a href="{{ route('keranjang.createPenyewaan') }}" class="btn btn-success mb-2">
            Checkout Pengewaan
        </a>
  
            <button href="{{ route('keranjang.createPembelian') }}" onclick="notificationBeforeCheckout(event, this)" class="btn btn-warning mb-2">
                Checkout Pembelian
            </button>
        
    </div>
    <div class="col">
    <label for="total_penyewaan">Total Penyewaan:</label>
        <p id="total_penyewaan">Rp.{{ $total_penyewaan }}</p>
          <label for="total_pembelian">Total Pembelian:</label>
        <p id="total_pembelian">Rp.{{ $total_pembelian }}</p>
    </div>
</div>

                  
                

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Banyak Barang</th>
                            <th>Jenis Transaksi</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($keranjang as $key => $keranjang)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$keranjang->nama_barang}}</td>
                                <td>{{$keranjang->jumlah_pesanan}}</td>
                                <td>{{$keranjang->jenis_transaksi}}</td>
                                
                                <td>
                                    <a href="{{route('keranjang.destroy', $keranjang)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
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
    <form action="" id="checkout-form" method="post">
        @method('post')
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
        function notificationBeforeCheckout(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan Checkout Pembelian ini ? ')) {
                $("#checkout-form").attr('action', $(el).attr('href'));
                $("#checkout-form").submit();
            }
        }

    </script>
@endpush
