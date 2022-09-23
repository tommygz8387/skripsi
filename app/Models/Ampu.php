<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Tingkat;

class Ampu extends Model
{
    use HasFactory;
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'ampus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'guru_id','mapel_id','tingkat_id'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
