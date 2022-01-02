@extends('layouts.template')

@section('title', 'Pengembalian')
    
@section('breadcrumbs')
<div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>@yield('title')</h1>
    </div>
</section>
@endsection

@section('konten')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="section-body">
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
            <div class="float-left">
                <a href="{{url('request-pinjam')}}" class="btn btn-secondary btn-sm fa fa-backspace"> Kembali</a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('pengembalian/'.$editData->id_peminjaman)}}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <label for="zoom_id" class="col-sm-2 col-form-label">Nama Akun yang Dipinjam</label>
                        <div class="col-sm-10">
                            <select class="form-control list-group-item disabled text-dark" name="zoom_id" id="zoom_id">
                                <option value="{{$editData->zoom_id}}">{{$editData->akunzoom->nama_akun}}</option>
                                @foreach ($akunzoom as $item)
                                    <option value="{{ $item->id_zoom}}">{{$item->nama_akun}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="zoom_id" class="col-sm-2 col-form-label">Nama Akun yang Dipinjam</label>
                        <div class="col-sm-10">
                            <select class="form-control list-group-item disabled text-dark" name="zoom_id" id="zoom_id">
                                <option value="{{$editData->zoom_id}}">{{$editData->akunzoom->nama_akun}}</option>
                                @foreach ($akunzoom as $item)
                                    <option value="{{ $item->id_zoom}}">{{$item->nama_akun}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control list-group-item disabled text-dark" name="nama_kegiatan" required value="{{$editData->nama_kegiatan}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control list-group-item disabled text-dark" name="deskripsi" required value="{{$editData->deskripsi}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control list-group-item disabled text-dark" name="tanggal" required value="{{$editData->tanggal}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jam" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control list-group-item disabled text-dark" name="jam" required value="{{$editData->jam}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="durasi" class="col-sm-2 col-form-label">Durasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control list-group-item disabled text-dark" name="durasi" required value="{{$editData->durasi}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status_aksi" class="col-sm-2 col-form-label">Update Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status_aksi" id="status_aksi">
                                <option value="{{$editData->status_aksi}}">
                                    @if ($editData->status_aksi == "1")
                                        Approved
                                    @endif
                                    @if ($editData->status_aksi == "0")
                                        Rejected
                                    @endif
                                @foreach ($status_aksi as $item)
                                    <option value="{{ $item->status_fieldA_boolean}}">{{$item->status_fieldA}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    
                    <button type="submit" class="btn btn-primary">Kembalikan Akun</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

</div>



@endsection