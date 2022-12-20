<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            //
            'nip'=>$row[0],
            'nama'=>$row[1],
            'no_tlp'=>$row[2],
            'jml_ampu'=>$row[3],
            'keterangan'=>$row[4]
        ]);
    }
}
