<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JKhusus;
use App\Models\Manual;

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
}
