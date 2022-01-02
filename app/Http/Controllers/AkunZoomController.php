<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkunZoomModel;
use App\Models\StatusModel;
use Illuminate\Routing\Controller;

class AkunZoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AkunZoomModel::all();
        return view('akun-zoom.home', [
            "data" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = StatusModel::all();
        $data = new AkunZoomModel();
        return view('akun-zoom.addAkunZoom', [
            'data' => $data,
            'status' => $status
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new AkunZoomModel();
        $data ->nama_akun = $request->nama_akun;
        $data ->kapasitas = $request->kapasitas;
        $data ->status_peminjaman = $request->status_field;

        $data->save();

        return redirect('/akun-zoom')->with('status', 'Data Berhasil Ditambah!');
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
    public function edit($id_zoom)
    {
        $status = StatusModel::all();
        $editData = AkunZoomModel::where('id_zoom', $id_zoom)->first();

        return view('akun-zoom.editAkunZoom', [
            "editData" => $editData,
            "status" => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_zoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_zoom)
    {
        $data = AkunZoomModel::find($id_zoom);
        $data ->nama_akun = $request->nama_akun;
        $data ->kapasitas = $request->kapasitas;
        $data ->status_peminjaman = $request->status_field;

        $data->save();

        return redirect('/akun-zoom')->with('status', 'Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_zoom)
    {
        $data = AkunZoomModel::find($id_zoom);
        $data ->delete();

        return redirect('/akun-zoom')->with('status', 'Data Berhasil Dihapus!');
    }
}
