<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manual;

class Ruang extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'ruangs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama','kode'
    ];


    public function manual()
    {
        return $this->hasMany(Manual::class);
    }
}
