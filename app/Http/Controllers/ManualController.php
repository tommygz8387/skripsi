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
        //
        $data['dataGuru'] = Guru::all();
        $data['dataMapel'] = Mapel::all();
        $data['dataJurusan'] = Jurusan::all();
        $data['dataKelas'] = Kelas::all();
        $data['dataRuang'] = Ruang::all();
        $data['dataSlot'] = Slot::all();
        $data['dataHari'] = Hari::all();
        $data['dataWaktu'] = Waktu::all();
        $data['dataManual'] = Manual::with(['guru','mapel','kelas','ruang','slot'])->latest()->get();
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
        //
        $cek = Slot::where('hari_id',$request->hari_id)->where('waktu_id',$request->waktu_id)->value('id');
        // dd($cek);
        if(!$cek){
            Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
            return redirect()->route('manual.index');
        }
        $cekGuru = Guru::where('id',$request->guru_id)->value('jml_ampu');
        // dd($cekGuru);
        
        if(count(Manual::where('guru_id',$request->guru_id)->get())>=$cekGuru){
            Alert::error('Error','Jumlah Ampu Guru Sudah Terpenuhi! 
            Silahkan Isi Jadwal Untuk Guru Lain.');
            return redirect()->route('manual.index');
        }
        $store = Manual::create(array_merge($request->all(), ['slot_id' => $cek]));
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
