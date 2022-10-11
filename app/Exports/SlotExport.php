<?php

namespace App\Exports;

use App\Models\Slot;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SlotExport implements FromCollection, 
ShouldAutoSize,
WithMapping, 
WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Slot::with(['hari','waktu'])->get();
    }

    /**
    * @var Slot $slot
    */
    public function map($slot): array
    {
        return [
            $slot->id,
            $slot->hari->hari,
            $slot->waktu->jam_mulai,
            $slot->waktu->jam_selesai,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Hari',
            'Jam Mulai',
            'Jam Selesai',
        ];
    }
}
