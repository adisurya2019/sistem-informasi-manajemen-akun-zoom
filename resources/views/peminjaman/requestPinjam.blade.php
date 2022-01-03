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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- Include Moment.js CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <!-- Include Bootstrap DateTimePicker CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

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
                        <label for="zoom_id" class="col-sm-2 col-form-label">Nama Akun yang Dipinjam</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="zoom_id" id="zoom_id">
                                <option value="">--Pilih Akun--</option>
                                @foreach ($akunzoom as $item)
                                    <option value="
                                    @if ( $item->status_peminjaman == 1)
                                        {{ $item->id_zoom}}
                                    @endif
                                    @if ( $item->status_peminjaman == 0)
                                        
                                    @endif
                                    ">
                                        @if ( $item->status_peminjaman == 1)
                                            {{ $item->nama_akun}}
                                        @else

                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="zoom_id" class="col-sm-2 col-form-label">Nama Akun</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="zoom_id" id="zoom_id">
                                <option value="">--Pilih Akun--</option>
                                @foreach ($akunzoom as $item)
                                    <option value="{{ $item->id_zoom}}">{{$item->nama_akun}}</option>
                                @endforeach
                            </select>
                        <div class="form-group row ">
                                <input type="text" class="form-control" name="zoom_id" id="zoom_id">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" data-toggle="modal" data-target=".modal-item">
                                    <i class="fa fa-search"></i>
                                </button>

                                <div class="modal fade modal-item" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Pilih akun yang tersedia</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body table-responsive">
                                                <table class="table table-bordered table striped" id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Nama Akun</th>
                                                            <th class="text-center">Kapasitas</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            @foreach ($akunzoom as $item)
                                                            <tr>
                                                                <td class="text-center">{{$item->nama_akun}}</td>
                                                                <td class="text-center">{{$item->kapasitas}}</td>
                                                                <td class="text-center">{{($item->status_peminjaman == 1) ? 'Selesai' : 'Dipinjam'}}</td>
                                                                <td class="text-center">
                                                                    <button class="btn btn-success btn-sm" id="select"
                                                                    data-id="{{$item->id_zoom}}"
                                                                    >
                                                                        <i class="">pilih</i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                
                        </div>
                    </div> --}}
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
                            <input type="text" class="form-control" name="tanggal" id="tanggal" required>
                            <script type="text/javascript">
                                $('#tanggal').datetimepicker({
                                    format: 'YYYY-MM-DD'
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jam" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jam" id="jam" required>
                            <script type="text/javascript">
                                $('#jam').datetimepicker({
                                    format: 'HH:mm'
                                });
                            </script>
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

{{-- <script>
    $(document).ready(function() {
        $(document).on('click', '#select', function(){
            var id_zoom = $(this).data('id_zoom');
            $('#zoom_id').val(id_zoom);
        })
    })
</script> --}}

@endsection


