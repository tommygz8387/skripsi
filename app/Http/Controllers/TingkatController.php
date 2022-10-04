<?php

namespace App\Http\Controllers;

use App\Models\Tingkat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TingkatController extends Controller
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
        $cek = Tingkat::
        where('tingkat',$request->tingkat)->
        exists();
        
        // dd($cek);
        if ($cek) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('tingkat.index');
        }

        $store = Tingkat::create($request->all());
        if(!$store){
            Alert::error('Error','Add Data Failed!');
            return redirect()->route('jurusan.index');
        } else {
            Alert::success('Success','Data Added successfully');
            return redirect()->route('jurusan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tingkat  $tingkat
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
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // cek duplikat
        $cek = Tingkat::
        where('tingkat',$request->tingkat)->
        exists();
        
        // dd($cek);
        if ($cek) {
            Alert::error('Error','Data Already Exist!');
            return redirect()->route('tingkat.index');
        }
        
        $update = Tingkat::updateOrCreate(['id' => $id], $request->all());

        if (!$update) {
            Alert::error('Error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('Success','Data Updated Successfully');
            return redirect()->route('jurusan.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = Tingkat::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('jurusan.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('jurusan.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('jurusan.index');
        }
    }
}
