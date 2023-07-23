@extends('adminlte::page')

@section('title', 'List Barang')

@section('content_header')
    <h1 class="m-0 text-dark">List Barang</h1>
@stop

@section('content')
    <div class="row">
        @foreach($barang as $key => $item)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <!-- Card content -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                    </div>
                    <!-- Image -->
                    <img src="data:image/jpg;base64,{{ $item->gambar }}" class="card-img-top" alt="Gambar Barang">
                    <!-- Card footer -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Harga Sewa: {{ $item->harga_sewa }}</li>
                        <li class="list-group-item">Harga Beli: {{ $item->harga_jual }}</li>
                        <li class="list-group-item">Stok: {{ $item->stok }}</li>
                        <li class="list-group-item">
                            <!-- Form input jumlah_pesananity dengan plus minus -->
                            <form method="POST" action="{{ route('keranjang.store') }}">
                                @csrf
                                <input type="hidden" name="barang_id" value="{{ $item->id }}">
                                <input type="hidden" name="jenis_transaksi" value="" id="jenis_transaksi_{{ $item->id }}">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-number" disabled="disabled" data-type="minus" data-field="jumlah_pesanan[{{ $key }}]">
                                            <span class="fas fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" name="jumlah_pesanan[{{ $key }}]" class="form-control input-number" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="jumlah_pesanan[{{ $key }}]">
                                            <span class="fas fa-plus"></span>
                                        </button>
                                    </span>
                                </div>
                        </li>
                    </ul>
                    <div class="card-body">
                        <center>
                            <button type="submit" class="btn btn-success mt-2" onclick="setJenisTransaksi({{ $item->id }}, 'sewa')">sewa</button>
                        </center>
                        <center>
                            <button type="submit" class="btn btn-warning mt-2" onclick="setJenisTransaksi({{ $item->id }}, 'beli')">beli</button>
                        </center>
                    </div>
                    </form>
                </div>
            </div>
            @if(($key+1) % 4 == 0)
                </div><div class="row">
            @endif
        @endforeach
    </div>
    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Success!',
                '{{ session()->get('success') }}',
                'success'
            )
        </script>
    @endif
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>

    <script>
        $(document).ready(function() {
            $('.btn-number').click(function(e) {
                e.preventDefault();

                var fieldName = $(this).attr('data-field');
                var type = $(this).attr('data-type');
                var input = $("input[name='" + fieldName + "']");
                var currentVal = parseInt(input.val());

                if (!isNaN(currentVal)) {
                    if (type == 'minus') {
                        if (currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }
                    } else if (type == 'plus') {
                        if (currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                        }
                    }
                } else {
                    input.val(0);
                }
            });

            $('.input-number').focusin(function() {
                $(this).data('oldValue', $(this).val());
            });

            $('.input-number').change(function() {
                var minValue = parseInt($(this).attr('min'));
                var maxValue = parseInt($(this).attr('max'));
                var valueCurrent = parseInt($(this).val());
                var name = $(this).attr('name');

                if (valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled');
                } else {
                    alert('Sorry, the minimum value was reached');
                    $(this).val($(this).data('oldValue'));
                }

                if (valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled');
                } else {
                    alert('Sorry, the maximum value was reached');
                    $(this).val($(this).data('oldValue'));
                }
            });

            $('.input-number').keydown(function(e) {
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    return;
                }

                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
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
            });
        }

        function setJenisTransaksi(itemId, jenis) {
            document.getElementById('jenis_transaksi_' + itemId).value = jenis;
        }
    </script>
@endpush
