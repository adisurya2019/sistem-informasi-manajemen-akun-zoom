<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAksiModel extends Model
{
    use HasFactory;
    protected $table = 'status_aksi_models';
    protected $primaryKey = 'id_statusA';
    protected $fillable = ['status_fieldA', 'status_fieldA_boolean'];
}
