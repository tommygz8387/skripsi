<?php

namespace App\Http\Controllers;

use App\Models\Waktu;
use App\Models\Hari;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WaktuController extends Controller
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
        $data['dataWaktu'] = Waktu::latest()->get();
        $data['dataHari'] = Hari::latest()->get();
        return view('frontend.waktu.index',$data);
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
        $store = Waktu::create($request->all());
        if(!$store){
            Alert::error('Error','Add Data Failed!');
            return redirect()->route('waktu.index');
        } else {
            Alert::success('Success','Data Added successfully');
            return redirect()->route('waktu.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function show(Waktu $waktu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function edit(Waktu $waktu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update = Waktu::updateOrCreate(['id' => $id], $request->all());

        if (!$update) {
            Alert::error('Error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('Success','Data Updated Successfully');
            return redirect()->route('waktu.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = Waktu::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('waktu.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('waktu.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('waktu.index');
        }
    }
}
