@extends('adminlte::page')

@section('title', 'List Barang')

@section('content_header')
    <h1 class="m-0 text-dark">List Barang</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <a href="{{route('barang.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Jenis Barang</th>
                            <th>Nama</th>
                            <th>Stok</th>
                            
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($barang as $key => $barang)
                            <tr>
                            <td>{{$key+1}}</td>
                                <td>{{$barang->kode_barang}}</td>
                                <td>{{$barang->nama_jenis_barang}}</td>
                                <td>{{$barang->nama}}</td>
                                {{--<td>$barang->stok</td>--}}
                                {{--<td>$barang->harga_sewa</td>--}}
                                {{--<td>$barang->harga_jual</td>--}}
                                {{--   <td><img height="150px" width="150px" src="data:image/jpg;base64,{{ $barang->gambar}}" /></td> --}}

                                {{--<td>$barang->deskripsi</td>--}}
                                <td>
                                    <a href="{{route('barang.edit', $barang)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('barang.destroy', $barang)}}"  onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                    <div type="button" class="btn btn-warning btn-xs btn-detail" data-id="{{ $barang->id }}" data-toggle="modal" data-target="#detailBarang">
                                        detail
                                    </div>
                                
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
            url: '/barang/' + postId,
            type: 'GET',
            success: function(data) {     
                $('.modal-body').html(`
                
    
        <div class="form-group text-center">
            <img class="img-fluid"src="data:image/jpg;base64,${data.gambar}" alt="Barang Picture">
        </div>

<div class="form-group">
    <label for="kode_barang">
        kode barang
    </label>
    <p>${data.kode_barang}</p>
    <hr>
</div>

<div class="form-group">
    <label for="jenis_barang_id">
        Jenis
    </label>
    <p>${data.nama_jenis_barang}</p>
    <hr>
</div>

<div class="form-group">
    <label for="nama">
        nama barang
    </label>
    <p>${data.nama}</p>
    <hr>
</div>

<div class="form-group">
    <label for="stok">
        stok
    </label>
    <p>${data.stok}</p>
    <hr>
</div>

<div class="form-group">
    <label for="harga">
        harga
    </label>
    <p>${data.harga_sewa}</p>
    <hr>
</div>

<div class="form-group">
    <label for="harga">
        harga
    </label>
    <p>${data.harga_jual}</p>
    <hr>
</div>

<div class="form-group">
    <label for="deskripsi">
        deskripsi
    </label>
    <p>${data.deskripsi}</p>
    <hr>
</div>

      </div>
    </div>`);
                $('#detailBarang').modal('show');
            }
                });
            });
 
        $('#example2').DataTable({
            "responsive": true,
        });
        
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                console.log(result.value);
            if (result.value == true) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
            })
        }
    </script>
@endpush
