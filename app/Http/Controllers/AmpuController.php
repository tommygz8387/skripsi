<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ampu;
use App\Models\Guru;
use App\Models\Hari;
use App\Models\Mapel;
use App\Models\Waktu;
use App\Models\Tingkat;
use App\Exports\AmpuExport;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class AmpuController extends Controller
{
    private $ampu;
    public function __construct()
    {
        $this->ampu = Ampu::with(['guru','mapel','tingkat']);
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
        $data['dataTingkat'] = Tingkat::all();
        $data['dataAmpu'] = $this->ampu->latest()->get();
        return view('frontend.ampu.index',$data);
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
        //cek duplikasi
        $cek = $this->ampu->
        where('guru_id',$request->guru_id)->
        where('mapel_id',$request->mapel_id)->
        where('tingkat_id',$request->tingkat_id)->
        where('beban',$request->beban)->
        exists();
        
        // dd($cek);
        if ($cek) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('ampu.index');
        }

        $store = $this->ampu->create($request->all());
        if(!$store){
            Alert::error('Error','Add Data Failed!');
            return redirect()->route('ampu.index');
        } else {
            Alert::success('Success','Data Added successfully');
            return redirect()->route('ampu.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ampu  $ampu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ampu  $ampu
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
     * @param  \App\Models\Ampu  $ampu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //cek duplikasi
        $cek = $this->ampu->
        where('guru_id',$request->guru_id)->
        where('mapel_id',$request->mapel_id)->
        where('tingkat_id',$request->tingkat_id)->
        where('beban',$request->beban)->
        exists();
        
        // dd($cek);
        if ($cek) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('ampu.index');
        }
        
        $update = Ampu::updateOrCreate(['id' => $id], $request->all());

        if (!$update) {
            Alert::error('Error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('Success','Data Updated Successfully');
            return redirect()->route('ampu.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ampu  $ampu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = $this->ampu->find($id);

        // cek data
        if (!$destroy) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('ampu.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('ampu.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('ampu.index');
        }
    }

    public function reset()
    {
        //
        $reset = $this->ampu->get();
        // dd($reset);

        // cek data
        if ($reset->isEmpty()) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('ampu.index');
        }

        $reset->map->delete();
        if ($reset->isEmpty()) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('ampu.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('ampu.index');
        }
    }

    public function seed()
    {
        $cek = $this->ampu->get();

        if ($cek->isEmpty()) {
            Ampu::factory(40)->create();
            Alert::success('Success','Data Has Been Generated!');
            return redirect()->route('ampu.index');
        } else {
            Alert::error('Error','Data Isn\'t Empty!');
            return redirect()->route('ampu.index');
        }

    }

    public function export()
    {
        $today = Carbon::now('GMT+7');
        $nama = $today->month . $today->day . $today->hour . $today->minute . '-data-ampu.xlsx';
        return Excel::download(new AmpuExport, $nama);
    }
}
