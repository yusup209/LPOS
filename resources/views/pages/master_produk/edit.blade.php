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
                        <li class="breadcrumb-item active">Edit Produk></li>
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
                    <h3 class="card-title">Edit Produk</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('master_produk.update', $id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @METHOD("PUT")

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
                                    <input type="text" class="form-control" name="nama" value="{{ $produk->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="number" class="form-control" name="stok" min="{{ $stok_min }}" value="{{ $produk->stok }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>

                                    <select name="kategori" id="" class="form-control select2">
                                        <option value="{{ $produk->id_kategori }}">{{ $produk->kategori->kategori }}</option>
                                        @foreach($kategoris as $k)
                                        <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kurs</label>
                                    <select name="kurs" id="" class="form-control select2">
                                        <option value="{{ $produk->id_kurs }}">{{ $produk->kurs->kurs }}</option>
                                        @foreach($kurs as $k)
                                        <option value="{{ $k->id }}">{{ $k->kurs }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Unit</label>
                                    <select name="unit" id="" class="form-control select2">
                                        <option value="{{ $produk->id_unit }}">{{ $produk->unit->unit }}</option>
                                        @foreach($units as $k)
                                        <option value="{{ $k->id }}">{{ $k->unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Expired</label>
                                    <input type="date" class="form-control" name="expired" value="{{ $produk->created_at }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Harga Beli</label>
                                    <input type="number" class="form-control harga_beli" name="harga_beli" value="{{ $produk->harga_beli }}">
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
                                    <input type="number" class="form-control" name="diskon" value="{{ $produk->diskon }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="10" rows="5" class="form-control">{{ $produk->keterangan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto Produk</label><br>

                                    <img src="{{ asset('assets/img/'.$produk->foto) }}" alt="" width="256" height="256" id="foto">
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