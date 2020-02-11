@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Bahan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Master Bahan</li>
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
                    <h3 class="card-title">Tambah Bahan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('master_bahan.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Bahan</label>
                            <input type="text" class="form-control" name="nama_bahan">
                        </div>
                        <div class="form-group">
                            <label for="">Satuan</label>
                            <select name="id_unit" id="" class="form-control">
                                @foreach($unit as $s)
                                    <option value="{{ $s->id }}">{{ $s->unit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Master Bahan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hovered table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Bahan</th>
                                <th>Unit</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bahan as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->nama_bahan }}</td>
                                <td>{{ $k->unit->unit }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('master_bahan.edit', $k->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('master_bahan.destroy', $k->id) }}" method="post" class="ml-1">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" />
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