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
use App\Models\JKKelas;
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
    // public function store(Request $request)
    // {
    //     $data = new Manual();
    //     $data->hari_id = $request->hari_id;
    //     $data->waktu_id = $request->waktu_id;
    //     $data->kelas_id = $request->kelas_id;
    //     $data->guru_id = $request->guru_id;
    //     $data->mapel_id = $request->mapel_id;
    //     $data->ruang_id = $request->ruang_id;
    //     // cek apakah guru bisa mengajar mapel tersebut
    //     $cekAmpu = Ampu::where('guru_id',$data->guru_id)->where('mapel_id',$data->mapel_id)->value('id');
    //     if(!$cekAmpu){
    //         // Alert::error('Error','Guru Tidak Mengampu Mata Pelajaran Tersebut!');
    //         return response()->json(['data'=>$data,'teks'=>'Guru Tidak Mengampu Mata Pelajaran Tersebut!']);
    //     }

    //     // cek apakah slot ajar ada
    //     $cekSlot = Slot::where('hari_id',$data->hari_id)->where('waktu_id',$data->waktu_id)->value('id');
    //     if(!$cekSlot){
    //         // Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
    //         return response()->json(['data'=>$data,'teks'=>'Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!']);
    //     }

    //     // cek apakah data ada di jam khusus
    //     $cekJK = JKhusus::where('guru_id',$data->guru_id)->where('slot_id',$cekSlot)->value('id');
    //     if($cekJK){
    //         // Alert::error('Error','Guru Tidak Bisa Mengajar Di Waktu Tersebut! Cek Jam Khusus');
    //         return response()->json(['data'=>$data,'teks'=>'Guru Tidak Bisa Mengajar Di Waktu Tersebut! Cek Jam Khusus']);
    //     }

    //     // cek apakah data ada di jam khusus kelas
    //     $cekJK = JKKelas::where('kelas_id',$data->kelas_id)->where('slot_id',$cekSlot)->value('id');
    //     if($cekJK){
    //         // Alert::error('Error','Tidak boleh ada jadwal pada jam tersebut! Cek jam khusus kelas');
    //         return response()->json(['data'=>$data,'teks'=>'Tidak boleh ada jadwal pada jam tersebut! Cek jam khusus kelas']);
    //     }

    //     // cek apakah jumlah ampu guru sudah penuh
    //     $cekGuru = Guru::where('id',$data->guru_id)->value('jml_ampu');
    //     $cekIdAmpu = Ampu::where('guru_id',$data->guru_id)->pluck('id');
    //     $cekIf = count($this->manual->whereIn('ampu_id',$cekIdAmpu)->get());
        
    //     if($cekIf>=$cekGuru){
    //         // Alert::error('Error','Jumlah Ampu Guru Sudah Terpenuhi!');
    //         return response()->json(['data'=>$data,'teks'=>'Jumlah Ampu Guru Sudah Terpenuhi!']);
    //     }

    //     // cek apakah sudah ada mapel di kelas
    //     $cekMapelAmpu = Ampu::where('mapel_id',$data->mapel_id)->pluck('id');
    //     $cekIfMapelKelas = Manual::where('kelas_id',$data->kelas_id)->whereIn('ampu_id',$cekMapelAmpu);
        
    //     if ($cekIfMapelKelas->exists()) {
    //         // Alert::error('Error','Mapel sudah ada di kelas tersebut!');
    //         return response()->json(['data'=>$data,'teks'=>'Mapel sudah ada di kelas tersebut!']);
    //     }
        
        
    //     // cek apakah sudah ada slot di kelas
    //     $cekIfSlotKelas = Manual::where('kelas_id',$data->kelas_id)->where('slot_id',$cekSlot);
    //     if ($cekIfSlotKelas->exists()) {
    //         // Alert::error('Error','Slot ajar dikelas tersebut sudah terisi!');
    //         return response()->json(['data'=>$data,'teks'=>'Slot ajar dikelas tersebut sudah terisi!']);
    //     }
        
        
    //     // cek bentrok ruang
    //     $cekIfSlotRuang = Manual::where('ruang_id',$data->ruang_id)->where('slot_id',$cekSlot);
    //     if ($data->ruang_id!=1) {
    //         if ($cekIfSlotRuang->exists()) {
    //             // Alert::error('Error','Jadwal Ruang Bentrok!');
    //             return response()->json(['data'=>$data,'teks'=>'Jadwal Ruang Bentrok!']);
    //         }
    //     }

    //     // cek bentrok guru
    //     $cekIfGuruSlot = Manual::where('slot_id',$cekSlot)->whereIn('ampu_id',$cekIdAmpu);
    //     if ($cekIfGuruSlot->exists()) {
    //         // Alert::error('Error','Jadwal Guru Bentrok!');
    //         return response()->json(['data'=>$data,'teks'=>'Jadwal Guru Bentrok!']);
    //     }

    //     // cek duplikat
    //     if ($this->manual->where('ampu_id',$cekAmpu)
    //     ->where('kelas_id',$data->kelas_id)
    //     ->where('ruang_id',$data->ruang_id)
    //     ->where('slot_id',$cekSlot)
    //     ->exists()) {
    //         // Alert::error('Error','Data Already Exist!');
    //         return response()->json(['data'=>$data,'teks'=>'Data Already Exist!']);
    //     }

    //     // simpan data
    //     $store = Manual::create(array_merge($data, ['ampu_id' => $cekAmpu,'slot_id' => $cekSlot]));
    //     if(!$store){
    //         // Alert::error('Error','Add Data Failed!');
    //         return response()->json(['data'=>$data,'teks'=>'Add Data Failed!']);
    //     } else {
    //         // Alert::success('success','Data Added successfully');
    //         return response()->json(['data'=>$data,'teks'=>'Data Added successfully']);
    //     }
    // }

    public function store(Request $request)
    {
        // cek apakah guru bisa mengajar mapel tersebut
        $cekAmpu = Ampu::where('guru_id',$request->guru_id)->where('mapel_id',$request->mapel_id)->value('id');
        if(!$cekAmpu){
            Alert::error('Error','Guru Tidak Mengampu Mata Pelajaran Tersebut!');
            return redirect()->route('manual.index');
        }

        // cek apakah slot ajar ada
        $cekSlot = Slot::where('hari_id',$request->hari_id)->where('waktu_id',$request->waktu_id)->value('id');
        if(!$cekSlot){
            Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
            return redirect()->route('manual.index');
        }

        // cek apakah data ada di jam khusus
        $cekJK = JKhusus::where('guru_id',$request->guru_id)->where('slot_id',$cekSlot)->value('id');
        if($cekJK){
            Alert::error('Error','Guru Tidak Bisa Mengajar Di Waktu Tersebut! Cek Jam Khusus');
            return redirect()->route('manual.index');
        }

        // cek apakah data ada di jam khusus kelas
        $cekJK = JKKelas::where('kelas_id',$request->kelas_id)->where('slot_id',$cekSlot)->value('id');
        if($cekJK){
            Alert::error('Error','Tidak boleh ada jadwal pada jam tersebut! Cek jam khusus kelas');
            return redirect()->route('manual.index');
        }

        // cek apakah jumlah ampu guru sudah penuh
        $cekGuru = Guru::where('id',$request->guru_id)->value('jml_ampu');
        $cekIdAmpu = Ampu::where('guru_id',$request->guru_id)->pluck('id');
        $cekIf = count($this->manual->whereIn('ampu_id',$cekIdAmpu)->get());
        
        if($cekIf>=$cekGuru){
            Alert::error('Error','Jumlah Ampu Guru Sudah Terpenuhi!');
            return redirect()->route('manual.index');
        }

        // cek apakah sudah ada mapel di kelas
        $cekMapelAmpu = Ampu::where('mapel_id',$request->mapel_id)->pluck('id');
        $cekIfMapelKelas = Manual::where('kelas_id',$request->kelas_id)->whereIn('ampu_id',$cekMapelAmpu);
        
        if ($cekIfMapelKelas->exists()) {
            Alert::error('Error','Mapel sudah ada di kelas tersebut!');
            return redirect()->route('manual.index');
        }
        
        
        // cek apakah sudah ada slot di kelas
        $cekIfSlotKelas = Manual::where('kelas_id',$request->kelas_id)->where('slot_id',$cekSlot);
        if ($cekIfSlotKelas->exists()) {
            Alert::error('Error','Slot ajar dikelas tersebut sudah terisi!');
            return redirect()->route('manual.index');
        }
        
        
        // cek bentrok ruang
        $cekIfSlotRuang = Manual::where('ruang_id',$request->ruang_id)->where('slot_id',$cekSlot);
        if ($request->ruang_id!=1) {
            if ($cekIfSlotRuang->exists()) {
                Alert::error('Error','Jadwal Ruang Bentrok!');
                return redirect()->route('manual.index');
            }
        }

        // cek bentrok guru
        $cekIfGuruSlot = Manual::where('slot_id',$cekSlot)->whereIn('ampu_id',$cekIdAmpu);
        if ($cekIfGuruSlot->exists()) {
            Alert::error('Error','Jadwal Guru Bentrok!');
            return redirect()->route('manual.index');
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
    public function edit(Request $request, $id)
    {
        //
        $id = $request->id;
        $data = Manual::with(['ampu','kelas','ruang','slot'])->find($id);
        return response()->json(['data'=>$data]);
    }

    public function del(Request $request, $id)
    {
        //
        $id = $request->id;
        $data = Manual::find($id);
        return response()->json(['data'=>$data]);
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
        if(!$cekAmpu){
            Alert::error('Error','Guru Tidak Mengampu Mata Pelajaran Tersebut!');
            return redirect()->route('manual.index');
        }

        // cek apakah slot ajar ada
        $cekSlot = Slot::where('hari_id',$request->hari_id)->where('waktu_id',$request->waktu_id)->value('id');
        if(!$cekSlot){
            Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
            return redirect()->route('manual.index');
        }

        // cek apakah data ada di jam khusus
        $cekJK = JKhusus::where('guru_id',$request->guru_id)->where('slot_id',$cekSlot)->value('id');
        if($cekJK){
            Alert::error('Error','Guru Tidak Bisa Mengajar Di Waktu Tersebut! Cek Jam Khusus');
            return redirect()->route('manual.index');
        }

        // cek apakah data ada di jam khusus kelas
        $cekJK = JKKelas::where('kelas_id',$request->kelas_id)->where('slot_id',$cekSlot)->value('id');
        if($cekJK){
            Alert::error('Error','Tidak boleh ada jadwal pada jam tersebut! Cek jam khusus kelas');
            return redirect()->route('manual.index');
        }

        // cek apakah jumlah ampu guru sudah penuh
        $cekGuru = Guru::where('id',$request->guru_id)->value('jml_ampu');
        $cekIdAmpu = Ampu::where('guru_id',$request->guru_id)->pluck('id');
        $cekIf = count($this->manual->whereIn('ampu_id',$cekIdAmpu)->get());
        
        if($cekIf>=$cekGuru){
            Alert::error('Error','Jumlah Ampu Guru Sudah Terpenuhi!');
            return redirect()->route('manual.index');
        }

        // cek apakah sudah ada mapel di kelas
        $cekMapelAmpu = Ampu::where('mapel_id',$request->mapel_id)->pluck('id');
        $cekIfMapelKelas = Manual::where('kelas_id',$request->kelas_id)->whereIn('ampu_id',$cekMapelAmpu);

        if ($cekIfMapelKelas->exists()) {
            Alert::error('Error','Mapel sudah ada di kelas tersebut!');
            return redirect()->route('manual.index');
        }
        
        
        // cek apakah sudah ada slot di kelas
        $cekIfSlotKelas = Manual::where('kelas_id',$request->kelas_id)->where('slot_id',$cekSlot);
        if ($cekIfSlotKelas->exists()) {
            Alert::error('Error','Slot ajar dikelas tersebut sudah terisi!');
            return redirect()->route('manual.index');
        }
        
        
        // cek bentrok ruang
        $cekIfSlotRuang = Manual::where('ruang_id',$request->ruang_id)->where('slot_id',$cekSlot);
        if ($request->ruang_id!=1) {
            if ($cekIfSlotRuang->exists()) {
                Alert::error('Error','Jadwal Ruang Bentrok!');
                return redirect()->route('manual.index');
            }
        }

        // cek bentrok guru
        $cekGuru = Ampu::where('guru_id',$request->guru_id)->pluck('id');
        $cekIfGuruSlot = Manual::where('slot_id',$cekSlot)->whereIn('ampu_id',$cekGuru);

        if ($cekIfGuruSlot->exists()) {
            Alert::error('Error','Jadwal Guru Bentrok!');
            return redirect()->route('manual.index');
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

        $ampus = Ampu::with(['mapel','tingkat'])->select('id','guru_id','mapel_id','tingkat_id')->where('guru_id',$guru)->get();
        // dd($ampus);

        foreach ($ampus as $ampu) {
            $isi = $ampu->mapel->nama.'-'.$ampu->tingkat->tingkat;
            // $tkt = $ampu->tingkat->tingkat;
            echo "<option value='$ampu->mapel_id'>$isi</option>";
            // echo "<option>awe</option>";
        }
    }
}
