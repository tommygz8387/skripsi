<?php

namespace App\Http\Controllers;

use App\Models\Ampu;
use App\Models\Guru;
use App\Models\Hari;
use App\Models\Slot;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ruang;
use App\Models\Waktu;
use App\Models\Manual;
use App\Models\JKhusus;
use App\Models\Jurusan;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AntColonyController extends Controller
{
    //
    // private $manual;
    public function __construct()
    {
        // $this->manual = Manual::with(['ampu','kelas','ruang','slot']);
        $this->manual = Manual::orderBy('id');
        $this->ampu = Ampu::orderBy('id');
        $this->kelas = Kelas::orderBy('id');
        $this->ruang = Ruang::orderBy('id');
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

    public function initialisasi()
    {
        ini_set('max_execution_time', 0);
        //generate value to array
        $valAmpu = $this->ampu->pluck('id')->toArray();
        $valKelas = $this->kelas->pluck('id')->toArray();
        $valRuang = $this->ruang->pluck('id')->toArray();
        $valSlot = $this->slot->pluck('id')->toArray();
        
        
        // dd($ranAmpu.'-'.$ranKelas.'-'.$ranRuang.'-'.$ranSlot);
        
        $totalKBM = count($this->slot->get())*count($this->kelas->get());
        // $jmlM = count(Manual::get());
        // dd($totalKBM);
        // dd($jmlM);

        do{
        

        $ranAmpu = Arr::random($valAmpu);
        $ranKelas = Arr::random($valKelas);
        $ranRuang = Arr::random($valRuang);
        $ranSlot = Arr::random($valSlot);
        // generate random

        // get value by random id
        $getGuruId = $this->ampu->where('id',$ranAmpu)->value('guru_id');
        $getMapelId = $this->ampu->where('id',$ranAmpu)->value('mapel_id');
        $getHariId = $this->slot->where('id',$ranSlot)->value('hari_id');
        $getWaktuId = $this->slot->where('id',$ranSlot)->value('waktu_id');
        $getKelasId = $this->kelas->where('id',$ranKelas)->value('id');
        $getRuangId = $this->ruang->where('id',$ranRuang)->value('id');


        // cek apakah guru bisa mengajar mapel tersebut
        $cekAmpu = $this->ampu->where('guru_id',$getGuruId)->where('mapel_id',$getMapelId)->value('id');
        if(!$cekAmpu){
            break;
        }

        // cek apakah slot ajar ada
        $cekSlot = $this->slot->where('hari_id',$getHariId)->where('waktu_id',$getWaktuId)->value('id');
        // dd($cekSlot);
        if(!$cekSlot){
            break;
        }

        // cek apakah data ada di jam khusus
        $cekJK = $this->jk->where('guru_id',$getGuruId)->where('slot_id',$cekSlot)->value('id');
        // dd($cekJK);
        if($cekJK){
            break;
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
            break;
        }


        // cek apakah sudah ada mapel di kelas
        $cekMapelAmpu = Ampu::where('mapel_id',$getMapelId)->pluck('id');
        // dd($getMapelId.'-'.$cekMapelAmpu);
        $cekIfMapelKelas = $this->manual->where('kelas_id',$getKelasId)->whereIn('ampu_id',$cekMapelAmpu);
        // dd($cekIfMapelKelas->exists().'-'.$cekIfMapelKelas->get());
        // return $getMapelId.'-'.$getKelasId.'-'.$cekMapelAmpu.'-'.$cekIfMapelKelas->exists().'-'.$cekIfMapelKelas->get();
        if ($cekIfMapelKelas->exists()) {
            break;
        }
        
        
        // cek apakah sudah ada slot di kelas
        // dd($cekMapelAmpu);
        $cekIfSlotKelas = $this->manual->where('kelas_id',$getKelasId)->where('slot_id',$cekSlot);
        // dd($cekIfSlotKelas->exists());
        if ($cekIfSlotKelas->exists()) {
            break;
        }
        
        
        // cek bentrok ruang
        $cekIfSlotRuang = $this->manual->where('ruang_id',$getRuangId)->where('slot_id',$cekSlot);
        // return $getRuangId.'-'.$cekSlot.'-'.count($cekIfSlotRuang->get()).'-'.$cekIfSlotRuang->get();
        // dd($cekIfSlotRuang->exists());
        if ($getRuangId!=1) {
            if ($cekIfSlotRuang->exists()) {
                break;
            }
        }

        // cek bentrok guru
        $cekGuru = Ampu::where('guru_id',$getGuruId)->pluck('id');
        // dd($cekSlot.'-'.$cekGuru);
        $cekIfGuruSlot = $this->manual->where('slot_id',$cekSlot)->whereIn('ampu_id',$cekGuru);
        // dd($cekSlot.'-'.$cekGuru.'-'.$cekIfGuruSlot->get());
        if ($cekIfGuruSlot->exists()) {
            break;
        }

        // cek duplikat
        if ($this->manual->where('ampu_id',$cekAmpu)
        ->where('kelas_id',$getKelasId)
        ->where('ruang_id',$getRuangId)
        ->where('slot_id',$cekSlot)
        ->exists()) {
            break;
        }

        Manual::create([
            'ampu_id'=>$cekAmpu,
            'kelas_id'=>$getKelasId,
            'ruang_id'=>$getRuangId,
            'slot_id'=>$cekSlot
        ]);

        $jmlM = count(Manual::get());
        // dd($jmlM);

        return redirect()->route('init');
    }while ($jmlM < $totalKBM);

        Alert::success('success','Data Generated successfully');
        return redirect()->route('manual.index');
        
    }

    // public function otomatis(){
    //     $totalKBM = count($this->slot->get())*count($this->kelas->get());
    //     $jmlM = count($this->manual->get());

    //     // dd($jmlM);
    //     while ($jmlM <= $totalKBM) {
    //         $this->initialisasi();
            
    //         // dd($jmlM);
    //     }
    // }
}
