@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Riwayat Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Riwayat Transaksi</li>
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
                        Riwayat Transaksi
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hovered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Ref</th>
                                <th>Kasir</th>
                                <th>Tipe Pembayaran</th>
                                <th>Jumlah</th>
                                <th>Dibayar</th>
                                <th>Kembalian</th>
                                <th>tanggal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trx as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->no_ref }}</td>
                                    <td>{{ $t->kasir->nama }}</td>
                                    <td><span class="badge badge-info">{{ $t->tipe_pembayaran }}</span></td>
                                    <td>Rp. {{ number_format($t->jumlah,2,".",",") }}</td>
                                    <td>Rp. {{ number_format($t->dibayar,2,".",",") }}</td>
                                    <td>Rp. {{ number_format($t->dibayar - $t->jumlah,2,".",",") }}</td>
                                    <td>{{ $t->created_at }}</td>
                                    <td>
                                        <a href="{{ route('laporan_transaksi.show', $t->no_ref) }}" class="btn btn-success btn-sm">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection