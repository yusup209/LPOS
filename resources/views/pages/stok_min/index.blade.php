@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Stok Minimum dan PPN</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Master Stok Minimum dan PPN</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Stok Minimum</h3>
                        </div>
                        <div class="card-body">
                            @if(empty($stok))
                            <form action="{{ route('master_minimum.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Stok Minimum</label>
                                    <input type="text" class="form-control" name="stok_minimum">
                                </div>
                                <button type="post" class="btn btn-primary">Simpan</button>
                            </form>
                            @else
                            <form action="{{ route('master_minimum.update', 1) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Stok Minimum</label>
                                    <input type="text" class="form-control" name="stok_minimum" value="{{ $stok->stok_minimum }}">
                                </div>
                                <button type="post" class="btn btn-primary">Ubah</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">PPN</h3>
                        </div>
                        <div class="card-body">
                            @if(empty($ppn))
                            <form action="{{ route('master_ppn.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">PPN</label>
                                    <input type="text" class="form-control" name="ppn">
                                </div>
                                <button type="post" class="btn btn-primary">Simpan</button>
                            </form>
                            @else
                            <form action="{{ route('master_ppn.update', 1) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">PPN</label>
                                    <input type="text" class="form-control" name="ppn" value="{{ $ppn->ppn }}">
                                </div>
                                <button type="post" class="btn btn-primary">Ubah</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection