@extends('layouts.template')

@section('title', 'Request Peminjaman')
    
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
                <form action="{{url('/request-pinjam')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="zoom_id" class="col-sm-2 col-form-label">Nama Akun</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="zoom_id" id="zoom_id">
                                <option value="">--Pilih Akun--</option>
                                @foreach ($akunzoom as $item)
                                    <option value="{{ $item->id_zoom}}">{{$item->nama_akun}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_kegiatan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="deskripsi" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tanggal" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jam" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jam" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="durasi" class="col-sm-2 col-form-label">Durasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="durasi" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

</div>



@endsection