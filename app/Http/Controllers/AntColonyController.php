<?php

namespace App\Http\Controllers;

use App\Models\Ampu;
use App\Models\Guru;
use App\Models\Slot;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Manual;
use App\Models\JKhusus;
use App\Models\JKKelas;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AntColonyController extends Controller
{
    //
    // private $manual;
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

    public function iterasi(Request $request){
        ini_set('max_execution_time', $request->q);
        try {
            $alpha = $request->alpha;
            $beta = $request->beta;
            $rho = $request->rho;
            $tau = $request->tau;
            $ttlA = Guru::pluck('jml_ampu')->sum();

        // iterasi pemilihan semut
        do {
            $jmlM=count(Manual::all());
            // jika jumlah jadwal melebihi jumlah ampu
            if ($jmlM>=$ttlA) {
                break;
            }

            $ranGuru = Arr::random(Guru::pluck('id')->toArray());
            // cek ampu guru
            $cekI = Ampu::where('guru_id',$ranGuru)->pluck('id')->toArray();
            if (!$cekI) {
                continue;
            }

            $a = Guru::where('id',$ranGuru)->value('jml_ampu');
            $b = count(Manual::whereIn('ampu_id',$cekI)->get());

            // jika jadwal guru lebih kecil dari jumlah ampu
            if ($b<$a) {
                $try=1;
                do{
                    $try++;
                    // maksimum percobaan
                    if ($try> (($alpha/$beta)*$a)) {
                        break;
                    }

                    // generate random
                    $ranAmpu = Arr::random($cekI);
                    $thisAmpu = Ampu::where('id',$ranAmpu);
                    $getTfromA = $thisAmpu->pluck('tingkat_id');
                    $getKelas = Kelas::where('tingkat_id',$getTfromA)->pluck('id');
                    $ranKelas = Arr::random($getKelas->toArray());
                    $thisJadwal = Manual::where('kelas_id',$ranKelas);
                    $getSfK = $thisJadwal->pluck('slot_id');
                    $ranSlot = Arr::random(Slot::whereNotIn('id',$getSfK)->pluck('id')->toArray());
                    // generate id
                    $getMapelId = $thisAmpu->value('mapel_id');
                    $getNMapel = Mapel::where('id',$getMapelId)->value('nama');

                    
                    // KONDISI SPESIFIK
                    // TIDAK BISA DIGUNAKAN JIKA DATA BERBEDA
                    // Kondisi Ruang untuk Matkul Tertentu
                    if ($getNMapel=='Penjas') {
                        $ranRuang = 4;
                    }elseif ($getNMapel=='Informatika') {
                        $ranRuang = 3;
                    }else{
                        $ranRuang = 1;
                    }
                    
                    
                    // cek apakah data ada di jam khusus
                    $cekJK = JKhusus::where('guru_id',$ranGuru)->where('slot_id',$ranSlot)->value('id');
                    if($cekJK){
                        continue;
                    }
                    
                    $cekJKKelas = JKKelas::where('kelas_id',$ranKelas)->where('slot_id',$ranSlot)->value('id');
                    if($cekJKKelas){
                        continue;
                    }
    
                    // cek apakah sudah ada mapel di kelas
                    $cekMapelAmpu = Ampu::where('mapel_id',$getMapelId)->pluck('id');
                    $cekIfMapelKelas = $thisJadwal->whereIn('ampu_id',$cekMapelAmpu);
                    $jmlMapel = count($cekIfMapelKelas->get());
                    if ($jmlMapel>1) {
                        continue;
                    }
                    
                    
                    // cek apakah sudah ada slot di kelas
                    $cekIfSlotKelas = $thisJadwal->where('slot_id',$ranSlot);
                    if ($cekIfSlotKelas->exists()) {
                        continue;
                    }
                    
                    
                    // cek bentrok ruang
                    $cekIfSlotRuang = Manual::where('ruang_id',$ranRuang)->where('slot_id',$ranSlot);
                    if ($ranRuang!=1) {
                        if ($cekIfSlotRuang->exists()) {
                            continue;
                        }
                    }
    
                    // cek bentrok guru
                    // $cekGuru = Ampu::where('guru_id',$ranGuru)->pluck('id');
                    $cekIfGuruSlot = Manual::where('slot_id',$ranSlot)->whereIn('ampu_id',$cekI);
                    if ($cekIfGuruSlot->exists()) {
                        continue;
                    }

                    // cek duplikat
                    if (Manual::whereIn('ampu_id',$cekI)
                    ->where('slot_id',$ranSlot)
                    ->exists()) {
                        continue;
                    }
    
                    // akhir kondisi
    
                    // insert data
                    // slot awal
                    $cekHSlotA = Slot::where('id',$ranSlot)->value('hari_id');
                    // slot setelah
                    $cekSlot = Slot::where('id',$ranSlot+1);
                    $cekIdSlot = $cekSlot->value('id');
                    $cekHSlot = $cekSlot->value('hari_id');
                    // slot sebelum
                    $cekSlotS = Slot::where('id',$ranSlot-1);
                    $cekIdSlotS = $cekSlotS->value('id');
                    $cekHSlotS = $cekSlotS->value('hari_id');
                    

                    // jika slot+1 ada & dihari yang sama
                    // dd($cekIdSlotS);
                    if ($cekIdSlot && $cekHSlotA==$cekHSlot) {
                        // cek duplikat slot+1
                        if (Manual::whereIn('ampu_id',$cekI)
                        ->where('slot_id',$cekIdSlot)
                        ->exists()) {
                            continue;
                        }

                        Manual::create([
                            'ampu_id'=>$ranAmpu,
                            'kelas_id'=>$ranKelas,
                            'ruang_id'=>$ranRuang,
                            'slot_id'=>$ranSlot,
                        ]);
                        Manual::create([
                            'ampu_id'=>$ranAmpu,
                            'kelas_id'=>$ranKelas,
                            'ruang_id'=>$ranRuang,
                            'slot_id'=>$ranSlot+1,
                        ]);
                        $b = count(Manual::whereIn('ampu_id',$cekI)->get());
                        continue;
                    }

                    // jika slot-1 ada & dihari yang sama
                    if ($cekIdSlotS && $cekHSlotA==$cekHSlotS) {
                        // cek duplikat slot-1
                        if (Manual::whereIn('ampu_id',$cekI)
                        ->where('slot_id',$cekIdSlotS)
                        ->exists()) {
                            continue;
                        }

                        Manual::create([
                            'ampu_id'=>$ranAmpu,
                            'kelas_id'=>$ranKelas,
                            'ruang_id'=>$ranRuang,
                            'slot_id'=>$ranSlot,
                        ]);
                        Manual::create([
                            'ampu_id'=>$ranAmpu,
                            'kelas_id'=>$ranKelas,
                            'ruang_id'=>$ranRuang,
                            'slot_id'=>$ranSlot-1,
                        ]);
                        $b = count(Manual::whereIn('ampu_id',$cekI)->get());
                        continue;
                    }
                    
    
    
                    // reinitiate
                    $b = count(Manual::whereIn('ampu_id',$cekI)->get());
                }while ($a > $b);
            }else{
                continue;
            }


            // $cekAmpu = ;
            

            // echo $jmlM;
        } while ($jmlM <= $ttlA);
        } catch (\Throwable $th) {
            Alert::error('Error',$th->getMessage());
            return redirect()->route('manual.index');
        }
    }
}