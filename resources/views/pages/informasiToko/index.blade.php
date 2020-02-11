@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Informasi Toko</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Informasi Toko</li>
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
                <div class="card-header bg-primary">
                    <h3 class="card-title">Informasi Toko</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('informasiToko.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="">Nama Koperasi</label>
                                    <input type="text" name="nama_koperasi" id="" class="form-control" placeholder="Nama Koperasi" value="{{ $profil->nama_koperasi }}">
                                </div>
                                <div class="form-group">
                                    <label for="">No. Telp.</label>
                                    <input type="text" name="no_telp" id="" class="form-control" placeholder="Nomor Telepon" value="{{ $profil->no_telp }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Kode Pos</label>
                                    <input type="text" name="kode_pos" id="" class="form-control" placeholder="Kode Pos Koperasi" value="{{ $profil->kode_pos }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" id="" cols="3" rows="3" class="form-control" placeholder="Deskripsi Koperasi">{{ $profil->keterangan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="" cols="3" rows="3" class="form-control" placeholder="Alamat Koperasi">{{ $profil->alamat_koperasi }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="box-foto">
                                    <img src="{{ asset('assets/img/'.$profil->foto) }}" alt="gambar" width="256" height="256" id="foto"><br>
                                    <input type="file" name="foto" id="" class="btn btn-primary" accept="image/*" onchange="loadImage(event)">
                                </div>

                                @if($jml_profil > 0)
                                    <button type="button" class="btn btn-primary disabled">Simpan</button>  
                                @else
                                    <button type="submit" class="btn btn-primary">Simpan</button>  
                                @endif
                                {{--<a href="{{ url('') }}" class="btn btn-secondary">Ubah</a>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var loadImage = function(event) {
        let foto = document.getElementById('foto');
        foto.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection