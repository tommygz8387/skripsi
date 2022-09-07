<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;

class Kelas extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama','tingkat','jurusan_id'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
