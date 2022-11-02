<?php

namespace App\Http\Controllers;

use App\Models\Ampu;
use App\Models\Guru;
use App\Models\Slot;
use App\Models\Kelas;
use App\Models\Ruang;
use App\Models\Manual;
use App\Models\JKhusus;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class contoh extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->guru= Guru::orderBy('id');
        $this->slot= Slot::orderBy('id');
        $this->kelas= Kelas::orderBy('id');
        $this->jkhusus= JKhusus::orderBy('id');
        $this->ampu= Ampu::orderBy('id');

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

    public function loop1($i){
        
    }

    public function otomatis(){
        $ttlKBM = count($this->guru->get());
        echo $ttlKBM;
        echo '<br>';
        
        // looping total
        for ($i=1; $i <= $ttlKBM; $i++){ 
        // kondisi berhenti dan skip

            $totalA = $this->guru->pluck('jml_ampu')->sum();
            $jmlM = count(Manual::all());
            echo $totalA;
            echo '<br>';
            echo $jmlM;
            echo '<br>';
            
            // kondisi berhenti 1
            if ($jmlM>$totalA) {
                echo '<br>';
                echo 'Break';
                echo '<br>';
                break;
            }
            
            // kondisi berhenti 2
            $cekI = Ampu::where('guru_id',$i)->pluck('id')->toArray();
            if (!$cekI) {
                // return $cekI;
                continue;
            }

            $a = $this->guru->where('id',$i)->value('jml_ampu');
            $x = $this->ampu->where('guru_id',$i)->pluck('id');
            
            $b = count(Manual::whereIn('ampu_id',$x)->get());

            if ($b<$a) {
                // looping by id
                do{
                    // generate random
    
                    $ranAmpu = Arr::random($cekI);
                    // return $ranAmpu;
                    $ranKelas = Arr::random(Kelas::pluck('id')->toArray());
                    $ranRuang = Arr::random(Ruang::pluck('id')->toArray());
                    $ranSlot = Arr::random(Slot::pluck('id')->toArray());
                    echo '========';
                    echo '<br>';
                    echo $i;
                    echo '<br>';
                    echo $ranAmpu;
                    echo '<br>';
                    echo $ranKelas;
                    echo '<br>';
                    echo $ranRuang;
                    echo '<br>';
                    echo $ranSlot;
                    echo '<br>';
                    echo '========';
                    echo '<br>';
    
                    
                    // generate id
                    $getGuruId = $i;
                    $getMapelId = $this->ampu->where('id',$ranAmpu)->value('mapel_id');
                    
    
                    // kondisi
    
    
                    // cek apakah data ada di jam khusus
                    $cekJK = $this->jkhusus->where('guru_id',$getGuruId)->where('slot_id',$ranSlot)->value('id');
                    // dd($cekJK);
                    if($cekJK){
                        echo '<br>';
                        echo 'error 1';
                        echo '<br>';
                        // dd('test3='.$getGuruId.'-'.$getMapelId.'-'.$getHariId.'-'.$getWaktuId.'index='.$in);
                        continue;
                    }
    
                    // cek apakah jumlah ampu guru sudah penuh
                    $cekGuru = $this->guru->where('id',$getGuruId)->value('jml_ampu');
                    // return $cekGuru;
                    // dd($cekGuru);
                    $cekIdAmpu = $this->ampu->where('guru_id',$getGuruId)->pluck('id');
                    // dd($cekIdAmpu);
                    // $cekIf = Manual::whereIn('ampu_id',$cekIdAmpu)->get();
                    $cekIf = count(Manual::whereIn('ampu_id',$cekIdAmpu)->get());
                    // dd($cekIf);
                    if($cekIf>=$cekGuru){
                        echo '<br>';
                        echo 'error 2';
                        echo '<br>';
                        // dd('test4='.$getGuruId.'-'.$getMapelId.'-'.$getHariId.'-'.$getWaktuId.'index='.$in);
                        continue;
                    }
    
    
                    // cek apakah sudah ada mapel di kelas
                    $cekMapelAmpu = $this->ampu->where('mapel_id',$getMapelId)->pluck('id');
                    // dd($getMapelId.'-'.$cekMapelAmpu);
                    $cekIfMapelKelas = Manual::where('kelas_id',$ranKelas)->whereIn('ampu_id',$cekMapelAmpu);
                    // dd($cekIfMapelKelas->exists().'-'.$cekIfMapelKelas->get());
                    // return $getMapelId.'-'.$ranKelas.'-'.$cekMapelAmpu.'-'.$cekIfMapelKelas->exists().'-'.$cekIfMapelKelas->get();
                    if ($cekIfMapelKelas->exists()) {
                        echo '<br>';
                        echo 'error 3';
                        echo '<br>';
                        // dd('test5='.$getGuruId.'-'.$getMapelId.'-'.$getHariId.'-'.$getWaktuId.'index='.$in);
                        continue;
                    }
                    
                    
                    // cek apakah sudah ada slot di kelas
                    // dd($cekMapelAmpu);
                    $cekIfSlotKelas = Manual::where('kelas_id',$ranKelas)->where('slot_id',$ranSlot);
                    // dd($cekIfSlotKelas->exists());
                    if ($cekIfSlotKelas->exists()) {
                        echo '<br>';
                        echo 'error 4';
                        echo '<br>';
                        // dd('test6='.$getGuruId.'-'.$getMapelId.'-'.$getHariId.'-'.$getWaktuId.'index='.$in);
                        continue;
                    }
                    
                    
                    // cek bentrok ruang
                    $cekIfSlotRuang = Manual::where('ruang_id',$ranRuang)->where('slot_id',$ranSlot);
                    // return $ranRuang.'-'.$cekSlot.'-'.count($cekIfSlotRuang->get()).'-'.$cekIfSlotRuang->get();
                    // dd($cekIfSlotRuang->exists());
                    if ($ranRuang!=1) {
                        if ($cekIfSlotRuang->exists()) {
                            echo '<br>';
                            echo 'error 5';
                            echo '<br>';
                            // dd('test7='.$getGuruId.'-'.$getMapelId.'-'.$getHariId.'-'.$getWaktuId.'index='.$in);
                            continue;
                        }
                    }
    
                    // cek bentrok guru
                    $cekGuru = $this->ampu->where('guru_id',$getGuruId)->pluck('id');
                    // dd($cekSlot.'-'.$cekGuru);
                    $cekIfGuruSlot = Manual::where('slot_id',$ranSlot)->whereIn('ampu_id',$cekGuru);
                    // dd($cekSlot.'-'.$cekGuru.'-'.$cekIfGuruSlot->get());
                    if ($cekIfGuruSlot->exists()) {
                        echo '<br>';
                        echo 'error 6';
                        echo '<br>';
                        // dd('test8='.$getGuruId.'-'.$getMapelId.'-'.$getHariId.'-'.$getWaktuId.'index='.$in);
                        continue;
                    }
    
                    // cek duplikat
                    if (Manual::where('ampu_id',$ranAmpu)
                    ->where('kelas_id',$ranKelas)
                    ->where('ruang_id',$ranRuang)
                    ->where('slot_id',$ranSlot)
                    ->exists()) {
                        echo '<br>';
                        echo 'error 7';
                        echo '<br>';
                        // dd('test9='.$getGuruId.'-'.$getMapelId.'-'.$getHariId.'-'.$getWaktuId.'index='.$in);
                        continue;
                    }
    
    
                    // akhir kondisi
    
                    // insert data
    
                    Manual::create([
                        'ampu_id'=>$ranAmpu,
                        'kelas_id'=>$ranKelas,
                        'ruang_id'=>$ranRuang,
                        'slot_id'=>$ranSlot,
                    ]);
    
    
                    // reinitiate
                    $b = count(Manual::whereIn('ampu_id',$x)->get());
                }while ($a > $b);
            }else{
                break;
            }
        }
    }
}
