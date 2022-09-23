<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Ampu;

class Tingkat extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'tingkats';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tingkat'
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function ampu()
    {
        return $this->hasMany(Ampu::class);
    }
}
