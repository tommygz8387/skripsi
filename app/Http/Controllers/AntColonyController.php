<?php

namespace App\Http\Controllers;

use App\Models\Ampu;
use App\Models\Guru;
use App\Models\Slot;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ruang;
use App\Models\Manual;
use App\Models\JKhusus;
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

    public function initialisasi(){
        try {
            ini_set('max_execution_time', 100);
            $ttlGuru = count(Guru::all());
            
            // looping total
            for ($i=1; $i <= $ttlGuru; $i++){ 
            // kondisi berhenti dan skip
    
                $totalA = Guru::pluck('jml_ampu')->sum();
                $jmlM = count(Manual::all());
                
                // kondisi berhenti 1
                // jika jumlah jadwal sudah melebihi jumlah maksimal ampu guru
                if ($jmlM>$totalA) {
                    break;
                }
                
                // kondisi berhenti 2
                // jika guru belum memiliki ampu
                $cekI = Ampu::where('guru_id',$i)->pluck('id')->toArray();
                if (!$cekI) {
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
                        $ranRuang = 1;
                        $ranSlot = Arr::random(Slot::pluck('id')->toArray());
        
                        
                        // generate id
                        $getGuruId = $i;
                        $getMapelId = Ampu::where('id',$ranAmpu)->value('mapel_id');
                        
        
                        // kondisi
        
        
                        // cek apakah data ada di jam khusus
                        $cekJK = JKhusus::where('guru_id',$getGuruId)->where('slot_id',$ranSlot)->value('id');
                        if($cekJK){
                            continue;
                        }
        
                        // cek apakah jumlah ampu guru sudah penuh
                        $cekGuru = Guru::where('id',$getGuruId)->value('jml_ampu');
                        $cekIdAmpu = Ampu::where('guru_id',$getGuruId)->pluck('id');
                        $cekIf = count(Manual::whereIn('ampu_id',$cekIdAmpu)->get());
                        if($cekIf>=$cekGuru){
                            continue;
                        }
        
        
                        // cek apakah sudah ada mapel di kelas
                        $cekMapelAmpu = Ampu::where('mapel_id',$getMapelId)->pluck('id');
                        $cekIfMapelKelas = Manual::where('kelas_id',$ranKelas)->whereIn('ampu_id',$cekMapelAmpu);
                        $jmlMapel = count($cekIfMapelKelas->get());
                        // dd($jmlMapel);
                        if ($jmlMapel>=2) {
                            continue;
                        }
                        
                        
                        // cek apakah sudah ada slot di kelas
                        $cekIfSlotKelas = Manual::where('kelas_id',$ranKelas)->where('slot_id',$ranSlot);
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
                        $cekGuru = Ampu::where('guru_id',$getGuruId)->pluck('id');
                        $cekIfGuruSlot = Manual::where('slot_id',$ranSlot)->whereIn('ampu_id',$cekGuru);
                        if ($cekIfGuruSlot->exists()) {
                            continue;
                        }
        
                        // cek duplikat
                        if (Manual::where('ampu_id',$ranAmpu)
                        ->where('kelas_id',$ranKelas)
                        ->where('ruang_id',$ranRuang)
                        ->where('slot_id',$ranSlot)
                        ->exists()) {
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
                        if (count(Manual::whereIn('ampu_id',$x)->get())<$a) {
                            if ($ranSlot+1) {
                                Manual::create([
                                'ampu_id'=>$ranAmpu,
                                'kelas_id'=>$ranKelas,
                                'ruang_id'=>$ranRuang,
                                'slot_id'=>$ranSlot+1,
                            ]);
                        }
                        }
                        
                        
        
        
                        // reinitiate
                        $b = count(Manual::whereIn('ampu_id',$x)->get());
                    }while ($a > $b);
                }else{
                    continue;
                }
            }
    
            Alert::success('Success','Data Generated Successfully');
            return redirect()->route('manual.index');
        } catch (\Throwable $th) {
            Alert::error('Error','Terdapat Error pada Data');
            return redirect()->route('manual.index');
        }
    }

    public function iterasi(Request $request){
        // dd($request->q);
        ini_set('max_execution_time', $request->q);
        try {
        $ttlA = Guru::pluck('jml_ampu')->sum();
        
        do {
            $jmlM=count(Manual::all());
            // jika jumlah jadwal melebihi jumlah ampu
            if ($jmlM>$ttlA) {
                break;
            }

            $ranGuru = Arr::random(Guru::pluck('id')->toArray());
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
                    if ($try> 3*$a) {
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
                    // dd($getSfK->toArray());
                    $ranSlot = Arr::random(Slot::whereNotIn('id',$getSfK)->pluck('id')->toArray());
                    // generate id
                    $getMapelId = $thisAmpu->value('mapel_id');
                    $getNMapel = Mapel::where('id',$getMapelId)->value('nama');

                    // dd(Manual::whereIn('ampu_id',$cekI)
                    // ->where('slot_id',$ranSlot)->get());
                    
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
    
                    // cek apakah sudah ada mapel di kelas
                    $cekMapelAmpu = Ampu::where('mapel_id',$getMapelId)->pluck('id');
                    $cekIfMapelKelas = $thisJadwal->whereIn('ampu_id',$cekMapelAmpu);
                    $jmlMapel = count($cekIfMapelKelas->get());
                    // dd($jmlMapel);
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

                    dd(Manual::whereIn('ampu_id',$cekI)
                    ->where('slot_id',$ranSlot)->get());

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
                    // dd($cekIdSlot!=null && $cekHSlotA==$cekHSlot);
                    // dd($cekHSlotA);
                    if ($a<=count(Manual::whereIn('ampu_id',$cekI)->get())) {
                        continue;
                    }

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



















    public function iterasi2(Request $request){
        // dd($request->q);
        ini_set('max_execution_time', $request->q);
        try {
        $ttlA = Guru::pluck('jml_ampu')->sum();
        
        do {
            $jmlM=count(Manual::all());
            // jika jumlah jadwal melebihi jumlah ampu
            if ($jmlM>$ttlA) {
                break;
            }

            $ranGuru = Arr::random(Guru::pluck('id')->toArray());
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
                    if ($try> 3*$a) {
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
                    // dd($getSfK->toArray());
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
    
                    // cek apakah sudah ada mapel di kelas
                    $cekMapelAmpu = Ampu::where('mapel_id',$getMapelId)->pluck('id');
                    $cekIfMapelKelas = $thisJadwal->whereIn('ampu_id',$cekMapelAmpu);
                    $jmlMapel = count($cekIfMapelKelas->get());
                    // dd($jmlMapel);
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
                    // dd($cekIdSlot!=null && $cekHSlotA==$cekHSlot);
                    // dd($cekHSlotA);
                    if (count(Manual::whereIn('ampu_id',$cekI)->get())<$a) {
                        // tambah slot bawah
                        if ($cekIdSlot && $cekHSlotA==$cekHSlot) {
                            if (Manual::where('ampu_id',$ranAmpu)
                            ->where('kelas_id',$ranKelas)
                            ->where('slot_id',$ranSlot)
                            ->exists()) {
                                continue;
                            }else{

                                if (Manual::where('ampu_id',$ranAmpu)
                                ->where('kelas_id',$ranKelas)
                                ->where('slot_id',$ranSlot+1)
                                ->exists()) {
                                    continue;
                                }else {
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
                            }
                        }

                        // tambah slot atas
                        if ($cekIdSlotS && $cekHSlotA==$cekHSlotS) {
                            if (Manual::where('ampu_id',$ranAmpu)
                            ->where('kelas_id',$ranKelas)
                            ->where('slot_id',$ranSlot)
                            ->exists()) {
                                continue;
                            }else{
                                if (Manual::where('ampu_id',$ranAmpu)
                                ->where('kelas_id',$ranKelas)
                                ->where('slot_id',$ranSlot-1)
                                ->exists()) {
                                    continue;
                                }else{
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
                            }
                        }
                    }else{
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
