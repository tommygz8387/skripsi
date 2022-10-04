<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use App\Models\JKhusus;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Ruang;
use App\Models\Slot;
use App\Models\Hari;
use App\Models\Waktu;
use App\Models\Ampu;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;

class ManualController extends Controller
{
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
        $data['dataManual'] = Manual::with(['ampu','kelas','ruang','slot'])->latest()->get();
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

        // cek apakah jumlah ampu guru sudah penuh
        $cekGuru = Guru::where('id',$request->guru_id)->value('jml_ampu');
        $cekIdAmpu = Ampu::where('guru_id',$request->guru_id)->pluck('id');
        // dd($cekIdAmpu);
        // $cekIf = Manual::whereIn('ampu_id',$cekIdAmpu)->get();
        $cekIf = count(Manual::whereIn('ampu_id',$cekIdAmpu)->get());
        // dd($cekIf);
        if($cekIf>=$cekGuru){
            Alert::error('Error','Jumlah Ampu Guru Sudah Terpenuhi!');
            return redirect()->route('manual.index');
        }

        // cek duplikat
        if (Manual::where('ampu_id',$cekAmpu)
        ->where('kelas_id',$request->kelas)
        ->where('ruang_id',$request->ruang)
        ->where('slot_id',$cekSlot)
        ->exists()
        ) {
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
        $update = Manual::updateOrCreate(['id' => $id], $request->all());
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
        $destroy = Manual::find($id);

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
}
