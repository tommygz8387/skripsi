<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;

class Slot extends Model
{
    use HasFactory;
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'slots';
    protected $primaryKey = 'id';
    protected $fillable = [
        'hari_id','waktu_id'
    ];

    // public function jurusan()
    // {
    //     return $this->belongsTo(Jurusan::class);
    // }
}
