@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('laporan_transaksi.index') }}">
                        <h1 class="m-0 text-dark"><i class="fas fa-chevron-left"></i> Kembali</h1>
                    </a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Detail Transaksi
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hovered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trx as $t)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->produk->nama }}</td>
                                <td>{{ $t->qty }}</td>
                                <td>Rp. {{ number_format($t->harga,2,".",",") }}</td>
                                <td>Rp. {{ number_format($t->subtotal,2,".",",") }}</td>
                                <td>{{ $t->created_at }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right">Grand Total : </td>
                                <td colspan="2"><b>Rp. {{ number_format($grand,2,".",",") }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection