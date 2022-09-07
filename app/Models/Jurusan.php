<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mapel;
use App\Models\Kelas;

class Jurusan extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'jurusans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jurusan'
    ];

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
