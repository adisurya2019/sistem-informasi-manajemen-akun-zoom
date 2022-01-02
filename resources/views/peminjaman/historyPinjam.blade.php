@extends('layouts.template')

@section('title', 'History Peminjaman')
    
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
        @if (auth()->User()->level=="Admin")
        <div class="card-header">
            <div class="float-left">
                <a href="{{url('request-pinjam')}}" class="btn btn-secondary btn-sm fa fa-backspace"> Kembali</a>
            </div>
        </div>
        @endif
        @if (auth()->User()->level=="User")
            <div class="card-header">
                <div class="float-left">
                    <a href="{{url('request-pinjam/tambah')}}" class="btn btn-success btn-sm fa fa-plus-circle"> Request Peminjaman</a>
                </div>
            </div>
        @endif
        
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Akun</th>
                        <th class="text-center">Nama Kegiatan</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Durasi</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$item->akunzoom->nama_akun}}</td>
                            <td class="text-center">{{$item->nama_kegiatan}}</td>
                            <td class="text-center">{{$item->tanggal}}</td>
                            <td class="text-center">{{$item->jam}}</td>
                            <td class="text-center">{{$item->durasi}}</td>
                            <td class="text-center">
                                @if (auth()->User()->level=="Admin")
                                    {{-- @if ($item->status_aksi == '1')
                                        <a href="{{url('request-pinjam/history/'.$item->id_peminjaman)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-history "></i>
                                        </a>
                                    @endif
                                    @if ($item->status_aksi == '0')
                                        <a href="{{url('pengembalian/edit/'.$item->id_peminjaman)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check-double "></i>
                                        </a>
                                    @endif --}}
                                    <a href="{{url('request-pinjam/history/'.$item->id_peminjaman)}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-history "></i>
                                    </a>
                                @endif
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