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
            'nama'=>$row[1],
            'nip'=>$row[2],
            'no_tlp'=>$row[3],
            'jml_ampu'=>$row[4],
            'keterangan'=>$row[5]
        ]);
    }
}
