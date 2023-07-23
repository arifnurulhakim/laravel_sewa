@extends('adminlte::page')

@section('title', 'List Pemesanan')

@section('content_header')
    <h1 class="m-0 text-dark">List Kirim Pesanan</h1>
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
                                <th>Jenis Transaksi</th>
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
                                    <td>{{$item->jenis_transaksi}}</td>
                                    <td>{{$item->status}}</td>
                                    {{--<td>$item->bukti_pembayaran</td>--}}
                                    {{--<td>$item->alamat</td>--}}
                                    <td>
                                        @if($item->status != 'sedang di kirim')
                                        <a href="{{ route('pemesanan.kirim', $item->kode_pemesanan) }}" class="btn btn-success btn-xs">
                                                kirim
                                            </a>
                                            <a href="{{ route('pemesanan.printpenyewaan', $item->kode_pemesanan) }}" class="btn btn-primary btn-xs">
                                                Cetak PDF
                                            </a>
                                            <div type="button" class="btn btn-warning btn-xs btn-detail" data-id="{{ $item->kode_pemesanan }}" data-toggle="modal" data-target="#detailBarang">
                                        detail
                                    </div>
                                
                                            
                                           
                                        @else
                                        <a href="{{ route('pemesanan.printpenyewaan', $item->kode_pemesanan) }}" class="btn btn-primary btn-xs">
                                                Cetak PDF
                                            </a>
                                            <div type="button" class="btn btn-warning btn-xs btn-detail" data-id="{{ $item->kode_pemesanan}}" data-toggle="modal" data-target="#detailBarang">
                                        detail
                                    </div>
                                
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
    @if (session()->has('success'))
    <script>
      Swal.fire(
      'Success!',
      '{{session()->get('success')}}',
      'success'
      )
    </script>

    @endif
    <div class="modal fade" id="detailBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Barang Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <!-- tambahkan tag </div> di bawah ini -->
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
        $('.btn-detail').click(function(e) {
    e.preventDefault();
    var postId = $(this).data('id');
    $.ajax({
        url: '/pemesanan/' + postId,
        type: 'GET',
        success: function(response) {
            let data = response.pemesanan;
            let pesananDetails = response.pemesanan_details;
            let modalBody = `
                <div class="form-group text-center">
                    <h4>Detail Pemesanan</h4>
                </div>
                <hr>
                <div class="form-group text-center">
            <img class="img-fluid"src="data:image/jpg;base64,${data.bukti_pembayaran}" alt="bukti pembayaran">
        </div>
                <div class="form-group">
                
    <div class="row">
     
        <div class="col-sm-6">
            <label for="barang_id">
                Kode Pemesanan
            </label>
        </div>
      
        <div class="col-sm-6">
            <p>${data.kode_pemesanan}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label for="users_id">
                Atas Nama
            </label>
        </div>
        <div class="col-sm-6">
            <p>${data.user_name}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label for="jumlah_pesanan">
                Jumlah Pesanan
            </label>
        </div>
        <div class="col-sm-6">
            <p>${data.jumlah_pesanan}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label for="total_bayar">
                Total Bayar
            </label>
        </div>
        <div class="col-sm-6">
            <p>${data.total_bayar}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label for="denda">
                Denda
            </label>
        </div>
        <div class="col-sm-6">
            <p>${data.denda}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label for="alamat">
                Alamat
            </label>
        </div>
        <div class="col-sm-6">
            <p>${data.alamat}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label for="tanggal_mulai">
                Tanggal Mulai
            </label>
        </div>
        <div class="col-sm-6">
            <p>${data.tanggal_mulai}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label for="tanggal_selesai">
                Tanggal Selesai
            </label>
        </div>
        <div class="col-sm-6">
            <p>${data.tanggal_selesai}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label for="tanggal_kembali">
                Tanggal Kembali
            </label>
        </div>
        <div class="col-sm-6">
            <p>${data.tanggal_kembali}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label for="jenis_transaksi">
                Jenis Transaksi
            </label>
        </div>
        <div class="col-sm-6">
            <p>${data.jenis_transaksi}</p>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            <label for="status">
                Status
            </label>
        </div>
        <div class="col-sm-6">
            <p>${data.status}</p>
        </div>
    </div>
</div>
<hr>

                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Barang ID</th>
                                <th>Kode Barang</th>
                                <th>Nama</th>
                                <th>Jumlah Pesanan</th>
                                <th>Harga Jual</th>
                                <th>Harga Sewa</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${generateTableRows(pesananDetails)}
                        </tbody>
                    </table>
                </div>
            `;
            $('.modal-body').html(modalBody);
            $('#detailPemesanan').modal('show');
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
            // Handle the error case
        }
    });
});

function generateTableRows(pesananDetails) {
    let rows = '';
    for (let i = 0; i < pesananDetails.length; i++) {
        let detail = pesananDetails[i];
        rows += `
            <tr>
                <td>${detail.barang_id}</td>
                <td>${detail.kode_barang}</td>
                <td>${detail.nama}</td>
                <td>${detail.jumlah_pesanan}</td>
                <td>${detail.harga_jual}</td>
                <td>${detail.harga_sewa}</td>
                <td>${detail.stok}</td>
            </tr>
        `;
    }
    return rows;
}




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
