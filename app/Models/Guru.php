<?php

namespace App\Models;

use App\Models\Ampu;
use App\Models\Manual;
use App\Models\JKhusus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'gurus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama','nip','no_tlp','jml_ampu','keterangan'
    ];

    public function jkhusus()
    {
        return $this->hasMany(JKhusus::class);
    }

    public function manual()
    {
        return $this->hasMany(Manual::class);
    }

    public function ampu()
    {
        return $this->hasMany(Ampu::class);
    }
}
