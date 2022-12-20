<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GuruExport implements FromCollection,
ShouldAutoSize,
WithMapping,
WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Guru::all();
    }

    /**
    * @var Guru $guru
    */
    public function map($guru): array
    {
        return [
            $guru->id,
            $guru->nip,
            $guru->nama,
            $guru->no_tlp,
            $guru->jml_ampu,
            $guru->keterangan
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'NIP',
            'Nama Guru',
            'No Telepon',
            'Ampu',
            'Keterangan',
        ];
    }
}
