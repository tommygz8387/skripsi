<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slot;
use App\Models\JKhusus;

class Hari extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'haris';
    protected $primaryKey = 'id';
    protected $fillable = [
        'hari','jml_jam'
    ];
    // protected $hidden = [
    //     'sisa'
    // ];

    public function slot()
    {
        return $this->hasMany(Slot::class);
    }
    public function jkhusus()
    {
        return $this->hasMany(JKhusus::class);
    }
}
