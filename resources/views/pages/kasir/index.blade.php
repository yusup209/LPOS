@extends('layouts.master')

@section('content')
<div class="modal fade" id="modalBayar" tabindex="-1" role="dialog" aria-labelledby="modalBayarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBayarLabel">Masukkan Nominal Uang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nominal Uang</label>
                        <input type="text" name="uang" id="" class="form-control" placeholder="Masukkan nominal uang...">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Bayar!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Point Of Sales</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Point Of Sales</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if($msg = Session::get('sukses'))
            <div class="alert alert-success">
                <p>{{ $msg}}</p>
            </div>
            @endif
            @if($msg = Session::get('gagal'))
            <div class="alert alert-danger">
                <p>{{ $msg}}</p>
            </div>
            @endif
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profil Kasir</h3>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            <img src="{{ asset('assets/adminlte3/dist/img/user2-160x160.jpg') }}" alt="" class="rounded img-bordered" style="width:128px;height:128px">
                            <div class="d-flex flex-column">
                                <p>Nama Kasir : <b>{{ Auth::user()->nama }}</b> </p>
                                <p class="ref">No. Ref : {{ $no_ref }}</p>
                                <p class="tgl">Tanggal : {{ date('Y-m-d') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pilih Barang</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pos.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="no_ref" value="{{ $no_ref }}">
                                <div class="form-group">
                                    <label for="">Pilih Produk</label>
                                    <select name="produk" id="" class="form-control select2">
                                        @foreach($produk as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }} - Rp.{{ $p->harga_beli }} - Stok: {{ $p->stok }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kuantitas</label>
                                    <input type="number" name="qty" id="" class="form-control" value="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Total Belanja</h3>
                        </div>
                        <div class="card-body bg-warning d-flex align-items-center justify-content-center">
                            <h1 class="text-white text-bold totalnya">Rp. {{ number_format($total_belanja, 2, ",", ".") }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title">Keranjang Barang</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Barcode</th>
                                        <th>Qty</th>
                                        <th>Harga (Rp.)</th>
                                        <th>Subtotal (Rp.)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trx_sementara as $t)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $t->produk->nama }}</td>
                                        <td>
                                            @php
                                            echo DNS1D::getBarcodeSVG($t->produk->barcode, "C128");
                                            @endphp
                                        </td>
                                        <td>{{ $t->qty }}</td>
                                        <td>{{ number_format($t->harga, 2, ",", ".") }}</td>
                                        <td>{{ number_format($t->subtotal, 2, ",", ".") }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('pos.edit', $t->id) }}" class="btn btn-sm btn-secondary">chg qty</a>
                                            <form action="{{ route('pos.destroy', $t->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-sm btn-danger ml-1">void</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            {{--<button type="button" class="btn-hold btn btn-sm btn-secondary ml-1" data-toggle="modal" data-target="#modalHold">
                            Hold
                        </button>
                        <button type="button" class="btn-payment btn btn-sm btn-success ml-1" data-toggle="modal" data-target="#modalPayment">
                            Payment
                        </button>--}}
                            @if($jml_trx > 0)
                            <a href="{{ route('checkout.index') }}" class="btn btn-sm btn-primary">Checkout</a>
                            @else
                            <a href="{{ route('checkout.index') }}" class="btn btn-sm btn-primary disabled" aria-disabled="true">Checkout</a>
                            @endif
                        </div>
                        <div class="card-footer">
                            {{--<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalBayar">Bayar</button>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection