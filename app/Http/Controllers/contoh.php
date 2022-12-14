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
use RealRashid\SweetAlert\Facades\Alert;

class contoh extends Controller
{
    //
    
    public function __construct()
    {
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


    public function otomatis(){
        ini_set('max_execution_time', 100);
        $ttlGuru = count(Guru::all());
        echo 'ttl G ='.$ttlGuru;
        echo '<br>';
        
        // looping total
        for ($i=1; $i <= $ttlGuru; $i++){ 
        // kondisi berhenti dan skip

            $totalA = Guru::pluck('jml_ampu')->sum();
            $jmlM = count(Manual::all());
            echo 'total A ='.$totalA;
            echo '<br>';
            echo 'jml M ='.$jmlM;
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

            $a = Guru::where('id',$i)->value('jml_ampu');
            $x = Ampu::where('guru_id',$i)->pluck('id');
            
            $b = count(Manual::whereIn('ampu_id',$x)->get());

            if ($b<$a) {
                // looping by id
                do{
                    // generate random
    
                    $ranAmpu = Arr::random($cekI);
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
                    $getMapelId = Ampu::where('id',$ranAmpu)->value('mapel_id');
                    
    
                    // kondisi
    
    
                    // cek apakah data ada di jam khusus
                    $cekJK = JKhusus::where('guru_id',$getGuruId)->where('slot_id',$ranSlot)->value('id');
                    if($cekJK){
                        echo '<br>';
                        echo 'error 1';
                        echo '<br>';
                        continue;
                    }
    
                    // cek apakah jumlah ampu guru sudah penuh
                    $cekGuru = Guru::where('id',$getGuruId)->value('jml_ampu');
                    $cekIdAmpu = Ampu::where('guru_id',$getGuruId)->pluck('id');
                    $cekIf = count(Manual::whereIn('ampu_id',$cekIdAmpu)->get());
                    if($cekIf>=$cekGuru){
                        echo '<br>';
                        echo 'error 2';
                        echo '<br>';
                        continue;
                    }
    
    
                    // cek apakah sudah ada mapel di kelas
                    $cekMapelAmpu = Ampu::where('mapel_id',$getMapelId)->pluck('id');
                    $cekIfMapelKelas = Manual::where('kelas_id',$ranKelas)->whereIn('ampu_id',$cekMapelAmpu);
                    if ($cekIfMapelKelas->exists()) {
                        echo '<br>';
                        echo 'error 3';
                        echo '<br>';
                        continue;
                    }
                    
                    
                    // cek apakah sudah ada slot di kelas
                    $cekIfSlotKelas = Manual::where('kelas_id',$ranKelas)->where('slot_id',$ranSlot);
                    if ($cekIfSlotKelas->exists()) {
                        echo '<br>';
                        echo 'error 4';
                        echo '<br>';
                        continue;
                    }
                    
                    
                    // cek bentrok ruang
                    $cekIfSlotRuang = Manual::where('ruang_id',$ranRuang)->where('slot_id',$ranSlot);
                    if ($ranRuang!=1) {
                        if ($cekIfSlotRuang->exists()) {
                            echo '<br>';
                            echo 'error 5';
                            echo '<br>';
                            continue;
                        }
                    }
    
                    // cek bentrok guru
                    $cekGuru = Ampu::where('guru_id',$getGuruId)->pluck('id');
                    $cekIfGuruSlot = Manual::where('slot_id',$ranSlot)->whereIn('ampu_id',$cekGuru);
                    if ($cekIfGuruSlot->exists()) {
                        echo '<br>';
                        echo 'error 6';
                        echo '<br>';
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
                echo '<br>';
                echo 'Break2';
                echo '<br>';
                continue;
            }
        }
    }
}
