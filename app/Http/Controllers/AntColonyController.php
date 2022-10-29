<?php

namespace App\Http\Controllers;

use App\Models\Ampu;
use App\Models\Guru;
use App\Models\Hari;
use App\Models\JKhusus;
use App\Models\Slot;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ruang;
use App\Models\Waktu;
use App\Models\Manual;
use App\Models\Jurusan;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class AntColonyController extends Controller
{
    //
    // private $manual;
    public function __construct()
    {
        $this->manual = Manual::with(['ampu','kelas','ruang','slot']);
        $this->ampu = Ampu::orderBy('id');
        $this->kelas = Kelas::all();
        $this->ruang = Ruang::all();
        $this->slot = Slot::orderBy('id');
        $this->jk = JKhusus::orderBy('id');
        $this->guru = Guru::orderBy('id');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('frontend.otomatis.index');
    }

    public function initialisasi(Request $request)
    {
        //generate value to array
        $valAmpu = $this->ampu->pluck('id')->toArray();
        $valKelas = $this->kelas->pluck('id')->toArray();
        $valRuang = $this->ruang->pluck('id')->toArray();
        $valSlot = $this->slot->pluck('id')->toArray();
        
        // generate random
        $ranAmpu = Arr::random($valAmpu);
        $ranKelas = Arr::random($valKelas);
        $ranRuang = Arr::random($valRuang);
        $ranSlot = Arr::random($valSlot);
        // dd($ranAmpu.'-'.$ranKelas.'-'.$ranRuang.'-'.$ranSlot);
        
        
        

        // get total
        $totalKBM = count($this->slot->get())*count($this->kelas);
        // $arr = [];
        // dd($totalKBM);

        // get value by random id
        $getGuruId = $this->ampu->where('id',$ranAmpu)->value('guru_id');
        $getMapelId = $this->ampu->where('id',$ranAmpu)->value('mapel_id');
        $getHariId = $this->slot->where('id',$ranSlot)->value('hari_id');
        $getWaktuId = $this->slot->where('id',$ranSlot)->value('waktu_id');
        // dd($getGuruId);
        // $getGuruId = $getAmpuId->guru_id;
        // dd($getGuruId);
        // return $getGuruId.'-'.$getMapelId.'-'.$cekAmpu;
        // dd($cekAmpu);

        // testing space

        
        
        

        // end testing space

        for ($i=0; $i < $totalKBM; $i++) { 
            // cek apakah guru bisa mengajar mapel tersebut
            $cekAmpu = $this->ampu->where('guru_id',$getGuruId)->where('mapel_id',$getMapelId)->value('id');
            if(!$cekAmpu){
                continue;
            }

            // cek apakah slot ajar ada
            $cekSlot = $this->slot->where('hari_id',$getHariId)->where('waktu_id',$getWaktuId)->value('id');
            // dd($cekSlot);
            if(!$cekSlot){
                continue;
            }

            // cek apakah data ada di jam khusus
            $cekJK = $this->jk->where('guru_id',$getGuruId)->where('slot_id',$cekSlot)->value('id');
            // dd($cekJK);
            if($cekJK){
                continue;
            }

            // cek apakah jumlah ampu guru sudah penuh
            $cekGuru = $this->guru->where('id',$getGuruId)->value('jml_ampu');
            // return $cekGuru;
            // dd($cekGuru);
            $cekIdAmpu = Ampu::where('guru_id',$getGuruId)->pluck('id');
            // dd($cekIdAmpu);
            // $cekIf = Manual::whereIn('ampu_id',$cekIdAmpu)->get();
            $cekIf = count($this->manual->whereIn('ampu_id',$cekIdAmpu)->get());
            // dd($cekIf);
            if($cekIf>=$cekGuru){
                continue;
            }

            // SAMPE SINI

            // cek apakah sudah ada mapel di kelas
            $cekMapelAmpu = Ampu::where('mapel_id',$request->mapel_id)->pluck('id');
            // dd($cekMapelAmpu);
            $cekIfMapelKelas = Manual::where('kelas_id',$request->kelas_id)->whereIn('ampu_id',$cekMapelAmpu);
            // dd($cekIfMapelKelas->exists());
            if ($cekIfMapelKelas->exists()) {
                continue;
            }
            
            
            // cek apakah sudah ada slot di kelas
            // dd($cekMapelAmpu);
            $cekIfSlotKelas = Manual::where('kelas_id',$request->kelas_id)->where('slot_id',$cekSlot);
            // dd($cekIfSlotKelas->exists());
            if ($cekIfSlotKelas->exists()) {
                continue;
            }
            
            
            // cek bentrok ruang
            $cekIfSlotRuang = Manual::where('ruang_id',$request->ruang_id)->where('slot_id',$cekSlot);
            // dd($cekIfSlotRuang->exists());
            if ($cekIfSlotRuang!=1) {
                if ($cekIfSlotRuang->exists()) {
                    continue;
                }
            }

            // cek duplikat
            if ($this->manual->where('ampu_id',$cekAmpu)
            ->where('kelas_id',$request->kelas_id)
            ->where('ruang_id',$request->ruang_id)
            ->where('slot_id',$cekSlot)
            ->exists()) {
                continue;
            }

        }
        // return $arr;

        
        
        // fill array
        // $arr = [];
        // $arr2 = array($ranAmpu,$ranKelas,$ranRuang,$ranSlot);
        
        // for($i=0;$i<5;$i++){
        //     for($j=0;$j<4;$j++){
        //         $arr[$i][$j] = $arr2;
        //     }
        // }
        // dd($arr);
        // return $arr;





    }
}
