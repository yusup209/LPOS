@extends('layouts.master')

<!-- Modal Tambah-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('daftarUser.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No. Telp</label>
                        <input type="text" name="no_telp" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Hak Akses</label>
                        <select name="hak_akses" id="" class="form-control">
                            <option value="kasir">Kasir</option>
                            <option value="admin_gudang">Admin Gudang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Foto Profil</label><br>
                        <img src="" alt="" width="128" height="128" id="foto">
                        <input type="file" name="foto" id="" class="form-control" accept="image/*" onchange="loadImage(event)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar User</li>
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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">Tambah User</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hovered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Kontak</th>
                                <th>Foto</th>
                                <th>Hak Akses</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftar_user as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->kontak }}</td>
                                <td>
                                    <img src="{{ asset('assets/img/'.$d->foto) }}" alt="{{ $d->foto }}" width="64" height="64" class="img-circle">
                                </td>
                                <td>{{ $d->hak_akses }}</td>
                                <td class="d-flex">
                                    <div class="div">
                                        <a href="{{ route('daftarUser.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <form action="{{route('daftarUser.destroy', $d->id)}}" method="post" class="ml-2">
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

    <script>
        var loadImage = function(event) {
            let foto = document.getElementById('foto');
            foto.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</div>
@endsection