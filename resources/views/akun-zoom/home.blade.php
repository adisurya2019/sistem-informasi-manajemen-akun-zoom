@extends('layouts.template')

@section('title', 'Akun Zoom')
    
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
                <a href="{{url('akun-zoom/tambah')}}" class="btn btn-success btn-sm fa fa-plus-circle"> Tambah Data</a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Akun</th>
                        <th class="text-center">Kapasitas</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$item->nama_akun}}</td>
                            <td class="text-center">{{$item->kapasitas}}</td>
                            <td class="text-center">{{($item->status_peminjaman == 1) ? 'Selesai' : 'Dipinjam'}}</td>
                            <td class="text-center">
                                        <a href="{{url('akun-zoom/edit/'.$item->id_zoom)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-alt "></i>
                                        </a>
                                        <form action="{{'akun-zoom/'.$item->id_zoom}}" class="d-inline" method="POST" onsubmit="return confirm('Data akan dihapus, apakah anda yakin?')">
                                            @method('delete')
                                            @csrf
                                            <button href="" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

</div>


@endsection