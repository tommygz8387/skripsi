<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
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
        $data['dataJurusan'] = Jurusan::orderBy('created_at', 'DESC')->get();
        $data['dataKelas'] = Kelas::with('jurusan')->orderBy('created_at', 'DESC')->get();
        // dd($data);
        return view('frontend.kelas.index',$data);
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
        $store = Kelas::create($request->all());
        if(!$store){
            Alert::error('error','Add Data Failed!');
            return redirect()->route('kelas.index');
        } else {
            Alert::success('success','Data Added successfully');
            return redirect()->route('kelas.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $data['dataKelas'] = Kelas::orderBy('created_at', 'DESC')->get();
        // $data['edit'] = Kelas::find($id);
        // if(!$data['edit']){
        //     Alert::error('error','Data Not Found!');
        //     return redirect()->route('kelas.index');
        // }
        // return view('frontend.kelas.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update = Kelas::updateOrCreate(['id' => $id], $request->all());

        if (!$update) {
            Alert::error('error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('success','Data Updated Successfully');
            return redirect()->route('kelas.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = Kelas::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('error','Data Not Found!');
            return redirect()->route('kelas.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('error','Data Cannot Be Deleted!');
            return redirect()->route('kelas.index');
        }else{
            Alert::success('success','Data Has Been Deleted!');
            return redirect()->route('kelas.index');
        }
    }
}
