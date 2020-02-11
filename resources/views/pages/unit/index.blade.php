@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Unit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Master Unit</li>
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
            <div class="card col-5">
                <div class="card-header">
                    <h3 class="card-title">Tambah Unit</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('unit.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Unit</label>
                            <input type="text" class="form-control" name="unit">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Master Unit</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hovered table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Unit</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unit as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->unit }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('unit.edit', $k->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('unit.destroy', $k->id) }}" method="post" class="ml-1">
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