@extends('layouts.template')

@section('title', 'List Peminjaman')
    
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
                <a href="{{url('request-pinjam/history')}}" class="btn btn-success btn-sm fa fa-check"> Akun yang telah dikembalikan</a>
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
                        {{-- <th class="text-center">Deskripsi</th> --}}
                        {{-- <th class="text-center">Tanggal</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Durasi</th> --}}
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$item->akunzoom->nama_akun}}</td>
                            <td class="text-center">{{$item->nama_kegiatan}}</td>
                            {{-- <td class="text-center">{{$item->deskripsi}}</td> --}}
                            {{-- <td class="text-center">{{$item->tanggal}}</td>
                            <td class="text-center">{{$item->jam}}</td>
                            <td class="text-center">{{$item->durasi}}</td> --}}
                            
                            <td class=" text-center">
                                <div class=" text-center 
                                    @if ($item->status_aksi == "1")
                                        btn btn-success btn-sm
                                    @endif
                                    @if ($item->status_aksi == "0")
                                        btn btn-danger btn-sm
                                    @endif">
                                        @if ($item->status_aksi == "1")
                                            Approved
                                        @endif
                                        @if ($item->status_aksi == "0")
                                            Rejected
                                        @endif
                                        @if ($item->status_aksi == "2")
                                            
                                        @endif
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="text-center
                                @if ($item->status_aksi == "1")
                                    btn btn-success btn-sm
                                @endif
                                @if ($item->status_aksi == "2")
                                        btn btn-success btn-sm
                                    @endif
                                @if ($item->status_aksi == "0")
                                    btn btn-danger btn-sm
                                @endif">
                                    @if ($item->status_aksi == "1")
                                        sedang digunakan
                                    @endif
                                    @if ($item->status_aksi == "2")
                                        akun dikembalikan
                                    @endif
                                    @if ($item->status_aksi == null)
                                        belum ada status
                                    @endif
                                        
                                    
                                </div>
                            </td>
                            {{-- <td class="text-center">{{$item->status_aksi}}</td> --}}
                            <td class="text-center">
                                @if (auth()->User()->level=="Admin")
                                    <a href="{{url('request-pinjam/edit/'.$item->id_peminjaman)}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-alt "></i>
                                    </a>
                                    <a href="{{url('pengembalian/edit/'.$item->id_peminjaman)}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-check-double "></i>
                                    </a>
                                    <form action="{{'request-pinjam/'.$item->id_peminjaman}}" class="d-inline" method="POST" onsubmit="return confirm('Data akan dihapus, apakah anda yakin? ')">
                                        @method('delete')
                                        @csrf
                                        <button href="" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endif
                                    @if (auth()->User()->level=="User")
                                        @if ($item->status_aksi == "1")
                                            <a href="{{url('pengembalian/edit/'.$item->id_peminjaman)}}" class="btn btn-success btn-sm">
                                                <i class="fa fa-exchange-alt "></i>
                                            </a>
                                        @endif
                                        @if ($item->status_aksi == "2")
                                        <form action="{{'request-pinjam/finish/'.$item->id_peminjaman}}" class="d-inline" method="POST" onsubmit="return confirm('Akun zoom akan dikembalikan, apakah anda yakin?')">
                                            @method('delete')
                                                @csrf
                                                <button href="" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                        {{-- @if ($item->status_aksi == "0")
                                            <form action="{{'request-pinjam/'.$item->id_peminjaman}}" class="d-inline" method="POST" onsubmit="return confirm('Data akan dihapus, apakah anda yakin? ')">
                                                @method('delete')
                                                @csrf
                                                <button href="" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @endif --}}
                                        @if ($item->status_aksi == null)
                                            <form action="{{'request-pinjam/'.$item->id_peminjaman}}" class="d-inline" method="POST" onsubmit="return confirm('Data akan dihapus, apakah anda yakin? ')">
                                                @method('delete')
                                                @csrf
                                                <button href="" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @endif
                                        
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