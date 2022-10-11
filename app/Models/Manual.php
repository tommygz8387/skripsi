<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ampu;
// use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Ruang;
use App\Models\Slot;

class Manual extends Model
{
    use HasFactory;
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'manuals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ampu_id','kelas_id','ruang_id','slot_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }
    public function ampu()
    {
        return $this->belongsTo(Ampu::class)->with(['guru','mapel']);
    }
    public function slot()
    {
        return $this->belongsTo(Slot::class)->with(['hari','waktu']);
    }
    
}
