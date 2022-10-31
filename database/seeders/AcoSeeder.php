<?php

namespace Database\Seeders;

use App\Models\Ampu;
use App\Models\Guru;
use App\Models\Slot;
use App\Models\Kelas;
use App\Models\Ruang;
use App\Models\Manual;
use App\Models\JKhusus;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class AcoSeeder extends Seeder
{
    // public function __construct()
    // {
    //     // $this->manual = Manual::with(['ampu','kelas','ruang','slot']);
    //     $this->manual = Manual::orderBy('id');
    //     $this->ampu = Ampu::orderBy('id');
    //     $this->kelas = Kelas::orderBy('id');
    //     $this->ruang = Ruang::orderBy('id');
    //     $this->slot = Slot::orderBy('id');
    //     $this->jk = JKhusus::orderBy('id');
    //     $this->guru = Guru::orderBy('id');
    // }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ini_set('max_execution_time', 0);
        // $hari=count(Hari::all());
        // $waktu=count(Waktu::all());
        // for ($i=1; $i <= $hari; $i++) { 
        //     for ($j=1; $j <= $waktu; $j++) { 
        //         Slot::factory()->create([
        //             'hari_id' => $i,
        //             'waktu_id' => $j,
        //         ]);
        //     }
        // }

        // //generate value to array
        // $valAmpu = $this->ampu->pluck('id')->toArray();
        // $valKelas = $this->kelas->pluck('id')->toArray();
        // $valRuang = $this->ruang->pluck('id')->toArray();
        // $valSlot = $this->slot->pluck('id')->toArray();
        
        
        // // dd($ranAmpu.'-'.$ranKelas.'-'.$ranRuang.'-'.$ranSlot);
        
        
        

        // // get total
        // // $arr = [];
        // // dd($totalKBM);

        // // dd($getKelasId);
        

        //     $ranAmpu = Arr::random($valAmpu);
        //     $ranKelas = Arr::random($valKelas);
        //     $ranRuang = Arr::random($valRuang);
        //     $ranSlot = Arr::random($valSlot);
        //     // generate random

        //     // get value by random id
        //     $getGuruId = $this->ampu->where('id',$ranAmpu)->value('guru_id');
        //     $getMapelId = $this->ampu->where('id',$ranAmpu)->value('mapel_id');
        //     $getHariId = $this->slot->where('id',$ranSlot)->value('hari_id');
        //     $getWaktuId = $this->slot->where('id',$ranSlot)->value('waktu_id');
        //     $getKelasId = $this->kelas->where('id',$ranKelas)->value('id');
        //     $getRuangId = $this->ruang->where('id',$ranRuang)->value('id');


        //     // cek apakah guru bisa mengajar mapel tersebut
        //     $cekAmpu = $this->ampu->where('guru_id',$getGuruId)->where('mapel_id',$getMapelId)->value('id');
        //     if(!$cekAmpu){
        //         $this->run();
        //     }

        //     // cek apakah slot ajar ada
        //     $cekSlot = $this->slot->where('hari_id',$getHariId)->where('waktu_id',$getWaktuId)->value('id');
        //     // dd($cekSlot);
        //     if(!$cekSlot){
        //         $this->run();
        //     }

        //     // cek apakah data ada di jam khusus
        //     $cekJK = $this->jk->where('guru_id',$getGuruId)->where('slot_id',$cekSlot)->value('id');
        //     // dd($cekJK);
        //     if($cekJK){
        //         $this->run();
        //     }

        //     // cek apakah jumlah ampu guru sudah penuh
        //     $cekGuru = $this->guru->where('id',$getGuruId)->value('jml_ampu');
        //     // return $cekGuru;
        //     // dd($cekGuru);
        //     $cekIdAmpu = Ampu::where('guru_id',$getGuruId)->pluck('id');
        //     // dd($cekIdAmpu);
        //     // $cekIf = Manual::whereIn('ampu_id',$cekIdAmpu)->get();
        //     $cekIf = count($this->manual->whereIn('ampu_id',$cekIdAmpu)->get());
        //     // dd($cekIf);
        //     if($cekIf>=$cekGuru){
        //         $this->run();
        //     }


        //     // cek apakah sudah ada mapel di kelas
        //     $cekMapelAmpu = Ampu::where('mapel_id',$getMapelId)->pluck('id');
        //     // dd($getMapelId.'-'.$cekMapelAmpu);
        //     $cekIfMapelKelas = $this->manual->where('kelas_id',$getKelasId)->whereIn('ampu_id',$cekMapelAmpu);
        //     // dd($cekIfMapelKelas->exists().'-'.$cekIfMapelKelas->get());
        //     // return $getMapelId.'-'.$getKelasId.'-'.$cekMapelAmpu.'-'.$cekIfMapelKelas->exists().'-'.$cekIfMapelKelas->get();
        //     if ($cekIfMapelKelas->exists()) {
        //         $this->run();
        //     }
            
            
        //     // cek apakah sudah ada slot di kelas
        //     // dd($cekMapelAmpu);
        //     $cekIfSlotKelas = $this->manual->where('kelas_id',$getKelasId)->where('slot_id',$cekSlot);
        //     // dd($cekIfSlotKelas->exists());
        //     if ($cekIfSlotKelas->exists()) {
        //         $this->run();
        //     }
            
            
        //     // cek bentrok ruang
        //     $cekIfSlotRuang = $this->manual->where('ruang_id',$getRuangId)->where('slot_id',$cekSlot);
        //     // return $getRuangId.'-'.$cekSlot.'-'.count($cekIfSlotRuang->get()).'-'.$cekIfSlotRuang->get();
        //     // dd($cekIfSlotRuang->exists());
        //     if ($getRuangId!=1) {
        //         if ($cekIfSlotRuang->exists()) {
        //             $this->run();
        //         }
        //     }

        //     // cek bentrok guru
        //     $cekGuru = Ampu::where('guru_id',$getGuruId)->pluck('id');
        //     // dd($cekSlot.'-'.$cekGuru);
        //     $cekIfGuruSlot = $this->manual->where('slot_id',$cekSlot)->whereIn('ampu_id',$cekGuru);
        //     // dd($cekSlot.'-'.$cekGuru.'-'.$cekIfGuruSlot->get());
        //     if ($cekIfGuruSlot->exists()) {
        //         $this->run();
        //     }

        //     // cek duplikat
        //     if ($this->manual->where('ampu_id',$cekAmpu)
        //     ->where('kelas_id',$getKelasId)
        //     ->where('ruang_id',$getRuangId)
        //     ->where('slot_id',$cekSlot)
        //     ->exists()) {
        //         $this->run();
        //     }

        //     Manual::factory()->count(50)->create([
        //         'ampu_id'=>$cekAmpu,
        //         'kelas_id'=>$getKelasId,
        //         'ruang_id'=>$getRuangId,
        //         'slot_id'=>$cekSlot
        //     ]);
            Manual::factory()->count(50)->create();
    }
}
