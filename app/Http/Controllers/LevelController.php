<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkunZoomModel;
use App\Http\Controllers\Controller;
use App\Models\RequestPinjamModel;
use App\Models\User;

class LevelController extends Controller
{
    public function dashboard(){
        $CountZoom = AkunZoomModel::all()->count();
        $CountRequest = RequestPinjamModel::all()->count();
        $CountUser = User::all()->count();
        
        $data = AkunZoomModel::all();
        return view('dashboard.home', [
            "CountZoom" => $CountZoom,
            "CountRequest" => $CountRequest,
            "CountUser" => $CountUser,
            "data" => $data
        ]);
    }

    // public function count_akunzoom(){
    //     $dataCount = AkunZoomModel::all()->count();
    //     return view('dashboard.home', [
    //         "dataCount" => $dataCount
    //     ]);
    // }
}
