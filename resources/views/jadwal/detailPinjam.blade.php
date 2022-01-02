@extends('layouts.template')

@section('title', 'Detail Peminjaman')
    
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
                <a href="{{url('jadwal')}}" class="btn btn-secondary btn-sm fa fa-backspace"> Kembali</a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('request-pinjam/'.$editData->id_peminjaman)}}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Akun yang Dipinjam</label>
                        <div class="col-sm-10">
                                <label for="">: {{$editData->akunzoom->nama_akun}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-10">
                            <label for="">: {{$editData->nama_kegiatan}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <label for="">: {{$editData->deskripsi}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <label for="">: {{$editData->tanggal}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jam" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col-sm-10">
                            <label for="">: {{$editData->jam}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="durasi" class="col-sm-2 col-form-label">Durasi</label>
                        <div class="col-sm-10">
                            <label for="">: {{$editData->durasi}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status_aksi" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10 ">
                            <label for="" class="
                                @if ($editData->status_aksi == "1")
                                    btn btn-success btn-sm
                                @endif
                                @if ($editData->status_aksi == "0")
                                    btn btn-danger btn-sm
                                @endif">
                                    @if ($editData->status_aksi == "1")
                                        Approved
                                    @endif
                                    @if ($editData->status_aksi == "0")
                                        Rejected
                                    @endif
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

</div>



@endsection