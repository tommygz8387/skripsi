<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
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
        $data['user'] = User::Where('id', Auth::id())->first();
        return view('frontend.user.index',$data);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $update = User::find($id);

        if (!$update) {
            Alert::error('error','Data Not Found!');
            return redirect()->back();
        }


        if ($request->hasFile('photo')) {
            $path = 'photo/'.$update->photo;
            if (File::exists($path)&& $path!='photo/default.jpg') {
                File::delete($path);
            }

            $photo = $request->photo;
            $str = Str::random(8);
            $getExt = $photo->getClientOriginalExtension();
            $namafile = $str.'.'.$getExt;
            $photo->move('photo', $namafile);
        }else{
            $namafile = $update->photo;
        }

        
        $hashed = Hash::make($request->passBaru);

        $dataInput = array_merge($request->all(),['photo'=>$namafile,'password'=>$hashed]);

        $inputUpdate = User::updateOrCreate(['id'=>$id], $dataInput);

        if (!$inputUpdate) {
            Alert::error('Error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('Success','Data Updated Successfully');
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = User::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('Error','Data Not Found!');
            return redirect()->route('user.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('Error','Data Cannot Be Deleted!');
            return redirect()->route('user.index');
        }else{
            Alert::success('success','Data Has Been Deleted!');
            return redirect()->url('/');
        }
    }

    public function artisan()
    {
        Artisan::call('migrate:fresh --seed');
        return redirect()->url('/');
    }
}
