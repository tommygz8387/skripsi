<?php

namespace App\Exports;

use App\Models\Ampu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AmpuExport implements FromCollection,
ShouldAutoSize,
WithMapping,
WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ampu::with(['guru','mapel','tingkat'])->get();
    }

    /**
    * @var Ampu $ampu
    */
    public function map($ampu): array
    {
        return [
            $ampu->id,
            $ampu->guru->nama,
            $ampu->mapel->nama,
            $ampu->tingkat->tingkat,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Guru',
            'Mata Pelajaran',
            'Tingkat',
        ];
    }
}
