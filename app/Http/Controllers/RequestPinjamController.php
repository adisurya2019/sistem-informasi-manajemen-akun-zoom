<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestPinjamModel;
use App\Models\AkunZoomModel;
use App\Http\Controllers\Controller;
use App\Models\StatusAksiModel;
use phpDocumentor\Reflection\PseudoTypes\False_;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;

class RequestPinjamController extends Controller
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
        return view('peminjaman.home', [
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
        $data_akunzoom = AkunZoomModel::all();
        $data =RequestPinjamModel::all();
        return view('peminjaman.requestPinjam', [
            'data' => $data,
            'akunzoom'=> $data_akunzoom
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
        $data = new RequestPinjamModel();
        $data ->zoom_id= $request->zoom_id;
        $data ->nama_kegiatan = $request->nama_kegiatan;
        $data ->deskripsi = $request->deskripsi;
        $data ->tanggal = $request->tanggal;
        $data ->jam = $request->jam;
        $data ->durasi = $request->durasi;
        $data ->email_user = $request->email_user;

        $data->save();

        return redirect('/request-pinjam')->with('status', 'Requst Berhasil Ditambahkan!');
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

        return view('peminjaman.editPinjam', [
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
    public function update(Request $request, $id_peminjaman)
    {
        $data = RequestPinjamModel::find($id_peminjaman);
        $data ->zoom_id= $request->zoom_id;
        $data ->nama_kegiatan = $request->nama_kegiatan;
        $data ->deskripsi = $request->deskripsi;
        $data ->tanggal = $request->tanggal;
        $data ->jam = $request->jam;
        $data ->durasi = $request->durasi;
        $data ->status_aksi = $request->status_aksi;
        $data ->email_user = $request->email_user;
        
        $email = $data ->email_user;

        $akunzoom = AkunZoomModel::find($request->zoom_id);
        $akunzoom->status_peminjaman -= $request->status_aksi;
        $akunzoom->save();
        $data->save();

        if($akunzoom->status_peminjaman == 0){
            Mail::to($email)->send(new Email());
        }
        else {
            
        }
        
        return redirect('/request-pinjam')->with('status', 'Request Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_peminjaman)
    {
        $data = RequestPinjamModel::find($id_peminjaman);
        $data ->forceDelete();

        return redirect('/request-pinjam')->with('status', 'Request Berhasil dihapus!!');
    }
    
    public function history()
    {
        $data = RequestPinjamModel::onlyTrashed()->get();
        // return $data;
        return view('peminjaman.historyPinjam', [
            'data'=> $data
        ]);
    }

    public function restore($id_peminjaman = null)
    {
        if($id_peminjaman != null){
            $data = RequestPinjamModel::onlyTrashed()
            ->where('id_peminjaman', $id_peminjaman)
            ->restore();
        }
        else {
            $data = RequestPinjamModel::onlyTrashed()
            ->restore();
        }

        return redirect('/request-pinjam')->with('status', 'Request Berhasil direstore!');
    }
    
    public function soft_destroy($id_peminjaman)
    {
        $data = RequestPinjamModel::find($id_peminjaman);
        $data ->delete();

        return redirect('/request-pinjam')->with('status', 'Request Berhasil dihapus!');
    }

    public function pengembalian($id_peminjaman)
    {
        // $status_aksi = StatusAksiModel::all();
        $data_akunzoom = AkunZoomModel::all();
        // $status = StatusAksiModel::all();
        $editData = RequestPinjamModel::where('id_peminjaman', $id_peminjaman)->first();

        return view('pengembalian.pengembalian', [
            "editData" => $editData,
            // "status" => $status,
            "akunzoom" => $data_akunzoom,
            // "status_aksi" => $status_aksi
        ]);
        
        
        return redirect('/request-pinjam')->with('status', 'Akun zoom telah dikembalikan!');
    }

    public function pengembalian_update(Request $request, $id_peminjaman){
        $data = RequestPinjamModel::where('id_peminjaman', $id_peminjaman)->first();
        $data ->zoom_id= $request->zoom_id;
        $status_sekarang = $data->status_aksi;

        if($status_sekarang == 1){
            RequestPinjamModel::where('id_peminjaman', $id_peminjaman)->update([
                'status_aksi' => 2
            ]);
        }else {
            RequestPinjamModel::where('id_peminjaman', $id_peminjaman)->update([
                'status_aksi' => 1
            ]);
        }
        
        $akunzoom = AkunZoomModel::find($request->zoom_id);
        $akunzoom->status_peminjaman += 1;
        $akunzoom->save();
        $data->save();
        
        return redirect('/request-pinjam')->with('status', 'Akun zoom telah dikembalikan!');
    }
}
