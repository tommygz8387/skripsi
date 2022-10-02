<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Hari;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;

class SlotController extends Controller
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
        
        // $data=['07:15','08:00','08:45','09:30'];
        // $j=count($data);
        // $jslot = Slot::count();
        // $cek=Hari::where('sisa','>',0)->get();
        // dd($cek);

        $data['dataWaktu'] = Waktu::all();
        $data['dataHari'] = Hari::all();
        $data['dataSlot'] = Slot::with(['hari','waktu'])
        ->orderBy('hari_id', 'asc')
        ->orderBy('waktu_id', 'asc')
        ->get();
        // dd($data);
        return view('frontend.slot.index',$data);
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
        // $sisa=Hari::where('id',$request->hari_id)->value('sisa');
        // $hariUpdate=$sisa-1;

        // $arr = Hari::where('id',$request->hari_id)->get(['id','hari','jml_jam','created_at','updated_at']);
        // // dd($arr);
        // $dataInput = array_merge($arr,['sisa'=>$hariUpdate]);
        
        // Hari::updateOrCreate(['id' => $request->hari_id], $dataInput);
        
        
        $cek = Slot::
        where('hari_id',$request->hari_id)->
        where('waktu_id',$request->waktu_id)
        ->value('id');
        
        // dd($cek);
        if ($cek) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('slot.index');
        }
        
        $store = Slot::create($request->all());
        if(!$store){
            Alert::error('Error','Add Data Failed!');
            return redirect()->route('slot.index');
        } else {
            // Hari::updateOrCreate(['id' => $request->hari_id], ['sisa' => $hariUpdate]);
            Alert::success('Success','Data Added successfully');
            return redirect()->route('slot.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $slot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cek2 = Slot::
        where('hari_id',$request->hari_id)->
        where('waktu_id',$request->waktu_id)
        ->value('id');
        
        // dd($cek2);
        if ($cek2) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('slot.index');
        } 
        
        $update = Slot::updateOrCreate(['id' => $id], $request->all());
        if (!$update) {
            Alert::error('Error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('Success','Data Updated Successfully');
            return redirect()->route('slot.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy=Slot::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('slot.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('slot.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('slot.index');
        }
    }
}