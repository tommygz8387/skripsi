<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Hari;
use App\Models\Slot;
use App\Models\Waktu;
use App\Models\JKhusus;
use Illuminate\Http\Request;
use App\Exports\JKhususExport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class JKhususController extends Controller
{
    private $jkhusus;
    public function __construct()
    {
        $this->jkhusus = JKhusus::with(['guru','slot']);
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
        $data['dataJKhusus'] = $this->jkhusus
        ->latest()
        ->get();
        return view('frontend.jkhusus.index',$data);
        // $data = Slot::where('hari_id',2)->get();
        // dd($data->waktu_id);
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
        $cek = $this->jkhusus->
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
        // $store = $this->jkhusus->create($request->all());
        $store = $this->jkhusus->create(array_merge($request->all(), ['slot_id' => $cek]));
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
        $cek = $this->jkhusus->
        where('guru_id',$request->guru_id)->
        where('slot_id',$request->slot_id)->
        exists();
        
        // dd($cek);
        if ($cek) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('jkhusus.index');
        }
        
        $cek2 = Slot::where('hari_id',$request->hari_id)->where('waktu_id',$request->waktu_id)->value('id');
        // dd($cek2);
        if(!$cek2){
            Alert::error('Error','Tidak Ada Waktu Pelajaran Pada Hari dan Jam Tersebut!');
            return redirect()->route('jkhusus.index');
        }

        $update = JKhusus::updateOrCreate(['id' => $id], array_merge($request->all(), ['slot_id' => $cek2]));
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
        $destroy = $this->jkhusus->find($id);

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
        $reset = $this->jkhusus->get();
        // dd($reset);

        // cek data
        if ($reset->isEmpty()) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('jkhusus.index');
        }

        $reset->map->delete();
        if (!$reset) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('jkhusus.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('jkhusus.index');
        }
    }

    public function seed()
    {
        $cek = $this->jkhusus->get();

        if ($cek->isEmpty()) {
            JKhusus::factory(20)->create();
            Alert::success('Success','Data Has Been Generated!');
            return redirect()->route('jkhusus.index');
        } else {
            Alert::error('Error','Data Isn\'t Empty!');
            return redirect()->route('jkhusus.index');
        }

    }

    public function export()
    {
        $today = Carbon::now('GMT+7');
        $nama = $today->month . $today->day . $today->hour . $today->minute . '-data-jkhusus.xlsx';
        return Excel::download(new JKhususExport, $nama);
    }

    public function getSlot(Request $request)
    {
        $hari = $request->awe;

        $slots = Slot::with('waktu')->select('id','hari_id','waktu_id')->where('hari_id',$hari)->get();
        // dd($slots);

        foreach ($slots as $slot) {
            $isi = $slot->waktu->jam_mulai.'-'.$slot->waktu->jam_selesai;
            echo "<option value='$slot->waktu_id'>$isi</option>";
            // echo "<option>awe</option>";
        }
        // for ($i = 0; $i < count($slots); $i++){
        //     echo "<option value='$i'>'$slots->id'</option>";
        // }
        // return response()->json($slots);
    }
}
