<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use App\Models\JKhusus;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Ruang;
use App\Models\Slot;
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
        // $data['dataGuru'] = Guru::latest()->get();
        // $data['dataMapel'] = Mapel::latest()->get();
        // $data['dataJurusan'] = Jurusan::latest()->get();
        // $data['dataKelas'] = Kelas::latest()->get();
        // $data['dataRuang'] = Ruang::latest()->get();
        // $data['dataSlot'] = Slot::latest()->get();
        $data['dataManual'] = Manual::with(['guru','mapel','kelas','ruang','slot'])->oldest()->get();
        // dd($data);
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
        $store = Manual::create($request->all());
        if(!$store){
            Alert::error('error','Add Data Failed!');
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
            Alert::error('error','Data Not Found!');
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
            Alert::error('error','Data Not Found!');
            return redirect()->route('manual.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('error','Data Cannot Be Deleted!');
            return redirect()->route('manual.index');
        }else{
            Alert::success('success','Data Has Been Deleted!');
            return redirect()->route('manual.index');
        }
    }
}
