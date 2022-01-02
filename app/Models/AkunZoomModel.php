<?php

namespace App\Models;

use App\Models\RequestPinjamModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AkunZoomModel extends Model
{
    use HasFactory;
    protected $table = 'akunzoom_table';
    protected $primaryKey = 'id_zoom';
    protected $fillable = ['nama_akun', 'kapasitas', 'status_peminjaman'];

    public function RequestPinjam(){
        return $this->hasMany(RequestPinjamModel::class, 'zoom_id', 'id_zoom');
    }

}
