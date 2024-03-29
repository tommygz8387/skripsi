<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanController extends Controller
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
        $data['dataTingkat'] = Tingkat::latest()->get();
        $data['dataJurusan'] = Jurusan::where('jurusan','!=','Umum')->latest()->get();
        return view('frontend.jurusan.index',$data);
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
        $store = Jurusan::create($request->all());
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
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['dataJurusan'] = Jurusan::where('jurusan','!=','Umum')->latest()->get();
        $data['edit'] = Jurusan::find($id);
        if(!$data['edit']){
            Alert::error('Error','Data Not Found!');
            return redirect()->route('jurusan.index');
        }
        return view('frontend.jurusan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update = Jurusan::updateOrCreate(['id' => $id], $request->all());

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
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = Jurusan::find($id);

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

    public function reset()
    {
        //
        $res = Jurusan::where('id','!=','0');
        dd($res);

        // cek data
        if (!$res) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('jurusan.index');
        }

        $res->delete();
        if (!$res) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('jurusan.index');
        }else{
            Alert::success('Success','Data Has Been Deleted!');
            return redirect()->route('jurusan.index');
        }
    }
}
