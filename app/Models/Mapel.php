<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;
use App\Models\Manual;

class Mapel extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'mapels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama','jurusan_id','ampu1','ampu2','ampu3'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function manual()
    {
        return $this->hasMany(Manual::class);
    }
}
