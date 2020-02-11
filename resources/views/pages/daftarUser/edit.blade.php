@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('daftarUser.index') }}">
                        <h1 class="m-0 text-dark"> <i class="fas fa-chevron-left"></i> Edit User</h1>
                    </a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                    <h3 class="card-title">Edit User</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('daftarUser.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" id="" class="form-control" value="{{ $user->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="">No. Telp</label>
                                    <input type="text" name="no_telp" id="" class="form-control" value="{{ $user->kontak }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="" class="form-control" value="{{ $user->username }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="" class="form-control" placeholder="Kosongkan jika tidak ingin update password">
                                </div>
                                <div class="form-group">
                                    <label for="">Hak Akses</label>
                                    <select name="hak_akses" id="" class="form-control">
                                        @php $hakakses = '' @endphp
                                        @if($user->hak_akses == 'admin_gudang')
                                        $hakakses = 'Admin Gudang';
                                        @elseif($user->hak_akses == 'kasir')
                                        $hakakses = 'Kasir';
                                        @endif
                                        <option value="{{ $user->hak_akses }}">{{ $user->hak_akses }}</option>
                                        <option value="kasir">Kasir</option>
                                        <option value="admin_gudang">Admin Gudang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="box-foto">
                                    <img src="{{ asset('assets/img/'.$user->foto) }} " alt="" id="foto" width="256" height="256">
                                    <input type="file" name="foto" id="" class="form-control" accept="image/*" onchange="loadImage(event)">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
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