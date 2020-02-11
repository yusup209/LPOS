@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Master Produk</li>
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
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('master_produk.create') }}" class="btn btn-primary btn-sm">tambah produk</a>
                </div>
                <div class="card-body">
                    <table class="table table-hovered table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Nama Produk</th>
                                <th>Gambar</th>
                                <th>Klasifikasi</th>
                                <th>Stok</th>
                                <th>Kurs</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Unit</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk as $x)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $x->barcode }}</td>
                                <td>{{ $x->nama }}</td>
                                <td>
                                    <img src="{{ asset('assets/img/'.$x->foto) }}" alt="foto" width="64" height="64">
                                </td>
                                <td>{{ $x->kategori->kategori }}</td>
                                <td>{{ $x->stok }}</td>
                                <td>{{ $x->kurs->kurs }}</td>
                                <td>{{ $x->harga_beli }}</td>
                                <td>{{ $x->harga_jual }}</td>
                                <td>{{ $x->unit->unit }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('stok.show', $x->id) }}" class="btn btn-sm btn-secondary" class="mr-1">+Stok</a>
                                    <a href="{{ route('master_produk.edit', $x->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('master_produk.destroy', $x->id) }}" method="post" class="ml-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
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