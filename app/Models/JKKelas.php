<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JKKelas extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'j_k_kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kelas_id','slot_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function slot()
    {
        return $this->belongsTo(Slot::class)->with(['hari','waktu']);
    }
}
