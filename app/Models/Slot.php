<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Waktu;
use App\Models\Hari;
use App\Models\Manual;
use App\Models\JKhusus;

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

    public function hari()
    {
        return $this->belongsTo(Hari::class);
    }
    public function waktu()
    {
        return $this->belongsTo(Waktu::class);
    }
    public function manual()
    {
        return $this->hasMany(Manual::class);
    }
    public function jkhusus()
    {
        return $this->hasMany(JKhusus::class);
    }
}
