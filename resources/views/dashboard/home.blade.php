@extends('layouts.template')

@section('title', 'Dashboard')
    
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
{{-- <h1>Ini Halaman Dashboard</h1> --}}
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-video"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Akun Zoom</h4>
                </div>
                <div class="card-body">
                    {{$CountZoom}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Request</h4>
                </div>
                <div class="card-body">
                    {{$CountRequest}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah user</h4>
                </div>
                <div class="card-body">
                    {{$CountUser}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>LIST AKUN ZOOM</h4>
                <div class="card-header-action">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped" id="sortable-table">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <i class="fas fa-th"></i>
                            </th>
                            <th >Nama Akun</th>
                            <th>Kapasitas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td class="text-center">
                                <div class="sort-handler">
                                    <i class="fas fa-video"></i>
                                </div>
                            </td>
                            <td >{{$item->nama_akun}}</td>
                            <td >{{$item->kapasitas}}</td>
                            <td >
                                <div class="
                                    @if ($item->status_peminjaman == "1")
                                        badge badge-success btn-sm
                                    @else
                                        badge badge-danger btn-sm
                                    @endif
                                ">
                                {{($item->status_peminjaman == 1) ? 'Selesai' : 'Dipinjam'}}
                                </div>
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