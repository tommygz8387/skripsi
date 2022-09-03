<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    use HasFactory;
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'waktus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jam_mulai','jam_selesai','total'
    ];
}
