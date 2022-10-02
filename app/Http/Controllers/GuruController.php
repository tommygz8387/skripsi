<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
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
        // return view('frontend.guru.create',$data);
        return view('frontend.guru.index',$data);
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
        // $val = $request->validate([
        //     'nama'=>'required',
        //     'nip'=>'required',
        //     'no_tlp'=>'required',
        //     'jml_ampu'=>'required',
        //     'keterangan'=>'required',
        // ]);
        
        $store = Guru::create($request->all());
        if(!$store){
            Alert::error('Error','Add Data Failed!');
            return redirect()->route('guru.index');
        } else {
            Alert::success('Success','Data Added successfully');
            return redirect()->route('guru.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
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
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update = Guru::updateOrCreate(['id' => $id], $request->all());

        if (!$update) {
            Alert::error('Error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('Success','Data Updated Successfully');
            return redirect()->route('guru.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = Guru::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('guru.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('guru.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('guru.index');
        }
    }
}
