<?php

namespace App\Models;

use App\Models\AkunZoomModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestPinjamModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'peminjaman_table';
    protected $primaryKey = 'id_peminjaman';
    // protected $foreignKey = '';
    protected $fillable = ['zoom_id','nama_kegiatan', 'deskripsi', 'tanggal', 'jam', 'durasi', 'status_aksi', 'email_user'];

    public function akunzoom(){
        return $this->belongsTo(AkunZoomModel::class, 'zoom_id', 'id_zoom');
    }
}
