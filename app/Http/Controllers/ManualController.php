<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
use Illuminate\Http\Request;
use App\Exports\ManualExport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ManualController extends Controller
{
    private $manual;
    public function __construct()
    {
        $this->manual = Manual::with(['ampu','kelas','ruang','slot']);
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //
        // $cekIf = Manual::find(1)->ampu;
        // dd($cekIf);

        $data['dataGuru'] = Guru::all();
        $data['dataMapel'] = Mapel::all();
        $data['dataJurusan'] = Jurusan::all();
        $data['dataKelas'] = Kelas::all();
        $data['dataRuang'] = Ruang::all();
        $data['dataSlot'] = Slot::all();
        $data['dataHari'] = Hari::all();
        $data['dataWaktu'] = Waktu::all();
        $data['dataManual'] = $this->manual->latest()->get();
        // dd($data);
        return view('frontend.manual.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // cek apakah guru bisa mengajar mapel tersebut
        $cekAmpu = Ampu::where('guru_id',$request->guru_id)->where('mapel_id',$request->mapel_id)->value('id');
        // dd($cekAmpu);
        if(!$cekAmpu){
            Alert::error('Error','Guru Tidak Mengampu Mata Pelajaran Tersebut!');
            return redirect()->route('manual.index');
        }

        // cek apakah slot ajar ada
        $cekSlot = Slot::where('hari_id',$request->hari_id)->where('waktu_id',$request->waktu_id)->value('id');
        // dd($cekSlot);
        if(!$cekSlot){
            Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
            return redirect()->route('manual.index');
        }

        // cek apakah data ada di jam khusus
        $cekJK = JKhusus::where('guru_id',$request->guru_id)->where('slot_id',$cekSlot)->value('id');
        // dd($cekJK);
        if($cekJK){
            Alert::error('Error','Guru Tidak Bisa Mengajar Di Waktu Tersebut! Cek Jam Khusus');
            return redirect()->route('manual.index');
        }

        // cek apakah jumlah ampu guru sudah penuh
        $cekGuru = Guru::where('id',$request->guru_id)->value('jml_ampu');
        $cekIdAmpu = Ampu::where('guru_id',$request->guru_id)->pluck('id');
        // dd($cekIdAmpu);
        // $cekIf = Manual::whereIn('ampu_id',$cekIdAmpu)->get();
        $cekIf = count($this->manual->whereIn('ampu_id',$cekIdAmpu)->get());
        // dd($cekIf);
        if($cekIf>=$cekGuru){
            Alert::error('Error','Jumlah Ampu Guru Sudah Terpenuhi!');
            return redirect()->route('manual.index');
        }

        // cek apakah sudah ada mapel di kelas
        $cekMapelAmpu = Ampu::where('mapel_id',$request->mapel_id)->pluck('id');
        // dd($cekMapelAmpu);
        $cekIfMapelKelas = Manual::where('kelas_id',$request->kelas_id)->whereIn('ampu_id',$cekMapelAmpu);
        // dd($cekIfMapelKelas->exists());
        if ($cekIfMapelKelas->exists()) {
            Alert::error('Error','Mapel yang sama tidak boleh ada pada satu kelas!');
            return redirect()->route('manual.index');
        }
        
        
        // cek apakah sudah ada slot di kelas
        // dd($cekMapelAmpu);
        $cekIfSlotKelas = Manual::where('kelas_id',$request->kelas_id)->where('slot_id',$cekSlot);
        // dd($cekIfSlotKelas->exists());
        if ($cekIfSlotKelas->exists()) {
            Alert::error('Error','Slot ajar dikelas tersebut sudah terisi!');
            return redirect()->route('manual.index');
        }
        
        
        // cek bentrok ruang
        $cekIfSlotRuang = Manual::where('ruang_id',$request->ruang_id)->where('slot_id',$cekSlot);
        // dd($cekIfSlotRuang->exists());
        if ($cekIfSlotRuang!=1) {
            if ($cekIfSlotRuang->exists()) {
                Alert::error('Error','Ruang pada hari dan jam tersebut telah terpakai!');
                return redirect()->route('manual.index');
            }
        }

        // cek duplikat
        if ($this->manual->where('ampu_id',$cekAmpu)
        ->where('kelas_id',$request->kelas_id)
        ->where('ruang_id',$request->ruang_id)
        ->where('slot_id',$cekSlot)
        ->exists()) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('manual.index');
        }

        // simpan data
        $store = Manual::create(array_merge($request->all(), ['ampu_id' => $cekAmpu,'slot_id' => $cekSlot]));
        if(!$store){
            Alert::error('Error','Add Data Failed!');
            return redirect()->route('manual.index');
        } else {
            Alert::success('success','Data Added successfully');
            return redirect()->route('manual.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // cek apakah guru bisa mengajar mapel tersebut
        $cekAmpu = Ampu::where('guru_id',$request->guru_id)->where('mapel_id',$request->mapel_id)->value('id');
        // dd($cekAmpu);
        if(!$cekAmpu){
            Alert::error('Error','Guru Tidak Mengampu Mata Pelajaran Tersebut!');
            return redirect()->route('manual.index');
        }

        // cek apakah slot ajar ada
        $cekSlot = Slot::where('hari_id',$request->hari_id)->where('waktu_id',$request->waktu_id)->value('id');
        // dd($cekSlot);
        if(!$cekSlot){
            Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
            return redirect()->route('manual.index');
        }

        // cek apakah data ada di jam khusus
        $cekJK = JKhusus::where('guru_id',$request->guru_id)->where('slot_id',$cekSlot)->value('id');
        // dd($cekJK);
        if($cekJK){
            Alert::error('Error','Guru Tidak Bisa Mengajar Di Waktu Tersebut! Cek Jam Khusus');
            return redirect()->route('manual.index');
        }

        // cek apakah jumlah ampu guru sudah penuh
        $cekGuru = Guru::where('id',$request->guru_id)->value('jml_ampu');
        $cekIdAmpu = Ampu::where('guru_id',$request->guru_id)->pluck('id');
        // dd($cekIdAmpu);
        // $cekIf = Manual::whereIn('ampu_id',$cekIdAmpu)->get();
        $cekIf = count($this->manual->whereIn('ampu_id',$cekIdAmpu)->get());
        // dd($cekIf);
        if($cekIf>=$cekGuru){
            Alert::error('Error','Jumlah Ampu Guru Sudah Terpenuhi!');
            return redirect()->route('manual.index');
        }

        // cek apakah sudah ada mapel di kelas
        $cekMapelAmpu = Ampu::where('mapel_id',$request->mapel_id)->pluck('id');
        // dd($cekMapelAmpu);
        $cekIfMapelKelas = Manual::where('kelas_id',$request->kelas_id)->whereIn('ampu_id',$cekMapelAmpu);
        // dd($cekIfMapelKelas->exists());
        if ($cekIfMapelKelas->exists()) {
            Alert::error('Error','Mapel yang sama tidak boleh ada pada satu kelas!');
            return redirect()->route('manual.index');
        }
        
        
        // cek apakah sudah ada slot di kelas
        // dd($cekMapelAmpu);
        $cekIfSlotKelas = Manual::where('kelas_id',$request->kelas_id)->where('slot_id',$cekSlot);
        // dd($cekIfSlotKelas->exists());
        if ($cekIfSlotKelas->exists()) {
            Alert::error('Error','Slot ajar dikelas tersebut sudah terisi!');
            return redirect()->route('manual.index');
        }
        
        
        // cek bentrok ruang
        $cekIfSlotRuang = Manual::where('ruang_id',$request->ruang_id)->where('slot_id',$cekSlot);
        // dd($cekIfSlotRuang->exists());
        if ($cekIfSlotRuang!=1) {
            if ($cekIfSlotRuang->exists()) {
                Alert::error('Error','Ruang pada hari dan jam tersebut telah terpakai!');
                return redirect()->route('manual.index');
            }
        }

        // cek duplikat
        if ($this->manual->where('ampu_id',$cekAmpu)
        ->where('kelas_id',$request->kelas_id)
        ->where('ruang_id',$request->ruang_id)
        ->where('slot_id',$cekSlot)
        ->exists()) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('manual.index');
        }

        $update = Manual::updateOrCreate(['id' => $id], array_merge($request->all(), ['ampu_id' => $cekAmpu,'slot_id' => $cekSlot]));
        if (!$update) {
            Alert::error('Error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('success','Data Updated Successfully');
            return redirect()->route('manual.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = $this->manual->find($id);

        // cek data
        if (!$destroy) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('manual.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('manual.index');
        }else{
            Alert::success('success','Data Has Been Deleted!');
            return redirect()->route('manual.index');
        }
    }

    public function reset()
    {
        //
        $reset = $this->manual->get();
        // dd($reset);

        // cek data
        if ($reset->isEmpty()) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('manual.index');
        }

        $reset->map->delete();
        if ($reset->isEmpty()) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('manual.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('manual.index');
        }
    }

    public function seed()
    {
        $cek = $this->manual->get();

        if ($cek->isEmpty()) {
            Manual::factory(50)->create();
            Alert::success('Success','Data Has Been Generated!');
            return redirect()->route('manual.index');
        } else {
            Alert::error('Error','Data Isn\'t Empty!');
            return redirect()->route('manual.index');
        }

    }

    public function export()
    {
        $today = Carbon::now('GMT+7');
        $nama = $today->month . $today->day . $today->hour . $today->minute . '-data-manual.xlsx';
        return Excel::download(new ManualExport, $nama);
    }

    public function getAmpu(Request $request)
    {
        $guru = $request->ampu;

        $ampus = Ampu::with('mapel')->select('id','guru_id','mapel_id')->where('guru_id',$guru)->get();
        // dd($ampus);

        foreach ($ampus as $ampu) {
            $isi = $ampu->mapel->nama;
            echo "<option value='$ampu->mapel_id'>$isi</option>";
            // echo "<option>awe</option>";
        }
    }
}
