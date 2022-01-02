@extends('layouts.template')

@section('title', 'Tambah Akun Zoom')
    
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
                <a href="{{url('akun-zoom')}}" class="btn btn-secondary btn-sm fa fa-backspace"> Kembali</a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('/akun-zoom')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="nama_akun" class="col-sm-2 col-form-label">Nama Akun</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_akun" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kapasitas" class="col-sm-2 col-form-label">kapasitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kapasitas" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status_field" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status_field" id="status_field">
                                <option value="">--Pilih Status--</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->status_field_boolean}}">{{$item->status_field}}</option>
                                @endforeach
                            </select>
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