<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;
use App\Models\Slot;

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
        'guru_id','slot_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function slot()
    {
        return $this->belongsTo(Slot::class)->with(['hari','waktu']);
    }
}
