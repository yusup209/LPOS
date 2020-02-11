@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('master_produk.index') }}">
                        <h1 class="m-0 text-dark"><i class="fas fa-chevron-left"></i> Tambah Stok</h1>
                    </a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Stok</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card col-5">
                <div class="card-header">
                    <h3 class="card-title">Tambah Stok</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('stok.update', $produk->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column">
                            <label for="">Nama Produk : {{ $produk->nama }}</label>
                            <label for="">Stok lama : {{ $produk->stok }}</label>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Stok</label>
                            <input type="number" name="stok" id="" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection