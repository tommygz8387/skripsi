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
        //
        $store = Tingkat::create($request->all());
        if(!$store){
            Alert::error('error','Add Data Failed!');
            return redirect()->route('jurusan.index');
        } else {
            Alert::success('success','Data Added successfully');
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
        //
        $update = Tingkat::updateOrCreate(['id' => $id], $request->all());

        if (!$update) {
            Alert::error('error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('success','Data Updated Successfully');
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
            Alert::error('error','Data Not Found!');
            return redirect()->route('jurusan.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('error','Data Cannot Be Deleted!');
            return redirect()->route('jurusan.index');
        }else{
            Alert::success('success','Data Has Been Deleted!');
            return redirect()->route('jurusan.index');
        }
    }
}
