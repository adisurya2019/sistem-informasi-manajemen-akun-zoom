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
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Akun Zoom</h4>
                </div>
                <div class="card-body">
                    10
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Peminjaman diapproved</h4>
                </div>
                <div class="card-body">
                    42
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Peminjaman belum diapproved</h4>
                </div>
                <div class="card-body">
                    1
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah user</h4>
                </div>
                <div class="card-body">
                    1
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Akun Zoom masih yang tersedia</h4>
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
                        <tr>
                            <td class="text-center">
                                <div class="sort-handler">
                                    <i class="fas fa-video"></i>
                                </div>
                            </td>
                            <td>Create a mobile app</td>
                            <td>100</td>
                            <td>
                                <div class="badge badge-success">Completed</div>
                            </td>
                        </tr>
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