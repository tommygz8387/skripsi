<?php

namespace App\Exports;

use App\Models\JKhusus;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JKhususExport implements FromCollection,
ShouldAutoSize,
WithMapping, 
WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JKhusus::with('guru','slot')->get();
    }

    /**
    * @var JKhusus $jkhusus
    */
    public function map($jkhusus): array
    {
        return [
            $jkhusus->id,
            $jkhusus->guru->nama,
            $jkhusus->slot->hari->hari,
            $jkhusus->slot->waktu->jam_mulai, 
            $jkhusus->slot->waktu->jam_selesai,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Guru',
            'Hari',
            'Jam Mulai',
            'Jam Selesai',
        ];
    }
}
