@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><a href="{{ route('pos.index') }}"><i class="fas fa-chevron-left"></i> Kembali</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if($msg = Session::get('gagal'))
            <div class="alert alert-danger">
                <p>{{ $msg }}</p>
            </div>
            @endif
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title">Checkout</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hovered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>No. Ref</th>
                                <th>Barcode</th>
                                <th>Qty</th>
                                <th>Harga (Rp.)</th>
                                <th>Subtotal (Rp.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trx_sementara as $t)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->produk->nama}}</td>
                                <td>{{ $t->no_ref }}</td>
                                <td>
                                    @php
                                    echo DNS1D::getBarcodeSVG($t->produk->barcode, "C128");
                                    @endphp
                                </td>
                                <td>{{ $t->qty }}</td>
                                <td>{{ number_format($t->harga, 2, ",", ".") }}</td>
                                <td>{{ number_format($t->subtotal, 2, ",", ".") }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <div class="form-group">
                        <label for="">Subtotal</label>
                        <p class="subtotal">Rp. {{number_format($subtotal, 2, ",", ".")}}</p>
                    </div>
                    <div class="form-group">
                        <label for="">PPN 10%</label>
                        <p>Rp. {{ number_format($subtotal / 10, 2, ",", ".") }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <p class="total">Rp. {{ number_format($subtotal + ($subtotal / 10), 2, ",", ".") }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Uang Cash</label>
                        @if($cash = Session::get('cash'))
                        <p>Rp. {{ number_format($cash, 2, ",", ".") }}</p>
                        @else
                        <p>Rp. 0</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Kembali</label>
                        @if($cash = Session::get('cash'))
                        <p>Rp. {{ number_format($cash - ($subtotal + ($subtotal / 10)) , 2, ",", ".")}}</p>
                        @else
                        <p>Rp. 0</p>
                        @endif
                    </div>
                    <div class="form-group d-flex">
                        <button type="button" class="btn-payment btn btn-sm btn-success ml-1" data-toggle="modal" data-target="#modalPayment">
                            Pembayaran
                        </button>
                        <form action="{{ route('do_transaction.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="total" value="{{ $subtotal + ($subtotal / 10) }}">
                            @if($cash = Session::get('cash'))
                                <input type="hidden" name="dibayar" value="{{ $cash }}">
                            @else
                                <input type="hidden" name="dibayar" value="0">
                            @endif
                            <button type="submit" class="btn btn-sm btn-primary">Transaksi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('checkout.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="total_harga" value="{{ $subtotal + ($subtotal / 10) }}">
                                <div class="form-group">
                                    <label for="">Total Harga</label>
                                    <input type="text" class="form-control total_hargaa" name="total_hargaa">
                                </div>
                                <div class="form-group">
                                    <label for="">Nominal Uang : </label>
                                    <input type="number" class="form-control" name="nominal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Pembayaran via Cash/Manual</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-payment').click(function() {
                $('.total_hargaa').val($('.total').html());

            });
        });
    </script>
</div>
@endsection