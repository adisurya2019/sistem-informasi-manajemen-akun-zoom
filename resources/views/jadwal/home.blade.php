@extends('layouts.template')

@section('title', 'Jadwal Peminjaman')
    
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
        
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        {{-- <th class="text-center">No</th> --}}
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Akun yang Dipinjam</th>
                        <th class="text-center">Nama Kegiatan</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        @if ($item->status_aksi == "1")
                            <tr>
                                {{-- <td class="text-center">{{$loop->iteration}}</td> --}}
                                <td class="text-center">{{$item->tanggal}}</td>
                                <td class="text-center">{{$item->akunzoom->nama_akun}}</td>
                                <td class="text-center">{{$item->nama_kegiatan}}</td>
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
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="{{url('jadwal/detail/'.$item->id_peminjaman)}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-info-circle "></i>
                                    </a>
                                </td>
                            </tr>
                        @else
                            
                        @endif
                        
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