<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    protected $table = 'status_models';
    protected $primaryKey = 'id_status';
    protected $fillable = ['status_field', 'status_field_boolean'];
}
