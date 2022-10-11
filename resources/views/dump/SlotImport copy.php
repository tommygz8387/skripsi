<?php

namespace App\Imports;

use App\Models\Hari;
use App\Models\Slot;
use App\Models\Waktu;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SlotImport implements ToCollection,
WithHeadingRow
// SkipsOnError,
// SkipsOnFailure
{
    // use SkipsErrors, SkipsFailures;

    private $slot,$hari,$waktu;

    public function __construct(){
        $this->slot = Slot::select('id','hari_id','waktu_id')->get();
        $this->hari = Hari::select('id','hari')->get();
        $this->waktu = Waktu::select('id','jam_mulai','jam_selesai')->get();
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $cekHari = $this->hari->where('hari',$row['Hari'])->first();
            // dd($cekHari);
            $cekWaktu = $this->waktu->where('jam_mulai',$row['Jam_Mulai'])->where('jam_selesai',$row['Jam_Selesai'])->first();
            $cekSlot = $this->slot->where('hari_id',$cekHari)->where('waktu_id',$cekWaktu);

            if ($cekSlot->isEmpty()) {
                Alert::error('Error','Data Didn\'t Exist!');
                return redirect()->route('slot.index');
            }

            Slot::create([
                'id'=>$row['ID'] ?? NULL,
                'hari_id'=>$cekHari ?? NULL,
                'waktu_id'=>$cekWaktu ?? NULL,
            ]);
        }
    }

}
