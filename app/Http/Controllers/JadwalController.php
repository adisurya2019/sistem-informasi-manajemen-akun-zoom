<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkunZoomModel;
use App\Models\StatusAksiModel;
use App\Models\RequestPinjamModel;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RequestPinjamModel::all();
        // return $data;
        return view('jadwal.home', [
            'data'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_peminjaman)
    {
        $status_aksi = StatusAksiModel::all();
        $data_akunzoom = AkunZoomModel::all();
        $status = StatusAksiModel::all();
        $editData = RequestPinjamModel::where('id_peminjaman', $id_peminjaman)->first();

        return view('jadwal.detailPinjam', [
            "editData" => $editData,
            "status" => $status,
            "akunzoom" => $data_akunzoom,
            "status_aksi" => $status_aksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
