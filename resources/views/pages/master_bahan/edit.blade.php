@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><a href="{{ route('master_bahan.index') }}"><i class="fas fa-chevron-left"></i> Kembali</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Bahan</li>
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
                    <h3 class="card-title">Edit Bahan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('master_bahan.update', $bahan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama Bahan</label>
                            <input type="text" class="form-control" name="nama_bahan" value="{{ $bahan->nama_bahan }}">
                        </div>
                        <div class="form-group">
                            <label for="">Satuan</label>
                            <select name="id_unit" id="" class="form-control">
                                <option value="{{ $bahan->id_unit }}">{{ $bahan->unit->unit }}</option>
                                @foreach($unit as $s)
                                    <option value="{{ $s->id }}">{{ $s->unit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection