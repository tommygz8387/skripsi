<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;
use App\Models\Waktu;
use App\Models\Hari;

class JKhusus extends Model
{
    use HasFactory;
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'j_khususes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'guru_id','hari_id','waktu_id'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function hari()
    {
        return $this->belongsTo(Hari::class);
    }
    public function waktu()
    {
        return $this->belongsTo(Waktu::class);
    }
}
