<?php

namespace App\Http\Controllers;

use App\Models\JKhusus;
use App\Models\Guru;
use App\Models\Hari;
use App\Models\Waktu;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;

class JKhususController extends Controller
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
        $data['dataGuru'] = Guru::latest()->get();
        $data['dataHari'] = Hari::latest()->get();
        $data['dataWaktu'] = Waktu::latest()->get();
        $data['dataJKhusus'] = JKhusus::with(['guru','slot'])
        ->oldest()
        ->get();
        // dd($data);
        return view('frontend.jkhusus.index',$data);
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
        $cek = JKhusus::
        where('guru_id',$request->guru_id)->
        where('slot_id',$request->slot_id)->
        exists();
        
        // dd($cek);
        if ($cek) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('jkhusus.index');
        }

        // $cekHari = $request->get('hari_id');
        // $cekWaktu = $request->get('waktu_id');
        $cek = Slot::where('hari_id',$request->hari_id)->where('waktu_id',$request->waktu_id)->value('id');
        // dd($cek);
        if(!$cek){
            Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
            return redirect()->route('jkhusus.index');
        }
        // $store = JKhusus::create($request->all());
        $store = JKhusus::create(array_merge($request->all(), ['slot_id' => $cek]));
        if(!$store){
            Alert::error('Error','Add Data Failed!');
            return redirect()->route('jkhusus.index');
        } else {
            // Hari::updateOrCreate(['id' => $request->hari_id], ['sisa' => $hariUpdate]);
            Alert::success('Success','Data Added successfully');
            return redirect()->route('jkhusus.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JKhusus  $jKhusus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JKhusus  $jKhusus
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
     * @param  \App\Models\JKhusus  $jKhusus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // cek duplikat
        $cek = JKhusus::
        where('guru_id',$request->guru_id)->
        where('slot_id',$request->slot_id)->
        exists();
        
        // dd($cek);
        if ($cek) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('jkhusus.index');
        }
        
        $cek = Slot::where('hari_id',$request->hari_id)->where('waktu_id',$request->waktu_id)->value('id');
        // dd($cek);
        if(!$cek){
            Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
            return redirect()->route('jkhusus.index');
        }

        $update = JKhusus::updateOrCreate(['id' => $id], array_merge($request->all(), ['slot_id' => $cek]));
        if (!$update) {
            Alert::error('Error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('Success','Data Updated Successfully');
            return redirect()->route('jkhusus.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JKhusus  $jKhusus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = JKhusus::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('jkhusus.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('jkhusus.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('jkhusus.index');
        }
    }

    public function reset()
    {
        //
        $reset = JKhusus::truncate();
        // dd($reset);

        // cek data
        if (!$reset) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('jkhusus.index');
        }

        // $reset->delete();
        if (!$reset) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('jkhusus.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('jkhusus.index');
        }
    }
}
