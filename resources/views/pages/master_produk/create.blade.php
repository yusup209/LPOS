@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><a href="{{ route('master_produk.index') }}"><i class="fas fa-chevron-left"></i> Kembali</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Produk></li>
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
                    <h3 class="card-title">Tambah Produk</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('master_produk.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                {{--
                            <div class="form-group">
                                <label for="">Barcode Produk</label>
                                <input type="text" class="form-control" name="barcode">
                            </div>
                            --}}
                                <div class="form-group">
                                    <label for="">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="number" class="form-control" name="stok" min="{{ $stok_min }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>

                                    <select name="kategori" id="" class="form-control select2">
                                        @foreach($kategoris as $k)
                                        <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kurs</label>
                                    <select name="kurs" id="" class="form-control select2">
                                        @foreach($kurs as $k)
                                        <option value="{{ $k->id }}">{{ $k->kurs }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Unit</label>
                                    <select name="unit" id="" class="form-control select2">
                                        @foreach($units as $k)
                                        <option value="{{ $k->id }}">{{ $k->unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Expired</label>
                                    <input type="date" class="form-control" name="expired">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Harga Beli</label>
                                    <input type="number" class="form-control harga_beli" name="harga_beli" value="0">
                                </div>
                                <div class="form-group">
                                    <label for="">Persen Keuntungan</label>
                                    <select name="untung" id="" class="form-control">
                                        @foreach($untung as $u)
                                        <option value="{{ $u->persen_jual }}">{{ $u->persen_jual }} %</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Diskon</label>
                                    <input type="number" class="form-control" name="diskon">
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="10" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto Produk</label><br>

                                    <img src="" alt="" width="256" height="256" id="foto">
                                    <input type="file" name="foto" id="" class="form-control" accept="image/*" onchange="loadImage(event)">
                                </div>
                                <div class="form-group">
                                    <label for="">Ganti Harga</label>
                                    <input type="checkbox" name="ganti_harga" id="" placeholder="Ganti Harga">
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('master_produk.index') }}" class="btn btn-danger">Batal</a>
                                </div>
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