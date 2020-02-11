@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Master Kurs
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Master Kurs>
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
                    <h3 class="card-title">Tambah Kurs</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('kurs.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kurs</label>
                            <input type="text" class="form-control" name="kurs">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Master Kurs</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hovered table-bordered" id="tbl">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kurs</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kurs as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->kurs }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('kurs.edit', $k->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('kurs.destroy', $k->id) }}" method="post" class="ml-1">
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