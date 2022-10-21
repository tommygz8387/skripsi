<?php

namespace App\Exports;

use App\Models\Manual;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ManualExport implements FromCollection, 
ShouldAutoSize,
WithMapping, 
WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Manual::with(['slot','kelas','ruang','ampu'])->get();
    }

    /**
    * @var Manual $manual
    */
    public function map($manual): array
    {
        return [
            $manual->id,
            $manual->slot->hari->hari,
            $manual->slot->waktu->jam_mulai,
            $manual->slot->waktu->jam_selesai,
            $manual->kelas->nama,
            $manual->ampu->guru->nama,
            $manual->ampu->mapel->nama,
            $manual->ruang->nama,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Hari',
            'Jam Mulai',
            'Jam Selesai',
            'Kelas',
            'Guru',
            'Mata Pelajaran',
            'Ruang',
        ];
    }
}
