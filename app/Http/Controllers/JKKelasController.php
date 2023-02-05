<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use App\Models\Slot;
use App\Models\Kelas;
use App\Models\Waktu;
use App\Models\JKKelas;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JKKelasController extends Controller
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
        $data['dataKelas'] = Kelas::latest()->get();
        $data['dataHari'] = Hari::latest()->get();
        $data['dataWaktu'] = Waktu::latest()->get();
        $data['dataJKKelas'] = JKKelas::with(['kelas','slot'])
        ->latest()
        ->get();
        return view('frontend.jkkelas.index',$data);
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
        // cek duplikat
        $cek = JKKelas::with(['kelas','slot'])->
        where('kelas_id',$request->kelas_id)->
        where('slot_id',$request->slot_id)->
        exists();
        
        
        if ($cek) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('jkkelas.index');
        }

        $cek = Slot::where('hari_id',$request->hari_id)->where('waktu_id',$request->waktu_id)->value('id');
        
        if(!$cek){
            Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
            return redirect()->route('jkkelas.index');
        }

        $store = JKKelas::create(array_merge($request->all(), ['slot_id' => $cek]));
        if(!$store){
            Alert::error('Error','Add Data Failed!');
            return redirect()->route('jkkelas.index');
        } else {
            Alert::success('Success','Data Added successfully');
            return redirect()->route('jkkelas.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JKKelas  $jkkelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JKKelas  $jkkelas
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
     * @param  \App\Models\JKKelas  $jkkelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // cek duplikat
        $cek = JKKelas::with(['kelas','slot'])->
        where('kelas_id',$request->kelas_id)->
        where('slot_id',$request->slot_id)->
        exists();
        
        
        if ($cek) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('jkkelas.index');
        }
        
        $cek2 = Slot::where('hari_id',$request->hari_id)->where('waktu_id',$request->waktu_id)->value('id');
        if(!$cek2){
            Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
            return redirect()->route('jkkelas.index');
        }

        $update = JKKelas::updateOrCreate(['id' => $id], array_merge($request->all(), ['slot_id' => $cek2]));
        if (!$update) {
            Alert::error('Error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('Success','Data Updated Successfully');
            return redirect()->route('jkkelas.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JKKelas  $jkkelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = JKKelas::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('jkkelas.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('jkkelas.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('jkkelas.index');
        }
    }

    public function reset()
    {
        //
        $reset = JKKelas::get();

        // cek data
        if ($reset->isEmpty()) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('jkkelas.index');
        }

        $reset->map->delete();
        if (!$reset) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('jkkelas.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('jkkelas.index');
        }
    }

    public function generate(Request $request)
    {
        $nilai = $request->val;
        $kelas=Kelas::pluck('id')->toArray();
        $slot=Slot::pluck('id')->toArray();

        for ($i=0; $i < $nilai; $i++) { 
            JKKelas::create(['kelas_id' => Arr::random($kelas), 'slot_id' => Arr::random($slot)]);
        }
            Alert::success('Success','Data Has Been Generated!');
            return redirect()->route('jkkelas.index');

    }
}
